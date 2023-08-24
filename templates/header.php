<?php

require('DB/connection.php'); 

?>

<style>

.dropdown {

    position: relative;

    display: inline-block;

}





/* Dropdown Content (Hidden by Default) */



.dropdown-content {

    display: none;

    position: absolute;

    background-color: #f1f1f1;

    min-width: 160px;

    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);

    z-index: 1;

}





/* Links inside the dropdown */



.dropdown-content a {

    color: black;

    padding: 12px 16px;

    text-decoration: none;

    display: block;

}





/* Change color of dropdown links on hover */



.dropdown-content a:hover {

    background-color: #ddd

}





/* Show the dropdown menu on hover */



.dropdown:hover .dropdown-content {

    display: block;

}

</style>



<?php



 $main_category = "select * from categories where status=1";

$stmt = $con->prepare($main_category);

$stmt->execute();



$cat_arr = array();



// while($main_row = $stmt->fetch(PDO::FETCH_ASSOC)){



//     $cat_arr[]=$main_row;

// }



?>
<div class="container-fluid header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
              <div class="user-accounnt">
                            <?php

                            if (isset($_SESSION['fullname'])) {

                               

                        echo '<div class="dropdown">

                        <a href="javascript:void(0)" style="color:black;">Hello,' . $_SESSION['fullname'] . '</a>

                        <div class="dropdown-content">

                            <a href="/my-account">My Account</a>

                            <a href="/order-history">Orders History</a>

                            <a href="/users_function/logout">Logout</a>

                        </div>

                    </div>';

                            } else {

                                echo '<a href="/login" style="color:black;">

                                <i class="fas fa-user-circle"></i> Login / Register

                        </a>';

                            }



                            ?>
                </div>
            </div>
            <div class="col-md-6">
                <form action="/search" method="get">
                <div class="input-group">
                  <input type="text" class="form-control" name="search" placeholder="What are you looking for?" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
                 </form>
            </div>
            <div class="col-md-4">
                <ul class="header-top-list">

                    <li><a href="/offer"><i class="icofont-sale-discount"></i> offers</a></li>

                    <li><a href="/wishlist"><i class="fas fa-heart"></i> My Wishlist <span class="badge2"></span> </a></li>

                    <li>

                        <button class="header-widget header-cart" title="Cartlist">

                            <i class="fas fa-shopping-basket"></i> My Cart <span class="badge"></span> </button>

                    </li>

                    <li class="li123" style="float: right;">

                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>

<header class="header-part">

    <div class="container">

        <div class="header-content">

            <div class="header-media-group">





                <a href="/">

        <img src="/images/logo-new.png" alt="logo"></a>
    <button class="header-src" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-search"></i></button>
            </div>

            <a href="/" class="header-logo"><img src="/images/logo-new.png" alt="logo"></a>



            <div class="header">

                <nav class="navbar-part">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="navbar-content">

                                    <ul class="navbar-list">

                                        <li class="navbar-item "><a class="navbar-link" href="/">HOME</a></li>
                                        <!--<li class="navbar-item "><a class="navbar-link" href="/">ABOUT US</a></li>-->
                                        <?php 

                                            foreach($cat_arr as $lists){ ?>



                                                <li class="navbar-item dropdown">

                                            <a class="navbar-link dropdown-arrow"

                                                href=""><?php echo $lists['categories']?></a>

                                                <?php 

                                                $cat_id = $lists['id'];

                                                $sql = "SELECT * FROM sub_categories WHERE status=1 AND categories='$cat_id' ORDER BY sub_categories.id ASC ";

                                                    $stmt = $conn->prepare($sql);

                                                    $stmt->execute();

                                                ?>

                                            <ul class="dropdown-position-list">

                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <?php 

                                                            while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                                echo ' <li><a href="/c/'.$lists['categories'].'/'.$rows['slug'].'">'.$rows['sub_categories'].'</a></li>';

                                                                //echo '<li><a href="/pro_category.php?id='.$lists['id'].'&sub_categories='.$rows['id'].'">'.$rows['sub_categories'].'</a></li>';

                                                            }

                                                        ?>

                                                       





                                                    </div>

                                                </div>

                                            </ul>

                                        </li>

                                          <?php  } ?>



                                        
                                        
                                        <!-- <li class="navbar-item "><a class="navbar-link" href="/contact-us">CONTACT US</a>-->

                                        <!--</li>-->
                                        <li class="navbar-item "><a class="navbar-link" href="/our-speciality">OUR SPECIALITY</a>

                                        </li>
                                        
                                        <li class="navbar-item "><a class="navbar-link" href="/bulk-order">BUY WHOLESALE</a>

                                        </li>
                                        
                                        <li class="navbar-item ">
                                            <a class="navbar-link" href="" target="_blank">
                                                <img src="/images\flipkart-icon.png" alt="flipkart" srcset=""
                                                    class="flipkart">Shop With</a>
                                        </li>

                                        <li class="navbar-item "><a class="navbar-link" href="" target="_blank">
                                                <img src="/images\amazon-icon.png" alt="amazon" srcset="" class="amazon">Shop
                                                With</a>
                                        </li>

                                    </ul>







                                </div>

                            </div>

                        </div>

                    </div>

                </nav>



            </div>

        </div>

    </div>

