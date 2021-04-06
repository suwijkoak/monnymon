<meta charset="UTF-8">
<?php
session_start();
include("include/connect_db.php");
  $con=connect_db();
  $topic = mysqli_query($con,"SELECT * FROM topics WHERE topic_id=$_GET[id]") or die("Sql Topics Error>>".mysqli_error($con));
  list($topic_id,$topic_name,$topic_text,$topic_pic,$topic_time,$topic_edit,$topic_member)=mysqli_fetch_row($topic);
  $name_out = strlen($topic_member) > 60 ? substr($topic_member,0,60)."..." : $topic_member;
  if(empty($topic_pic)){
    $topic_pic = "no-pic.jpg";
  }
  $user = mysqli_query($con,"SELECT m_num,m_id,m_pic FROM member WHERE m_id = '$topic_member'")or die("Sql Topics Member Error>>".mysqli_error($con));
  list($mem_num,$mem_id,$mem_pic)=mysqli_fetch_row($user);
  if(empty($mem_pic)){
    $mem_pic="start_icon.jpg";
  }
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
<html>
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
  .comment-post{
    padding-left : 25px;
    width:120%;
  }

  </style>
  <body>
  
  <div class="site-wrap">
  <?php require_once ("include/header.php"); ?>
  
  <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="main.php">Home</a> <span class="mx-2 mb-0">/</span><a href="webboard.php">Webboard</a> <span class="mx-2 mb-0">/</span><strong class="text-black"><?php echo "$topic_name" ?></strong></div>
          
        </div>
      </div>
    </div>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 style="font-size: 50px">Monnymon Webboard</h1>
    <h2 style="font-size: 25px">Topic:<?php echo"$topic_name";?></h2>
  </div>
</div>

<div class="container">
<div class="container-fluid mt-100">
     <div class="row">
       <?php
        echo "<div class='col-md-12'>
             <div class='card mb-4'>
                 <div class='card-header'>
                     <div class='media flex-wrap w-100 align-items-center'> <img src='images/user_images/$mem_pic' class='d-block ui-w-40 rounded-circle' alt='' width='100' height='100'>
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
         <h3 style="font-size : 35px">Comment</h3><br><br>
         <hr>
         <?php         
         echo"<div class='container-fluid mt-100'>";
         echo"<div class='container-fluid mt-100'>";
         $comment = mysqli_query($con,"SELECT * FROM comments WHERE quest_id='$topic_id'")or die("Sql Topics Comment Error>>".mysqli_error($con));
         while(list($comment_id,$comment_text,$comment_name,$comment_pic,$comment_time,$c_edited,$quest_id)=mysqli_fetch_row($comment)){
  $user = mysqli_query($con,"SELECT m_num,m_id,m_pic FROM member WHERE m_id = '$comment_name'")or die("Sql Topics Member Error>>".mysqli_error($con));
  list($mem_num,$mem_id,$mem_pic)=mysqli_fetch_row($user);
  if(empty($mem_pic)){
    $mem_pic="start_icon.jpg";
  }
  $name_out = strlen($comment_name) > 60 ? substr($comment_name,0,60)."..." : $comment_name;
  if(empty($comment_pic)){
    $comment_pic = "no-pic.jpg";
  }

              echo"<div class='row comment-post'>";
              echo"<div class='col-md-8'>";
             echo"<div class='card mb-4'>";
                 echo"<div class='card-header'>";
                     echo"<div class='media flex-wrap w-100 align-items-center'> <img src='images/user_images/$mem_pic' class='d-block ui-w-40 rounded-circle' alt='' width='100' height='100'>";
                         echo"<div class='media-body ml-3'> <div><a href='#' data-abc='true'> $name_out</a></div>";
                             echo"<div class='text-muted small'>$comment_time</div>";
                         echo"</div>";
                         echo"<div class='text-muted small ml-3'>";
                             echo"<div>Post since <strong>$comment_time</strong></div>";
                             echo"<div><strong>134</strong> posts</div>";
                             if(isset($_SESSION['valid_user'])){
                             if($name_out==$_SESSION['valid_user']){
                               $edit="<div><a href='delete_comment.php?cid=$comment_id&&qid=$quest_id' onclick='return confirm(\" คุณแน่ใจหรือไม่ ว่าจะลบคอมเม้นนี้ \")'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                               <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                             </svg></a>
                             <a href='edit_comment_form.php?cid=$comment_id&&qid=$quest_id'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                              <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                              <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                            </svg></a></div>";
                            echo "$edit";
                             }
                            }
                             else{
                               $edit = "";
                               echo "$edit";
                             }
                         echo"</div>";
                     Echo"</div>";
                 echo"</div>";
                 echo"<div class='card-body'>";
                     echo"<p>"; 
                     echo "$comment_text";
                     echo "</p>";
                 echo"</div>";
                 echo"<div class='card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3'>";
                 echo"<div class='px-4 pt-3'><h4>รูปถ่ายที่แนบมา</h4> <a  href='images/topic/$comment_pic' data-lightbox='example-1'><img src='images/topic/$comment_pic' height='150px'></a> </div>";
                echo"</div>";
                 ?>
             </div>
            <hr>
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
