<?php
session_start();
require("DB/connection.php");
$users_id = $_SESSION['users_id'];
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
    <meta name="template" content="">
    <meta name="title" content="">
    <meta name="keywords" content="">
    <title>Checkout | RiverHill</title>
    <link rel="icon" href="images/favicon.png">
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



        <section class="inner-section single-banner" style="background: url(images) no-repeat center;">
            <div class="container">
                <h2>checkout</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div>
        </section>
        <section class="inner-section checkout-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>My Account</h4>
                            </div>
                            <div class="account-content">
                                <?php
                                $sql = "SELECT * FROM users WHERE users_id = '$users_id'";
                                $stmt = $conn->prepare($sql);
                                $result = $stmt->execute();
                                $count = $stmt->rowCount();
                                $row = $stmt->fetchAll();
                                foreach ($row as $rows) {
                                    $email = $rows['email']; 
                                    ?>
                                    <form>
                                        <div class="form-group col-lg-6 ">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $rows['fullname'] ?>" aria-describedby="emailHelp" readonly disabled>
                                        </div>
                                        <div class="form-group col-lg-6 ">
                                            <label for="exampleInputEmail1">Contact</label>
                                            <input type="tel" class="form-control" value="<?php echo $rows['phone'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly disabled>
                                        </div>
                                        <div class="form-group col-lg-6 ">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" value="<?php echo $rows['email'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly disabled>
                                        </div>
                                    </form>
                                <?php }
                                ?>

                                <form method="POST" action="users_function/register-login.php">
                                    <legend>Change Your Password</legend>
                                    <div class="form-group  col-lg-6">
                                        <label for="exampleInputPassword1">Current Password</label>
                                        <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                                        <input type="password" class="form-control" name="current-password" id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group  col-lg-6">
                                        <label for="exampleInputPassword1">New Password</label>
                                        <input type="password" class="form-control" name="new-password" id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group  col-lg-6">
                                        <label for="exampleInputPassword1">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm-password" id="exampleInputPassword1">
                                    </div>
                                    <button type="submit" name="change-password" class="btn btn-warning">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
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

    <?php } else {
        header('Location:login.php');
    }

    ?>

</body>


</html>