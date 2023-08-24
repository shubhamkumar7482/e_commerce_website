

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="Vijay Sahu">
    <meta name="keywords" content="">
    <title>BUY WHOLESALE | Shubhda Enterprises</title>
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
  
    <div class="backdrop"></div><a class="backtop fas fa-arrow-up" href="#"></a>
    <?php include('templates/header.php') ?>


<?php 

        if (isset($_POST['submit'])) {
            
           $name = $_POST['name'];
           $company_name = $_POST['company_name'];
           $email = $_POST['email'];
           $mobile = $_POST['mobile'];
           $product_name = $_POST['product_name'];
           $qty = $_POST['qty'];
           $message = $_POST['message'];
           

           $sql ="INSERT INTO buy_wholesales(name,company_name,email,mobile,product_name,qty,message) VALUES('$name','$company_name','$email','$mobile','$product_name','$qty','$message')";
           $stmt = $conn->prepare($sql);
            $res = $stmt->execute();
            if ($res) {
                echo "<script>
                    alert('Thank You for Your Interest Our Team Contact You Shortly!.');
                    window.location.href='../';
                </script>";
            } else {
                echo "<script>
                    alert('Something Went Wrong!.');
                    window.location.href='../';
                </script>";
            }
           
        }
    ?>


    <section class="inner-section single-banner" style="background: url(images/bulk-order.jpg) no-repeat center;">
        <div class="container">
            <h2>BUY WHOLESALEr</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">BUY WHOLESALE</li>
            </ol>
        </div>
    </section>
    <section class="inner-section checkout-part">
        <div class="container">
            <div class="col-lg-12">
                <form method="post" action="" class="contact-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h2 style="font-size:30px;">Book Your Buy Wholesale</h2>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class=" form-input-group"><input class="form-control" type="text" name="name"
                                    placeholder="Full Name" require=""><i class="icofont-user-alt-3"></i>
                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6">
                            <div class="form-input-group"><input class="form-control" type="text" name="company_name"
                                    placeholder="Company Name" require=""><i class="icofont-user-alt-3"></i></div>

                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-input-group"><input class="form-control" type="text" name="email"
                                    placeholder="Your Email" require=""><i class="icofont-email"></i></div>

                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-input-group"><input class="form-control" type="text" name="mobile"
                                    placeholder="Mobile Number" require=""><i class="icofont-ui-touch-phone"></i></div>

                        </div>


                    </div>
                    <br>


                    <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-input-group">
                            <select name="product_name" id="bulkorder" class="form-select" require="">
                                <option value="">Select Products</option>
                                <option value="Modi Jackets ( Jute Fabric )">Modi Jackets ( Jute Fabric )</option>
                                <option value="Modi Jackets ( Matte Fabric )">Modi Jackets ( Matte Fabric )</option>
                                <option value="Modi Jackets ( Crepe Fabric )">Modi Jackets ( Crepe Fabric )</option>
                                <option value="Modi Jackets (Jacquard Fabric)">Modi Jackets (Jacquard Fabric)</option>
                            </select>
                        </div>

                    </div>
                    
                    <div class="col-xs-12 col-sm-6">
                            <div class="form-input-group">
                                <input class="form-control" type="text" name="qty"
                                    placeholder="Minimun Order Quantity" require=""></div>

                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">

                            
                            <textarea placeholder="Fill Your Required" name="message"></textarea>
                            <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-envelope"></i><span>send
                                    message</span></button>

                        </div>

                    </div>
            </div>





            </form>



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
    
   

</body>


</html>