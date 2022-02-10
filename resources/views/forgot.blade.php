<html>
    <head>
        <title> password verification </title>
        <link rel="stylesheet" type="text/css"  href="{{asset('css/style.css')}}">
    </head>
    <body style="margin:auto;margin-top:15%;text-align:center;border-radius:20px;background-color:grey;">
        <form action="forgot_email" method="POST">
            @csrf
            Enter your mail : <br> <input type="email" name="email" style=padding:2px;> <br>
            <span class="error">@error('email') {{$message}} @enderror</span> <br>
            @if (Session::has('fail'))
            <span class="error">{{Session::get('fail')}}</span> <br>
            @endif
            @if (Session::has('sucess'))
            <span class="sucess">{{Session::get('sucess')}}</span> <br>
            @endif
            <input type="submit" value="submit" style="background-color:red;color:white">
        </form>
    </body>
</html>
