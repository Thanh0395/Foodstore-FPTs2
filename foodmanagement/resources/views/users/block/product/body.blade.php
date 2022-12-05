<!-- Product Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-12">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Our Products</h1>
                    <p>Let's your order and we will deliver it to you immediately.<br>
                        Address: 580 CMT8, Ward 3, District 3, TP.HCM.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInLeft">
                <div style="display: flex; justify-content: start; align-items: start;"
                    class="section-header text-start mb-1 wow fadeInUp">{{ $foods->links() }}</div>
            </div>

            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-3">
                    <li class="nav-item me-2" style="margin: 5px">
                        <a class="btn btn-outline-primary border-2 <?php
                        if ($Cate_name == 'all') {
                            echo 'active';
                        }
                        ?>"
                            href="{{ route('user.product.cate', 'all') }}">All</a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="nav-item me-2" style="margin: 5px">
                            <a class="btn btn-outline-primary border-2 <?php
                            if ($category->Cate_name == $Cate_name) {
                                echo 'active';
                            }
                            ?>"
                                href=" {{ route('user.product.cate', [$category->Cate_name]) }} ">
                                {{ $category->Cate_name }} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{-- Search --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#SearchInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#product-list #product-item").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        {{-- search by price --}}

        <input class="form-control" id="SearchInput" type="text"
            placeholder="Type something (name, price...) to search:">
        <div class="row" style="margin: 10px 0px;">
            <form action="{{ route('user.product.cate', $Cate_name) }}" method="get"
                class="form-horizontal form-label-left" enctype="multipart/form-data" >
                @csrf
                Price from <input class="" type="number" name="priceMin" value="{{$priceMin}}"> to <input class=""
                    type="number" name="priceMax" value="{{$priceMax}}">
                <button style="margin: 0px 10px;" class="btn btn-info btn-sm" type="submit"> Apply</button>
            </form>
        </div>

        {{-- /Search --}}

        {{-- tool tip --}}
        <script>
            $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        <div class="tab-content">
            <div id="" class="tab-pane fade show p-0 active">
                <div id="product-list" class="row g-4">
                    <!-- foreach -->
                    @foreach ($foods as $food)
                        <div id="product-item" class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img style="width: 100%; height: 282px" src=" {{ asset($food->image) }} "
                                        alt="">
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        New
                                    </div>
                                </div>
                                <div class="text-center p-2 " style="height: 5rem;">
                                    <a class="d-block h5 mb-2" data-toggle="tooltip" data-placement="right" title="Calo: {{$food->calories}} kcal">{{ $food->F_name }}</a>
                                </div>
                                <div class="text-center">
                                    <span class="text-primary me-1">
                                        {{ number_format($food->price * 0.9, 0, ',', '.') }} VND</span>
                                    <span class="text-body text-decoration-line-through">
                                        {{ number_format($food->price, 0, ',', '.') }} VND</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="{{ route('user.detail', [$food->F_id]) }}"><i
                                                class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body add_to_cart" href=""
                                            data-url="{{ route('user.product.addToCart', ['id' => $food->F_id]) }}"><i
                                                class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- end foreach --}}
                </div>
            </div>

            {{--
            <div id="" class="tab-pane fade show p-0">
                <div class="row g-4">
                    @foreach ($foods as $food)
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
                    @endforeach
                </div>
            </div>
            --}}
            <br>
            <div class="row">
                <div class="col-lg-4 col-sm-8 col-xs-10 offset-2">{{ $foods->links() }}</div>
            </div>
            {{-- <div class="col-12 text-center">
                <a class="btn btn-primary rounded-pill py-3 px-5" href=" {{ route('user.product.all') }} ">Browse More
                    Products</a>
            </div> --}}
        </div>
    </div>
</div>
<!-- Product End -->
