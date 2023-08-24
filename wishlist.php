<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="Vijay Sahu">
    <meta name="title" content="">
    <meta name="keywords" content="">
    <title>Wishlist | Shubhda Enterprises</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <div class="backdrop"></div><a class="backtop fas fa-arrow-up" href="#"></a>
    <?php include('templates/header.php') ?>



    <section class="inner-section single-banner" style="background: url(images/product.jpeg) no-repeat center;">
        <div class="container">
            <h2>Wishlist</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </div>
    </section>
    <section class="inner-section checkout-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>Your Wishlist Order</h4>
                        </div>
                        <div class="account-content">
                            <div class="table-scroll">
                                <div id="wishlist_details"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('templates/news-latter.php') ?>

    <?php include('templates/footer.php') ?>

    <script src="vendor/bootstrap/jquery-1.12.4.min.js"></script>
    <script src="vendor/bootstrap/popper.min.js"></script>
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <script src="vendor/countdown/countdown.min.js"></script>
    <script src="vendor/niceselect/nice-select.min.js"></script>
    <script src="vendor/slickslider/slick.min.js"></script>
    <script src="vendor/venobox/venobox.min.js"></script>
    <script src="js/nice-select.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/accordion.js"></script>
    <script src="js/venobox.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/main.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    $(document).ready(function() {

        load_cart_data();

        function load_cart_data() {
            $.ajax({
                url: "fetch_cart.php",
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#cart_details').html(data.cart_details);
                    $('#cart_details_mobile').html(data.cart_details);
                    $('#checkout_details').html(data.checkout_details);
                    $('.total_price').text(data.total_price);
                    $('.badge').text(data.total_item);
                    $('#total_price').val(data.total_pay);
                    $('#total_item').val(data.total_item);
                }
            });
        }
        load_wishlist_data();

        function load_wishlist_data() {
            $.ajax({
                url: "fetch_wishlist.php",
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#wishlist_details').html(data.wishlist_details);
                    $('.badge2').text(data.total_item);
                }
            });
        }

        $(document).on('click', '.add_to_cart', function() {
            var product_id = $(this).attr("id");
            var product_image = $('#p_image' + product_id + '').val();
            var product_name = $('#p_name' + product_id + '').val();
            var product_price = $('#p_price' + product_id + '').val();
            var product_quantity = $('#p_qty' + product_id).val();
            var action = "add";
            if (product_quantity > 0) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        product_image: product_image,
                        product_name: product_name,
                        product_price: product_price,
                        product_quantity: product_quantity,
                        action: action
                    },
                    success: function(data) {
                        load_cart_data();
                        alert("Item has been Added into Cart");
                    }
                });
            } else {
                alert("lease Enter Number of Quantity");
            }
        });

        $(document).on('click', '.delete', function() {
            var product_id = $(this).attr("id");
            var action = 'remove';
            if (confirm("Are you sure you want to remove this product?")) {
                $.ajax({
                    url: "action_wishlist.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        action: action
                    },
                    success: function() {
                        load_wishlist_data();
                        alert("Item has been removed from Cart");
                    }
                })
            } else {
                return false;
            }
        });
        


    });
    </script>

</body>


</html>