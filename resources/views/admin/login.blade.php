<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel Login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body style="background-color: grey">
    <h2 style="text-align: center;color:whitesmoke"> <u>  Admin Panel Login </u></h2>
    <div style="margin:auto;margin-top:150px;background-color:white;width:350px;height:200px;border-radius:20px;text-align:center;padding:20px;">
        <br>
       <form action="{{route('admin/login')}}" method="POST">
        {{-- @if (Session::has('success'))
        <span class="error">{{Session::get('success')}} </span>
        @endif --}}
        @if (Session::has('fail'))
        <span class="error">{{Session::get('fail')}}</span> <br>
        @endif
        @csrf
        Enter your mail  :  <input type="text" name="email"> <br>
        <span class="error">@error('email') {{{$message}}} @enderror </span> <br>
        Enter password   :  <input type="password" name="pass"> <br>
        <span class="error">@error('pass') {{{$message}}} @enderror </span>
        <br>
        <input type="hidden" name="_token" value="<?=csrf_token()?>">
        <input type="submit" value="submit" style="background-color: red;color:white"> <br>
    </form>
    </div>
</body>
</html>