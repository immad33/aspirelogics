@extends('layouts.app')

@section('content')

<div id="login-page">
  <div class="container">
        <form class="form-login" method="POST" action="{{ route('register') }}">
         @csrf
          <h2 class="form-login-heading">Register now</h2>
          <div class="login-wrap">

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <br>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                <br>

                <div class="input-group date" data-provide="datepicker">
                    <input id="dob" type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" required autocomplete="dob" placeholder="Date of birth">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
                @error('dob')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <br>

                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                
                @error('gender')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <br>

                <input id="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" required autocomplete="f-name" placeholder="First Name">
                @error('f_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <br>

                <input id="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" required autocomplete="l-name" placeholder="Last Name">
                @error('l_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <br>

              <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> REGISTER</button>
              <hr>
              
             <!--  <div class="login-social-link centered">
              <p>or you can sign in via your social network</p>
                  <button class="btn btn-facebook" type="button"><i class="fa fa-facebook"></i> Facebook</button>
                  <button class="btn btn-twitter" type="button"><i class="fa fa-twitter"></i> Twitter</button>
              </div> -->
              <div class="registration">
                  If you already have an account<br/>
                  <a class="" href="#">
                     Login
                  </a>
              </div>
  
          </div>
  
        </form>       
  
  </div>
</div>
@endsection
