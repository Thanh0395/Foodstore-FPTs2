@extends('adminlayout.app')
@section('content')

        <div class="right_col" role="main">
            <!-- page content -->
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h2>Food <small> (Nhiều món mlem mlem)</small></h2>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            {{-- Show entries và search cho table --}}
                            <div class="x_title">
                                <h3>All Foods
                                    <a href="{{route('admin.food.create')}}" class="btn btn-success"> Add new </a>
                                </h3>
                                <div class="clearfix"></div>
                            </div>
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
                                            <th>Food ID</th>
                                            <th>Image</th>
                                            <th>Food name</th>
                                            <th>Category</th>
                                            <th>Price (vnđ)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($foods as $food)
                                        <tr>
                                            <td>{{$food->F_id}}</td>
                                            <td><img src="{{asset($food->image)}}" width="100px" height="100px"></td>
                                            <td>{{$food->F_name}}</td>
                                            <td>{{$food->Cate_name}}</td>
                                            <td>{{$food->price}}</td>
                                            <td style="width: 30%;">
                                                <a class="btn btn-primary btn-xs" href="{{route('admin.food.view',[$food->F_id])}}">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                                <a class="btn btn-warning btn-xs" href="{{route('admin.food.edit',[$food->F_id])}}" >
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                                <a class="btn btn-danger btn-xs" href="{{route('admin.food.delete',[$food->F_id])}}" onclick="return confirm ('Are you sure to want to delete this')">
                                                    <i class="fa fa-trash-o"></i> Delete
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
