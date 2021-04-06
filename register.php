
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
</head>

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
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
  <?php require_once ("include/header.php"); ?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="main.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">register</strong></div>
        </div>
      </div>
    </div> 

    
    <!------ Include the above in your HEAD tag ---------->
    
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->
    
        <!-- Icon -->
        <div class="image">
          <img src="images/mo.png" id="icon" alt="icon" />
        </div>

        <a ><h1 class="title">ลงทะเบียนสมัครสมาชิก</h1></a>

        <!-- Login Form -->
        <form method="post" id="regis" name="regis"action="module/user/regis_member.php" onSubmit="return check()";>  
          <input type="text" id="login" class="fadeIn second" name="id" placeholder="ID ที่จะใช้">
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
          <input type="password" id="chk_password" class="fadeIn third" name="chk_password" placeholder="ยืนยัน password อีกครั้ง">
          
          <input type="submit" class="fadeIn fourth" value="Log In">
          
        </form>
 
      </div>
    </div>

    
    <?php require_once ("include/footer.php"); ?>   <?php require_once ("include/footer.php"); ?>
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
  <script>
    function check(){
        if(document.regis.password.value!=document.regis.chk_password.value)
          {
              alert('ยืนยันรหัสผ่านไม่ถูกต้อง')
              
              return false;

          }
        
    }
  </script>

  </body>
</html>