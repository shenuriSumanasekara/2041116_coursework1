<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv ="X-UA-Compatible" content="ie=edge">
        <link href="./static/css/main.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href ="/css/main.css" rel="stylesheet">
        
    </head>
    <body>

        <ul> 
            <li  style="float:left; font-family:cursive; font-weight:bold; color:#44689e"><a href="#home"><i class="fa fa-fw fa-paw"></i>Puppy Media</a></li>
            <li><a class="active" href="{{url('/')}}"><i class="fa fa-fw fa-lock"></i>Login</a></li>
            <li><a href="#contact"><i class="fa fa-fw fa-user"></i>My Profile</a></li>
            <li><a href="#about"><i class="fa fa-fw fa-search"></i>About</a></li>
            <li><a  href="#home"><i class="fa fa-fw fa-home"></i>Home</a></li>
        </ul>

        <div class="register-photo">
            <div style="font-size:54px; padding: 4px 66px;">
            <i class="fa fa-fw fa-paw fa-lg " style="color:#1A64BE; "><h2 style="color:#1A64BE">Puppy Media</h2></i>
            </div>
            <div class="form-container">
                <div class="image-holder" style="background-image: url('img/dog4.jpeg')"></div>
                <form method="post" action="{{ url('welcome')}}">
                    @csrf
                    <h2 class="text-center"><strong>Welcome Paw Friends</strong></h2>
                    <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email">
                    <span class="text-danger"> @error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password">
                    <span class="text-danger"> @error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group"><button class="btn btn-success btn-block" type="submit">Sign Up</button></div><a class="already" href="{{ url('users/create')}}">Don't have an account? Sign Up here.</a>
                </form>
            </div>
        </div>				                            
       
    </body>
</html>

