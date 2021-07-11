<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-4">
                <h4>Login | Custom Auth</h4>
                <form action="{{route('check')}}" method="post">


                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{  Session::get('fail') }}
                        </div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{old('email')}}">
                        <span class="text-danger">@error('email')
                            {{$message}}
                        @enderror</span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span class="text-danger">@error('password')
                            {{$message}}
                        @enderror</span>
                    </div>

                    <button class="btn btn-block btn-primary">Sign In</button>

                    <a href="{{route('register')}}">I don't have an account, create new</a>

                </form>
            </div>
        </div>
    </div>

</body>
</html>