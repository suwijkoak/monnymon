<?php

if(empty($_SESSION['valid_user']) or $_SESSION['valid_type']!=1){
		echo "<script>alert('สิทธิ์ไม่ถถูกต้อง')</script>";
    echo "<script>window.location='index.php'</script>";
  }

?>
<?php
	/*include("include/connect_db.php");
	$con=connect_db();*/
	mysqli_query($con,"DELETE FROM card_list
	WHERE card_id='$_GET[id]' ")or die("SQL Error1==>".mysqli_error($con));

	
	mysqli_close($con);

?>
<script>alert('ลบการ์ดเสร็จสิ้น')</script>
<script>window.location='index.php?module=card&action=manage_card'</script>