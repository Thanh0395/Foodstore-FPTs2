@extends('users.userlayout.masterProduct')
@section('content')
    <div class="container">
        <div class="row">
            <div style="" class="detail col-lg-10 border p-3 main-section bg-white">
                <div class="row m-1">
                    <div class="col-lg-12">
                        <div class="border p-3 m-0">
                            <div class="row">
                                {{-- Compare list --}}
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
                                                <th>Image</th>
                                                <th>Food name</th>
                                                <th>Category</th>
                                                <th>Price (Vnđ)</th>
                                                <th>Calories</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($foods == 'null')
                                                <tr>
                                                    <td colspan="6">No data to compare</td>
                                                </tr>
                                            @else
                                                @foreach ($foods as $food)
                                                    <tr>
                                                        <td><img src="{{ asset($food->image) }}" width="100px"
                                                                height="100px">
                                                        </td>
                                                        <td>{{ $food->F_name }}</td>
                                                        <td>{{ $food->Cate_name }}</td>
                                                        <td>{{ number_format($food->price * 0.9, 0, ',', '.') }}</td>
                                                        <td>{{ $food->calories }}</td>
                                                        <td>{{ $food->description }}</td>
                                                        <td><button style="color: red" class="link"
                                                                onclick="removecompare({{ $food->F_id }})">Remove</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <script>
                                    function removecompare(F_id) {
                                        // var listremoved = JSON.parse(localStorage.getItem(storageKey));
                                        var index = listcompare.indexOf(F_id);
                                        listcompare.splice(index - 1, 1); // 2nd parameter means remove one item only
                                        localStorage.setItem(storageKey, JSON.stringify(listcompare));
                                        //neu chuoi rỗng
                                        if (listcompare.length === 0) {
                                            var url = '{{ route('user.home') }}' + '/product/compare/' + "null";
                                            window.location.replace(url);
                                        } else {
                                            var url = '{{ route('user.home') }}' + '/product/compare/' + listcompare;
                                            window.location.replace(url);
                                        }
                                    }
                                </script>
                                {{-- /Compare list --}}
                                <div class="form-group">
                                    <div class="offset-4">
                                        <a href="{{ route('user.product.all') }}" class="btn btn-primary">Back to Food
                                            page</a>
                                    </div>
                                </div>
                                <br><br><br>

                                <br><br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
