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

        <div id="date-time" class="flex-grow-1 text-center" style="margin-top: 40px; gap: 20px">
            <span style="margin: 0 15px;">Jakarta |</span>
            <span style="margin: 0 15px;" id="time"></span> |
            <span style="margin: 0 15px;" id="date"></span>
        </div>

        <div class="d-flex" style="gap: 10px; margin-left: auto; margin-right: 50px; margin-top: 40px;"> 
            <a href="/login" class="btn btn-outline-primary me-2" style="border-color: #7A8646; color: #7A8646;background-color: white;">Login</a>
            <a href="/register" class="btn btn-primary" style="background-color: #7A8646; color: white;">Register</a>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script>
        function updateTime() {
            const now = new Date();
            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('time').textContent = now.toLocaleTimeString('en-US', timeOptions);
            document.getElementById('date').textContent = now.toLocaleDateString('en-US', dateOptions);
        }
        setInterval(updateTime, 1000);
        updateTime();
      </script>

      <nav class="navbar navbar-expand-lg" style="background-color: #F7EEE5;">
        <div class="container-fluid">
          <form class="d-flex" style="margin-left: 30px; margin-top: 10px; max-width: 800px; border-radius: 20px;">
            <input class="form-control me-2" type="text" placeholder="Cari" aria-label="Cari" style="width: 458px; height: 58px; border-radius: 20px;">
          </form>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto" style="gap: 150px;">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/filter">Filter</a></li>
                <li class="nav-item"><a class="nav-link" href="/discount">Discount 10.10</a></li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Sopir</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Sopir</a></li>
                    <li><a class="dropdown-item" href="#">Tanpa Sopir</a></li>
                  </ul>
                </li>
              </ul> 
            </div>
          </div>
        </div>
      </nav>

          <div class="container-custom mx-auto p-4" style="max-width: 1450px; margin-top: 20px;">
        <div class="login-card shadow-sm">
          <h3 class="text-center" style="color:#636F47; font-weight:700; margin-bottom:20px;">Login</h3>
          <div>
            <ul class="nav nav-tabs" id="loginTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab">Password</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="otp-tab" data-bs-toggle="tab" data-bs-target="#otp" type="button" role="tab">OTP</button>
              </li>
            </ul>

            <div class="tab-content p-3">
              <div class="tab-pane fade show active" id="password" role="tabpanel">
                <form method="POST" action="/login">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="8" title="Min 8 characters">
                    <div class="form-text text-muted">Gunakan password minimal 8 karakter. (Jika Anda mendaftar baru, password harus mengandung huruf besar dan kecil.)</div>
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

              <div class="tab-pane fade" id="otp" role="tabpanel">
                <form method="POST" action="/otp/send">
                  @csrf
                  <div class="mb-3">
                    <label for="identifier" class="form-label">Email or Phone</label>
                    <input type="text" class="form-control" id="identifier" name="identifier" placeholder="you@example.com or 0812..." required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Send via</label>
                    <select class="form-control" name="channel">
                      <option value="email">Email</option>
                      <option value="sms">SMS</option>
                    </select>
                  </div>
                  <div class="d-flex justify-content-between">
                    <button type="submit" class="btn login-btn">Send OTP</button>
                    <a href="/register" class="btn btn-outline-secondary">Register</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
