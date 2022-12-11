@extends('users.userlayout.masterProduct')
@section('content')
    <div class="container">
        <div class="row">
            <div style="" class="detail col-lg-10 col-md-12 border p-3 main-section bg-white">
                <div class="row m-1">
                    <div class="col-lg-12">
                        <div class="border p-3 m-0">
                            <div class="row">
                                <table class="table table-striped table-bordered">
                                    <div class="">
                                        <h3 class="prod_title"> Order's infomation</h3>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>Order Code</th>
                                            <th>Serial</th>
                                            <th>Food</th>
                                            <th>Quantity</th>
                                            <th>Price (vnđ)</th>
                                            <th>Amount (vnđ)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_detail as $detail)
                                            <tr>
                                                <td style="width: 10%;">{{ $detail->O_id }}</td>
                                                <td style="width: 5%;">{{ $count += 1 }}</td>
                                                <td>{{ $detail->F_name }}</td>
                                                <td>{{ $detail->quantity }}</td>
                                                <td>{{ number_format(($detail->price)*0.9,0,',','.') }}</td>
                                                <td>{{ number_format(($detail->quantity * $detail->price)*0.9,0,',','.') }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5">Sum</td>
                                            <td>{{ number_format($sum,0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">Voucher</td>
                                            <td>{{ $priceReduced }}%</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">VAT</td>
                                            <td>{{ $VAT }}%</td>
                                        </tr>
                                        <tr style="background-color: #ffdbf6">
                                            <td colspan="5">Total</td>
                                            <td><strong>{{ number_format($total,0,',','.') }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <br><br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
