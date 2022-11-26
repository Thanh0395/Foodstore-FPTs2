@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Cancelled Order <small></small></h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        {{-- Show entries và search cho table --}}

                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            {{session('success')}}
                        </div>
                        @elseif (session('failure'))
                        <div class="alert alert-danger alert-dismissible fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            {{session('failure')}}
                        </div>
                        @endif
                        {{-- /Show entries và search cho table --}}
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Customer ID</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td style="width: 8%">{{$order->O_id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->U_id}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->status}}</td>
                                        <td style="width: 15%">{{$order->note}}</td>
                                        <td style="width: 10%;">
                                            <a class="btn btn-danger btn-xs" href="{{route('admin.order.delete',[$order->O_id])}}" onclick="return confirm ('Are you sure you will permanently delete this order?')">
                                                <i class="fa fa-trash-o"></i> Delete Order
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
@endsection
