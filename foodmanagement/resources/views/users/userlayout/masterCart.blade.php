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
    <main>
        @yield('contentList-cart')
    </main>
<body>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        function cartUpdate(event) {
            event.preventDefault();
            let urlUpdateCart = $('div.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('div').find('input.quantity').val();
            $.ajax({
                type: "GET",
                url: urlUpdateCart,
                data: {

                    id: id,
                    quantity: quantity
                },
                dataType: "json",
                success: function(data) {
                    if (data.code === 200) {
                        // alert('Update successfully!');
                        $('.cart_wrapper').html(data.cart_component);
                    }
                },
                error: function() {

                }
            });
            // alert(urlUpdateCart);
        }

        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
        })
    </script>
</body>
