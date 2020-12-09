<?php
session_start();

include("include/connect_db.php");
$con = connect_db();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

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
      </style>
  </head>
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
     
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="main.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5"><a href="shop.php">Shop All</a></h2></div>
                <?php 

                if(empty($_POST['search'])){ //ถ้ามีการส่งค่าตัวแปร get_search มาจากช่องค้นหา
                    $search="";
                    //นำค่ามาเก็บไว้ในตัวแปรแล้วค่อยนำไปใช้
                }
                else{
                    $search=$_POST['search'];
                }
                if(empty($_GET['cate'])){
                    $cate="";
                }else{
                    $cate=$_GET['cate'];
                }

                $result=mysqli_query($con,"SELECT product_name FROM product WHERE product_name LIKE '%$search%' ")or die("SQL Error==>".mysqli_error($con));
                $item1=mysqli_query($con,"SELECT product_name FROM product WHERE product_category ='1' ")or die("SQL Error==>".mysqli_error($con));
                $item2=mysqli_query($con,"SELECT product_name FROM product WHERE product_category ='2' ")or die("SQL Error==>".mysqli_error($con));
                $item3=mysqli_query($con,"SELECT product_name FROM product WHERE product_category ='3' ")or die("SQL Error==>".mysqli_error($con));
                $rowsI1=mysqli_num_rows($item1);
                $rowsI2=mysqli_num_rows($item2);
                $rowsI3=mysqli_num_rows($item3);

                    $rows=mysqli_num_rows($result); //ใช้นับจำนวนแถวที่คิวรี่หรือซีเลคออกมาได้ พารามิเตอร์ 1 ตัวคือ ชื่อตัวแปรที่ใช้คิวรี่ รีเทิร์นค่าออกมาเป็นจำนวนแถวที่นับได้เป็นจำนวนเต็ม
                    $rows_page=20; //จำนวนแถวที่ต้องการให้แสดงใน 1 หน้า
                    $pages=ceil($rows/$rows_page); //จำนวนหน้าหาจาก (จำนวนแถว หาร จำนวนแถวต่อหน้า)ปัดเศษขึ้น *ceil
                    
                    if(isset($_GET['pid'])){ //ตรวจสอบว่ามีการส่งค่า หมายเลขหน้ามาหรือไม่
                        $pid=$_GET['pid']; //หมายเลขหน้าที่ส่งมาจาก link
                        $start_rows=($pid-1)*$rows_page; //คำนวณหาแถวแรกแต่ละหน้า
                    }
                    else{ //ถ้าไม่มีการคลิก link เลขหน้า
                        $pid=1; //กำหนดหน้า เป็นหน้าแรก
                        $start_rows=0; //แถวแรก
                    }
                    
                    
                    if($rows==0){ //ถ้าคำค้นไม่ตรงกับสินค้าใดๆ
                        echo "<p>ไม่พบสินค้าที่ตรงกับคำค้น</p>";
                    }
                    else{
                            echo "<p>จำนวนสินค้าทั้งหมดที่ตรงกับคำค้น $rows รายการ</p>";?>

                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Latest
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" value="2" href="#">Card Packs</a>
                      <a class="dropdown-item" value="3" href="#">Supply</a>
                      <a class="dropdown-item" value="1" href="#">Single Card</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="#">Relevance</a>
                      <a class="dropdown-item" href="#">Name, A to Z</a>
                      <a class="dropdown-item" href="#">Name, Z to A</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Price, low to high</a>
                      <a class="dropdown-item" href="#">Price, high to low</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5">
<?php                        


            $result=mysqli_query($con,"SELECT product_id,product_name,product_category,product_price,product_num,product_pic FROM product WHERE product_category LIKE '%$cate%'
            ORDER BY product_name DESC LIMIT $start_rows,$rows_page ")or die("Sql Error>>".mysqli_error($con));
            
            
    while(list($pro_id,$pro_name,$pro_cate,$pro_price,$pro_num,$pro_pic)=mysqli_fetch_row($result)){
        $name_out = strlen($pro_name) > 60 ? substr($pro_name,0,60)."..." : $pro_name;

        echo      "<div class='col-sm-6 col-lg-4 mb-4' data-aos='fade-up'>";
        echo        "<div class='block-4 text-center border'>";
        echo          "<figure class='block-4-image'>";
        echo            "<a href='shop-single.php?&id=$pro_id'><img src='images/$pro_pic' alt='Image placeholder' class='img-fluid'></a>";
        echo          "</figure>";
        echo          "<div class='block-4-text p-4'>";
        echo            "<h3><a href='shop-single.html'>$name_out</a></h3>";
        echo            "<p class='mb-0'>Finding perfect t-shirt</p>";
        echo            "<p class='text-primary font-weight-bold'>$pro_price  บาท</p>";
        echo          "</div>";
        echo        "</div>";
        echo      "</div>";
    }
            
        echo       "</div>";
                } 
            mysqli_close($con);
            ?>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="shop_cate.php?cate=2" class="d-flex"><span>Card Packs</span> <span class="text-black ml-auto">(<?php echo $rowsI2; ?>)</span></a></li>
                <li class="mb-1"><a href="shop_cate.php?cate=3" class="d-flex"><span>Supply</span> <span class="text-black ml-auto">(<?php echo $rowsI3; ?>)</span></a></li>
                <li class="mb-1"><a href="shop_cate.php?cate=1" class="d-flex"><span>Single Card</span> <span class="text-black ml-auto">(<?php echo $rowsI1; ?>)</span></a></li>
              </ul>
            </div>

            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              </div>

            </div>
          </div>
        </div>

        
        
        <div class="site-section site-blocks-2">
          <div class="container">
            <div class="row justify-content-center  mb-5">
              <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Categories</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                <a class="block-2-item" href="#">
                  <figure class="image">
                    <img src="images/women.jpg" alt="" class="img-fluid">
                  </figure>
                  <div class="text">
                    <span class="text-uppercase">Collections</span>
                    <h3>Card Packs</h3>
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                <a class="block-2-item" href="#">
                  <figure class="image">
                    <img src="images/children.jpg" alt="" class="img-fluid">
                  </figure>
                  <div class="text">
                    <span class="text-uppercase">Collections</span>
                    <h3>Supply</h3>
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                <a class="block-2-item" href="#">
                  <figure class="image">
                    <img src="images/men.jpg" alt="" class="img-fluid">
                  </figure>
                  <div class="text">
                    <span class="text-uppercase">Collections</span>
                    <h3>Single Card</h3>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
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
  <script src="js/slideshow.js"></script>
  <script src="js/main2.js"></script>
    
  </body>
</html>