</header>





<aside class="category-sidebar">

    <div class="category-header">

        <h4 class="category-title"><i class="fas fa-align-left"></i><span><img src="/images/logo.jpg" alt=""

                    style=" width: 100%; height:65px;"></span></h4><button class="category-close"><i

                class="icofont-close"></i></button>

    </div>

    <ul class="category-list">

        <li class="category-item"><a class="category-link " href="/">

                <span>Home</span></a>





        </li>

        <li class="category-item"><a class="category-link" href="/about-us">

                <span>About us</span></a>



        </li>

        

        

        

        <?php 

            foreach($cat_arr as $lists){ ?>

                 <li class="category-item"><a class="category-link dropdown-link" href="#">

                <span><?php echo $lists['categories']?></span></a>

                 <?php 

                $cat_id = $lists['id'];

                $sql = "SELECT * FROM sub_categories WHERE status=1 AND categories='$cat_id' ORDER BY sub_categories.id ASC ";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute();

                ?>

            <ul class="dropdown-list">

                <div class="row">

                <div class="col-md-6">

                       <?php 

                        while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){

                            //echo ' <li><a href="/pro_category.php?='.$lists['id'].'&sub_categories='.$rows['id'].'">'.$rows['sub_categories'].'</a></li>';

                            echo ' <li><a href="/c/'.$lists['categories'].'/'.$rows['slug'].'">'.$rows['sub_categories'].'</a></li>';


                        }

                    ?>                                

                </div>

            </div>

                                                                                  

            </ul>

        </li>



            <?php } ?>

    

        

         <li class="category-item"><a class="category-link" href="/offer">

                <span>Offer</span></a>



        </li>

        

         <li class="category-item"><a class="category-link" href="/wishlist">

                <span>My Wishlist</span></a>



        </li>



       

    </ul>

    <div class="category-footer">

        <p>All Rights Reserved by <a href="#">Vijay Sahu</a></p>

    </div>

</aside>

<aside class="cart-sidebar">

    <div class="cart-header">

        <div class="cart-total"><i class="fas fa-shopping-basket"></i><span>total item ( <span class="badge"></span>

                )</span></div><button class="cart-close"><i class="icofont-close"></i></button>

    </div>

    <div id="cart_details_mobile"></div>



</aside>

<aside class="nav-sidebar">

    <div class="nav-header"><a href="#"><img src="/images/logo.png" alt="logo"></a><button class="nav-close"><i

                class="icofont-close"></i></button></div>

   

</aside>





<div class="mobile-menu">

    <a href="/" title="Home Page"><i class="fas fa-home"></i><span>Home</span></a>

    <button class="cate-btn" title="Category List"><i class="fas fa-list"></i><span>category</span></button>

    <button class="cart-btn header-widget header-cart" title="Cartlist"><i

            class="fas fa-shopping-basket"></i><span>cart</span><sup class="badge"></sup></button>

   <?php 
             if (isset($_SESSION['fullname'])) {
                 echo '<div class="dropstart">
                        <a href="javascript:void(0)" dropdown-toggle" data-bs-toggle="dropdown"  style="color:#000; font-size:15px;">' . $_SESSION['fullname'] . '</a>
                        <ul class="dropdown-menu">
                            <a href="/my-account" style="width:100%;">My Account</a>
                            <a href="/order-history" style="width:100%;">Orders History</a>
                            <a href="/users_function/logout" style="width:100%;">Logout</a>
                        </ul>
                    </div>';
             }
             else{
               
                 echo '<a href="/login" title="Wishlist"><i class="fas fa-user"></i><span>My Account</span></a>';
            }
            ?>



</div>



<!-- Button trigger modal -->





<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content" id="search">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Find Your Product</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <div class="wrap">

                <form action="/search" method="get">

                    <div class="search">

                        

                            <input type="text" class="searchTerm" name="search" placeholder="What are you looking for?">

                            <button type="submit" name="search-product" class="searchButton">

                                <i class="fa fa-search"></i>

                            </button>

                        

                        

                    </div>

                </form>

                </div>

            </div>



        </div>

    </div>

</div>