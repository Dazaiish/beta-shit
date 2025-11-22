<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\OtpCode;
use App\Mail\OtpCodeMail;
use App\Services\SmsService;
use Carbon\Carbon;
use App\Models\SessionLog;

class OtpAuthController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
            'channel' => 'required|in:email,sms',
        ]);

        $identifier = $request->input('identifier');
        $channel = $request->input('channel');

        $user = User::where('email', $identifier)
            ->orWhere('phone', $identifier)
            ->first();

        if (! $user) {
            return back()->withErrors(['identifier' => 'No user found with that email or phone.']);
        }

        $code = rand(100000, 999999);
        $expires = Carbon::now()->addMinutes(10);

        $otp = OtpCode::create([
            'user_id' => $user->user_id,
            'code' => $code,
            'channel' => $channel,
            'expires_at' => $expires,
        ]);

        if ($channel === 'email') {
            Mail::to($user->email)->send(new OtpCodeMail($otp, $user));
        } else {
            // SMS stub
            SmsService::send($user->phone, "Your OTP code: {$code}");
        }

    // store last_otp_user in session for verification step
    session(['otp_user_id' => $user->user_id]);

        return redirect()->route('otp.verify')->with('status', 'OTP sent.');
    }

    public function showVerify(Request $request)
    {
        return view('pages.otp_verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);

    // Check registration flow first, then fallback to login flow
    $userId = session('otp_registration_user_id') ?? session('otp_user_id');
        if (! $userId) {
            return redirect('/login')->withErrors(['identifier' => 'OTP session expired. Start again.']);
        }

        $otp = OtpCode::where('user_id', $userId)
            ->where('code', $request->input('code'))
            ->where('used', false)
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if (! $otp) {
            return back()->withErrors(['code' => 'Invalid or expired code.']);
        }

        $otp->used = true;
        $otp->save();

        // Log the user in
        $user = User::find($userId);

        // if registration flow, mark phone verified
        if (session()->has('otp_registration_user_id')) {
            $user->phone_verified_at = Carbon::now();
            $user->save();
            session()->forget('otp_registration_user_id');
        }

        Auth::login($user);
        session()->forget('otp_user_id');

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
            // ignore
        }

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
