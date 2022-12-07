@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Post View<small> (view your post) </small></h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <h3>Add post form</h3>
                            <p>Remember: Post's title is unique.</p>
                            <div id="alerts"></div>
                            {{-- Title --}}
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p><strong>Title: </strong>{{ $post->title }}</p>
                            </div>
                            {{-- Status --}}
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p><strong>Status: </strong>{{ $post->status }}</p>
                            </div>
                            {{-- Image --}}
                            <p><strong>Feature Image: </strong><img src="{{ asset($post->feature_image_path) }}"
                                    width="200px" height="200px"></p>
                            {{-- Content --}}
                            <div>
                                <textarea name="postcontent" id="postcontent" style="resize: none" disabled>{{ $post->content }}</textarea>
                            </div>
                            <script>
                                CKEDITOR.replace('postcontent');
                            </script>

                            <br />

                            {{-- Nút cancel --}}
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                                    <a href="{{ route('admin.post.index') }}" class="btn btn-primary">Back all post</a>
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
