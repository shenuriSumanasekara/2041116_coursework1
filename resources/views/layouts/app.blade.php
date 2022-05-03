<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv ="X-UA-Compatible" content="ie=edge">
        <link href="./static/css/main.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href ="/css/main.css" rel="stylesheet">

    </head>
    <body>
        <div style="height:70px">
            <ul style="height:50px"> 
                <li  style="float:left; font-family:cursive; font-weight:bold; color:#44689e"><a href="#home"><i class="fa fa-fw fa-paw"></i>Puppy Media</a></li>
                @if(Session()->has('user'))
                    <li><a class="active" href="{{ url('/logout')}}"><i class="fa fa-fw fa-lock"></i>Logout</a></li>
                @else
                    <li><a class="active" href="{{ url('/')}}"><i class="fa fa-fw fa-lock"></i>Login</a></li>
                @endif
                
                @if(Session()->has('user'))
                <li><a href="/users/profile/{{$user->id}}"><i class="fa fa-fw fa-user"></i>My Profile</a></li>
                @else
                <li><a href="/"><i class="fa fa-fw fa-user"></i>My Profile</a></li>
                @endif
                <li><a href="#"><i class="fa fa-fw fa-home"></i>Home</a></li>
               


            </ul>
        </div>
        
    <div>
        @yield('content')
    </div>       
    </body>
</html>

