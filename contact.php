<?php
session_start();
if(empty($_SESSION['numProduct'])){
$_SESSION['numProduct']=0;
}

include("include/connect_db.php");
$con=connect_db();
// if (empty($_SESSION['intLine'])) {
//   $_SESSION['intLine']='0';
// }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/login.css" type="text/css"> 
</head>
<style>
  .img-center{
    margin: 0 auto;
    width: 50%;
  }

  </style>
  <body>
  
  <div class="site-wrap">
  <?php require_once ("include/header.php"); ?>

<!-- Slideshow container -->
<div id="carouselExampleIndicators" class="carousel slide img-center" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" data-interval="100" >
    <div class="carousel-item active">
      <img class="d-block w-100 " src="images/banner/banner1.jpg" alt="First slide" width="100%" height="500">
    </div>
    <div class="carousel-item" data-interval="100" >
      <img class="d-block w-100" src="images/banner/banner2.jpg" alt="Second slide"width="100%" height="500">
    </div>
    <div class="carousel-item" data-interval="100" >
      <img class="d-block w-100" src="images/banner/banner3.jpg" alt="Third slide" width="100%" height="500">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>ติดต่อเรา</h2>
          </div>
        </div>
        <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Monnymon&amp;t=p&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://piratebayproxy.net/">pirate bay proxy</a></div><style>.mapouter{position:relative;text-align:right;width:600px;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:400px;}.gmap_iframe {width:600px!important;height:400px!important;}</style></div>
        <P>ร้านอยู่ถนนจ่าบ้าน (ถนนหลังวัดเจดีย์หลวง) ร้านสีเขียวมีไวนิลสีบานเย็น</P>
      </div>
    </div>
    

    <div class="site-section block-8">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-5">
          <div class="embed-responsive embed-responsive-16by9" >
            <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLg2cUnlAgg1gUpoeB6YOK1u3EpI8pxdd8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-lg-6 col-md-7">
          <div class="video-content">
            <h3 class="text-black" align="center"> ติดตามคลิปใหม่ๆของทางร้านได้ที่<br>Youtube Channel<br> <a href="https://www.youtube.com/channel/UCqxR1JssE57uHVLPR6PnLyg">Monnymon Shop</a></h3>
          </div>
        </div>
      </div>
    </div>
    </div>
<?php  mysqli_close($con);?>
    <?php require_once ("include/footer.php"); ?>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main2.js"></script>
    
  <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
  </body>
</html>
