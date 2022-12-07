<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>yourcart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.6.1/js/bootstrap.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> --}}
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>
</head>

<body>
    <div class="cart-wrapper update_cart_url" data-url="{{ route('user.product.updateCart') }}">
        @if (Session::has('cart') != null)
            <section class="vh-100" style="background-color: #fdccbc;">
                <div class="container delete_cart_url h-100" data-url="{{route('user.product.deleteCart')}}">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($carts as $cart)
                                @php
                                    $count += 1;
                                @endphp
                            @endforeach
                            <p><span class="h2">Shopping Cart</span><span class="h4">({{$count}} item in your
                                    cart)</span>
                            </p>
                            @php
                                $total = 0;
                            @endphp
                            <div class="">
                                @foreach ($carts as $id => $cart)
                                    @php
                                        $total += $cart['quantity'] * $cart['price'] * 0.9;
                                        $count += 1;
                                        // dd($total);
                                    @endphp
                                    <main class="card mb-1">
                                        <div class="card-body p-1">

                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="{{ asset($cart['image']) }}" class="img-fluid"
                                                        alt="Generic placeholder image">
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-4 pb-2">Name</p>
                                                        <p class="lead fw-normal mb-0">{{ $cart['F_name'] }}</p>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-1 pb-2">Free Sauce</p>
                                                        <select class="freeSauce" style="width: 80px">
                                                            <option value="{{ $cart['Sauces'] }}">Choose Sauce</option>
                                                            <option value="Demi">Demi</option>
                                                            <option value="Japone">Japone</option>
                                                            <option value="Red Wine">Red Wine</option>
                                                            <option value="Oyster">Oyster</option>
                                                        </select>
                                                        <p class="small text-muted mb-0 pb-0">Your sauce:
                                                            {{ $cart['Sauces'] }}</p>

                                                    </div>
                                                </div>


                                                <div class="quantity col-md-1 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-1 pb-2">Quantity</p>
                                                        <input style="width: 60px;" type="number" class="quantity"
                                                            value="{{ $cart['quantity'] }}" min="1">
                                                        {{-- <p class="lead fw-normal mb-0">{{$cart['quantity']}}</p> --}}
                                                    </div>
                                                </div>
                                                <div class="col-md-1 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-0 pb-2">Price</p>
                                                        <p class="small lead fw-normal mb-0">
                                                            {{ number_format($cart['price'] * 0.9, 0, ',', '.') }} VND
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-0 pb-2">Subtotal</p>
                                                        <p class="lead fw-normal mb-0">
                                                            {{ number_format($cart['price'] * $cart['quantity'] * 0.9, 0, ',', '.') }}
                                                            VND
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-4 pb-1">Action</p>
                                                        <a href="" data-id="{{ $id }}"
                                                            class="btn btn-primary cart_update">Update</a>

                                                        <a href="" data-id="{{ $id }}"
                                                            class="btn btn-danger cart_delete">Delete</a>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                    </main>
                                @endforeach
                            </div>

                            {{-- afhuadhfusdhfusd --}}
                            {{-- afhuadhfusdhfusd --}}
                            {{-- @php
                                $percent = 0;
                            @endphp --}}
                            <div class="card mb-5 hotdeal_update" data-url="{{route('user.product.hotDeal')}}">
                                <div class="card-body p-4">
                                    <div class="float-left">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Enter Voucher:</span>
                                            <input type="text" class="form-control Voucher" placeholder="............."
                                                aria-label="..." aria-describedby="basic-addon1">
                                                <input type="hidden" class="percent_input" value="{{$percent}}">
                                            <button class="btn btn-success hot_deal">Submit</button>
                                        </div>
                                    </div>

                                    <div class="float-end">
                                        <p class="mb-0 me-5 d-flex align-items-center">
                                            <span class="small text-muted me-2">Order total:</span> <span
                                            class="lead fw-normal">
                                                {{ number_format($total * (((100 - $percent) / 100)), 0, ',', '.') }}
                                            VND</span>
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-light btn-lg me-2"><a
                                        href="{{ route('user.product.all') }}">Continue shopping</a></button>
                                <a href="{{ route('user.product.checkOut',[$total]) }}"><button type="button"
                                        class="btn btn-primary btn-lg">Checkout</button></a>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        @else
            <div class="alert alert-primary text-center" role="alert">
                No products in your cart
            </div>
            <div class="row">
                <div class="cod-md-12">
                    <a style="text-align: center" href="{{route('user.product.all')}}">Shoping Now!</a>
                </div>
            </div>
        @endif
    </div>


    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        function cartUpdate(event) {
            event.preventDefault();
            let urlUpdateCart = $('div.update_cart_url').data('url');
            let id = $(this).data('id');
            // let quantity = $(this).data('quantity');
            let quantity = $(this).parents('main').find('input.quantity').val();
            let Sauce = $(this).parents('main').find('select.freeSauce').val();
            // let Voucher = $(this).parents('div.float-left').find('input.Voucher').val();
            $.ajax({
                type: "GET",
                url: urlUpdateCart,
                data: {

                    id: id,
                    quantity: quantity,
                    Sauce: Sauce
                    // Voucher: Voucher
                },
                dataType: "json",
                success: function(data) {
                    // alert(Voucher);
                    if (data.code === 200) {
                        $('.cart-wrapper').html(data.cart_component);
                    }
                },
                error: function() {

                }
            });
        }

        ///HOt deall
        function hotdeal(event) {
            event.preventDefault();
            let urlhotdeal = $('div.hotdeal_update').data('url');
            let Voucher = $(this).parents('div.float-left').find('input.Voucher').val();
            let percent = $(this).parents('div.float-left').find('input.percent_input').val();
            $.ajax({
                type: "GET",
                url: urlhotdeal,
                data: {
                    Voucher: Voucher,
                    percent:percent
                },
                dataType: "json",
                success: function(data) {
                    // alert(percent);
                    if (data.code === 200) {
                        $('.cart-wrapper').html(data.cart_component);
                    }
                },
                error: function() {

                }
            });
        }

        //delete cart function
        function deleteCart(event){
            event.preventDefault();
            let urldeleteCart = $('div.delete_cart_url').data('url');
            let id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: urldeleteCart,
                data: {

                    id: id,
                },
                dataType: "json",
                success: function(data) {
                    // alert(Voucher);
                    if (data.code === 200) {
                        $('.cart-wrapper').html(data.cart_component);
                    }
                },
                error: function() {

                }
            });
        }
        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
            $(document).on('click', '.hot_deal', hotdeal);
            $(document).on('click', '.cart_delete', deleteCart);
        })
    </script>
</body>
