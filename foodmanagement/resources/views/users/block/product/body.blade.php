
    <!-- Product Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Our Products</h1>
                    <p>Let's your order and we will deliver it to you immediately.<br>
                        Address: 580 CMT8, Ward 3, District 3, TP.HCM.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2 <?php
                        if( $Cate_name == 'all'){
                            echo 'active';
                        }
                    ?>" href="{{ route('user.product.all') }}">All</a>
                    </li>
                    @foreach ($categories as $category)

                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 <?php
                                if($category->Cate_name == $Cate_name){
                                    echo 'active';
                                }
                            ?>"
                            href=" {{ route('user.product.cate', [$category->Cate_name]) }} ">  {{ $category->Cate_name }} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <!-- foreach -->
                    @foreach ($foods as $food)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src=" {{ asset($food->image) }} " alt="">
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        New
                                    </div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href=""> {{ $food->F_name }} </a>
                                    <span class="text-primary me-1">{{ number_format(($food->price)*0.9,0,',','.'); }} VND</span>
                                    <span class="text-body text-decoration-line-through">{{ number_format($food->price,0,',','.'); }} VND</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="{{route('user.detail', [$food->F_id])}}"><i
                                                class="fa fa-eye text-primary me-2"></i>View detail</a>
                                                @csrf
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href=""><i
                                                class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- end foreach --}}
                </div>
            </div>


            @foreach ($foods as $food)
                    <div id="" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <!-- foreach -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="product-item">
                                        <div class="position-relative bg-light overflow-hidden">
                                            <img class="img-fluid w-100" src="{{ asset( $food->image ) }}"
                                                alt="">
                                            <div
                                                class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                New</div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5 mb-2" href="">{{ $food->F_name }}</a>
                                            <span class="text-primary me-1">VND{{ $food->price }}</span>
                                            <span
                                                class="text-body text-decoration-line-through">VND{{ $food->price }}</span>
                                        </div>
                                        <div class="d-flex border-top">
                                                <a class="text-body" href="{{route('user.detail', [$food->F_id])}}"><i
                                                    class="fa fa-eye text-primary me-2"></i>View detail</a>
                                                    @csrf
                                            <small class="w-50 text-center py-2">
                                                <a class="text-body" href=""><i
                                                        class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>

                            {{-- end foreach --}}
                        </div>
                    </div>
            @endforeach
            <div class="col-12 text-center">
                <a class="btn btn-primary rounded-pill py-3 px-5" href=" {{route('user.product.all')}} ">Browse More
                    Products</a>
            </div>





        </div>
    </div>
</div>
<!-- Product End -->



