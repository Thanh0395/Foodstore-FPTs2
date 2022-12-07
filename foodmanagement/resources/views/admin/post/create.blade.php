@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Post Create<small> (Add a CEO post) </small></h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <form action="{{ route('admin.post.store') }}" method="POST" data-parsley-validate
                                class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <h3>Add post form</h3>
                                <p>Remember: Post's title is unique.</p>
                                <div id="alerts"></div>
                                {{-- Title --}}
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input class="form-control" name="title" placeholder="Add a title here"
                                             type="text" required="required">
                                    </div>
                                </div>
                                {{-- Status --}}
                                <div class="form-group">
                                    <label style="padding: 8px 8px" class="col-md-1 col-xs-2" for="Cate_id">Status: </label>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <select class="select2_single form-control" tabindex="-1" name="status">
                                            <option value="Publish" selected>Publish</option>
                                            <option value="Draft">Draft</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Image --}}
                                <div class="form-group">
                                    <label class="col-md-1 col-xs-2" for="image">Image:
                                        <span style="color: red" class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <input type="file" class="form-control col-md-7 col-xs-12" name="image"
                                            required="required">
                                    </div>
                                </div>
                                <textarea name="postcontent" id="postcontent" style="resize: none"></textarea>

                                <script>
                                    CKEDITOR.replace( 'postcontent' );
                                </script>

                                <br />

                                {{-- Nút cancel và submit --}}
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                                        <input type="submit" class="btn btn-success" value="Create">
                                        <a href="{{ route('admin.post.index') }}" class="btn btn-primary">Cancel</a>
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
