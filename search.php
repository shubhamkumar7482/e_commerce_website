<?php
session_start();
require_once('DB/connection.php');
require_once('functions.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Vijay Sahu">
    <meta name="email" content="">
    <meta name="profile" content="">
    <meta name="template" content="Vijay Sahu">
    <meta name="title" content="">
    <meta name="keywords" content="">
    <title>Product | Search</title>
    <link rel="icon" href="/images/favicon.png">
    <link rel="stylesheet" href="/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <div class="backdrop"></div>
    <a class="backtop fas fa-arrow-up" href="#"></a>

    <?php include('templates/header.php') ?>
    
    
    <?php
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sql = "SELECT * FROM product WHERE name LIKE '%$search%' ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $count = $stmt->rowCount();
                    $row = $stmt->fetchAll();
                    if ($count>0) { ?>
    
    <section class="inner-section single-banner">

        <div class="container">
        
            <h2><?php echo $search?></h2>

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="/">HOME</a></li>

                <li class="breadcrumb-item active" aria-current="page"><?php echo $search?></li>

            </ol>

        </div>

    </section>
    
    <section class="inner-section shop-part">
        <div class="container mb-5">

            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4">
                
                    <?php
                    foreach ($row as $rows) { ?>
                        <div class="col">
                            <div class="product-card">
                                <div class="product-media">

                                    <button class="product-wish wish add_to_wishlist" id="<?php echo $rows['id'] ?>"><i class="fas fa-heart"></i>
                                    </button><a class="product-image" href="/p/<?php echo slug($rows['id'], $conn); ?>"><img src="product-images/<?php echo $rows['image'] ?>" alt="product"></a>

                                </div>
                                <div class="product-content">

                                    <h6 class="product-name"><?php echo $rows['name']; ?></h6>
                                    <h6 class="product-price"><del>₹ <?php echo $rows['mrp']; ?></del><span>₹ <?php echo $rows['price']; ?>/<small>/piece</small></span></h6>
                                    <input type="hidden" name="p_image" id="p_image<?php echo $rows['id'] ?>" value="<?php echo $rows['image'] ?>">
                                    <input type="hidden" name="p_name" id="p_name<?php echo $rows['id'] ?>" value="<?php echo $rows['name'] ?>">
                                    <input type="hidden" name="p_price" id="p_price<?php echo $rows['id'] ?>" value="<?php echo $rows['price'] ?>">
                                    <input class="action-input" title="Quantity Number" type="hidden" name="quantity" id="p_qty<?php echo $rows['id']?>" value="1" />
                                    <button class="product-add add_to_cart" title="Add to Cart" name="add_to_cart" id="<?php echo $rows['id'] ?>"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                </div>
                            </div>
                        </div>

                <?php } } else{
                    echo '<div class="alert alert-danger mt-5" role="alert">
                    <h4 class="alert-heading p-2">No Product Found!</h4>
                  </div>';
                }
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">No Product Found!</h4>
                  </div>';
                }

                ?>

            </div>

        </div>
    </section>
    
        

    <!-- Start Footer -->
    <?php include('templates/footer.php')?>
    <!-- End Footer -->

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
    <script>  
$(document).ready(function(){

	load_cart_data();

	function load_cart_data()
	{
		$.ajax({
			url:"fetch_cart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
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

	$(document).on('click', '.add_to_cart', function(){
		var product_id = $(this).attr("id");
        var product_image = $('#p_image'+product_id+'').val();
		var product_name = $('#p_name'+product_id+'').val();
		var product_price = $('#p_price'+product_id+'').val();
		var product_quantity = $('#p_qty'+product_id).val();
		var action = "add";
		if(product_quantity > 0)
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id,product_image:product_image,product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
				success:function(data)
				{
					load_cart_data();
					alert("Item has been Added into Cart");
				}
			});
		}
		else
		{
			alert("lease Enter Number of Quantity");
		}
	});

	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Are you sure you want to remove this product?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					$('#cart-popover').popover('hide');
					alert("Item has been removed from Cart");
				}
			})
		}
		else
		{
			return false;
		}
	});

	$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				alert("Your Cart has been clear");
			}
		});
	});
    
});

</script>
</body>

</html>