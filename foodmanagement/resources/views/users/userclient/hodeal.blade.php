@extends('users.userlayout.masterDeal');
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
<div id="pricing" class="pricing-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="block-title text-center">
                    HOT DEAL
                </h2>
            </div>
            <div class="panel-pricing-in">
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="panel panel-pricing">
                        <div class="panel-heading">
                            <div class="pric-icon">
                                <img src="{{asset('assets/clients/images/store.png')}}" alt="" />
                            </div>
                            <h3>Basic</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p><strong>15%/<span>Bill</span></strong></p>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block hvr-underline-from-center" href="#">For Free!</a>
                        </div>
                    </div>
                </div>
                <!-- /item -->

                <!-- item -->
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="panel panel-pricing">
                        <div class="panel-heading">
                            <div class="pric-icon">
                                <img src="{{asset('assets/clients/images/food.png')}}" alt="" />
                            </div>
                            <h3>Pro</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p><strong>20%/<span>Bill</span></strong></p>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block hvr-underline-from-center" href="#">Get Now!</a>
                        </div>
                    </div>
                </div>
                <!-- /item -->

                <!-- item -->
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="panel panel-pricing">
                        <div class="panel-heading">
                            <div class="pric-icon">
                                <img src="{{asset('assets/clients/images/coffee.png')}}" alt="" />
                            </div>
                            <h3>Platinum</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p><strong>30%/<span>Bill</span></strong></p>
                            @php
                                $percent = 30;
                            @endphp
                        </div>
                        {{-- <ul class="list-group text-center">
                            <li class="list-group-item"><i class="fa fa-check"></i> One Website</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> One User</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 100 GB Bandwidth</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 2GB Storage</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Offline work</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 24x7 Support</li>
                        </ul> --}}
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block hvr-underline-from-center" href="{{route('user.home.getVoucher', [$percent])}}">Get Now!</a>
                        </div>
                    </div>
                </div>
                <!-- /item -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end pricing-main -->

@endsection
