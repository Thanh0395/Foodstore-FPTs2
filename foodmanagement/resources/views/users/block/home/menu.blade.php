<div class="special-menu pad-top-100 parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title color-white text-center"> Today's Special </h2>
                    <h5 class="title-caption text-center">
                        Everyone enjoys steak differently—from the cooking style and sauce pairings,
                        a steak can taste completely different when treated differently.
                        At Il Corda Charcoal Ste At Il Corda Charcoal Steakhouse, we take pride in our signature
                        charcoal flame grilling technique that gives our steaks an aromatic sear.
                        With all that said, what is your favourite doneness for steak?
                    </h5>
                </div>
                <div class="special-box">
                    <div id="owl-demo">
                        <div class="item item-type-zoom">
                            <a href="#" class="item-hover">
                                <div class="item-info">
                                    <div class="headline">
                                        SALMON STEAK
                                        <div class="line"></div>
                                        <div class="dit-line">Lorem ipsum dolor sit amet, consectetur adip aliqua. Ut
                                            enim ad minim venia.</div>
                                    </div>
                                </div>
                            </a>
                            <div class="item-img">
                                <img src="{{ asset('assets/clients/images/special_01.jpg') }}" alt="sp-menu">
                            </div>
                        </div>
                        <div class="item item-type-zoom">
                            <a href="#" class="item-hover">
                                <div class="item-info">
                                    <div class="headline">
                                        ITALIAN PIZZA
                                        <div class="line"></div>
                                        <div class="dit-line">Lorem ipsum dolor sit amet, consectetur adip aliqua. Ut
                                            enim ad minim venia.</div>
                                    </div>
                                </div>
                            </a>
                            <div class="item-img">
                                <img src="{{ asset('assets/clients/images/special_02.jpg') }}" alt="sp-menu">
                            </div>
                        </div>
                        <div class="item item-type-zoom">
                            <a href="#" class="item-hover">
                                <div class="item-info">
                                    <div class="headline">
                                        VEG. ROLL
                                        <div class="line"></div>
                                        <div class="dit-line">Lorem ipsum dolor sit amet, consectetur adip aliqua. Ut
                                            enim ad minim venia.</div>
                                    </div>
                                </div>
                            </a>
                            <div class="item-img">
                                <img src="{{ asset('assets/clients/images/special_03.jpg') }}" alt="sp-menu">
                            </div>
                        </div>
                        <div class="item item-type-zoom">
                            <a href="#" class="item-hover">
                                <div class="item-info">
                                    <div class="headline">
                                        SALMON STEAK
                                        <div class="line"></div>
                                        <div class="dit-line">Lorem ipsum dolor sit amet, consectetur adip aliqua. Ut
                                            enim ad minim venia.</div>
                                    </div>
                                </div>
                            </a>
                            <div class="item-img">
                                <img src="{{ asset('assets/clients/images/special_04.jpg') }}" alt="sp-menu">
                            </div>
                        </div>
                        <div class="item item-type-zoom">
                            <a href="#" class="item-hover">
                                <div class="item-info">
                                    <div class="headline">
                                        VEG. ROLL
                                        <div class="line"></div>
                                        <div class="dit-line">Lorem ipsum dolor sit amet, consectetur adip aliqua. Ut
                                            enim ad minim venia.</div>
                                    </div>
                                </div>
                            </a>
                            <div class="item-img">
                                <img src="{{ asset('assets/clients/images/special_04.jpg') }}" alt="sp-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end special-box -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end special-menu -->

<div id="menu" class="menu-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title text-center">
                        Our Menu
                    </h2>
                    <p class="title-caption text-center">Our menu has many choices for you. With a variety of
                        categories, many dishes are not only delicious, reasonably priced but also eye-catching
                        presented. If you are busy and can't go to the restaurant. Don't worry, here we can reserve
                        tables and order food online </p>
                </div>
                <div class="tab-menu">
                    <div class="slider slider-nav">
                        <div class="tab-title-menu">
                            <h2>FRONZEN</h2>
                            <p><img style=" margin-left: auto; margin-right: auto; padding: 10px"
                                    src="{{ asset('assets/clients/icons/fronzen.png') }}" alt=""></p>
                        </div>
                        <div class="tab-title-menu">
                            <h2>PASTA</h2>
                            <p><img style=" margin-left: auto; margin-right: auto; padding: 10px"
                                    src="{{ asset('assets/clients/icons/pasta.png') }}" alt=""></p>
                        </div>
                        <div class="tab-title-menu">
                            <h2>PROTEIN SALAD</h2>
                            <p><img style=" margin-left: auto; margin-right: auto; padding: 10px"
                                    src="{{ asset('assets/clients/icons/salad.png') }}" alt=""></p>
                        </div>
                        <div class="tab-title-menu">
                            <h2>DRINK</h2>
                            <p><img style=" margin-left: auto; margin-right: auto; padding: 10px"
                                    src="{{ asset('assets/clients/icons/drink.png') }}" alt=""></p>
                        </div>
                    </div>
                    <div class="slider slider-single">
                        <div>
                            @foreach ($fronzens as $food)
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <div class="offer-item">
                                        <img src="{{ asset($food->image) }}" alt="" class="img-responsive">
                                        <div>
                                            <h3>{{ $food->F_name }}</h3>
                                            <p>
                                                {{ $food->description }}
                                            </p>
                                        </div>
                                        <span style="font-size: 1.6em "
                                            class="offer-price">{{ number_format($food->price / 1000, 0, ',', '.') }}.k</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- end col -->
                        <div>
                            @foreach ($pastas as $food)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                <div class="offer-item">
                                    <img src="{{ asset($food->image) }}" alt="" class="img-responsive">
                                    <div>
                                        <h3>{{ $food->F_name }}</h3>
                                        <p>
                                            {{ $food->description }}
                                        </p>
                                    </div>
                                    <span style="font-size: 1.6em "
                                        class="offer-price">{{ number_format($food->price / 1000, 0, ',', '.') }}.k</span>
                                </div>
                            </div>
                            @endforeach
                            <!-- end col -->
                        </div>
                        <div>
                            @foreach ($salads as $food)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                <div class="offer-item">
                                    <img src="{{ asset($food->image) }}" alt="" class="img-responsive">
                                    <div>
                                        <h3>{{ $food->F_name }}</h3>
                                        <p>
                                            {{ $food->description }}
                                        </p>
                                    </div>
                                    <span style="font-size: 1.6em "
                                        class="offer-price">{{ number_format($food->price / 1000, 0, ',', '.') }}.k</span>
                                </div>
                            </div>
                            @endforeach
                            <!-- end col -->
                        </div>
                        <div>
                            @foreach ($drinks as $food)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                <div class="offer-item">
                                    <img src="{{ asset($food->image) }}" alt="" class="img-responsive">
                                    <div>
                                        <h3>{{ $food->F_name }}</h3>
                                        <p>
                                            {{ $food->description }}
                                        </p>
                                    </div>
                                    <span style="font-size: 1.6em "
                                        class="offer-price">{{ number_format($food->price / 1000, 0, ',', '.') }}.k</span>
                                </div>
                            </div>
                            @endforeach
                            <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end tab-menu -->
                <div class="menu-btn">
                    <button type="button" class="btn btn-outline-warning">
                        <a href=" {{ route('user.product.all') }} ">Order Now!!!</a>
                    </button>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end menu -->
