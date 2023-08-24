<?php
session_start();
$users_id = $_SESSION['users_id'];
require('functions.php');
?>

<!DOCTYPE html>

<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=utf-8" />



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta name="author" content="Vijay Sahu">

    <meta name="description" content="">

    <meta name="keywords" content="">

    <title>Checkout | Shubhda Enterprises</title>

    <link rel="icon" href="images/logo-new.png">

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

    <?php

    if (isset($_SESSION['fullname'])) { ?>

    <div class="backdrop"></div><a class="backtop fas fa-arrow-up" href="#"></a>

    <?php include('templates/header.php') ?>







    <section class="inner-section single-banner" style="background: url(images/product.jpeg) no-repeat center;">

        <div class="container">

            <h2>checkout</h2>

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="/">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">checkout</li>

            </ol>

        </div>

    </section>

    <section class="inner-section checkout-part">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="account-card">

                        <div class="account-title">

                            <h4>Your order</h4>

                        </div>

                        <div class="account-content">

                            <div class="table-scroll">

                                <div id="checkout_details"></div>

                            </div>

                            <div class="chekout-coupon"><button class="coupon-btn">Do you have a coupon code?</button>

                                <form class="coupon-form"><input type="text"

                                        placeholder="Enter your coupon code"><button

                                        type="submit"><span>apply</span></button></form>

                            </div>

                            <div class="checkout-charge">

                                <ul>

                                    <li><span>Sub total</span><span class="total_price"></span></li>

                                    <li><span>discount</span> <span>00.00</span></li>

                                    <li><span>Tax</span><span class="total_tax"></span></li>

                                    <li><span>Total<small>(Incl. VAT)</small></span><span class="total_pay"></span>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-12">

                    <div class="account-card">

                        <div class="account-title">

                            <h4>delivery address</h4>

                            <button data-bs-toggle="modal" data-bs-target="#address-add">add New address</button>

                            

                              <!--<button data-bs-toggle="modal" data-bs-target="#cash-on-delivery">Cash on Delivery</button>-->

                              

                        </div>

                        

                        

                        <div class="account-content">

                            <div id="address-data"></div>



                        </div>

                    </div>

                </div>

                <div class="col-lg-12">

                    <div class="account-card mb-0">

                        <div class="checkout-check"><input type="checkbox" id="checkout-check " checked><label

                                for="checkout-check">By making this purchase you agree to our <a href="#">Terms and

                                    Conditions</a>.</label></div>

                        <?php

                            $today = date("Ymd");

                            $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));

                            $invoice_id = $today . $rand;



                            ?>

                        <input type="hidden" name="total_price" id="total_price">
                        <input type="hidden" name="total_tax" id="total_tax">

                        <input type="hidden" name="total_item" id="total_item">

                        <div class="checkout-proced">

                            <button class="btn btn-inline buy_now" data-invoice_id="<?php echo $invoice_id; ?>"

                                data-users_id="<?php echo $users_id; ?>">online payment</button>

                        </div>

                        <div class="checkout-proced mt-4">

                            <button class="btn btn-inline cash_now" data-invoice_id="<?php echo $invoice_id; ?>"

                                data-users_id="<?php echo $users_id; ?>">Cash on Delivery (cod)</button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <div class="modal fade" id="address-add">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content"><button class="modal-close" data-bs-dismiss="modal"><i

                        class="icofont-close"></i></button>

                <form class="modal-form" id="save-address">

                    <div class="form-title">

                        <h3>add new address</h3>

                    </div>

                    <div class="form-group"><label class="form-label">title</label>

                        <select class="form-select" name="address_type" required>

                            <option selected>choose title</option>

                            <option value="home">home</option>

                            <option value="office">office</option>

                            <option value="Bussiness">Bussiness</option>

                            <option value="academy">academy</option>

                            <option value="others">others</option>

                        </select>

                        <input type="hidden" name="users_id" id="users_id" value="<?php echo $_SESSION['users_id'] ?>">

                    </div>





                    <div class="form-group">

                      

                        <input type="text" name="fname" class="form-control" id="fname" required="" placeholder="Full Name"> <br>



                        <input type="tel" name="phone" class="form-control" id="phone" required="" placeholder="Mobile Number" maxlength="10"> <br>

                        <input type="email" name="email" class="form-control" id="email" required="" placeholder="Email Id"> <br>

                        <input type="text" name="state" class="form-control" id="state" required="" placeholder="State Name"> <br>

                        <input type="text" name="city" class="form-control" id="city" required="" placeholder="City Name"> <br>



                        <input type="tel" name="pincode" class="form-control" id="pincode" required="" placeholder="Pin Code" maxlength="8"> <br>

                   

                    </div>





                        

                            

                    

                    <div class="form-group"><label class="form-label">address</label>







                        <textarea class="form-control" placeholder="Enter your address" name="address"

                            required></textarea>

                    </div>

                    <button class="form-btn save_address" type="submit">save address info</button>

                </form>

            </div>

        </div>

    </div>

    

    

    

    

    

    

    

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
                    $('#total_tax').val(data.total_tax);

                    $('.total_pay').text('₹ ' +data.total_pay);

                    $('.total_tax').text('₹ ' +data.total_tax);

                    $('#total_item').val(data.total_item);

                }

            });

        }

        load_address();



        function load_address() {

            $.ajax({

                url: "users_function/get-address.php",

                method: "POST",

                dataType: "json",

                success: function(data) {

                    $('#address-data').html(data.address);

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

                    url: "action.php",

                    method: "POST",

                    data: {

                        product_id: product_id,

                        action: action

                    },

                    success: function() {

                        load_cart_data();

                        alert("Item has been removed from Cart");

                    }

                })

            } else {

                return false;

            }

        });



        $(document).on('click', '#clear_cart', function() {

            var action = 'empty';

            $.ajax({

                url: "action.php",

                method: "POST",

                data: {

                    action: action

                },

                success: function() {

                    load_cart_data();

                    alert("Your Cart has been clear");

                }

            });

        });

        $(document).on('submit', '#save-address', function(e) {

            $.ajax({

                type: 'POST',

                url: 'users_function/save-address.php',

                data: $('#save-address').serialize(),

                success: function(response) {

                    if (response == 1) {

                        alert('New Address Save!');

                    } else {

                        alert('Something went Wrong!');

                    }

                },

                error: function() {

                    console.log("Signup was unsuccessful");

                }

            });

        });

        $(document).on('click', '.remove-address', function(e) {

            let address_id = $(this).data('address_id');

            e.preventDefault();

            $.ajax({

                type: 'POST',

                url: 'users_function/delete-address.php',

                data: {

                    address_id: address_id

                },

                success: function(response) {

                    if (response == 1) {

                        alert('Deleted Address!');

                    } else {

                        alert('Something went Wrong!');

                    }

                },

                error: function() {

                    console.log("Signup was unsuccessful");

                }

            });

        });

    //     $(document).on('click', '.buy_now', function(e) {
    //         $(this).attr('disabled',true);
    //         var users_id = $(this).data('users_id');
    //         var totalAmount = $("#total_price").val();
    //         var invoice_id = $(this).attr("data-invoice_id");
    //         var address_id = $("#address_id").val();
    //         var total_item = $("#total_item").val();
    //         var total_tax = $("#total_tax").val();
    //         $.ajax({

    //             url: 'payment-proccess.php',

    //             type: 'post',

    //             dataType: 'json',

    //             data: { 

    //                 totalAmount: totalAmount,
    //                 invoice_id: invoice_id,
    //                 users_id: users_id,
    //                 total_item: total_item,
    //                 address_id: address_id,
    //                 total_tax: total_tax,


    //             },

    //             success: function(data) { 
    //                     window.location.href = 'paytmcheckout.php?t='+data.token;
    //             }



    //         });

        

    //     });


    

    // });
    
    
    
    $(document).on('click', '.buy_now', function(e) {
            var users_id = $(this).data('users_id');
            var totalAmount = $("#total_price").val();
            var invoice_id = $(this).attr("data-invoice_id");
            var address_id = $("#address_id").val();
            var total_item = $("#total_item").val();
            var total_tax = $("#total_tax").val();
            var options = {
                "key": "rzp_live_uk7T7t9oKVa7So",
                "amount": totalAmount * 100, // 2000 paise = INR 20
                "name": "SOUMITA",
                "description": "Invoice#" + invoice_id,
                "image": "icon/razorpay-icon.png",
                "background": "red",
                "handler": function(response) {
                    $.ajax({
                        url: 'payment-proccess.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            razorpay_payment_id: response.razorpay_payment_id,
                            totalAmount: totalAmount,
                            invoice_id: invoice_id,
                            users_id: users_id,
                            total_item: total_item,
                            address_id: address_id,
                            total_tax: total_tax,
                        },
                        success: function(msg) {
                            if (msg == 1) {
                                alert("THANK YOU FOR PLACING THE ORDER...!!!");
                                window.location.href = 'index.php';

                            } else {
                                alert("Something Went Wrong.!");
                            }

                        }

                    });
                },
                "theme": {
                    "color": "#528FF0"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();

        });
    
    });
    

    

    $(document).ready(function(){

      $(document).on('click','.cash_now',function(e){
            $(this).attr('disabled',true);
            var users_id = $(this).data('users_id');

            var totalAmount = $("#total_price").val();

            var invoice_id = $(this).attr("data-invoice_id");

            var address_id = $("#address_id").val();

            var total_item = $("#total_item").val();

            var total_tax = $("#total_tax").val();


          $.ajax({

                        url: 'payment_cod.php',

                        type: 'post',

                        dataType: 'json',

                        data: {

                           

                            totalAmount: totalAmount,

                            invoice_id: invoice_id,

                            users_id: users_id,

                            total_item: total_item,

                            total_tax: total_tax,

                            address_id: address_id,

                        },

                        success: function(msg) {

                            if (msg == 1) {

                                alert("THANK YOU FOR PLACING THE ORDER...!!!");

                                window.location.href = '/';



                            } else {

                                alert("Something Went Wrong.!");

                            }



                        }



                    });  

      });

    });

    </script>



    <?php } else {

        header('Location:login');

    }



    ?>



</body>





</html>