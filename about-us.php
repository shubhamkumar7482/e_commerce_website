<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="Vijay Sahu">
    <meta name="keywords" content="">
    <title>About us | Shubhda Enterprises</title>
    <link rel="icon" href="images/logo-new.png">
    <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="backdrop"></div>
    <a class="backtop fas fa-arrow-up" href="#"></a>

    <?php include('templates/header.php')?>





<style type="text/css">
    .about-content{
        margin-top: -80px;
    }

    @media(max-width: 992px){
         .about-content{
        margin-top:0px;
    }

    }
    
     h1,
        h2,
        h3,
        h4,
        h5,
        h6 {}
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }
        
        a,
        a:active,
        a:focus {
            color: #333;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }
        
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        img {
    max-width: 100%;
    height: auto;
}
span, a, a:hover {
    display: inline-block;
    text-decoration: none;
    color: inherit;
}
.section-head {
  margin-bottom: 60px;
}
.section-head h4 {
  position: relative;
  padding:0;
  color:#f91942;
  line-height: 1;
  letter-spacing:0.3px;
  font-size: 34px;
  font-weight: 700;  
  text-align:center;
  text-transform:none;
  margin-bottom:30px;
}
.section-head h4:before {
  content: '';
  width: 60px;
  height: 3px;
  background: #f91942;
  position: absolute;
  left: 0px;
  bottom: -10px;
  right:0;  
  margin:0 auto;
}
.section-head h4 span {
  font-weight: 700;
  padding-bottom: 5px;
  color:#2f2f2f
}
p.service_text{
  color:#cccccc !important;
  font-size:16px;
  line-height:28px;
  text-align:center;    
}
.section-head p, p.awesome_line{
  color:#818181;
  font-size:16px;
  line-height:28px;
  text-align:center;  
}

.extra-text {
    font-size:34px;
    font-weight: 700;
    color:#2f2f2f;
    margin-bottom: 25px;
    position:relative;
    text-transform: none;
}
.extra-text::before {
    content: '';
    width: 60px;
    height: 3px;
    background: #f91942;
    position: absolute;
    left: 0px;
    bottom: -10px;
    right: 0;
    margin: 0 auto;
}
.extra-text span {
    font-weight: 700;
    color:#f91942;
}
.item {
    background: #fff;
    text-align: center;
    padding: 30px 25px;
    -webkit-box-shadow:0 0px 25px rgba(0, 0, 0, 0.07);
    box-shadow:0 0px 25px rgba(0, 0, 0, 0.07);
    border-radius: 20px;
    border:5px solid rgba(0, 0, 0, 0.07);
    margin-bottom: 30px;
    height:320px;
    -webkit-transition: all .5s ease 0;
    transition: all .5s ease 0;
    transition: all 0.5s ease 0s;
}
.item:hover{
    background:#f56b23;
    box-shadow:0 8px 20px 0px rgba(0, 0, 0, 0.2);
    -webkit-transition: all .5s ease 0;
    transition: all .5s ease 0;
    transition: all 0.5s ease 0s;
}
.item:hover .item, .item:hover span.icon{
    background:#fff;
    border-radius:10px;
    -webkit-transition: all .5s ease 0;
    transition: all .5s ease 0;
    transition: all 0.5s ease 0s;
}
.item:hover h6, .item:hover p{
    color:#fff;
    -webkit-transition: all .5s ease 0;
    transition: all .5s ease 0;
    transition: all 0.5s ease 0s;
}
.item .icon {
    font-size: 40px;
    margin-bottom:25px;
    color: #f56b23;   
    width: 90px;
    height: 90px;
    line-height: 96px;
    border-radius: 50px;
}
.item .feature_box_col_one{
    background:rgba(247, 198, 5, 0.20);
    color:#f91942
}
.item .feature_box_col_two{
    background:rgba(255, 77, 28, 0.15);
    color:#f91942
}
.item .feature_box_col_three{
    background:rgba(0, 147, 38, 0.15);
    color:#f91942
}
.item .feature_box_col_four{
    background:rgba(0, 108, 255, 0.15);
    color:#f91942
}
.item .feature_box_col_five{
    background:rgba(146, 39, 255, 0.15);
    color:#f91942
}
.item .feature_box_col_six{
    background:rgba(23, 39, 246, 0.15);
    color:#f91942
}
.item p{
    font-size:15px;
    line-height:26px;
}
.item h6 {
    margin-bottom:20px;
    color:#2f2f2f;
}
.mission p {
    margin-bottom: 10px;
    font-size: 15px;
    line-height: 28px;
    font-weight: 500;
}
.mission i {
    display: inline-block;
    width: 50px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    background: #f91942;
    border-radius: 50%;
    color: #fff;
    font-size: 25px;
}
.mission .small-text {
    margin-left: 10px;
    font-size: 13px;
    color: #666;
}
.skills {
    padding-top:0px;
}
.skills .prog-item {
    margin-bottom: 25px;
}
.skills .prog-item:last-child {
    margin-bottom: 0;
}
.skills .prog-item p {
    font-weight: 500;
    font-size: 15px;
    margin-bottom: 10px;
}
.skills .prog-item .skills-progress {
    width: 100%;
    height: 10px;
    background: #e0e0e0;
    border-radius:20px;
    position: relative;
}
.skills .prog-item .skills-progress span {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    background: #f91942;
    width: 10%;
    border-radius: 10px;
    -webkit-transition: all 1s;
    transition: all 1s;
}
.skills .prog-item .skills-progress span:after {
    content: attr(data-value);
    position: absolute;
    top: -5px;
    right: 0;
    font-size: 10px;
    font-weight:600;    
    color: #fff;
    background:rgba(0, 0, 0, 0.9);
    padding: 3px 7px;
    border-radius: 30px;
}
</style>

    <section class="inner-section single-banner" style="background: url(images/about-us.jpeg) no-repeat center;">
        <div class="container">
            <h2>About us</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About us</li>
            </ol>
        </div>
    </section>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                 <img src="images/modi-jacket/Jacket-pic.jpg">
            </div>
            <div class="col-md-6">
                
                 <p style="text-align:justify;">
                      Soumita introduces itself as a leading business entity in the industry of Ajmer, India. We are actively engaged in manufacturing and supplying the best quality men’s Modi jackets which are well known for their fine quality, intricate designs, and alluring patterns. Our modi jackets have not just unbeatable fashion but also ever-lasting comfort. We have been operating in the industry since the year 2018 and have gained a decent popularity in the industry as well. Many patrons across Ajmer have purchased our products on a large scale which further adds to our credibility. The men’s Modi jacket delivered by us is popular for its variety of elegant designs which are hard to find otherwise. Moreover, we are blessed with a team of hardworking and dedicated professionals who have all the important knowledge of different operations and work related to their field. Our core value lies in catering the needs of our customers on an all-weather basis because they are the ultimate king of the market. Contact us now to connect and purchase our products at the most reasonable prices.
                  </p>
            </div>
        </div>
    </div>
    
     <div class="feat bg-gray pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="section-head col-sm-12">
          <h4><span>Why Choose</span> Us?</h4>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_one"><i class="fa fa-trophy"></i></span>
            <h6>Our legacy</h6>
            <p>We have been working in the industry for more than three years and have a continued legacy and great customer base.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_two"><i class="fa fa-anchor"></i></span>
            <h6>Expert executives.</h6>
            <p>We have hired all the executives after great scrutiny and that is why we have only the best of them.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_three"><i class="fa fa-hourglass-half"></i></span>
            <h6>Continued customer support.</h6>
            <p>We provide 24*7 customer support to our clients so that they never have to face any trouble alone.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_four"><i class="fa fa-check-square"></i></span>
            <h6>Best prices.</h6>
            <p>Our prices are the best in the market because our quality is also unbeatable. We aim to provide an amazing quality at the most affordable prices to our customers.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_five"><i class="fa fa-credit-card"></i></span>
            <h6>Easy payments.</h6>
            <p>We understand the necessity of our customers to get hassle-free payment modes and that is why we accept almost all the popular payment modes.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_six"><i class="fa fa-handshake"></i></span>
            <h6>Decent clientele.</h6>
            <p>We have long, shared history of trust with our customers and they are the main asset that we have acquired over all these years.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

    <?php include('templates/news-latter.php')?>
<?php include('templates/whatspp-btn.php')?>
<?php include('templates/live-chat.php')?>
    <!-- Start Footer -->
    <?php include('templates/footer.php')?>
    <!-- End Footer -->


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