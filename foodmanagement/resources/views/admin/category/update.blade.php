@extends('adminlayout.app')
@section('content')

            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h2>Category Update<small> (Đa dạng chủng loại món)</small></h2>
                            <p>Remember: Category name is unique.</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form action="{{route('admin.category.update',[$category->Cate_id])}}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                                        @csrf
                                        <h3>Update category form</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Cate_name">Category Name
                                                <span style="color: red" class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12"
                                                    name="Cate_name" value="{{$category->Cate_name}}" required="required" type="text">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="{{route('admin.category.index')}}" class="btn btn-primary" >Cancel</a>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
            </div>

@endsection
