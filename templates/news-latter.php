<?php 

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql = "INSERT INTO subcribers (email) VALUES ('$email')";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute();
    if ($res) {
        echo "<script>
            alert('Thank You for Your Interest!.');
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
<section class="news-part" style="background: url(/images/modi-jacket/jacket.jpg) no-repeat center; background-attachment:fixed;">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-5 col-lg-6 col-xl-7">

                    <div class="news-text">

                        <h2>Get 20% Discount for Subscriber</h2>

                      

                    </div>

                </div>

                <div class="col-md-7 col-lg-6 col-xl-5">

                    <form class="news-form" method="POST" action="/users_function/newletter.php">

                        <input type="email" name="email" placeholder="Enter Your Email Address" required>

                        <button type="submit" name="submit"><span>

                            <i class="icofont-ui-email"></i>Subscribe</span>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>
   
    <div class="container-fluid bg-light p-3 text-center mb-4">
        <div class="row">
            <div class="col-md-3 mt-3 mb-3">
                <div class="policy-content">
                  <img src="/images/footer-top/truck.png" alt="footer-image">
                  <h3>Free Home Delivery</h3>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-3">
                <div class="return-content">
                  <img src="/images/footer-top/return.png" alt="footer-image">
                  <h3>Instant Return Policy</h3>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-3">
                <div class="return-content">
                  <img src="/images/footer-top/help-center.png" alt="footer-image">
                  <h3>Quick Support System</h3>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-3">
                <div class="return-content">
                  <img src="/images/footer-top/trust.png" alt="footer-image">
                  <h3>Secure Payment Way</h3>
                </div>
            </div>
        </div>
    </div>

    