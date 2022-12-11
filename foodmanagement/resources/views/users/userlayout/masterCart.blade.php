<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>yourcart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.6.1/js/bootstrap.min.js"> --}}
    <script rel="stylesheet" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>

</head>

<body>
    {{-- @include('users.block.product.header'); --}}
    <main>
        @yield('content')
    </main>


    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        function cartUpdate(event) {
            event.preventDefault();
            let urlUpdateCart = $('div.update_cart_url').data('url');
            let id = $(this).data('id');
            // let quantity = $(this).data('quantity');
            let quantity = $(this).parents('main').find('input.quantity').val();
            let Sauce = $(this).parents('main').find('select.freeSauce').val();
            // let Voucher = $(this).parents('div.float-left').find('input.Voucher').val();
            $.ajax({
                type: "GET",
                url: urlUpdateCart,
                data: {

                    id: id,
                    quantity: quantity,
                    Sauce: Sauce
                    // Voucher: Voucher
                },
                dataType: "json",
                success: function(data) {
                    // alert(Voucher);
                    if (data.code === 200) {
                        $('.cart-wrapper').html(data.cart_component);
                    }
                },
                error: function() {

                }
            });
        }

        ///HOt deall
        function hotdeal(event) {
            event.preventDefault();
            let urlhotdeal = $('div.hotdeal_update').data('url');
            let Voucher = $(this).parents('div.float-left').find('input.Voucher').val();
            let percent = $(this).parents('div.float-left').find('input.percent_input').val();
            $.ajax({
                type: "GET",
                url: urlhotdeal,
                data: {
                    Voucher: Voucher,
                    percent: percent
                },
                dataType: "json",
                success: function(data) {
                    // alert(percent);
                    if (data.code === 200) {
                        $('.cart-wrapper').html(data.cart_component);
                    }
                },
                error: function() {

                }
            });
        }

        //delete cart function
        function deleteCart(event) {
            event.preventDefault();
            let urldeleteCart = $('div.delete_cart_url').data('url');
            let id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: urldeleteCart,
                data: {

                    id: id,
                },
                dataType: "json",
                success: function(data) {
                    // alert(Voucher);
                    if (data.code === 200) {
                        $('.cart-wrapper').html(data.cart_component);
                    }
                },
                error: function() {

                }
            });
        }

        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
            $(document).on('click', '.hot_deal', hotdeal);
            $(document).on('click', '.cart_delete', deleteCart);
        })
    </script>
</body>
