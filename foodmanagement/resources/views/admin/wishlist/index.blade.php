@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Favorite foods</h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        {{-- Show entries và search cho table --}}
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
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Food name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($foods as $food)
                                        <tr>
                                            <td>{{ $food->F_id }}</td>
                                            <td>{{ $food->F_name }}</td>
                                            <td>{{ $food->Cate_name }}</td>
                                            <td><img src="{{ asset($food->image) }}" width="100px" height="100px"></td>
                                            <td>{{ $food->price }}</td>
                                            <td style="width: 30%;">
                                                <a class="btn btn-danger btn-xs"
                                                    href="{{ route('admin.wishlist.remove', [$food->WL_id]) }}"
                                                    onclick="return confirm ('Are you sure to remove form wish-list?')">
                                                    <i class="fa fa-trash-o"></i> Remove from list
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
