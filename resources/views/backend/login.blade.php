
<!DOCTYPE html>
<html lang="en">
<head>
  @include('backend.layouts.head')
</head>
<body class="hold-transition login-page" style="height: 70vh;">
<div class="login-box">
  <div class="login-logo">
    <b>Admin</b>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="{{ route('backend.check') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="user_name" class="form-control" placeholder="User name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember" checked>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
  </div>
</div>


    <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
