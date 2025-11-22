<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\OtpCode;
use App\Services\SmsService;
use Carbon\Carbon;
use App\Models\SessionLog;

class AuthController extends Controller
{
    // User Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            // Password: min 8 characters and must contain at least one lowercase and one uppercase letter
            'password' => ['required','string','min:8','confirmed','regex:/^(?=.*[a-z])(?=.*[A-Z]).+$/'],
            'role' => 'sometimes|string|in:customer,admin',
        ], [
            'password.regex' => 'Password must contain at least one uppercase and one lowercase letter.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password_hash' => Hash::make($request->password),
            'role' => $request->role ?? 'customer',
        ]);

        // If phone provided, create OTP and send SMS for verification
        if ($user->phone) {
            $code = rand(100000, 999999);
            $expires = Carbon::now()->addMinutes(10);

            $otp = OtpCode::create([
                'user_id' => $user->user_id,
                'code' => $code,
                'channel' => 'sms',
                'expires_at' => $expires,
            ]);

            SmsService::send($user->phone, "Your verification code: {$code}");

            // mark registration flow in session
            session(['otp_registration_user_id' => $user->user_id]);

            // For API callers return JSON, for web redirect to homepage with status
            if ($request->wantsJson() || $request->expectsJson()) {
                return response()->json([
                    'message' => 'User registered successfully',
                    'user' => $user,
                    'otp_sent' => true,
                ], 201);
            }

            return redirect('/')->with('status', 'Registrasi berhasil. Kode verifikasi telah dikirim ke nomor Anda.');
        }

        // No phone provided: for API return JSON, otherwise log the user in and redirect home
        if ($request->wantsJson() || $request->expectsJson()) {
            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user
            ], 201);
        }

        // Log the user in for web registrations and regenerate session
        try {
            Auth::login($user);
            $request->session()->regenerate();
        } catch (\Throwable $e) {
            // ignore login/regenerate failures
        }

        return redirect('/')->with('status', 'Registrasi berhasil. Selamat datang!');
    }

    // User Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            // require at least 8 chars when logging in too
            'password' => 'required|string|min:8',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // If user not found or password doesn't match stored password_hash
        if (! $user || ! Hash::check($request->password, $user->password_hash)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Log the user in using the user instance
        Auth::login($user);

        // regenerate session to prevent fixation
        try {
            $request->session()->regenerate();
        } catch (\Throwable $e) {
            // ignore session regeneration errors
        }

        // create token (if using Sanctum/Passport)
        $token = null;
        if (method_exists($user, 'createToken')) {
            $token = $user->createToken('auth_token')->plainTextToken;
        }

        // create session log
        try {
            SessionLog::create([
                'user_id' => $user->user_id ?? $user->id,
                'session_id' => session()->getId(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'expires_at' => Carbon::now()->addWeek(),
            ]);
        } catch (\Throwable $e) {
            // ignore logging failures
        }

        $response = [
            'message' => 'Login successful',
            'user' => $user,
        ];

        if ($token) {
            $response['access_token'] = $token;
            $response['token_type'] = 'Bearer';
        }

        // If the request expects JSON (API/AJAX), return JSON. Otherwise redirect to homepage.
        if ($request->wantsJson() || $request->expectsJson()) {
            return response()->json($response);
        }

        return redirect()->intended('/')->with('status', 'Login successful');
    }

    // Logout
    public function logout(Request $request)
    {
        // If this is an API token-based request, try to delete the token
        $user = $request->user();
        if ($user && method_exists($user, 'currentAccessToken') && $request->header('Authorization')) {
            try {
                $token = $user->currentAccessToken();
                if ($token) {
                    $token->delete();
                }
            } catch (\Throwable $e) {
                // ignore token deletion errors
            }

            return response()->json(['message' => 'Logged out successfully']);
        }

        // Otherwise perform a web session logout
        try {
            Auth::logout();
        } catch (\Throwable $e) {
            // ignore
        }

        try {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } catch (\Throwable $e) {
            // ignore session cleanup errors
        }

        return redirect('/')->with('status', 'Logged out successfully');
    }

    // Update Profile
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'sometimes|string|max:100',
            'phone' => 'sometimes|string|max:20',
        ]);

        $user->update($request->only(['name', 'phone']));

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ]);
    }
}

