<?php
if(empty($_SESSION['valid_user']) or $_SESSION['valid_type']!=1 ){
		echo "<script>alert('สิทธิ์ไม่ถถูกต้อง')</script>";
    echo "<script>window.location='index.php'</script>";
  }
$p_id=$_POST['pid'];
$m1=$_POST['m1'];
$m2=$_POST['m2'];
$m3=$_POST['m3'];

$score1=$_POST['score1'];
$score2=$_POST['score2'];
$score3=$_POST['score3'];
if($score1==1){
  $enamy1=2;
}elseif($score1==2){
  $enamy1=1;
}
if($score2==1){
  $enamy2=2;
}elseif($score2==2){
  $enamy2=1;
}
if($score3==1){
  $enamy3=2;
}elseif($score3==2){
  $enamy3=1;
}

?>
<meta charset="utf-8">
<?php



if($m1==0){
  echo "<script>alert('ยังไม่มีการจับคู่')</script>";
  echo "<script>window.location='index.php?module=tour&action=match&tid=$_SESSION[tour_id]'</script>" ;
}elseif($m2==0 AND $m3==0){
  $sql="UPDATE tour_player SET
    score1=$score1,
    score2=$score2,
    score3=$score3
  WHERE player_id='$p_id' AND tour_no='$_SESSION[tour_id]' " ;
  mysqli_query($con,$sql) or die("SQL Error==>".mysqli_error($con));

  $sql2="UPDATE tour_player SET
    score1=$enamy1
  WHERE player_id='$m1' AND tour_no='$_SESSION[tour_id]' " ;
  mysqli_query($con,$sql2) or die("SQL Error==>".mysqli_error($con));
  
  // echo "<script>alert('อัพเดทเสร็จสิ้น1')</script>";
  echo "<script>window.location='index.php?module=tour&action=score_cal&tid=$_SESSION[tour_id]&&pid=$p_id&m1=$m1&m2=$m2&m3=$m3'</script>" ;
  
}elseif($m3==0){
  $sql="UPDATE tour_player SET
    score1=$score1,
    score2=$score2,
    score3=$score3
  WHERE player_id='$p_id' AND tour_no='$_SESSION[tour_id]' " ;
  mysqli_query($con,$sql) or die("SQL Error==>".mysqli_error($con));

  $sql2="UPDATE tour_player SET
    score1=$enamy1
  WHERE player_id='$m1' AND tour_no='$_SESSION[tour_id]' " ;
  mysqli_query($con,$sql2) or die("SQL Error==>".mysqli_error($con));

  $sql3="UPDATE tour_player SET
    score2=$enamy2
  WHERE player_id='$m2' AND tour_no='$_SESSION[tour_id]' " ;
  mysqli_query($con,$sql3) or die("SQL Error==>".mysqli_error($con));
  
  // echo "<script>alert('อัพเดทเสร็จสิ้น2')</script>";
  echo "<script>window.location='index.php?module=tour&action=score_cal&tid=$_SESSION[tour_id]&&pid=$p_id&m1=$m1&m2=$m2&m3=$m3'</script>" ;
}else{
  $sql="UPDATE tour_player SET
  score1=$score1,
  score2=$score2,
  score3=$score3
  WHERE player_id='$p_id' AND tour_no='$_SESSION[tour_id]' " ;
  mysqli_query($con,$sql) or die("SQL Error==>".mysqli_error($con));

  $sql2="UPDATE tour_player SET
    score1=$enamy1
  WHERE player_id='$m1' AND tour_no='$_SESSION[tour_id]' " ;
  mysqli_query($con,$sql2) or die("SQL Error==>".mysqli_error($con));

  $sql3="UPDATE tour_player SET
    score2=$enamy2
  WHERE player_id='$m2' AND tour_no='$_SESSION[tour_id]' " ;
  mysqli_query($con,$sql3) or die("SQL Error==>".mysqli_error($con));

  $sql4="UPDATE tour_player SET
    score3=$enamy3
  WHERE player_id='$m3' AND tour_no='$_SESSION[tour_id]' " ;
  mysqli_query($con,$sql4) or die("SQL Error==>".mysqli_error($con));

  // echo "<script>alert('อัพเดทเสร็จสิ้น3')</script>";
  echo "<script>window.location='index.php?module=tour&action=score_cal&tid=$_SESSION[tour_id]&pid=$p_id&m1=$m1&m2=$m2&m3=$m3'</script>" ;
}



//mysqli_query($con,$a)or die("SQL Error1==>".mysqli_error($con));

mysqli_close($con);
?>