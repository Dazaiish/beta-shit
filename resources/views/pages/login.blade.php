<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        body { background-color: #F7EEE5; font-size: 20px }
        .navbar .nav-link { color: #7A8646 !important; font-weight: bold; }
        .navbar .nav-link:hover { color: #636F47 !important; font-weight: bold; font-size: 20px; }
        .login-card { max-width: 500px; margin: 40px auto; border: 1px solid #636F47; border-radius: 12px; background: #FFF; padding: 30px; }
        .login-btn { background-color: #7A8646; color: white; }
    </style>
  </head>
  <body>
    <div style="width:100%; min-height: 100vh; background-color: #F7EEE5;">
      <div class="container py-3 d-flex align-items-center">
        <h1 style="margin-left: 10px; margin-top: 20px; color: #636F47; font-size: 48.333px; font-weight: 700;">DrivenGO</h1>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


      <div class="container-custom mx-auto p-4" style="max-width: 1450px; margin-top: 20px;">
        <div class="login-card shadow-sm">
          <h3 class="text-center" style="color:#636F47; font-weight:700; margin-bottom:20px;">Login</h3>
          <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember">
              <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn login-btn">Login</button>
              <a href="/register" class="btn btn-outline-secondary">Register</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
