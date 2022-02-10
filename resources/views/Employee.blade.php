<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatiable" content="ie=edge">
        <meta name="csrf-token" content="{{csrf_token() }}" />
        <title> CRUD </title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
 rel="stylesheet"
 integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
 crossorigin="anonymous">
 <link href="https://cdn.dataTables.net/1.11.4/css/jquery.dataTables.min.css"
 rel="stylesheet">
    </head>
    <body style="background-color:grey">
        <div style="background-color: white;margin:auto;margin-top:50px;border-radius:10px;width:90%;padding-top:20x;">
            <div class="container">
                <a href="logout" class="btn btn-primary" style="float:right; background-color:red; color:white;margin-top:20px;"> logout </a>
                <img alt="profile pic" src="{{asset('uploads/user/' . $data->profile_image)}}" style="height:30%;padding-left:10px;margin-left:2px;background-color:white;padding:20px;" />
                <h4> HI {{$data->name}} </h4>
                <h1 style="text-align: center"> <u> v7 Lancers Employees list </u> </h1>
                <a href="{{route('employee.create')}}" class="btn btn-primary" style="float: right;margin-bottom:7px;">  CREATE </a>
                <table class=" table table-bordered data-table" data-table>
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> EmpId </th>
                            <th> Name </th>
                            <th> Age </th>
                            <th> Gender </th>
                            <th> Designation </th>
                            <th> Roll </th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Employee as $item)
                            <tr id="emp-row-{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td>{{$item->EmpId}}</td>
                                <td>{{$item->Name}}</td>
                                <td>{{$item->Age}}</td>
                                <td>{{$item->Gender}}</td>
                                <td>{{$item->Designation}}</td>
                                <td>{{$item->Roll}}</td>
                                <td>
                                    <a href="{{route('employee.edit', $item->id)}}" class="btn btn-primary btn-sm" >
                                        Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm" onclick="deleteEmployee({{$item->id}})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous">
        </script>
        <script src="https://cdn.dataTables.net/1.11.4/js/jquery.dataTables.min.js">
        </script>
    </body>
    <script type="text/javascript">
    </script>
    <script type="text/javascript">
        $.ajaxSetup(
        {
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });
    </script>
    <script src="{{asset('js/custom.js')}}"> </script>
</html>
