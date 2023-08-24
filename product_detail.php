<?php
session_start();
require('DB/connection.php'); 
require('functions.php'); 

 if (isset($_GET['id'])) {
     $meta_id = getIdbySlug($_REQUEST, $conn);
      $meta_sql = "SELECT * FROM product WHERE id = $meta_id";
     $stmt = $conn->prepare($meta_sql);
     $stmt->execute();
    $meta_row = $stmt->fetchAll();
 }
?>


<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="Vijay Sahu">
    <meta name="email" content="">
    <meta name="profile" content="">
     <?php foreach ($meta_row as $meta_fetch) { ?>
    <title><?php echo $meta_fetch['meta_title']?></title>
    <meta name="keywords" content="<?php echo $meta_fetch['meta_keyword']?>">
    <meta name="description" content="<?php echo  $meta_fetch['meta_desc']?>">
    <?php } ?>
    <link rel="icon" href="/images/logo.png">
    <link rel="stylesheet" href="/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/product-details.css">
    <style>
        .qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}
    .details-add-group .product-add1 {
        padding: 10px 0px;
        color: var(--white);
        background: #f56b23;
        text-transform: uppercase;
    }

    .product-add1 {
        width: 100%;
        font-size: 15px;
        padding: 6px 0px;
        border-radius: 6px;
        text-align: center;
        text-transform: capitalize;
        color: var(--heading);
        background: var(--border);
        text-shadow: var(-primary-tshadow);
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        transition: all linear 0.3s;
        -webkit-transition: all linear 0.3s;
        -moz-transition: all linear 0.3s;
        -ms-transition: all linear 0.3s;
        -o-transition: all linear 0.3s;
}      
.product-details-right .select-color a.active,
.product-details-right .select-color a:hover {
    border-color: #666;
}

.product-details-right .select-size input[type=radio]{ display: none; }
.product-details-right .select-size input[type=radio]+label{
    display: inline-block;
    padding: 3px 5px;
    border: 1px solid #eaeaea;
    color: #333;
    line-height: normal;
    min-width: 24px;
    text-align: center;
    float: left;
    margin-right: 10px;
}


.product-details-right .select-size a:hover, 
.product-details-right .select-size input:checked+label{
    background-color: #333333;
    border-color: #333333;
    color: #fff;
}

.product-details-right1 .select-color1 a.active,
.product-details-right1 .select-color1 a:hover {
    border-color: #666;
}
.product-details-right1 .select-size1 a{
    display: inline-block;
    padding: 3px 5px;
    border: 1px solid #eaeaea;
    color: transparent;
    line-height: normal;
    min-width: 24px;
    text-align: center;
    float: left;
    margin-right: 10px;
}
.product-details-right1 .select-size1 a:hover, 
.product-details-right1 .select-size1 a.active {
    background-color: #333333;
    color: #fff;
}
    </style>
</head>
 
