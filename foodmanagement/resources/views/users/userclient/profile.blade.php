@extends('users.userlayout.masterProduct')
@section('content')
    <div class="container">
        <div class="row">
            <div style="" class="detail col-lg-10 border p-3 main-section bg-white">
                <div class="row m-1">
                    <div class="col-lg-12">
                        <div class="border p-3 m-0">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('failure'))
                                <div class="alert alert-danger alert-dismissible">
                                    {{ session('failure') }}
                                </div>
                            @endif
                            <div class="row">
                                <img class="" style="width: 250px" src="{{ asset($user->avatar) }}" alt="">
                                <div class="table-responsive-sm col-lg-8 col-sm-12">
                                    <h2>Your profile</h2><br>
                                    <table class="table table-striped" style="">
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
                                        <a href="{{ route('user.editprofile', $user->U_id) }}"
                                            class="btn btn-danger offset-1">Update your
                                            profile</a>
                                    </div>
                                </div>
                                <br><br><br>
                                {{-- order --}}
                                <div class="col-lg-12 pt-2">
                                    <h5>
                                        <i class="fa fa-list-alt" id="like" style="color: blue"></i> Your orders:
                                    </h5>
                                    <hr class="p-0 m-0">
                                </div>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order code</th>
                                                <th>Order time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td>{{ $order->O_id }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td style="width: ;">
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('user.detail', [$order->O_id]) }}">
                                                            <i class="fa fa-eye"></i> Detail
                                                        </a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                            @php
                                                $count=1;
                                            @endphp
                                        </tbody>
                                    </table>
                                </div>
                                {{-- /order --}}
                                <br><br>
                                {{-- wish list --}}
                                <div class="col-lg-12 pt-2">
                                    <h5>
                                        <i class="fa fa-heart" id="like" style="color: red"></i> Your wishlist:
                                    </h5>
                                    <hr class="p-0 m-0">
                                </div>
                                <div class="table-responsive">
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
                                                    <td><img src="{{ asset($wishlist->image) }}" width="100px"
                                                            height="100px"></td>
                                                    <td>{{ $wishlist->F_name }}</td>
                                                    <td>{{ $wishlist->Cate_name }}</td>
                                                    <td>{{ number_format($wishlist->price, 0, ',', '.') }}</td>
                                                    <td style="width: ;">
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('user.detail', [$wishlist->F_id]) }}">
                                                            <i class="fa fa-eye"></i> Detail
                                                        </a>
                                                        <a style="color: red" class="link"
                                                            href="{{ route('user.removewishlist', [$wishlist->WL_id]) }}"
                                                            onclick="return confirm ('Are you sure to remove form wish-list?')">
                                                            <i class="fa fa-trash"></i> Remove
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @php
                                                $count=1;
                                            @endphp
                                        </tbody>
                                    </table>
                                </div>
                                {{-- /wish list --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
