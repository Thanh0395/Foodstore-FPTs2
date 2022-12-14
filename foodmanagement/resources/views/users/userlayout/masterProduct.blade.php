<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Food Store-Group 01 | Delivery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    {{-- <link href="img/favicon.ico" rel="icon"> --}}
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> --}}
    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/clients/order/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/clients/order/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/clients/order/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset('assets/clients/order/css/style.css')}}" rel="stylesheet">

</head>
<body>
    @include('users.block.product.header')
    {{-- @include('clients.blocksView.product.body') --}}
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
    @include('users.block.product.customerAndFirm')
    @include('users.block.product.footer')
    {{-- @include('clients.blocksView.footer') --}}
    <!-- JavaScript Libraries -->
    <script src="{{asset('https://code.jquery.com/jquery-3.6.1.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.slim.js"></script> --}}
    <script src="{{asset('assets/clients/order/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/clients/order/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/clients/order/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/clients/order/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/clients/order/js/main.js')}}"></script>
    @yield('jsCart')
    @stack('script')
    <script>
        document.getElementById("cartCount").innerHTML = {{session()->get('cartCount')}};
    </script>
</body>
</html>
