<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <h4>Dashboard</h4> <hr>
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$LoggedUserInfo['name']}}</td>
                            <td>{{$LoggedUserInfo['email']}}</td>
                            <td><a class="btn btn-danger btn-sm" href="{{route('logout')}}">Logout</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>