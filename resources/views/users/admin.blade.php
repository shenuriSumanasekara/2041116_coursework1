<style>
    .ainline{
    background-color: white;
    display: inline-block;
    border-radius: 35px !important; 
    border-style: solid !important;
    border-width: 2px !important; 
    width: 150px;
    height: 35px;
    
    }
    .btn{
    background-color: white !important;
    display: inline-block;
    border-radius: 35px !important; 
    border-style: solid !important;
    border-width: 2px !important; 
    width: 150px;
    height: 35px;
    padding: 1px 5px 1px 5px;
    text-align:center !important;
    display: flex;
    align-items: center;
    justify-content: center;
    } 
    .btn-primary{
        color: #1A64BE !important;
        font-size : 13px !important;
    }
    .comment-post{
       margin-top: 15px;
       height: 90px
    }.container{
        width:700px !important;
    }.row{
        padding: 6px;
    }.btnv{
        display: inline-block;
        background-color: white !important;
        
    }h3 {
        text-align: center;
        font-family: cursive !important;
        font-weight: bold !important;
        font-size: 20 !important;
    }
</style>


@extends('layouts.app')



@section('content')
<div class="register-photo">
    <div row>
    <div class="col-md-10 col-md-offset-1">
            <a href="/users/profile/{{$user->id}}"><img src="/prof/{{$user->user_image}}" style=" btn width:200px; height:200px; float:left; border-radius:50%; border:3px solid black; margin-right:25px; padding: 4px"></a>
            <div>
            <h2 style="color:#1A64BE">Admin</h2>
            <h3 style="color:#1A64BE">{{$user->first_name}}</h3>
            </div>
    </div>
        <div style="font-size:24px; padding: 4px 46px;">
            <i class="fa fa-fw fa-paw fa-lg " style="color:#1A64BE; "><h3 style="color:#1A64BE">Puppy Media</h3></i>
        </div>
    
    </div>
</div>

@endsection