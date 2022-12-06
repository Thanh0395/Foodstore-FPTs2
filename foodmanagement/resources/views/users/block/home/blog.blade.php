<div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="block-title text-center">
                Our Blog
            </h2>

                <div class="blog-box clearfix">
                    @foreach ($posts as $post)
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="col-md-6 col-sm-6" >
                            <div style="height: 220px" class="blog-block">
                                <div style="width: 220px;" class="blog-img-box">
                                    <img style="width: 220px;height: 220px" src=" {{asset($post->feature_image_path)}} " alt="" />
                                    <div class="overlay">
                                        <a href="{{route('showblog',$post->P_id)}}"><i class="fa fa-link" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div style="padding: 15px" class="blog-dit">
                                    <p><span>{{$post->created_at}}</span></p>
                                    <h2 style="padding: 10px 10px 10px 0px">{{$post->title}}</h2>
                                    <h5>BY {{$post->name}}</h5>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    @endforeach
                </div>
                <!-- end blog-box -->

                {{-- <div class="blog-btn-v">
                    <a class="hvr-underline-from-center" href="#">View the Blog</a>
                </div> --}}

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end blog-main -->
