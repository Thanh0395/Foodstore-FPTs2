<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="jumbotron text-center">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
        <hr>
        <p>
          Having trouble? <a href="{{route('user.home')}}">Contact us</a>
          Hotline: 088642385
        </p>
        <p class="lead">
          <a class="btn btn-primary btn-sm" href="{{route('user.home')}}" role="button">Continue to homepage</a>
        </p>
      </div>
</body>
</html>
