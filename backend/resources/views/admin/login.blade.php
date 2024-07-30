<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f7f7f7;
      border-radius: 5px;
    }

    h1 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    .register-link {
      text-align: center;
      margin-top: 10px;
    }
    .custom-alert {
  background-color: #dff0d8;
  border-color: #d6e9c6;
  color: #3c763d;
}
.custom-alert1 {
  background-color: #f8d7da;
  border-color: #f5c6cb;
  color: #721c24;
}
  </style>
</head>
<body>
  <div class="container">
    <h1>Login Form</h1>
    <form action="{{ route('loginAdmin') }}" method="post">
    @if(session('success'))
              <div class="alert alert-success custom-alert">
                  {{ session('success') }}
              </div>
              @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger custom-alert1">{{Session::get('fail')}}</div>
                @endif
                @csrf
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="emailAddress" required>
        <span class="text-danger">@error('emailAddress'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="Password" required>
        <span class="text-danger">@error('Password'){{$message}} @enderror</span>
      </div>
      <button type="submit">Login</button>
    </form>
    <div class="register-link">
      Don't have an account? <a href="/register">Register here</a>
    </div>
    <div class="register-link">
      Are you a Co-Admin? <a href="/coAdminLogin">Login Here!</a>
    </div>
  </div>
</body>
</html>
