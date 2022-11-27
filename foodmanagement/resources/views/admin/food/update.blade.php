@extends('adminlayout.app')
@section('content')
    <!-- /page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Food Update<small> (Chỉnh sửa thông tin món ăn cho chính xác phù hợp)</small></h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            {{-- De tai file qua form them dong vào the form: enctype="multipart/form-data" --}}
                            <form action="{{ route('admin.food.update', [$food->F_id]) }}" method="POST"
                                data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                @csrf
                                <h3>Update food form</h3>
                                <p>Remember: Category's name is unique.</p>
                                {{-- Image --}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img src="{{ asset($food->image) }}" width="200px" height="200px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">New Image
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" class="form-control col-md-6 col-xs-12" name="image">
                                        <input type="text" value="{{ $food->image }}" name="imgName" hidden>
                                    </div>
                                </div>
                                {{-- Food Name --}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="F_name">Food
                                        Name
                                        <span style="color: red" class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-6 col-xs-12" name="F_name" placeholder=""
                                            value="{{ $food->F_name }}" required="required" type="text">
                                    </div>
                                </div>
                                {{-- Truyền vào $request Category id --}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Cate_id">Category
                                        <span style="color: red" class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" name="Cate_id">
                                            <option value="{{ $categoryOld->Cate_id }}" selected>
                                                {{ $categoryOld->Cate_name }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->Cate_id }}">{{ $category->Cate_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Price de type bang "text" de goi form --}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price (vnđ)
                                        <span style="color: red" class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="{{ $food->price }}" type="text" required="required"
                                            class="form-control col-md-7 col-xs-12" name="price" data-parsley-min="1000"
                                            data-parsley-max="500000" data-parsley-id="price">
                                        <div>
                                            <ul class="parsley-errors-list filled" id="parsley-id-price"></ul>
                                        </div>
                                    </div>
                                </div>
                                {{-- Description --}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="form-control" rows="3" placeholder="Some description about your food..." name="description">{{ $food->description }}</textarea>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                {{-- Nút cancel và submit --}}
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="{{ route('admin.food.index') }}" class="btn btn-primary">Cancel</a>
                                        <input type="submit" class="btn btn-success" value="Update">
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
