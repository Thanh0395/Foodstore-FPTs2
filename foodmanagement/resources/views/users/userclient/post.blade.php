
@extends('users.userlayout.masterProduct')
@section('content')
<div class="container">
    <div class="row">
        <div style="" class="detail col-lg-12 border p-3 main-section bg-white">
            <div class="row m-1">
                <div class="col-lg-12">
                    <div class="border p-3 m-0">
                        <div class="row">
                            <div class="col-6">
                                Author: {{$post->name}}
                            </div>
                            <div class="col-6" style="text-align: right">
                                Date: {{$post->created_at}}
                            </div>
                        </div>
                        <div class="row">
                            <div style="margin: auto; width:90%; height:400px;
                            background-image: url({{asset($post->feature_image_path)}});
                            background-size:cover; background-position:center;"></div>
                        </div>
                        <div class="row">
                            <h1 style="padding: 10px" > {{$post->title}}</h1>
                        </div>
                        <div class="row">
                            <article> @php echo ($post->content); @endphp </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
