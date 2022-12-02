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

    @if (Session::has('cart') != null)
        <section class="vh-100" style="background-color: #fdccbc;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">

                        <p><span class="h2">Shopping Cart </span><span class="h4">(1 item in your cart)</span>
                        </p>
                        @php
                            $total = 0;
                        @endphp
                        <div class="cart_wrapper update_cart_url" data-url="{{ route('user.product.updateCart') }}">
                            @foreach ($carts as $id => $cart)
                                @php
                                    $total += $cart['quantity'] * $cart['price'];
                                    // dd($total);
                                @endphp
                                <div class="card mb-1">
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
                                                    <p class="small text-muted mb-4 pb-2">Free Sauce</p>
                                                    <select name="cars" class="freeSauce" id="cars">
                                                        <option value="Demi Sauce">Demi Sauce</option>
                                                        <option value="Red Wine Sauce">Red Wine Sauce</option>
                                                        <option value="BBQ Sauce">BBQ Sauce</option>
                                                        <option value="Oyster Sauce">Oyster Sauce</option>
                                                    </select>
                                                    {{-- <p class="small text-muted mb-2 pb-1">Free Sauce</p>
                                        <p class="lead fw-normal mb-0"></p> --}}
                                                    {{-- <p class="lead fw-normal mb-0"><i class="fas fa-circle me-2"
                                                style="color: #fdd8d2;"></i>
                                            pink rose</p> --}}
                                                </div>
                                            </div>
                                            <div class="quantity col-md-2 d-flex justify-content-center">
                                                <div>
                                                    <p class="small text-muted mb-1 pb-1">Quantity</p>
                                                    <input style="width: 60px;" type="number" class="quantity"
                                                        value="{{ $cart['quantity'] }}" min="1">
                                                    {{-- <p class="lead fw-normal mb-0">{{$cart['quantity']}}</p> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <div>
                                                    <p class="small text-muted mb-1 pb-1">Price</p>
                                                    <p class="lead fw-normal mb-0">
                                                        {{ number_format($cart['price'] * 0.9, 0, ',', '.') }} VND
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <div>
                                                    <p class="small text-muted mb-4 pb-2">Action</p>
                                                    <a href="" data-id="{{ $id }}"
                                                        class="btn btn-primary cart_update">Update</a>

                                                    <a href="" data-id="{{ $id }}"
                                                        class="btn btn-danger cart_delete">Delete</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>



                        <div class="card mb-5">
                            <div class="card-body p-4">
                                <div class="float-left">
                                    <p class="mb-0 me-5 d-flex align-items-center">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Enter Voucher</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    </p>
                                </div>
                                <div class="float-end">
                                    <p class="mb-0 me-5 d-flex align-items-center">
                                        <span class="small text-muted me-2">Order total:</span> <span
                                            class="lead fw-normal">{{ number_format($total, 0, ',', '.') }} VND</span>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-light btn-lg me-2"><a
                                    href="{{ route('user.product.all') }}">Continue shopping</a></button>
                            <a href="{{ route('user.product.checkOut') }}"><button type="button"
                                    class="btn btn-primary btn-lg">Checkout</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        function cartUpdate(event) {
            event.preventDefault();
            let urlUpdateCart = $('div.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('div').find('input.quantity').val();
            let freeSauce = $(this).parents('div').find('select.freeSauce').val();
            $.ajax({
                type: "GET",
                url: urlUpdateCart,
                data: {

                    id: id,
                    quantity: quantity,
                    freeSauce : freeSauce
                },
                dataType: "json",
                success: function(data) {
                    if (data.code === 200) {
                        $('.container').html(data.cart_component);
                    }
                },
                error: function() {

                }
            });
            // alert(freeSauce);
        }

        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
        })
    </script>
</body>