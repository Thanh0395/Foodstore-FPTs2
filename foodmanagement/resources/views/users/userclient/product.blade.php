@extends('users.userlayout.masterProduct')
@section('content')
    @include('users.block.product.body')
@endsection

@section('jsCart')
    <script>
        function addToCart(event){
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: "json",
                success: function (data) {
                    /*
                        Test xem data co dung khi tra ve du lieu cho data chua
                        Phia ben ctl addToCart khi moi lan add san pham se reponse ve 1 data co code = 200
                        message = succesfully
                    */
                    // console.log(data);
                    /*
                        Sau do kiem tra neu data.code == 200 thi thong bao da them vao gio hang
                    */
                   if(data.code === 200){
                       document.getElementById("cartCount").innerHTML = data.count;
                    // alert('Add to cart successfully!');
                   }

                }
            });
        }
        $(function(){
            $('.add_to_cart').on('click', addToCart);
        })
    </script>
@endsection

