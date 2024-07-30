<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
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

    input[type="text"],
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

.login-link {
  display: block;
  text-align: center;
  margin-top: 10px;
  color: #333;
  text-decoration: none;
}
  </style>
</head>
<body>
  <div class="container">
    <h1>Registration Form</h1>
    <form method="post" action="/registerAdmin">
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
        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="firstName" required>
        <span class="text-danger">@error('firstName'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        <label for="last-name">Last Name:</label>
        <input type="text" id="last-name" name="lastName" required>
        <span class="text-danger">@error('lastName'){{$message}} @enderror</span>
      </div>
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
      <button type="submit">Register</button>
      <a href="/" class="login-link">If you already have an account, login here.</a>
    </form>
  </div>
</body>
</html>
