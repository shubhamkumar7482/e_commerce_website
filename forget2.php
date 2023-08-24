<?php
session_start();
require('DB/connection.php');
if (isset($_POST['forget'])) {
    $email = $_POST['email'];
    $otp = mt_rand(111111,999999);
    $sql = "SELECT email FROM users
        WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    $count = $stmt->rowCount();
    if ($count>0) {
        $to = $email;
        $subject = "Forget Password OTP From RiverHill";
        $txt = "Forget Password OTP is ".$otp;
        $headers = "From: Shubhda2018@gmail.com" . "\r\n" .
            "CC: Shubhda2018@gmail.com";
        $mail = mail($to,$subject,$txt,$headers);
        $_SESSION['otp'] = $otp;
        if ($mail) {
            echo "<script>
                alert('OTP Send to Your Register Email ID!');
            </script>";
        } else {
            echo "<script>
                alert('Something went wrong!');
            </script>";
        }
    } else {
        echo "<script>
            alert('Invalid Email ID.!');
            window.location.href='forget';
            </script>";
    }
    
} 
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="Vijay Sahu">
    <meta name="keywords" content="">
     <title>Forget Password || Shubhda Enterprises </title>
    <link rel="icon" href="images/logo-new.png" />
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
    <section class="user-form-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-12 col-lg-12 col-xl-10">
                    <div class="user-form-card">
                        <div class="user-form-title">
                            <h2 style="color:#f56b23;">welcome!</h2>
                            <p>Use your credentials to access</p>
                        </div>
                        <div class="user-form-group">
                            
                            <form class="user-form" action="users_function/register-login" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Enter your email" readonly required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="newpassword" placeholder="Enter New Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirmpassword" placeholder="Enter Confirm Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="otp" placeholder="OTP" required>
                                </div>
                                <div class="form-button">
                                    <button type="submit" name="forget" style="background: #f56b23;">Forget Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="user-form-remind mb-5">
                        <p>Don't have any account?<a href="register" style="color:#f56b23;">register here</a></p>
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