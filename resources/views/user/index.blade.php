<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatiable" content="ie=edge">
        <meta name="csrf-token" content="{{csrf_token() }}" />
        <title> CRUD </title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
 rel="stylesheet"
 integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
 crossorigin="anonymous">
 <link href="https://cdn.dataTables.net/1.11.4/css/jquery.dataTables.min.css"
 rel="stylesheet">
    </head>
    <body style="background-color:grey">
        <div class="table-container">
            <div class="container">
                <a href="/admin/logout" class="btn btn-primary" style="float:right; background-color:red; color:white;margin-top:20px;"> logout </a>
                <h1 style="text-align: center"> <u> User list </u> </h1>
                <a href="{{route('user.create')}}" class="btn btn-primary" style="float: right;margin-bottom:7px;">  Add User </a>
                <table class=" table table-bordered data-table" data-table>
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Avatar </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Mobile </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr id="user-row-{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td>
                                    <img alt="profile pic" src="{{asset('uploads/user/' . $item->profile_image)}}" class="avatar" />
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->mobile}}</td>
                                <td>
                                    <a href="{{route('user.edit', $item->id)}}" class="btn btn-primary btn-sm" >
                                        Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm" onclick="deleteUser({{$item->id}})">
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
