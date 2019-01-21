<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
  </head>
  <body>
    <div class="container">
      <div class="login-wrapper">
        <h1 class="title">Register</h1>
        <hr>
        <form method="POST" action="{{ route('register') }}" class="login-form">
            @csrf
          <input type="text" class="input" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>

          @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif

          <input type="email" class="input" placeholder="E-mail"  name="email" value="{{ old('email') }}" required>

          @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif

          <input type="password" class="input" placeholder="Password" name="password" required>

          @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif

           <input id="password-confirm" placeholder="Confirm Password" type="password" class="input" name="password_confirmation" required>

          <textarea name="address" rows="3" placeholder="Address" rows="3" required></textarea>

          @if ($errors->has('address'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
          @endif

          <input type="date" class="input" placeholder="Birth Date"  name="dob" required>

          @if ($errors->has('dob'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('dob') }}</strong>
          </span>
      @endif

          <select name="gender" id="gender" class="input">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @if ($errors->has('gender'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif

          <button type="submit">Register</button>
          <p class="message">Already registered? <a href="/login">Sign In</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
