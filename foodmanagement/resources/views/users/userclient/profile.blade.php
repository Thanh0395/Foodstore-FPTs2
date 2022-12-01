@extends('users.userlayout.masterProduct')
@section('content')
    <div class="container">
        <div class="row">
            <div style="" class="detail col-lg-10 border p-3 main-section bg-white">

                <div class="row m-1">

                    <div class="col-lg-12">
                        <div class="border p-3 m-0">
                            <div class="row">
                                <img class="" style="width: 200px" src="{{ asset($user->avatar) }}" alt="">
                                <div class="col-lg-8">
                                    <table class="table table-striped" style="padding-left: 500px">
                                        <tbody>
                                            <tr>
                                                <th>Your name:</th>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Your phone:</th>
                                                <td>{{ $user->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Your email:</th>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Your address:</th>
                                                <td>{{ $user->address }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <div class="offset-4">
                                        <a href="{{ route('user.product.all') }}" class="btn btn-primary">Back to Food
                                            page</a>
                                        <a href="{{ route('user.product.all') }}" class="btn btn-danger offset-1">Update your
                                            profile</a>
                                    </div>
                                </div>
                                <br><br><br>
                                {{-- wish list --}}
                                <div class="col-lg-12 pt-2">
                                    <h5>Your wishlist:
                                        <i class="fa fa-heart" id="like" style="color: red"></i>
                                        <input type="number" id="F_id" name="F_id" hidden>
                                    </h5>
                                    <hr class="p-0 m-0">
                                </div>
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Food name</th>
                                            <th>Category</th>
                                            <th>Price (Vnđ)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($wishlists as $wishlist)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td><img src="{{ asset($wishlist->image) }}" width="100px" height="100px"></td>
                                                <td>{{ $wishlist->F_name }}</td>
                                                <td>{{ $wishlist->Cate_name }}</td>
                                                <td>{{ number_format($wishlist->price,0,',',',')  }}</td>
                                                <td style="width: 30%;">
                                                    <a class="btn btn-warning btn-xs"
                                                        href="{{ route('user.removewishlist', [$wishlist->WL_id]) }}"
                                                        onclick="return confirm ('Are you sure to remove form wish-list?')">
                                                        <i class="fa fa-trash-o"></i> Remove from list
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- /wish list --}}



                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
