$(document).ready(function () {
    loadcart();
    loadwishlist();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadcart() {
        $.ajax({
            url: '/load-cart-data',
            type: 'GET',
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }

    function loadwishlist() {
        $.ajax({
            url: '/load-wishlist-data',
            type: 'GET',
            success: function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });
    }


    $('.addToCartBtn').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/add-to-cart',
            type: 'POST',
            data: {
                'product_id': product_id,
                'product_qty': product_qty
            },
            success: function (response) {
                swal(response.status);
                loadcart();
                // alert(response.status);
                // console.log(response);
            }
            // ,
            // error: function(xhr, status, error) {
            //     // Handle error
            //     console.error(xhr.responseText);
            // }
        });
    });

    $('.addToWishlistBtn').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/add-to-wishlist',
            type: 'POST',
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                swal(response.status);
                loadwishlist();
                // alert(response.status);
                // console.log(response);
            }
            // ,
            // error: function(xhr, status, error) {
            //     // Handle error
            //     console.error(xhr.responseText);
            // }
        });
    });
    // Increment quantity
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        // var inc_value = $('.qty-input').val();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);

        }
    });

    // Decrement quantity
    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        // var dec_value = $('.qty-input').val();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.delete-wishlist-item').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();

        $.ajax({
            url: '/delete-wishlist-item',
            type: 'POST',
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                window.location.reload();
                swal("", response.status, "success");
                // alert(response.status);
                // console.log(response);
            }
            // ,
            // error: function(xhr, status, error) {
            //     // Handle error
            //     console.error(xhr.responseText);
            // }
        });

    });


    $('.delete-cart-item').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();

        $.ajax({
            url: '/delete-cart-item',
            type: 'POST',
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                window.location.reload();
                swal("", response.status, "success");
                // alert(response.status);
                // console.log(response);
            }
            // ,
            // error: function(xhr, status, error) {
            //     // Handle error
            //     console.error(xhr.responseText);
            // }
        });

    });

    $('.changeQuantity').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/update-cart-item',
            type: 'POST',
            data: {
                'product_id': product_id,
                'product_qty': product_qty
            },
            success: function (response) {
                // swal("" ,response.status, "success");
                window.location.reload();
                // alert(response.status);
                // console.log(response);
            }
            // ,
            // error: function(xhr, status, error) {
            //     // Handle error
            //     console.error(xhr.responseText);
            // }
        });
    });
});