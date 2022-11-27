<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Store-Group 01 | Delivery</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="{{asset('assets/clients/detail/style.css')}}" rel="stylesheet">
    {{-- @yield('cssDetail') --}}
    {{-- <style>
        /* Make the image fully responsive */
        .carousel-inner img {
          width: 100%;
          height: 100%;
        }
    </style> --}}
</head>
<body>
    {{-- @include('users.block.detail.header') --}}
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contentdetail">
                        @yield('contentdetail')
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
{{-- @yield('jsDetail') --}}
</html>
