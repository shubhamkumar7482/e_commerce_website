<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="Vijay Sahu">
    <meta name="keywords" content="">
    <title>Login Details || Shubhda Enterprises</title>
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
                            <h2 style="color:#F56B23;">Login On Shubhda Enterprises</h2>
                            <p>Please provide the below details to login.</p>
                        </div>
                        <div class="user-form-group">
                           
                           
                            <form class="user-form" action="users_function/register-login" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                                </div>
                                <!--<div class="form-check mb-3">-->
                                <!--    <input class="form-check-input" type="checkbox" value="" id="check" checked><label class="form-check-label" for="check">Remember Me</label>-->
                                <!--</div>-->
                                <div class="form-button">
                                    <button type="submit" name="login" style="background: #F56B23;">login</button>
                                    <p>Forgot your password?<a href="forget" style="color:#F56B23;">reset here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="user-form-remind mb-5">
                        <p>Don't have any account?<a href="register" style="color:#F56B23;">register here</a></p>
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