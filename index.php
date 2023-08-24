<?php
session_start();
require_once('DB/connection.php'); 
require_once('functions.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="Vijay Sahu" />
    <meta name="keywords" content="organic," />
     <title>Shubhda Enterprises-Online Shopping for Men Modi Jacket</title>
    <link rel="icon" href="images/logo-new.png" />
    <link rel="stylesheet" href="fonts/flaticon/flaticon.css" />
    <link rel="stylesheet" href="fonts/icofont/icofont.min.css" />
    <link rel="stylesheet" href="fonts/fontawesome/fontawesome.min.css" />
    <link rel="stylesheet" href="vendor/venobox/venobox.min.css" />
    <link rel="stylesheet" href="vendor/slickslider/slick.min.css" />
    <link rel="stylesheet" href="vendor/niceselect/nice-select.min.css" />
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/index.css" />

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- CSS only -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    
    <!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '619132833250839');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=619132833250839&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
    
</head>

<body>
   
    <?php include('templates/header.php')?>

   

     <!-- category product -->
  
  <div class="container-fluid" style="margin-top: 50px; margin-bottom: 50px;">
    <!------------------------Gallery Section------------------------------>
 <section class="gallary" id="new">

  <figure class="gallary-item item-1">
      <img src="images/modi-jacket/Jacket-pic1.jpg" alt="gallery" class="gallary-img" style="background-size:100% 100%;">
      <div class="content">
          <h2>Modi Jacket</h2>
          <a href="shop-now">Shop Now</a>
      </div>
  </figure>


  <figure class="gallary-item item-2">
      <img src="images/modi-jacket/Jacket-pic.jpg" alt="gallery" class="gallary-img">
      <div class="content">
          <h2>Popular Jacket</h2>
          <a href="shop-now">Shop Now</a>
      </div>
  </figure>


  <figure class="gallary-item item-3">
      <img src="images/modi-jacket/Jacket-pic3.jpg" alt="gallery" class="gallary-img">
      <div class="content">
          <h2>Our Collection</h2>
          <a href="shop-now">Shop Now</a>
      </div>
  </figure>

  <figure class="gallary-item item-4">
      <img src="images/modi-jacket/jacket.jpg" alt="gallery" class="gallary-img">
      <div class="content">
        <h2>Trending Jackets</h2>
         <a href="shop-now">Shop Now</a>
      </div>
  </figure>


</section>
  </div>
  <!-- close category -->


    <!-- Men Section -->
     <?php include('templates/men.php')?>
    <!-- Men Section End -->
    <div class="container-fluid m-0 p-0">
        <div class="row">
            <div class="col-lg-12">
                <img src="images/modi-jacket/jacket.jpg" alt="banner" style="background-size:cover; width:100%;">
            </div>
        </div>
    </div>
    <!--start client feedback-->
     <?php include('templates/client-feedback.php')?>
    <!--close client feedback-->

 <!-- Collected New Items -->
   <?php include('templates/new-items.php')?>
<!-- End Collected New Items -->
    
     <?php include('templates/news-latter.php')?>
    <?php include('templates/whatspp-btn.php')?>
    <?php include('templates/live-chat.php')?>
    <!-- Start Footer -->
    <?php include('templates/footer.php')?>
    <!-- End Footer -->
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
                    $('.total_price').text(data.total_price);
                    $('.badge').text(data.total_item);
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
        $(document).on('click', '.add_to_wishlist', function() {
            var product_id = $(this).attr("id");
            var product_image = $('#p_image' + product_id + '').val();
            var product_name = $('#p_name' + product_id + '').val();
            var product_price = $('#p_price' + product_id + '').val();
            var product_quantity = $('#p_qty' + product_id).val();
            var action = "add";
            if (product_quantity > 0) {
                $.ajax({
                    url: "action_wishlist.php",
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
                        load_wishlist_data();
                        alert("Item has been Added into Wishlist");
                    }
                });
            } else {
                alert("lease Enter Number of Quantity");
            }
        });

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
                        $('#cart-popover').popover('hide');
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
                    $('#cart-popover').popover('hide');
                    alert("Your Cart has been clear");
                }
            });
        });

    });
    </script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9Y0MV93BEV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9Y0MV93BEV');
</script>
</body>

</html>