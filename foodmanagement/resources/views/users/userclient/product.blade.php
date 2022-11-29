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

                }
            });
        }
        $(function(){
            $('.add_to_cart').on('click', addToCart);
        })
    </script>
@endsection

