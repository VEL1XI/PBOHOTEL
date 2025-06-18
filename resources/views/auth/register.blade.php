<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Hotel Holly</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
  <style>
    body.register-page {
    background: linear-gradient(120deg, #000428 60%, #004e92 100%);
    min-height: 100vh;
    font-family: 'Source Sans Pro', sans-serif;
    }
    .register-box {
      box-shadow: 0 8px 32px rgba(0,0,0,0.18);
      border-radius: 32px;
      overflow: hidden;
      background: #fff;
      margin-top: 40px;
    }
    .card-outline.card-primary {
      border-top: 4px solid #d4af37;
      border-radius: 32px;
      background: #fff;
      box-shadow: none;
    }
    .card-header {
      background: #00008b;
      border-bottom: none;
      border-radius: 32px 32px 0 0;
      padding: 2rem 1rem 1rem 1rem;
    }
    .register-logo .h1 {
      font-weight: bold;
      color: #fff;
      letter-spacing: 2px;
      font-size: 2.2rem;
      text-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .register-logo .h1 span {
      color: #d4af37 !important;
      text-shadow: none;
    }
    .register-card-body {
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
    .text-center b, .register-link {
      color: #d4af37 !important;
      font-weight: bold;
    }
    .invalid-feedback {
      color: #d9534f;
      font-size: 0.95em;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <div class="register-logo">
              <a class="h1">Hotel<span style="color: #d4af37"> Holly</span></a>
            </div>
        </div>

    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
            </div>
            @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

        <div class="input-group mb-3">
          <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
            <input type="text" placeholder="Phone Number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <p>Already have an account?<a href="{{ route('login') }}" class="text-center register-link"><b> Login</b></a></p>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" required value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>
</body>
</html>