<?php
session_start();
include("include/connect_db.php");
  $con=connect_db();
  $topic = mysqli_query($con,"SELECT * FROM topics WHERE topic_id=$_GET[id]") or die("Sql Topics Error>>".mysqli_error($con));
  list($topic_id,$topic_name,$topic_text,$topic_pic,$topic_time,$topic_member)=mysqli_fetch_row($topic);
  $name_out = strlen($topic_member) > 60 ? substr($topic_member,0,60)."..." : $topic_member;
  if(empty($topic_pic)){
    $topic_pic = "no-pic.jpg";
  }
  $user = mysqli_query($con,"SELECT m_num,m_id,m_pic FROM member WHERE m_id = '$topic_member'")or die("Sql Topics Member Error>>".mysqli_error($con));
  list($mem_num,$mem_id,$mem_pic)=mysqli_fetch_row($user);
  if(empty($_SESSION['valid_user'])){
    $valid_user = "";
    $dis = "disabled";
    $read = "readonly";
  }
  else{
    $valid_user = $_SESSION['valid_user'];
    $dis = "";
    $read = "";
  }
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
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="css/lightbox.css">
</head>
<style>
      .zoom {
          transition: transform .2s; /* Animation */
          width: 200px;
          height: 130px;
          margin: 0 auto;
      }
      .zoom:hover {
          transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
      }
      .bg-btn{
        background-color: initial;
        border: none;
      }
      .mySlides {display:none;}
      
      
      </style>

  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <img src="images/header-logo.png">
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <img src="images/mo.png" class="rounded mx-auto d-block w-50">
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <div class="row">
                  <div class="col-md-7 d-flex-justify-content-end">
                  <form method="post" action="shop.php" class="site-block-top-search">
                      <span class="icon icon-search2 ml-2"></span>
                      <input style="border-radius: 20px;" type="" name="search" class="form-control" placeholder="Search">
                    </form>
                  </div>
                  
                  <?php
                    if(empty($_SESSION['valid_user'])){//ถ้ายังไม่ login  
                      echo "<a href='login_shop.php'><h2><span class='icon icon-person'></span>เข้าสู่ระบบ</h2></a>";
                        }else{
                           $nameuser=$_SESSION['valid_name'];
                           $nameuser_o = strlen($nameuser) > 5 ? substr($nameuser,0,5)."..." : $nameuser;
                         ?>
                         <button class="btn btn-secondary dropdown-toggle icon-person" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             
                         <?php echo $nameuser_o ?>
                        </button>
                        <?php
                         include("include/shop_func.php")
                          //แสดงเมนูของ user ใน Type นั้น
                          ?>
                          <nav>
                         <?php 
                         select_menu($_SESSION['valid_type']);//แสดงเมนูของแต่ละ level 
                         ?>
                         </nav>
                         <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>-->
                     <?php          
                      }
                    ?>
	
                  <div class="col-md-5">
                    <ul>
                      <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                    </ul>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div> 
        <div class="container"> 
        <div class="row mt-5">
        <?php
          include("include/web_menu.php");
          ?>
        </div>
        </div>
    </header>

<!-- Slideshow container -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" data-interval="100" >
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/hero-1.jpg" alt="First slide" width="100%" height="500">
    </div>
    <div class="carousel-item" data-interval="100" >
      <img class="d-block w-100" src="images/hero-2.jpg" alt="Second slide"width="100%" height="500">
    </div>
    <div class="carousel-item" data-interval="100" >
      <img class="d-block w-100" src="images/bs.jpg" alt="Third slide" width="100%" height="500">
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
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Monnymon Webboard</h1>
    <h2>Topic:<?php echo"$topic_name";?></h2>
  </div>
</div>

