@yield("head")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            /* background-color: blue; */
        }
    </style>
</head>

@yield("navbar")
<div>
    <a href="/">Home</a>
    @if(Auth::check())
        <a href="#">{{Auth::user()->name}}</a>
        <a href="{{route('user.logout')}}">logout</a>
    @else
        <a href="{{route('user.login')}}">login</a>
        <a href="{{route('user.signup')}}">signout</a>
    
    @endif
</div>