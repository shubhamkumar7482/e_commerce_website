<?php
require_once('DB/connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Vijay Sahu">
    <meta name="keywords" content="">
    <title>Register User || Shubhda Enterprises</title>
    <link rel="icon" href="images/logo-new.png">
    <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/user-auth.css">
</head>

<body>
    <?php include('templates/header.php')?>
    <section class="user-form-part bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-12 col-lg-12 col-xl-10">
                    <div class="user-form-card">
                        <div class="user-form-title">
                            <h2 style="color:#F56B23;">Register On Users</h2>
                            <p>Please provide the below details to Register.</p>
                        </div>
                        <div class="user-form-group">
                           
                            <form class="user-form" action="users_function/register-login" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="fullname" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="phone" placeholder="Enter your Phone" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                                </div>
                               
                                <div class="form-button">
                                    <button type="submit" name="register" style="background: #F56B23;">register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="user-form-remind mb-4">
                        <p>Already Have An Account?<a href="login" style="color:#F56B23;">login here</a></p>
                    </div>
                </div>
            </div>
        </div>
         <?php include('templates/footer.php')?>
    </section>
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