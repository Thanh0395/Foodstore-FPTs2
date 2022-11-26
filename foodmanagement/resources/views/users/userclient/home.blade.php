@extends('users.userlayout.masterHome')
@section('content')
<div id="banner" class="banner full-screen-mode parallax">
    <video playsinline autoplay muted loop>
        <source src=" {{ asset('assets/clients/video/background.mp4') }} " type="video/mp4">
    </video>
    <div class="container pr">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="banner-static">
                <div class="banner-text">
                    <div class="banner-cell">
                        <h1>Dinner with us  <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="Friends:Family:Officemates" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>
                        <h2>Accidental appearances </h2>
                        <div class="book-btn">
                            <a href=" {{route('user.product.all')}} " class="table-btn hvr-underline-from-center">Order Now</a>
                        </div>
                        <a href="#about">
                            <div class="mouse"></div>
                        </a>
                    </div>
                    <!-- end banner-cell -->
                </div>
                <!-- end banner-text -->
            </div>
            <!-- end banner-static -->
        </div>
        <!-- end col -->
    </div>
    <!-- end container -->
</div>
<!-- end banner -->





    {{-- <h1>Trang Chu</h1>
    {{-- @datetime da duoc dinh nghia trong provider --}}
    {{-- @datetime("2022-10-11 10:00:30") --}}

    {{-- @disk la cau lenh re nhanh da duoc dinh nghia trong provider --}}
    {{-- @disk('local')
    <p>Moi truong local</p>
    @elsedisk('production')
    <p>Moi trong production</p>
    @elsedisk('test')
    <p>Moi truong test</p>
    @enddisk --}}

@endsection
