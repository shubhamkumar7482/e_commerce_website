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

    <title>Order History | RiverHill</title>

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

                <h2>Order History</h2>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="/">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Order History</li>

                </ol>

            </div>

        </section>

        <section class="inner-section checkout-part">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="account-card">

                            <div class="account-title">

                                <h4>Your order</h4>

                            </div>

                            <div class="account-content">

                                <div class="table-scroll">

                                    <table class="table-list">

                                        <thead>

                                            <tr>

                                                <th scope="col">Serial</th>

                                                <th scope="col">Order#</th>

                                                <th scope="col">Invoice#</th>

                                                <th scope="col">Total Amount</th>

                                                <th scope="col">Items</th>

                                                <th scope="col">Status</th>

                                                <th scope="col">action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php

                                            $sql = "SELECT * FROM orders WHERE users_id = '$users_id'";

                                            $stmt = $conn->prepare($sql);

                                            $result = $stmt->execute();

                                            $count = $stmt->rowCount();

                                            $row = $stmt->fetchAll();

                                            $count = 1;

                                            foreach ($row as $rows) {?>

                                            <tr>

                                                <td class="table-serial">

                                                    <h6><?php echo $count++; ?></h6>

                                                </td>

                                                <td class="table-name">

                                                    <h6><?php echo $rows['order_id']; ?></h6>

                                                </td>

                                                <td class="table-price">

                                                    <h6> <?php echo $rows['invoice_id']; ?></h6>

                                                </td>

                                                <td class="table-brand">

                                                    <h6>₹ <?php echo $rows['total_pay']; ?></h6>

                                                </td>

                                                <td class="table-quantity">

                                                    <h6><?php echo $rows['total_item']; ?></h6>

                                                </td>

                                                <td class="table-quantity">

                                                    <?php

                                                    if ($rows['order_status'] == 1) {

                                                        echo '<a class="btnt btn-sm btn-warning">Confirmed</a>';

                                                    } else if ($rows['order_status'] == 2) {

                                                        echo '<a class="btnt btn-sm btn-warning">Dispatch</a>';

                                                    }

                                                    else if ($rows['order_status'] == 3) {

                                                        echo '<a class="btnt btn-sm btn-warning">Cancelled</a>';

                                                    }

                                                    else if ($rows['order_status'] == 4) {

                                                        echo '<a class="btnt btn-sm btn-warning">Delivered</a>';

                                                    }

                                                    else{

                                                        echo '<a class="btnt btn-sm btn-warning">Proccess</a>';

                                                    }

                                                     

                                                    ?>

                                                </td>

                                                <td class="table-quantity">

                                                    

                                                    <a href="invoice.php?invoice_id=<?php echo $rows['invoice_id']; ?>" class="btnt btn-sm btn-warning" target="_blank">View</a>

                                                </td>

                                            </tr>



                                            <?php }

                                            ?>

                                            

                                        </tbody>

                                    </table>

                                </div>

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