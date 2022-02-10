<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> </a>
    </head>
    <body style="background-color:grey">
        <div style="text-align: center;margin:auto;20%;background-color:white;height:70%;width:50%;border-radius:20px;">
            <form action="{{isset($employee) ? route('employee.update', $employee->id) : route('employee.store')}}" method="POST"> <br>
                @if (Session::has('fail'))
                    <span class="error"> {{Session::get('fail')}} </span>
                 @endif
                @csrf
                {{ method_field(isset($employee) ? "PUT" : "POST") }}
                <div>
                    <label> Enter your id </label>
                <input type="text" name="EmpId" placeholder='Enter your id' value="{{isset($employee) ? $employee->EmpId : ''}}"> <br>
                <span class="error" >@error('EmpId') {{$message}} @enderror</span> <br>
                </div>
                <div>
                <label> Enter Your Name </label>
                <input type="text" name="username" placeholder="Enter your name" value="{{isset($employee) ? $employee->Name : ''}}"> <br>
                <span class="error">@error('username') {{$message}} @enderror</span> <br>
                </div>
                <div>
                <label> Enter Your Age </label>
                <input type="number" name="Age" placeholder="Enter your age" value="{{isset($employee) ? $employee->Age : ''}}"> <br>
                <span class="error">@error('Age') {{$message}} @enderror</span> <br>
                </div>
                <div>
                <label> Enter Your Designation </label>
                    <input type="text" name="Designation" placeholder="Enter your designation" value="{{isset($employee) ? $employee->Designation : ''}}"> <br>
                    <span class="error">@error('Designation') {{$message}} @enderror</span> <br>
                </div>
                <div>
                    <label> Enter Your Roll</label>
                <input type="text" name="Roll" placeholder="Enter your roll" value="{{isset($employee) ? $employee->Roll: ''}}"> <br>
                <span class="error">@error('Roll') {{$message}} @enderror</span> <br>
                </div>
                Male:<input type="radio" name="gender" value="Male" {{isset($employee) ? ($employee->Gender=='Male' ? "checked" : '') : ''}} >
                Female:<input type="radio" name="gender" value="Female" {{isset($employee) ? ($employee->Gender=='Female' ? "checked" : '') : ''}}>
                <input type="submit" value="submit" style="background-color: red;margin-top:7px;">
                <div>
            </form>
        </div>
    </body>
</html>
