<html>
    <head>
        <title>BPS SRONO</title>
        @include('include.head')
        <style>
            .login-card {
                margin: 0px auto;
                width: 400px;
                height: fit-content;
                margin-top: 60px;
                background-color: rgb(255, 255, 255);
                box-shadow: 0px 0px 2px black;
            }
            .login-button {
                width: 100%;
                margin-top: 20px;
            }

        </style>
    </head>
    <body>
        @include('navbar.navbar2')
        <div class="card login-card">
            <div class="card-body m-0">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <center><h4>Masuk</h4></center>
                    @if ($errors->first() == null)
                    @else
                    <div class="alert alert-danger">
                        <p class="m-0">{{ $errors->first() }}</p>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="">Username: </label>
                        <input type="text" name="username" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Password: </label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success login-button" value="LOGIN">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>