<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <title>Purchar-Recipet</title>
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        .horizontal-timeline .items {
            border-top: 2px solid #ddd;
        }

        .horizontal-timeline .items .items-list {
            position: relative;
            margin-right: 0;
        }

        .horizontal-timeline .items .items-list:before {
            content: "";
            position: absolute;
            height: 8px;
            width: 8px;
            border-radius: 50%;
            background-color: #ddd;
            top: 0;
            margin-top: -5px;
        }

        .horizontal-timeline .items .items-list {
            padding-top: 15px;
        }
    </style>
</head>

<body>
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                        <div class="card-body p-5">

                            <p class="lead fw-bold mb-5" style="color: #f37a27;">Purchase Reciept</p>

                            <div class="row">
                                <div class="col mb-2">
                                    <p class="small text-muted mb-1">Date</p>
                                    <p>{{ $date_detail }}</p>
                                </div>
                                <div class="col mb-2">
                                    <p class="small text-muted mb-1">Order No.</p>
                                    <p>{{ $O_id }}</p>
                                </div>
                                <div class="col mb-6">
                                    <p class="small text-muted mb-1">Voucher_code</p>
                                    <p>{{$voucher_code}}(discounted: {{$percent}}%)</p>
                                </div>
                            </div>

                            @foreach ($carts as $cart)
                                <div class="mx-n2 px-2 py-1" style="background-color: #f2f2f2;">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-7">
                                            <p>{{$cart['F_name']}}</p>
                                        </div>
                                        <div class="col-md-1 col-lg-1">
                                            <p>{{$cart['quantity']}}</p>
                                        </div>
                                        <div class="col-md-5 col-lg-4">
                                            <p>{{ number_format($cart['price'] * 0.9, 0, ',', '.') }}VND</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{-- <div class="col-md-4 col-lg-8">
                                            <p class="mb-0">Shipping</p>
                                        </div> --}}
                                        <div class="col-md-4 col-lg-3">
                                            <p class="mb-0">{{number_format(33000,0,',','.')}}VND</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 offset-md-6 col-lg-5 offset-lg-7">
                                        <p class="lead fw-bold mb-0" style="color: #f37a27;">{{ number_format($cart['price'] * 0.9*$cart['quantity'], 0, ',', '.') }}VND</p>
                                    </div>
                                </div>
                            @endforeach


                            <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Amount: {{number_format($total*1.1,0,',','.')}}VND</p>

                            {{-- <div class="row">
                                <div class="col-lg-12">

                                    <div class="horizontal-timeline">

                                        <ul class="list-inline items d-flex justify-content-between">
                                            <li class="list-inline-item items-list">
                                                <p class="py-1 px-2 rounded text-white"
                                                    style="background-color: #f37a27;">Ordered</p
                                                    class="py-1 px-2 rounded text-white"
                                                    style="background-color: #f37a27;">
                                            </li>
                                            <li class="list-inline-item items-list">
                                                <p class="py-1 px-2 rounded text-white"
                                                    style="background-color: #f37a27;">Shipped</p
                                                    class="py-1 px-2 rounded text-white"
                                                    style="background-color: #f37a27;">
                                            </li>
                                            <li class="list-inline-item items-list">
                                                <p class="py-1 px-2 rounded text-white"
                                                    style="background-color: #f37a27;">On the way</p>
                                            </li>
                                            <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                                                <p style="margin-right: -8px;">Delivered</p>
                                            </li>
                                        </ul>

                                    </div>

                                </div>
                            </div> --}}

                            <p class="mt-4 pt-2 mb-0">Want any help? <a href="{{route('user.home.contactUs')}}" style="color: #f37a27;">Please
                                    contact us</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

</html>
