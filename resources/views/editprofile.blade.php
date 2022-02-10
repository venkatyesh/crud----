<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> </a>
</head>

<body style="background-color:grey">
    <div style="text-align: center;margin:auto;20%;background-color:white;height:70%;width:50%;border-radius:20px;">
        <form action="{{route('editprofile', $user->id)}}" method="POST"
            enctype="multipart/form-data"> <br>
            @if (Session::has('fail'))
                <span class="error"> {{ Session::get('fail') }} </span>
            @endif
            @csrf
            {{ method_field('POST') }}

            @if (isset($user))
                <div>
                    <img class="avatar" alt="profile pic"
                    src="{{ asset('uploads/user/' . $user->profile_image) }}" />
                </div>
            @endif

            <div>
                <label> upload your profile picture</label>
                <input type="file" name="profile_image" accept="image/*" placeholder="Enter your email"
                    style="padding:5px;">
            </div>

            <div>
                <label> Enter Your Name </label>
                <input type="text" name="name" placeholder="Enter Your name"
                    value="{{ isset($user) ? $user->name : '' }}"> <br>
                <span class="error">@error('name') {{ $message }} @enderror</span> <br>
            </div>

            <div>
                <label> Enter Your Email </label>
                <input type="text" name="email" placeholder="Enter Your Email"
                    value="{{ isset($user) ? $user->email : '' }}"> <br>
                <span class="error">@error('email') {{ $message }} @enderror</span> <br>
            </div>

            <div>
                <label> Enter Your Mobile </label>
                <input type="text" name="mobile" placeholder="Enter Your Mobile"
                    value="{{ isset($user) ? $user->mobile : '' }}"> <br>
                <span class="error">@error('mobile') {{ $message }} @enderror</span> <br>
            </div>

            <div>
                <label> Enter Password </label>
                <input type="password" name="password" placeholder="Enter Password" value=""> <br>
                <span class="error">@error('password') {{ $message }} @enderror</span> <br>
            </div>

            <div>
                <label> Enter Confirm password </label>
                <input type="password" name="confirmpassword" placeholder="Enter Confirm password" value=""> <br>
                <span class="error">@error('confirmpassword') {{ $message }} @enderror</span> <br>
            </div>

            <input type="submit" value="submit" style="background-color: red;margin-top:7px;">
            <div>
        </form>
    </div>
</body>

</html>
