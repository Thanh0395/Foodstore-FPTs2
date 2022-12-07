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
                            <form action="{{ route('admin.post.update',$post->P_id) }}" method="POST" data-parsley-validate
                                class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <h3>Edit post form</h3>
                                <p>Remember: Post's title is unique.</p>
                                <div id="alerts"></div>
                                <h4><strong>Title:</strong></h4>
                                {{-- Title --}}
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input class="form-control" name="title" placeholder="" value="{{$post->title}}"
                                             type="text" required="required">
                                    </div>
                                </div>
                                {{-- Status --}}
                                <div class="form-group">
                                    <label style="padding: 8px 8px" class="col-md-1 col-xs-2" for="Cate_id">Status: </label>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <select class="select2_single form-control" tabindex="-1" name="status">
                                            <option value="{{$status}}">{{$status}}</option>
                                            <option value="Publish">Publish</option>
                                            <option value="Draft">Draft</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Old Image --}}
                                <p><strong>Feature Image: </strong><img src="{{ asset($post->feature_image_path) }}"
                                        width="200px" height="200px"></p>
                                {{-- Image --}}
                                <div class="form-group">
                                    <label class="col-md-1 col-xs-2" for="image">Set new image:
                                    </label>
                                    <input type="file" class="form-control col-md-6 col-xs-12" name="image">
                                        <input type="text" value="{{ $post->feature_image_path }}" name="imgName" hidden>
                                </div>
                                <textarea name="postcontent" id="postcontent" style="resize: none">{{ $post->content }}</textarea>

                                <script>
                                    CKEDITOR.replace( 'postcontent' );
                                </script>

                                <br />

                                {{-- Nút cancel và submit --}}
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                                        <input type="submit" class="btn btn-success" value="Update">
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
