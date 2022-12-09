<div id="pricing" class="pricing-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="block-title text-center">
                    HOT DEAL
                </h2>
                {{-- <p>We always have hot deals for everyone from new users to loyal customers. Take a look at them here it's below. All because of you. Your choice is our honor.</p> --}}
            </div>
            <div class="panel-pricing-in">
                <!-- item -->
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
                        {{-- <ul class="list-group text-center">
                            <li class="list-group-item"><i class="fa fa-check"></i> One Website</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> One User</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 10 GB Bandwidth</li>
                            <li class="list-group-item"><i class="fa fa-times"></i> 2GB Storage</li>
                            <li class="list-group-item"><i class="fa fa-times"></i> Offline work</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 24x7 Support</li>
                        </ul> --}}
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
                                <img src="{{asset('assets/clients/images/food.png')}}" alt="" />
                            </div>
                            <h3>Pro</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p><strong>20%/<span>Bill</span></strong></p>
                        </div>
                        {{-- <ul class="list-group text-center">
                            <li class="list-group-item"><i class="fa fa-check"></i> One Website</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> One User</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 50 GB Bandwidth</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 2GB Storage</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Offline work</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 24x7 Support</li>
                        </ul> --}}
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
