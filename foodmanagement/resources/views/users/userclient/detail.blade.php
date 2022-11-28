@extends('users.userlayout.masterDetail')
@section('contentdetail')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 border p-3 main-section bg-white">
                <div class="row hedding m-0 pl-3 pt-0 pb-3">
                    <div style="background-color: white; padding: 1rem">
                        <button type="button" class="btn btn-primary" style="background-color:orange; border-color: white">
                            <a style="color: white" href="{{ route('user.home') }}">Back To Home</a>
                        </button>


                    </div>
                </div>
                <div class="row m-5">
                    <div align=center class="col-lg-4 left-side-product-box pb-3">
                        <img class="img-fluid" src=" {{ asset($food->image) }} " class="border p-3">
                        {{-- <span class="sub-img">
                            <img src="http://nicesnippets.com/demo/pd-image2.jpg" class="border p-2">
                            <img src="http://nicesnippets.com/demo/pd-image3.jpg" class="border p-2">
                            <img src="http://nicesnippets.com/demo/pd-image4.jpg" class="border p-2">
                            </span> --}}
                        <button type="button" class="btn btn-secondary border p-2 m-3"
                            style="background-color:green; border-color: white">
                            <a style="color: white" href="{{ route('user.product.all') }}">Back To Product</a>
                        </button>
                    </div>
                    <div class="col-lg-8">
                        <div class="right-side-pro-detail border p-3 m-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span>What do you want to eat?</span>
                                    <p class="m-0 p-0">It's {{ $food->F_name }}</p>
                                </div>
                                <div class="col-lg-12">
                                    <p class="m-0 p-0 price-pro">{{ number_format($food->price, 0, ',', '.') }} VND</p>
                                    <hr class="p-0 m-0">
                                </div>
                                <div class="col-lg-12 pt-2">
                                    <h5>Product Detail:</h5>
                                    <span>{{ $food->description }}</span>
                                    <hr class="m-0 pt-2 mt-2">
                                </div>
                                {{-- wish list --}}
                                @php
                                    use App\Http\Controllers\User\ProductController;
                                @endphp
                                <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
                                <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                                    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"
                                    integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA=="
                                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                <div class="col-lg-12 pt-2">
                                    <h5>Like:
                                        <i class="fa fa-heart" id="like" style="color: {{ $likeColor }} "></i>
                                        <input type="number" id="F_id" name="F_id" value="{{ $food->F_id }}"
                                            hidden>
                                    </h5>
                                    <hr class="m-0 pt-2 mt-2">
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("#like").click(function() {
                                            var likeColor = document.getElementById("like").style.color;
                                            var F_id = document.getElementById("F_id").value;
                                            var url = "{{ route('user.like',[':F_id',':likeColor']) }}";
                                            url = url.replace(':F_id', F_id);
                                            url = url.replace(':likeColor', likeColor);
                                            $.ajax({
                                                type: 'GET',
                                                url: url,
                                                success: function(response) {
                                                    if(response == 'red' || response == 'gray')
                                                        document.getElementById("like").style.color = response;
                                                    else
                                                        alert('Signin before add to wishlist');
                                                }
                                            })
                                            // if (likeColor == 'red') {
                                            //     document.getElementById("like").style.color = 'gray';
                                            // } else document.getElementById("like").style.color = 'red';

                                        });
                                    });
                                    // function like(element) {
                                    //     @php
                                        //         $like = new ProductController();
                                        //         $like -> like($F_id, $likeColor);
                                        //
                                        //
                                    @endphp

                                    // }
                                </script>
                                {{-- /wish list --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Free Sauce:</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Demi sauce</option>
                                            <option>Japone sauce</option>
                                            <option>Any of sauce</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h6>Quantity :</h6>
                                    <input type="number" class="form-control text-center w-100" value="1">
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 pb-2">
                                            <a href="#" class="btn btn-danger w-100">Add To Cart</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="#" class="btn btn-success w-100">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-lg-12 text-center pt-3">
                        <h4>More Product</h4>
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src=" {{asset('images/food/combo01.jpg')}} " class="d-block w-10" width="30%" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{asset('images/food/Frozen01.jpg')}}" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{asset('images/food/combo02.jpg')}}" class="d-block w-100" alt="...">
                              </div>
                            </div>
                           <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </button>
                          </div>
                    </div>

                </div> --}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
    </div>
@endsection
