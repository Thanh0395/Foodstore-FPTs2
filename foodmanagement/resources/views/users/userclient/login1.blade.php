<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <button type="button" class="btn btn-success d-table my-5 mx-auto" data-bs-toggle="modal"
        data-bs-target="#ModalForm">
        CLick to login
    </button>

    <!-- Modal Form -->
    <div class="modal fade" id="ModalForm" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Login Form -->
                <form action=" {{ route('user.login.process') }} ">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Login Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Username">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control" id="email"
                                placeholder="Enter Email">
                        </div>

                        <div class="mb-3">
                            <label for="Password">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" id="Password"
                                placeholder="Enter Password">
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="remember" required>
                            <label class="form-check-label" for="remember">Remember Me</label>
                            <a href="#" class="float-end">Forgot Password</a>
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-success mx-auto w-100">Login</button>
                    </div>
                    <p class="text-center">Not yet account, <a href="#">Signup</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
