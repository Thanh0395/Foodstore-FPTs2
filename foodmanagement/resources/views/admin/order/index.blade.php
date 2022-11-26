@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Order <small></small></h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        {{-- Show entries và search cho table --}}
                        {{-- <div class="x_title">
                            <h3>All Orders
                                <a href="{{route('admin.user.create')}}" class="btn btn-success"> Add new </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div> --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        @elseif (session('failure'))
                            <div class="alert alert-danger alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                                {{ session('failure') }}
                            </div>
                        @endif

                        {{-- /Show entries và search cho table --}}
                        <div class="x_content">
                            <form action="{{ route('admin.order.edit')}}" method="POST">
                                @csrf
                                <table id="datatable-checkbox" class="table table-striped table-bordered ">
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <select name="status" class="form-control">
                                            <option value="Processing">Change status to Processing</option>
                                            <option value="Finished">Change status to Finished</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary" href="" value="Update Status">


                                    <br> <br>
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" onclick="checkAll(this);">
                                                Order ID</th>
                                            <th>Customer Name</th>
                                            <th>Customer ID</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td><input type="checkbox" name="checkItem[]" id="{{ $order->O_id }}"
                                                        value="{{ $order->O_id }}">
                                                    {{ $order->O_id }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->U_id }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td style="width: 30%;">
                                                    <a class="btn btn-primary btn-xs"
                                                        href="{{ route('admin.order.view', [$order->O_id]) }}">
                                                        <i class="fa fa-eye"></i> Detail Order
                                                    </a>
                                                    <a class="btn btn-danger btn-xs"
                                                        href="{{ route('admin.order.reasonCancel', [$order->O_id]) }}"
                                                        onclick="return confirm ('Are you sure to want to cancel this order')">
                                                        <i class="fa fa-remove"></i> Cancel Order
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function checkAll(source) {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i] != source)
                        checkboxes[i].checked = source.checked;
                }
            }
        </script>

        <!-- /page content -->
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
@endsection
