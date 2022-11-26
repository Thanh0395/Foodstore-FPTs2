@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Food View<small> (Xem cụ thể món đó nào!) </small></h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Food name</th>
                                        <th>Category</th>
                                        <th>Price (vnđ)</th>
                                        <th>Wishlist</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $food->F_id }}</td>
                                        <td><img src="{{ asset($food->image) }}" width="150px" height="150px"></td>
                                        <td>{{ $food->F_name }}</td>
                                        <td>{{ $category->Cate_name }}</td>
                                        <td>{{ $food->price }}</td>
                                        <td>
                                            @if ($like==1)
                                                <h3><i style="color: red  " class="fa fa-heart"></i></h3>
                                            @elseif ($like==0)
                                                <h3><i  class="fa fa-heart-o"></i></h3>
                                            @endif
                                            <a href="{{ route('admin.wishlist.add',['F_id'=>$food->F_id, 'like'=>$like, 'U_id'=>$U_id]) }}"
                                                class="btn btn-info btn-round btn-sm ">Add/Remove</a>
                                        </td>
                                        <td>{{ $food->description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ route('admin.food.index') }}" class="btn btn-primary">Back to list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
@endsection
