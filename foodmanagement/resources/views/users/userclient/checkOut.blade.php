<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>yourcart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.6.1/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.6.1/js/bootstrap.bundle.min.js"> --}}
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>
</head>

<body>
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="{{ route('user.product.all') }}" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                    <hr>


                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Order Confirmation Form</p>
                                        </div>
                                        {{-- <div>
                                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                    class="text-body">Price <i class="fas fa-angle-down mt-1"></i></a>
                                            </p>
                                        </div> --}}
                                    </div>
                                    @foreach ($carts as $cart)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img src="{{ asset($cart['image']) }}"
                                                                class="img-fluid rounded-3" alt="Shopping item"
                                                                style="width: 30px;">
                                                        </div>
                                                        <div class="ms-4">
                                                            <h5>{{ $cart['F_name'] }}</h5>
                                                            <p class="small mb-0">Sauce: {{ $cart['Sauces'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div style="width: 30px;">
                                                            {{-- <input style="width: 40px;" type="text" value="{{$cart['quantity']}}"> --}}
                                                            <h5 class="fw-normal mb-2">{{ $cart['quantity'] }}</h5>
                                                        </div>
                                                        <div style="width: 150px;">
                                                            <h5 class="mb-0">
                                                                {{ number_format($cart['price'] * $cart['quantity'] * 0.9, 0, ',', '.') }}
                                                                VND</h5>
                                                        </div>
                                                        <a href="#!" style="color: #cecece;"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-lg-5">
                                    <div class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Hello!</h5>
                                                <img src="{{ asset($user->avatar) }}"
                                                    class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                            </div>

                                            <p class="small mb-2">Your Confirm to delivery</p>
                                            {{-- <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-visa fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-amex fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-paypal fa-2x"></i></a> --}}

                                            <form class="mt-4" action="{{route('user.product.payment',[$total])}}" method="post">
                                                @csrf
                                                <div class="form-outline form-white mb-2">
                                                    <input type="text" id="user_name"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="Enter your name" value="{{$user->name}}" />
                                                    <label class="form-label" for="typeName"></label>
                                                </div>
                                                <div hidden>
                                                    <input type="text" name="redirect" value="Payment by Vnpay">
                                                </div>

                                                <div class="form-outline form-white mb-2">
                                                    <input type="text" id="user_phone"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="Enter phone" minlength="19"
                                                        maxlength="19" value="{{$user->phone}}"/>
                                                    <label class="form-label" for="typeText"></label>
                                                </div>

                                                <div class="form-outline form-white mb-2">
                                                    <input type="text" id="user_email"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="Enter email" minlength="19"
                                                        maxlength="19" value="{{$user->email}}"/>
                                                    <label class="form-label" for="typeText"></label>
                                                </div>

                                                <div class="form-outline form-white mb-2">
                                                    <input type="text" id="user_address"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="Enter address" minlength="19"
                                                        maxlength="19" value="{{$user->address}}"/>
                                                    <label class="form-label" for="typeText"></label>
                                                </div>

                                                {{-- <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <input type="text" id="typeExp"
                                                                class="form-control form-control-lg"
                                                                placeholder="MM/YYYY" size="7" id="exp"
                                                                minlength="7" maxlength="7" />
                                                            <label class="form-label"
                                                                for="typeExp"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <input type="password" id="typeText"
                                                                class="form-control form-control-lg"
                                                                placeholder="&#9679;&#9679;&#9679;" size="1"
                                                                minlength="3" maxlength="3" />
                                                            <label class="form-label" for="typeText">Cvv</label>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <hr class="my-1">

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Order Total</p>
                                                <p class="mb-2">{{ number_format($total, 0, ',', '.') }} VND
                                                </p>
                                            </div>

                                            {{-- <div class="d-flex justify-content-between">
                                                <p class="mb-2">Shipping</p>
                                                <p class="mb-2">$20.00</p>
                                            </div> --}}
                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Discounted</p>
                                                <p class="mb-2">{{$ss_percent}}%</p>
                                            </div>
                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Taxes</p>
                                                <p class="mb-2">10%</p>
                                            </div>
                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Total</p>
                                                <p class="mb-2">{{ number_format($total * 1.1, 0, ',', '.') }} VND</p>
                                            </div>

                                            <button type="submit" class="btn btn-info btn-block btn-lg" >
                                                <div class="d-flex justify-content-between">
                                                    <span> Payment(VNPay) <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                </div>
                                            </button>
                                            <button type="button" class="btn btn-info btn-block btn-lg">
                                                <div class="d-flex justify-content-between">
                                                    <span> Payment(Cash) <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                </div>
                                            </button>

                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
