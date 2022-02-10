<html>
    <head>
        <title> PROFILE UPLOAD </title>
        <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
    </head>
    <body style="background-color:grey">
        <h2 style="text-align: center;color:whitesmoke"> <u>  REGISTER PAGE </u></h2>
        <div style="margin:auto;margin-top:150px;background-color:white;width:350px;height:300px;border-radius:20px;text-align:center;padding:20px;">
            <br>
           <form action="{{route('signup')}}" method="POST" enctype="multipart/form-data">
            @if (Session::has('fail'))
                <span class="error"> {{Session::get('fail')}} </span>
            @endif
               @csrf
               please upload your profile picture
               <input type="file" name="profile_image" accept="image/*" placeholder="Enter your email" style="padding:5px;"><br>
            <input type="text" name="name" placeholder="Enter your name"> <br>
            <span class="error">@error('name') {{$message}} @enderror</span> <br>
            <input type="text" name="email" placeholder="Enter your email"><br>
            <span class="error">@error('email') {{$message}} @enderror</span> <br>
            <input type="password" name="password" placeholder="Enter your password"><br>
            <span class="error">@error('password') {{$message}} @enderror</span> <br>
            <input type="password" name="confirmpassword" placeholder="re enter your password"> <br>
            <span class="error">@error('confirmpassword') {{$message}} @enderror</span> <br>
            <input type="number" name="mobile" placeholder="Enter mobile number"> <br>
            <span class="error">@error('mobile') {{$message}} @enderror</span> <br>
            Gender:
            Male<input type="radio" name="gender" value="Male">
            Female<input type="radio" name="gender" value="Female"> <br>
            <input type="submit" value="Register">
          </form>
        </div>
    </body>
</html>
