<html>
    <head>
        <title> reset </title>
        <link rel="stylesheet" type="text/css"  href="{{asset('css/style.css')}}">
    </head>
    <body style="margin:auto;margin-top:15%;text-align:center;border-radius:20px;background-color:grey;">
       <div style="background-color:white;padding-top:20px;height:30%;width:30%;margin:auto;border-radius:20px;">
        <form action="{{route('change_password')}}" method="POST">
            @if (Session::has('fail'))
                <span class="error"> {{Session::get('fail')}} </span>
            @endif
            @csrf
            <input type="hidden" name="user_id" value="{{$id}}" />
            New password : <input type="password" name="new_password"> <br>
            <span class="error">@error('new_password') {{$message}} @enderror</span> <br>
            confirm password: <input type="password" name="confirm_password"> <br>
            <span class="error">@error('confirm_password') {{$message}} @enderror</span> <br>
            <input type="submit" value="submit" style="background-color: red;color:white">
        </form>
    </div>
    </body>
</html>