<div class="container">
<div class="container-fluid mt-100">
     <div class="row">
       <?php
        echo "<div class='col-md-12'>
             <div class='card mb-4'>
                 <div class='card-header'>
                     <div class='media flex-wrap w-100 align-items-center'> <img src='images/$mem_pic' class='d-block ui-w-40 rounded-circle' alt='' width='150' height='100'>
                         <div class='media-body ml-3'> <a href='#' data-abc='true'>$topic_member</a>
                             <div class='text-muted small'>$topic_time</div>
                         </div>
                         <div class='text-muted small ml-3'>
                             <div>Post since <strong>$topic_time</strong></div>
                             <div><strong>134</strong> posts</div>
                         </div>
                     </div>
                 </div>
                 <div class='card-body'>
                     <p> 
                     $topic_text
                     </p>
                 </div>
                 <div class='card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3'>
                     <div class='px-4 pt-3'><h4>รูปถ่ายที่แนบมา</h4> <a  href='images/topic/$topic_pic' data-lightbox='example-1'><img src='images/topic/$topic_pic' height='150px'></a> </div>
                 </div>";
                 ?>
             </div>
         </div>
         <h3>Comment</h3>
         <hr>
         <?php
         $comment = mysqli_query($con,"SELECT * FROM comments WHERE quest_id='$topic_id'")or die("Sql Topics Comment Error>>".mysqli_error($con));
         while(list($comment_id,$comment_text,$comment_name,$comment_pic,$comment_time,$quest_id)=mysqli_fetch_row($comment)){
  $user = mysqli_query($con,"SELECT m_num,m_id,m_pic FROM member WHERE m_id = '$comment_name'")or die("Sql Topics Member Error>>".mysqli_error($con));
  list($mem_num,$mem_id,$mem_pic)=mysqli_fetch_row($user);
  $name_out = strlen($comment_name) > 60 ? substr($comment_name,0,60)."..." : $comment_name;
  if(empty($comment_pic)){
    $topic_pic = "no-pic.jpg";
  }
         echo"<div class='container-fluid mt-100'>
              <div class='row'>
              <div class='col-md-8'>
             <div class='card mb-4'>
                 <div class='card-header'>
                     <div class='media flex-wrap w-100 align-items-center'> <img src='images/$mem_pic' class='d-block ui-w-40 rounded-circle' alt='' width='150' height='100'>
                         <div class='media-body ml-3'> <div><a href='#' data-abc='true'> $name_out</a></div>
                             <div class='text-muted small'>$comment_time</div>
                         </div>
                         <div class='text-muted small ml-3'>
                             <div>Post since <strong>$comment_time</strong></div>
                             <div><strong>134</strong> posts</div>
                         </div>
                     </div>
                 </div>
                 <div class='card-body'>
                     <p> 
                     $comment_text
                     </p>
                 </div>
                 <div class='card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3'>
                 <div class='px-4 pt-3'><h4>รูปถ่ายที่แนบมา</h4> <a  href='images/topic/$comment_pic' data-lightbox='example-1'><img src='images/topic/$comment_pic' height='150px'></a> </div>
                 </div>";
                 ?>
             </div>
            
         </div>
         </div>
         <?php } ?>
         <hr>
         <div class="container">
         <div class="row">
       <?php
        echo "
	<div class='col-md-12'>
             <div class='card mb-4'>
                 <div class='card-header'>
                     <div class='media flex-wrap w-100 align-items-center'>
                      <h3>Comment Form</h3> 
                     </div>
                 </div>
             </div>
                 <div class='card-body'>
                 <form method='post' action='add_comment.php' enctype='multipart/form-data'>
                     		<input type='hidden' id='topic_id' name='topic_id' value='$topic_id'>
                     		<input type='hidden' id='comment_name' name='user_name' value='$valid_user'>
                     	<div class='form-group'>
                        	<label for='exampleFormControlTextarea1'>แสดงความคิดเห็น</label>
                        	<textarea class='form-control' id='comment' name='comment' rows='3' placeholder='Add comment' $read></textarea>
                      	</div>
                      		<label for='exampleFormControlFile1'>อัพโหลดรูปภาพ</label>
                      		<input type='file' class='form-control-file' name='c_pic' $dis>
                 	<div class='card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3'>
                     		<div class='px-4 pt-3'><input type='reset' value='Reset'$dis><input type='submit' value='Submit' id='submit' $dis> </div>
                 	</div>
                   </from>";
              ?>
             	</div>
         </div>
         
 
  

  

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="#" class="block-6">
              <img src="images/hero_1.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Finding Your Perfect Shoes</h3>
              <p>Promo from  nuary 15 &mdash; 25, 2019</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main2.js"></script>
  <script src='js/jquery-1.11.0.min.js'></script>
<script src='js/lightbox.js'></script>
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
  <?php
  mysqli_free_result($user);
  mysqli_free_result($topic);
  mysqli_close($con);
  ?>
</html>
