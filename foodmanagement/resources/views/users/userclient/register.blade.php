<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.6.1/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.6.1/js/bootstrap.bundle.min.js">

    <style>
        body {
            background-image: url("https://th.bing.com/th/id/R.89cd60c585fa5398abfd3bc5d8533576?rik=iBAErD3xqPT2Ug&riu=http%3a%2f%2fimages.unsplash.com%2fphoto-1496412705862-e0088f16f791%3fixlib%3drb-1.2.1%26q%3d80%26fm%3djpg%26crop%3dentropy%26cs%3dtinysrgb%26w%3d1080%26fit%3dmax%26ixid%3deyJhcHBfaWQiOjM2OTY4fQ&ehk=Ugw3I3l8NoHQMJfPIk4Q%2fMQlZTtTHowYx%2feoXm7TH0M%3d&risl=&pid=ImgRaw&r=0");
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            /* Only page Login */
            background-repeat: no-repeat, repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        #titileForm {
            text-align: center;
        }

        #myForm {
            position: absolute;
            left: 450px;
        }

        #imageLogin {
            position: absolute;
            left: 10px;
        }

        /* body {
            padding-top:4.2rem;
            padding-bottom: 4.2rem;
            background: rgba(0, 0, 0, 0.76);
        } */

        a {
            text-decoration: none !important;
        }

        h1,
        h2,
        h3 {
            font-family: 'Kaushan Script', cursive;
        }

        .myform {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            padding: 1rem;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 1.1rem;
            outline: 0;
            max-width: 500px;
        }

        .tx-tfm {
            text-transform: uppercase;
        }

        .mybtn {
            border-radius: 50px;
        }

        .login-or {
            position: relative;
            color: #aaa;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .span-or {
            display: block;
            position: absolute;
            left: 50%;
            top: -2px;
            margin-left: -25px;
            background-color: #fff;
            width: 50px;
            text-align: center;
        }

        .hr-or {
            height: 1px;
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }

        .google {
            color: #666;
            width: 100%;
            height: 40px;
            text-align: center;
            outline: none;
            border: 1px solid lightgrey;
        }

        form .error {
            color: #ff0000;
        }

        #second {
            display: none;
        }

        .login-form {
            background: #1a11117a;
            margin-top: 40px;
            margin-bottom: 100px;
            padding: 100px;
            border-radius: 50px;
            color: white;
            box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
        }

        .login-heading {
            text-align: center;
            margin-top: 20px;
        }

        .btn-primary {
            width: 100%;
        }
    </style>

    {{-- <script>
        var myApp = angular.module('myModule', [])
        myApp.controller('myCtrl', function($scope) {
            $scope.infor = function() {
                var sName = document.getElementById("txtName").value;
                var reName = /^\w/;
                var sEmail = document.getElementById("txtEmail").value;
                var reEmail = /^\w+[@]\w+[.]\w/;
                var sPhone = document.getElementById("txtPhone").value;
                var rePhone = /^\d{8,12}/;
                var sPass = document.getElementById("txtPass").value;
                var rePass = /^\w/;
                var sRePass = document.getElementById("txtRePass").value;

                if (reName.test(sName) == false) {
                    alert("Name is Invalid!");
                    document.getElementById("txtName").focus();
                    return false;
                }
                if (reEmail.test(sEmail) == false) {
                    alert("Email is Invalid!");
                    document.getElementById("txtEmail").focus();
                    return false;
                }
                if (rePhone.test(sPhone) == false) {
                    alert("Phone is Invalid!");
                    document.getElementById("txtPhone").focus();
                    return false;
                }
                if (rePass.test(sPass) == false) {
                    alert("Password is Invalid!");
                    document.getElementById("txtPass").focus();
                    return false;
                }
                if (sRePass != sPass) {
                    alert("Confirm Password is Invalid!");
                    document.getElementById("txtRePass").focus();
                    return false;
                }
                var sTerms = document.getElementById("txtTerms");
                var reTerms = sTerms.checked;
                if (reTerms == false) {
                    alert("Check terms of service!");
                    return false;
                }
                var sGender = (txtGender[0].checked == true) ? "Male" : "Female";
                var mess = [];
                mess.push("Your Information");
                mess.push("---------------------");
                mess.push("Username : " + sName);
                mess.push("Phone : " + sPhone);
                mess.push("Email : " + sEmail);
                mess.push("Gender: " + sGender);
                alert(mess.join("\n"));
            }
        })
    </script> --}}

</head>

<body>
    <section>
        <!--https://getbootstrap.com/docs/4.0/components/forms/?msclkid=8d3b65b1cf6f11ec9c864220a5c357c0-->


        <div class="container" ng-app="myModule" ng-controller="myCtrl" id="myForm">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-7 offset-md-3">
                        <div class="login-form">
                            <form method="POST" action=" {{route('user.register.process')}} ">
                                @csrf
                                <h1 id="titileForm">Create an account</h1>

                                <div class="form-group">
                                    <label>Username </label>
                                    <input type="text" name="name" class="form-control" id="txtName"
                                        placeholder="Enter username">
                                </div>

                                <div class="form-group">
                                    <label>Enter Email address </label>
                                    <input type="email" name="email" class="form-control" id="txtEmail"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text" style="color: rgb(0, 153, 255)"> We'll never
                                        share your email
                                        with anyone else. </small>
                                </div>

                                <div class="form-group">
                                    <label>Phone </label>
                                    <input type="text" name="phone" class="form-control" id="txtPhone"
                                        placeholder="Enter your phone">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" id="txtPass" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" id="txtRePass"
                                        placeholder="Confirm Password">
                                </div>

                                <div class="form-group">
                                    <label>Address </label>
                                    <input type="text" name="address" class="form-control" id="txtName"
                                        placeholder="Enter address" required>
                                </div>

                                {{-- <div class="form-group">
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" checked="checked" id="txtGender">Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" checked="checked" id="txtGender">Female
                                        </label>
                                    </div>
                                </div> --}}

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="txtTerms">
                                    <label class="form-check-label" for="exampleCheck1">
                                        I agree all statements in <a href="{{ route('user.term') }}"
                                            class="text-body"><u style="color: rgba(242, 255, 0, 0.978)">Terms of
                                                service</u></a>
                                    </label>
                                </div>

                                <div class="col-md-12 text-center ">
                                    <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm"
                                    >Register</button>
                                </div>

                                <div class="col-md-12 ">
                                    <div class="login-or">
                                        <hr class="hr-or">
                                        <span class="span-or">or</span>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <p class="text-center">
                                        <a href="#" class="google btn mybtn">Signup using Google</a>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <p class="text-center">You have account? <a href="{{ route('admin.login') }}"
                                            id="Login">Login
                                            here</a></p>
                                    <p class="text-center" style="font-size: 20px; text-"><a href="{{ route('user.home') }}"
                                            id="Login">HOME PAGE</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
