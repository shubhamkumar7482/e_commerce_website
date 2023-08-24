<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="Vijay Sahu">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Contact us | Shubhda Enterprises</title>
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
<?php
if(isset($_POST['submit'])){

// print_r($_POST);


 $name=$_POST['name'];
 $number=$_POST['number'];
 $email=$_POST['email'];
 $message=$_POST['message'];

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "$email";///Mail created from your site
    $to = "support@soumita.co.in";//Reciver Address
    
    $subject = "Contact Us From Shubhda Enterprises ";//Subject
    $message = "
    Name: ".$name."
    Email: ".$email."
    Phone: ".$number."
    Message : ".$message."
    ";     //Message-Body
    
    $headers = "From:".$from; 
    mail($to,$subject,$message, $headers); 
    echo "<script>
        alert('Your Contact Us Message Sent Successfully');
        window.location.href = '/';
    </script>";
   
}
?>
<style>
    .card{
        width:100%; height:160px;
        box-shadow:0px 8px 10px 0px #ddd;
    }
    
</style>
<body>

    <div class="backdrop"></div><a class="backtop fas fa-arrow-up" href="#"></a>
    <?php include('templates/header.php') ?>



    <section class="inner-section single-banner" style="background: url(images/bulk-order.jpg) no-repeat center;">
        <div class="container">
            <h2>Contact Us</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </div>
    </section>
    
    <div class="text-center">
        <h2>Registered Office</h2>
        <p class="mt-3 mb-3">
            <b>F-23, DHOLA BHATA UIT COLONY, AJMER, Ajmer, Rajasthan, 305001</b>
        </p>
    </div>
    <section class="inner-section checkout-part">
                <div class="container text-center">
            <div class="row">
            <!--    <div class="col-md-3 text-center mt-3">-->
            <!--        <div class="card text-center">-->
            <!--          <i class='fas fa-map-marker-alt' style="font-size:40px; margin-top:10px; color:#F56B23;"></i>-->
            <!--          <div class="card-body">-->
            <!--            <p class="card-text">F 23 Dhola Bhata Ajmer </p>-->
            <!--          </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="col-md-1"></div>
            <div class="col-md-3 text-center mt-3">
                    <div class="card text-center">
                      <i class='fas fa-envelope' style="font-size:40px; margin-top:10px; color:#F56B23;"></i>
                      <div class="card-body">
                        <p class="card-text"><a href="mailto:Support@soumita.co.in"  class="text-dark" >Support@soumita.co.in</a></p>
                      </div>
                </div>
                </div>
                
            <div class="col-md-3 text-center mt-3">
                    <div class="card text-center">
                      <i class='fas fa-phone-alt' style="font-size:40px; margin-top:10px; color:#F56B23;"></i>
                      <div class="card-body">
                        <p class="card-text"><a href="tel:9610533543"  class="text-dark" >+91-9610533543</a></p>
                      </div>
                </div>
                </div>
                
            <div class="col-md-3 text-center mt-3">
                    <div class="card text-center">
                      <i class='fas fa-globe-americas' style="font-size:40px; margin-top:10px; color:#F56B23;"></i>
                      <div class="card-body">
                        <p class="card-text"><a href="https://soumita.co.in/"  class="text-dark" >Soumita.co.in</a></p>
                      </div>
                </div>
                </div>
        </div>
        </div>
        <div class="container">
    
                <form method="post" action="" class="contact-form">
        
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 mt-2">
                            <div class=" form-input-group"><input  name="name" class="form-control" type="text"
                                    placeholder="Full Name" require="required"><i class="icofont-user-alt-3"></i>
                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 mt-2">
                            <div class="form-input-group"><input name="email" class="form-control" type="text"
                                    placeholder="Your Email" require="required"><i class="icofont-email"></i></div>

                        </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-xs-12 col-sm-12">
                            <div class="form-input-group"><input class="form-control" type="text"
                                    placeholder="Mobile Number" require="required" name="number"><i class="icofont-ui-touch-phone"></i></div>

                        </div>


                    </div>

                    <br>



                    <div class="row">
                        <div class="col-lg-12">


                            <textarea placeholder="Please Type your Message " rows="20" name="message"
                                id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="off"
                                role="textbox" aria-autocomplete="list" aria-haspopup="true" require="required"> </textarea>

                            <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-envelope"></i><span>send
                                    message</span></button>

                        </div>

                    </div>

            </form>

           </div>

        </div>

    </section>
    <?php include('templates/news-latter.php') ?>
<?php include('templates/whatspp-btn.php')?>
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