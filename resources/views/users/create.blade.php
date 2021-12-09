<style>

.register-photo {
      background: #f1f7fc;
      padding: 40px 0
  }

  .register-photo .image-holder {
      display: table-cell;
      width: auto;
      background-size: cover
  }

  .register-photo .form-container {
      display: table;
      max-width: 900px;
      width: 90%;
      margin: 0 auto;
      box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1)
  }

  .register-photo form {
      display: table-cell;
      width: 200px !important;
      background-color: #ffffff;
      padding: 40px 60px;
      color: #505e6c
  }

  @media (max-width:991px) {
      .register-photo form {
          padding: 40px !important;
      }
  }

  .register-photo form h2 {
      font-size: 24px;
      line-height: 1.5 ;
      margin-bottom: 20px 
  }
  .register-photo form h3 {
      font-size: 24px;
      line-height: 0 ;
      margin-bottom: 10px;
  }

  .register-photo form .form-control {
      background: transparent;
      border: none;
      border-bottom: 1px solid #dfe7f1;
      border-radius: 0;
      box-shadow: none;
      outline: none;
      color: inherit;
      text-indent: 0px;
      height: 40px !important;
  }

  .register-photo form .form-check {
      font-size: 13px;
      line-height: 20px !important;
  }

  .register-photo form .btn-primary {
      background: #1e81b0 !important;
      border: none;
      border-radius: 4px;
      padding: 11px;
      box-shadow: none;
      margin-top: 25px;
      text-shadow: none;
      outline: none !important
  }

  .register-photo form .btn-primary:hover,
  .register-photo form .btn-primary:active {
      background: #1e81b0 !important
  }

  .register-photo form .btn-primary:active {
      transform: translateY(1px)
  }

  .register-photo form .already {
      display: block;
      text-align: center;
      font-size: 12px;
      color: #6f7a85;
      opacity: 0.9;
      text-decoration: none
  }.btn-success{
      background-color: #1e81b0 !important;
      border: #1e81b0 !important;
      height: 30px;
      display: flex;
      width :250px !important;
      margin-left: 50px !important;

  }
  .imgh{
      height:700px;
      width: 350px;
  }
 
  }
</style>
@extends('layouts.app')

@section('content')
<div class="register-photo">
  <div class="form-container">

      <div class="image-holder" style="background-image: url(/img/dog6.jpeg)"></div>
      <form method="post" action="{{ url('users')}}">
          @csrf
          <h3 class="text-center"><strong>Create</strong> an account</h3>
          <div class="form-group"><input class="form-control" type="text" name="first_name" placeholder="First Name" value="{{old('first_name')}}">
          <span class="text-danger"> @error('first_name') {{$message}} @enderror</span>
          </div>
          <div class="form-group"><input class="form-control" type="text" name="last_name" value="{{old('last_name')}}" placeholder="Last Name">
          <span class="text-danger"> @error('last_name') {{$message}} @enderror</span>
          </div>
          <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Userame" value="{{old('username')}}">
          <span class="text-danger"> @error('username') {{$message}} @enderror</span>
          </div>
          <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" value="{{old('email')}}">
          <span class="text-danger"> @error('email') {{$message}} @enderror</span>
          </div>
          <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" value="{{old('password')}}">
          <span class="text-danger"> @error('password') {{$message}} @enderror</span>
          </div>
          <div class="form-group"><input class="form-control" type="tel" name="phone_number" placeholder="Phone Number" value="{{old('phone_number')}}">
          <span class="text-danger"> @error('phone_number') {{$message}} @enderror</span>
          </div>
          <div class="form-group"><input class="form-control" type="date" name="dob" placeholder="Date of Birth" value="{{old('dob')}}">
          <span class="text-danger"> @error('dob') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
              <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="terms"> I agree to the terms and conditions.</label>
              <span class="text-danger"> @error('terms') {{$message}} @enderror</span></div>
          </div>
          <div class="form-group"><button class="btn btn-success btn-block" type="submit">Sign Up</button></div>
          <div class="form-group"><button class="btn btn-success btn-block" type="reset">Cancel</button></div>
          <a class="already" href="{{ url('/')}}">You already have an account? Login here.</a>

      </form>
  </div>
</div>			
@endsection