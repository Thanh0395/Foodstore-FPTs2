@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Order Detail<small> (Xem đơn của khách hàng: {{ $User->name }}) </small></h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <table class="table table-striped table-bordered">
                                <div class="">
                                    <h3 class="prod_title"> Order's infomation</h3>
                                    <p><strong>Name:</strong> {{ $User->name }}</p>
                                    <p><strong>Phone:</strong> {{ $User->phone }}</p>
                                    <p><strong>Address:</strong> {{ $User->address }}</p>
                                    <p><strong>Status:</strong> {{ $User->status }}</p>
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
                                            <td>{{ $detail->price }}</td>
                                            <td>{{ $detail->quantity * $detail->price }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5">Sum</td>
                                        <td>{{ $sum }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">VAT</td>
                                        <td>{{ $VAT * 100 }}%</td>
                                    </tr>
                                    <tr style="background-color: #ffdbf6">
                                        <td colspan="5">Total</td>
                                        <td><strong>{{ $total = $sum + $sum * $VAT }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>

                            {{-- Thanh toan VnPay --}}
                            <form action="{{ route('admin.order.vnpayPayment') }}" method="POST"
                                class="form-group col-md-2 col-sm-3 col-xs-4">
                                @csrf
                                <div hidden>
                                    <input type="text" name="O_id" value="{{ $O_id }}">
                                    <input type="number" name="total" value="{{ $total }}">
                                    <input type="text" name="name" value="{{ $User->name }}">
                                    <input type="text" name="redirect" value="Payment by Vnpay">
                                </div>
                                    <div >
                                        <input type="submit" class="btn btn-success" value="Payment by Vnpay">
                                    </div>
                            </form>
                            {{-- Thanh toan QR Momo --}}
                            <form action="{{ route('admin.order.QRmomoPayment') }}"
                                method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                                class="form-group col-md-2 col-sm-3 col-xs-4">
                                @csrf
                                <div hidden>
                                    <input type="text" name="O_id" value="{{ $O_id }}">
                                    <input type="number" name="total" value="{{ $total }}">
                                    <input type="text" name="name" value="{{ $User->name }}">
                                    <input type="text" name="redirect" value="Payment by QR Momo">
                                </div>
                                    <div>
                                        <input type="submit" name="momo" class="btn btn-success" value="Payment QR Momo">
                                    </div>
                            </form>
                            <div class="form-group col-md-2 col-sm-3 col-xs-4">
                                <a href="{{ route('admin.order.index') }}" class="btn btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
@endsection
