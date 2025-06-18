<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
  <style>
    body.login-page {
      background: linear-gradient(120deg, #000428 60%, #004e92 100%);
      min-height: 100vh;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .login-box {
      box-shadow: 0 8px 32px rgba(0,0,0,0.25);
      border-radius: 32px;
      overflow: hidden;
    }
    .card-outline.card-primary {
      border-top: 4px solid #d4af37;
      border-radius: 32px;
      background: #fff;
    }
    .card-header {
      background: #00008b;
      border-bottom: none;
      border-radius: 32px 32px 0 0;
      padding: 2rem 1rem 1rem 1rem;
    }
    .card-header .h1 {
      font-weight: bold;
      color: #fff;
      letter-spacing: 2px;
      font-size: 2.2rem;
      text-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .card-header .h1 span {
      color: #d4af37 !important;
      text-shadow: none;
    }
    .card-body {
      padding: 2.5rem 2rem 2rem 2rem;
    }
    .login-box-msg {
      color: #00008b;
      font-weight: 600;
      font-size: 1.1rem;
      margin-bottom: 1.5rem;
    }
    .form-control, .input-group-text {
      border-radius: 20px !important;
      border: 1.5px solid #d4af37;
      background: #f9f9f9;
    }
    .input-group-text {
      background: #fffbe6;
      color: #d4af37;
      border-left: none;
    }
    .btn-primary, .btn-primary:active, .btn-primary:focus {
      background: #00008b;
      border: none;
      color: #fff;
      font-weight: bold;
      border-radius: 20px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
      transition: background 0.3s, color 0.3s;
    }
    .btn-primary:hover {
      background: #d4af37;
      color: #000;
    }
    .icheck-primary input[type="checkbox"]:checked + label::before {
      background-color: #d4af37 !important;
      border-color: #d4af37 !important;
    }
    .icheck-primary label {
      color: #00008b;
      font-weight: 500;
    }
    .register-link {
      color: #d4af37 !important;
      font-weight: bold;
    }
    .invalid-feedback {
      color: #d9534f;
      font-size: 0.95em;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1">Hotel<span> Holly</span></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password"  placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

        <p class="mb-0">
            Don't have an account?
            <a href="{{ route('register') }}" class="register-link text-center"><b>Register</b></a>
        </p>

        <div class="row mt-3">
          <!-- /.col -->
          <div class="col-4 w-100 mx-auto">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>
</body>
</html>