<body>
    <div class="backdrop"></div><a class="backtop fas fa-arrow-up" href="#"></a>
    <?php include('templates/header.php') ?>
    
    <?php 

    if (isset($_GET['id'])) { 
        $product_id=getIdbySlug($_REQUEST, $conn);
        $resAttr="select product_attribute.*,size.size from product_attribute,size where product_attribute.product_id='$product_id' and size.id=product_attribute.size_id and size.status=1";
        $stmt = $conn->prepare($resAttr);
        $result_sql = $stmt->execute();
        $row_sql = $stmt->fetchAll();
        $count = $stmt->rowCount();
        $productAttr=[];
        $sizeArr=[];

        foreach($row_sql as $rowAttr){ 
            $productAttr[]=$rowAttr;
            $sizeArr[$rowAttr['id']]=$rowAttr['size'];
        }
        $sizeArr=array_unique($sizeArr); 
    }
    else{
    ?>
    <script>
    window.location.href='/';
    </script>
    <?php
}
   ?>
    
    
    
    <?php
    if (isset($_GET['id'])) {
        $p_id = getIdbySlug($_REQUEST, $conn);
        $sql = "SELECT * FROM product WHERE id = $p_id";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetchAll();
        foreach ($row as $rows) { ?>
    <section class="inner-section bg-light">
        <div class="container">
            <a href="/" style="margin-top:20px; font-size: 13px; color: #000;">Home/ <span style="color:#212529; font-size: 13px;"><?php echo $rows['name']; ?></span></a>
            <div class="row">
                <div class="col-lg-6">
                    <div class="details-gallery">

                        <ul class="details-preview">
                                    <li><img src="/product-images/<?php echo $rows['image']; ?>" alt="product"></li>
                                    <li><img src="/product-images/<?php echo $rows['image2']; ?>" alt="product"></li>
                                    <li><img src="/product-images/<?php echo $rows['image3']; ?>" alt="product"></li>
                                    <li><img src="/product-images/<?php echo $rows['image4']; ?>" alt="product"></li>
                                    
                                </ul>

                        <ul class="details-thumb">
                        <li><img src="/product-images/<?php echo $rows['image']; ?>" alt="product"></li>
                                    <li><img src="/product-images/<?php echo $rows['image2']; ?>" alt="product"></li>
                                    <li><img src="/product-images/<?php echo $rows['image3']; ?>" alt="product"></li>
                                    <li><img src="/product-images/<?php echo $rows['image4']; ?>" alt="product"></li>
                                    
                        </ul>




                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="details-content">
                        <h3 class="details-name"><a href="#" style="color:#212529; font-size: 19px;"><?php echo $rows['name']; ?></a></h3>
                        <div class="details-meta">
                            <!--<p>Product Code:<span><?php echo $rowAttr['product_code']; ?></span></p>-->

                        </div>

                        <h3 class="details-price"><del>₹ <?php echo $rows['mrp']; ?></del><span>₹
                                <?php echo $rows['price']; ?> (<?php echo round(100- ($rows['price'] / $rows['mrp']) * 100). "% Off"; ?>)</h3>
                        <p class="details-desc"><?php echo $rows['short_desc']; ?></p>

                        <div class="product-details-right style2">
                                            <div class="select-size">
                                          <label>SIZE OPTIONS</label>
                                          <div class="inner">
                                            <?php foreach($sizeArr as $key=>$lists){ 
                                            echo "<span><input type='radio' name='size' value='".$lists."' id='size".$key."' data-size_id='".$key."'/><label for='size".$key."'>".$lists."</label></span>";
                                            
                                            }
                                            ?>
                                            </div>
                                    </div>
                                </div>


                        <div class="product-details-right style2 color_options" style="display:none; clear: both; padding-top: 20px;">
                                            <div class="select-size">
                                          <label>COLOR OPTIONS</label>
                                          <div class="inner options">
                                            
                                            </div>
                                    </div>
                                </div>
                           
                        <div class="details-add-group">
                            <input type="hidden" name="p_image" id="p_image<?php echo $rows['id'] ?>"
                                value="<?php echo $rows['image'] ?>">
                            <input type="hidden" name="p_name" id="p_name<?php echo $rows['id'] ?>"
                                value="<?php echo $rows['name'] ?>">
                            <input type="hidden" name="p_price" id="p_price<?php echo $rows['id'] ?>"
                                value="<?php echo $rows['price'] ?>">
                                                            

                            QTY :- <input value="1" title="Quantity Number" type="number" name="quantity"
                                id="p_qty<?php echo $rows['id']?>" min="1" max="10000"  />

                        <div class="row">
                            <div class="col-md-7">
                                <button class="product-add1 add_to_cart mt-3" name="add_to_cart" title="Add to Cart"
                                id="<?php echo $rows['id'] ?>">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span> add to cart</span>
                                </button>
                            </div>
                            <div class="details-action-group col-md-5">
                                <a class="details-wish wish add_to_wishlist mt-3" href="" title="Add Your Wishlist" id="<?php echo $rows['id'] ?>" ><i
                                        class="icofont-heart"></i><span>add to Wishlist</span></a>
                            </div>
                            
                        </div>

                        <!--<div class="details-list-group mt-3"><label class="details-list-title">Share:</label>-->
                        <!--    <ul class="details-share-list">-->
                        <!--        <li><a href="" class="icofont-facebook" title="Facebook" target="_blank"></a></li>-->
                        <!--        <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="inner-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">descriptions</a></li>
                        <!-- <li><a href="#tab-spec" class="tab-link" data-bs-toggle="tab">Specifications</a></li> -->

                    </ul>
                </div>
            </div>
            <div class="tab-pane fade show active" id="tab-desc">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <div class="tab-descrip">
                                <p><?php echo $rows['prod_desc']; ?>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </section>
    <?php }
    }
    ?>

    <?php include('related-products.php'); ?>


    <?php include('templates/news-latter.php')?>

    <?php include('templates/footer.php') ?>

    <script src="/vendor/bootstrap/jquery-1.12.4.min.js"></script>
    <script src="/vendor/bootstrap/popper.min.js"></script>
    <script src="/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="/vendor/countdown/countdown.min.js"></script>
    <script src="/vendor/niceselect/nice-select.min.js"></script>
    <script src="/vendor/slickslider/slick.min.js"></script>
    <script src="/vendor/venobox/venobox.min.js"></script>
    <script src="/js/nice-select.js"></script>
    <script src="/js/countdown.js"></script>
    <script src="/js/accordion.js"></script>
    <script src="/js/venobox.js"></script>
    <script src="/js/slick.js"></script>
    <script src="/js/main.js"></script> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.js"></script>

    <script>


    $(document).ready(function() {
        load_cart_data();

        function load_cart_data() {
            $.ajax({
                url: "/fetch_cart.php",
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
                url: "/fetch_wishlist.php",
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
                    url: "/action_wishlist.php",
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
            var selectedsize = $('input[name=size]:checked').val();
            var product_color = $('input[name=color]:checked').val();
             
            var action = "add";
            if (product_quantity > 0) {
                $.ajax({
                    url: "/action.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        product_image: product_image,
                        product_name: product_name,
                        product_price: product_price,
                        product_quantity: product_quantity,
                        product_size: selectedsize,
                        product_color: product_color,
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
                    url: "/action.php",
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
                url: "/action.php",
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


        $('.details-preview  li.slick-active img').parent().zoom({
            magnify: 2.5,
            target: $('.contain').get(0)
        });

        $("body").on('click', '.slick-slide', function(){
            $('.details-preview  li.slick-current img').parent().zoom({
                magnify: 2.5,
                target: $('.contain').get(0)
            });
        });
      

    });
    </script>


<!-- Quntity Javascript Code -->

    <script>
     jQuery(document).ready(($) => {
        $('.quantity').on('click', '.plus', function(e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            $input.val( val+1 ).change();
        });
 
        $('.quantity').on('click', '.minus', 
            function(e) {
            let $input = $(this).next('input.qty');
            var val = parseInt($input.val());
            if (val > 0) {
                $input.val( val-1 ).change();
            } 
        });
    });

     $("input[name='size']").change(function(){
        var size_id = $("input[name='size']:checked").data('size_id');
        $('.color_options').hide(); $(".color_options .options").html('');
        $.ajax({
            url: "/action.php",
            method: "POST",
            data: {
                size_id: size_id,
                action: 'getcolors'
            },
            success: function(data) { 
                colordata = JSON.parse(data);
                if((colordata.length)>0){
                    $('.color_options').show();
                    for(c=0;c<(colordata.length);c++){
                        color = colordata[c];
                        $(".color_options .options").append("<span><input type='radio' name='color' value='"+color['color']+"' id='color"+color['id']+"'/><label for='color"+color['id']+"'>"+color['color']+"</label></span>");
                    }
                }
            }
        })
     })
    </script>
</body>

</html>