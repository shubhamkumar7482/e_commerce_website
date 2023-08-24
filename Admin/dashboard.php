<?php 
include('header.php');


$total_pro = mysqli_query($con,"SELECT * FROM product");
	$pro_count = mysqli_num_rows($total_pro);

$total_cat = mysqli_query($con,"SELECT * FROM categories");
	$cat_count = mysqli_num_rows($total_cat);

$total_ord = mysqli_query($con,"SELECT * FROM orders");
	$ord_count = mysqli_num_rows($total_ord);

$total_sub = mysqli_query($con,"SELECT * FROM sub_categories");
	$sub_count = mysqli_num_rows($total_sub);
	
$total_subscriber = mysqli_query($con,"SELECT * FROM subcribers");
	$subscriber_count = mysqli_num_rows($total_subscriber);
	
$total_buy = mysqli_query($con,"SELECT * FROM buy_wholesales");
	$buy_count = mysqli_num_rows($total_buy);
?>

<div class="container text-center">
	<div class="row" style="margin-top:50px;">
  <div class="col-md-4">
  <a href="product.php">
      <div class="bg-danger" style="box-shadow:0px 8px 10px 0px #ddd; padding:15px; min-height:160px;">
           <i class="fa fa-product-hunt" aria-hidden="true" style="font-size:40px; color:white;"></i>

            <h3 class="mt-2 text-light">Total Products</h3>
                   <h3 class="text-light"><?php echo $pro_count?></h3>
                     
  </div>
  </a>
  </div>
  <div class="col-md-4">
  <a href="categories.php">
      <div class="bg-success" style="box-shadow:0px 8px 10px 0px #ddd; padding:15px; min-height:160px; ">
           <i class="fa fa-briefcase" aria-hidden="true" style="font-size:40px; color:white;"></i>

            <h3 class="mt-2 text-light">Total Categories</h3>
            <h3 class="text-light"><?php echo $cat_count?></h3>
 
  </div>
  </a>
  </div>
  <div class="col-md-4">
    <a href="order.php">
         <div class="bg-info" style="box-shadow:0px 8px 10px 0px #ddd; padding:15px; min-height:160px; ">
           <i class="fa fa-first-order" aria-hidden="true" style="font-size:40px; color:white;"></i>

            <h3 class="mt-2 text-light">Total Order</h3>
            <h3 class="text-light"><?php echo $ord_count?></h3>
  </div>
    </a>
  </div>
  </div>

  <div class="row" style="margin-top:50px;">
  <div class="col-md-4">
  <a href="sub_categories.php">
      <div class="bg-primary" style="box-shadow:0px 8px 10px 0px #ddd; padding:15px; min-height:160px;">
           <i class="fa fa-shopping-bag" aria-hidden="true" style="font-size:40px; color:white;"></i>

            <h3 class="mt-2 text-light">Total Sub Categories</h3>
                   <h3 class="text-light"><?php echo $sub_count?></h3>
                     
  </div>
  </a>
  </div>
  <div class="col-md-4">
  <a href="contact.php">
      <div class="bg-warning" style="box-shadow:0px 8px 10px 0px #ddd; padding:15px; min-height:160px; ">
           <i class="fa fa-envelope" aria-hidden="true" style="font-size:40px; color:white;"></i>

            <h3 class="mt-2 text-light">Total Subscribers</h3>
            <h3 class="text-light"><?php echo $subscriber_count?></h3>
 
  </div>
  </a>
  </div>
  <div class="col-md-4">
  <a href="buy_wholesales.php">
      <div class="bg-secondary" style="box-shadow:0px 8px 10px 0px #ddd; padding:15px; min-height:160px; ">
           <i class="fa fa-first-order" aria-hidden="true" style="font-size:40px; color:white;"></i>

            <h3 class="mt-2 text-light">Total Buy Wholesales</h3>
            <h3 class="text-light"><?php echo $buy_count?></h3>
  </div>
  </a>
  </div>
  </div>
</div>
<br><br><br><br>
<?php include('footer.php')?>