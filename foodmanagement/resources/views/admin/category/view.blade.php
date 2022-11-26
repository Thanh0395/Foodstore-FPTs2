@extends('adminlayout.app')
@section('content')

            <div class="right_col" role="main">
                <!-- page content -->
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h2>Category View<small> (Xem cụ thể category nào) </small></h2>
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
                                                <th>Category name</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>{{ $category->Cate_id }}</td>
                                                <td>{{ $category->Cate_name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <a href="{{route('admin.category.index')}}" class="btn btn-primary" >Back to list</a>
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
