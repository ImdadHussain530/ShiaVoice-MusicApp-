<!doctype html>
<html lang="en">

<head>
    <title>Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>


<body>



    <div class="container-fluid  my-5">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card loginCard card-body">
                    <h3 class="text-center mb-4">Login</h3>
                    @if (session()->has('fail'))
                        <div class="alert alert-danger">{{ session()->get('fail') }}</div>
                    @endif

                    <form class="loginFieldGroup" action="{{ route('login') }}" method="post">
                        @csrf
                        <div>
                            <div class="form-group ">
                                <label>Email</label>
                                <input class="form-control input-lg" placeholder="Eg : Jonhsmith@gmail.com"
                                    value="{{ old('email') }}" name="email" type="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control input-lg" placeholder="Password" name="password" value=""
                                    type="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <input class="btn btn-submit btn-lg btn-block" value="Submit" type="submit">
                        <h6 class="signupdetail">Don't have an account?<a href="{{route('registerView')}}">SignUp</a></h6>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
