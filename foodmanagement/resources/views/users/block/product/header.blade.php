<header>
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex" style="padding-right: 20px">
            <div class="col-lg-3 px-5 text-start">
                <small><i class="fa fa-location-arrow me-2"></i>580 CMT8, Ward 3, District 3, TP.HCM</small>
            </div>
            <div class="col-lg-3 px-5 text-start">
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>Group1@gmail.com</small>
            </div>
            <div class="col-lg-6 px-8 text-end" >
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f" style="color: blue"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter" style="color: rgb(0, 98, 255)"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in" style="color: rgba(47, 255, 0, 0.795)"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram" style="color: rgb(255, 0, 174)"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            {{-- Logo --}}
            {{-- <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
            </a> --}}
            {{-- add input search to product --}}
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                @if ( session()->get('name') != '')
                    <div style="font-size: 12pt; background-color: whitesmoke;border-radius: 20px ; padding: 5px 10px">Hello,
                        <a href="{{route('user.profile')}}"> {{session()->get('name')}}</a>
                    </div>
                @endif
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{route('user.home')}}" class="nav-item nav-link">HOME</a>
                    <a href="{{route('user.home')}}" class="nav-item nav-link">ABOUT US</a>
                    <a href="{{route('user.product.all')}}" class="nav-item nav-link active">PRODUCT</a>
                    <div class="nav-item dropdown">
                        <a href="{{route('user.home')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">PAGES</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{route('user.home')}}" class="dropdown-item">Blog</a>
                            <a href="{{route('user.home')}}" class="dropdown-item">Gllery</a>
                            <a href="{{route('user.home')}}" class="dropdown-item">Team</a>
                        </div>
                    </div>
                    <a href="{{route('user.home')}}" class="nav-item nav-link">CONTACT</a>
                </div>
                @php
                    $percent = 0;
                @endphp
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a style="position: relative;" class="btn-sm-square bg-white rounded-circle ms-3" href="{{route('user.product.showCart')}}">
                        <small class="fa fa-shopping-bag text-body"></small>
                        {{-- <small class="" style="position: absolute; top:-3px; right: 2px; z-index: 1; color: red"><strong>
                            @foreach ($count_cart as $count_c)
                                {{$count_c['count_cart']}}
                            @endforeach
                            </strong></small> --}}

                        <small class="" style="background-color: red;border-radius: 50%; padding: 0px 6px; position: absolute; top:-8px; right: -12px; z-index: 1; color: white"><Strong id="cartCount">0</Strong></small>
                    </a>

                    <a class="btn-sm-square bg-white rounded-circle ms-3" href=" {{route('user.login')}} ">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href=" {{route('user.logout')}} ">
                        <small class="fa fa-arrow-circle-right text-body"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown" style="color: yellow">Order Now!!!</h1>
            {{-- <nav aria-label="breadcrumb animated slideInDown" style="color:aliceblue">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="#">Frozen</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="#" >Fast Food</a></li>
                    <li class="breadcrumb-item text-dark active"     aria-current="page">Drink</li>
                </ol>
            </nav> --}}
        </div>
    </div>
    <!-- Page Header End -->
</header>
