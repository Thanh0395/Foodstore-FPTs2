<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

    <!-- Site Metas -->
    <title>Food Store-Group 01 | Delivery</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href=" {{ asset('assets/clients/images/favicon.ico') }} " type="image/x-icon" />
    <link rel="apple-touch-icon"  href=" {{ asset('assets/clients/images/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css') }}" >
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/clients/css/responsive.css') }}" >
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="{{ asset('assets/clients/css/colors/orange.css') }}" />

    <!-- Modernizer -->
    <script src=" {{ asset('assets/clients/js/modernizer.js') }} "></script>


</head>
<body>
    @include('users.block.home.loader')
    @include('users.block.home.header')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('users.block.home.about')
    @include('users.block.home.menu')
    @include('users.block.home.pricing')
    @include('users.block.home.gallery')
    @include('users.block.home.blog')
    @include('users.block.home.team')
    @include('users.block.home.reservation')
    @include('users.block.home.footer')
    <!-- ALL JS FILES -->
    <script src="{{ asset('assets/clients/js/all.js') }}" ></script>
    <script src="{{ asset('assets/clients/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('assets/clients/js/custom.js') }}"></script>
    @stack('script')
</body>
</html>
