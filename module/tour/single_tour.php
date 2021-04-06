<?php
if(empty($_SESSION['valid_user']) or $_SESSION['valid_type']!=1 ){
		echo "<script>alert('สิทธิ์ไม่ถถูกต้อง')</script>";
    echo "<script>window.location='index.php'</script>";
  }
  
  $num_player=$_POST['num_player'];
  $num_round=$_POST['num_player'];
  $round=$num_player-1;
  $num=1;
  $main_round=0;
  do{
    $num_round=ceil($num_round/2);
    $main_round++;}
while($num_round>1);


if($main_round==4){
  $draw=mysqli_query($con,"SELECT player_id FROM tour_player WHERE tour_no ='$_SESSION[tour_id]' ORDER by total_score DESC ,player_name ASC LIMIT $num_player ")or die("Sql Error>>".mysqli_error($con));
  $members=array();
  while(list($pid)=mysqli_fetch_row($draw)){
   
   array_push($members,"$pid");

 }
  print_r($members);
  echo "$members[1]";
 }






  for($i=0;$i<$round;$i++){
    
    mysqli_query($con,"INSERT INTO single_tour(t_id,round_id) VALUES
    ('$_SESSION[tour_id]',
    '$num')") or die("SQL Error==>".mysqli_error($con));
    $num++;
  }
  
  echo "<script>alert('จัดคู่การแข่งรอบตัดเชือกเรียบร้อย')</script>";
  echo "<script>window.location='index.php?module=tour&action=match&tid=$_SESSION[tour_id]'</script>"
  
  
  
  
  
  ?>