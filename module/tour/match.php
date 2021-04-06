
<?php


if(empty($_SESSION['valid_user']) or $_SESSION['valid_type']!=1){
		echo "<script>alert('สิทธิ์ไม่ถถูกต้อง')</script>";
    echo "<script>window.location='index.php'</script>";
  }
  //$id=$_GET['tid'];
    $_SESSION['tour_id']=$_GET['tid'];

 
?>
<meta charset="UTF-8">
<div class='site-section'>
      <div class='container'>
        <div class='row'>
          <div class='col-md-12 text-center'>
<?php

	//select ข้อมูลโดยกำหนดเงื่อนไขให้ตรงกับคำค้น
	$result=mysqli_query($con,"SELECT player_id FROM tour_player WHERE tour_no = $_SESSION[tour_id] ")or die("SQL Error1==>".mysqli_error($con));
	$totalscore=0;
	$rows=mysqli_num_rows($result); //ใช้นับจำนวนแถวที่คิวรี่หรือซีเลคออกมาได้ พารามิเตอร์ 1 ตัวคือ ชื่อตัวแปรที่ใช้คิวรี่ รีเทิร์นค่าออกมาเป็นจำนวนแถวที่นับได้เป็นจำนวนเต็ม
  $result2=mysqli_query($con,"SELECT tour_name,tour_max,tour_endregis FROM tournament WHERE tour_no = $_SESSION[tour_id] ")or die("Sql Error>>".mysqli_error($con));
  while(list($t_name,$t_max,$t_end)=mysqli_fetch_row($result2)){
      echo "<h1>$t_name</h1><br><br>";
  if($rows==0){ //ถ้าคำค้นไม่ตรงกับสินค้าใดๆ
    echo "<p><b>ยังไม่มีผู้สมัคร</b></p><br>";

    echo "<div class='text-center'>";
    echo "<a href='index.php?module=tour&action=add_player_form' ><button type='button' class='btn btn-success btn-ra' style=' padding: 20px 20px; font-size:20px;' ><i>ลงทะเบียนออฟไลน์</i>&nbsp;</button></a>";
    echo "</div><br>";
	}
	else{
		echo "<p>จำนวนรายการแข่งทั้งหมดที่ตรงกับคำค้น $rows รายการ</p><br>";
	
  // $result=mysqli_query($con,"SELECT player_id,player_name,player_lastname,day_regis,match1,match2,match3,score1,score2,score3,total_score FROM tour_player WHERE tour_no = $_SESSION[tour_id] ORDER BY total_score DESC ,player_name ASC")or die("Sql Error>>".mysqli_error($con));
  $result=mysqli_query($con,"SELECT player_id,player_name,player_lastname,day_regis,match1,match2,match3,score1,score2,score3,total_score FROM tour_player WHERE tour_no = $_SESSION[tour_id]")or die("Sql Error>>".mysqli_error($con));
?>	
	
		<div class="table-responsive table--no-card m-b-30">
			<table class="table table-borderless table-striped table-earning">
				<thead>
			<?php

  echo"<tr><th style='text-align:center;'width='5%'>รหัส</th>
  <th style='text-align:center;'>ชื่อผู้สมัคร</th>
  <th style='text-align:center;'>วันที่ลงทะเบียน</th>
  <th style='text-align:center;'>คะแนนรวม</th>
  <th style='text-align:center;'>ผลการจับคู่</th></tr>";
?>	
				</thead>
	<tbody>
	<?php
	while(list($p_id,$p_name,$p_lastname,$p_regis,$m1,$m2,$m3,$score1,$score2,$score3,$total_score)=mysqli_fetch_row($result)){
  
	//echo $data [0],"-"; //การ eco array ต้องมี index
	echo "<td style='text-align:center;'>$p_id</td>"; 
	//echo "<td><a href='product_detail.php?id=$product_id'>$product_title</a></td>"; //แบบ GET ไม่มี $ข้างหน้า
  echo "<td style='text-align:center;'>$p_name  $p_lastname</td>";
  echo "<td style='text-align:center;'>$p_regis</td>";
  echo "<td style='text-align:center;'>$total_score</td>";
  
    
?>	
<td style='text-align:center;'><p><button data-toggle="modal" data-target="#contact<?php echo $p_id ?>"  class="btn btn-primary">DETAIL</button></p></td>

              <div class="modal hide fade in" id="contact<?php echo $p_id ?>" > 
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                                    </div>
                                        <div class="modal-body ">
                                        <form action="index.php?module=tour&action=update_score" method="post" enctype="multipart/form-data" class="form-horizontal">
                                          <?php 
                                              // $p_match=mysqli_query($con,"SELECT match1,match2,match3 FROM tour_player WHERE player_id =" + set_id($pid))or die("Sql Error1>>".mysqli_error($con));
                                              // list($m1,$m2,$m3)=mysqli_fetch_row($p_match);
                                              echo "<input type='hidden' name ='pid' value='$p_id'> ";
                                              echo "<input type='hidden' name='m1' value='$m1'> ";
                                              echo "<input type='hidden' name='m2' value='$m2'> ";
                                              echo "<input type='hidden' name='m3' value='$m3'> ";
                                              if(!empty($m1)){
                                                  echo "<label>รอบที่1</label>";
                                                  if($m1==1 || $m1==001){
                                                  echo "<br><b>ชนะบาย</b> <input type='hidden' name='score1' value='1'>" ;
                                                }else{
                                                  echo "<br>คู่แข่ง คือ <b>$m1</b> &nbsp;&nbsp;&nbsp;" ; 
                                                            if($score1<=0){
                                                              
                                                              echo "<select name='score1' >";
                                                            // if($score1==1){
                                                            //   $sl='selected  ';
                                                            //   $sl2='';
                                                            // }
                                                            // elseif($score1==2){					
                                                            //   $sl2='selected  ';
                                                            //   $sl='';
                                                            // }else{
                                                            //   $sl='';
                                                            //   $sl2='';
                                                            // }
                                                              
                                                              echo "<option value=1 >ชนะ</option>";
                                                              echo "<option value=2 >แพ้</option>";
                                                              echo    "</select>";
                                                            } elseif($score1==1){	
                                                              echo "===> ชนะ <input type='hidden' name='score1' value='1' >";
                                                            }else{
                                                              echo "===> แพ้ <input type='hidden' name='score1' value='2' >";
                                                            }
                                                          
                                                 
                                                }
                                                 
                                                          }else{ 
                                                            echo "ยังไม่มีการจับคู่";
                                                            echo "<input type='hidden' name='score3' value='0'>";
                                                            
                                                          }
                                                  if(!empty($m2)){
                                                  echo "<br>----------<br>";     
                                                  if($m2==1 || $m2==001){
                                                    echo "<b>ชนะบาย</b><input type='hidden' name='score2' value='1' >" ;
                                                  }else{
                                                    echo "คู่แข่ง คือ <b>$m2</b> &nbsp;&nbsp;&nbsp;" ;
                                                            if($score2==0){
                                                              
                                                              echo "<select name='score2' >";
                                                            // if($score2==1){
                                                            //   $sl3='selected disabled ';
                                                            //   $sl4='';
                                                            // }
                                                            // elseif($score2==2){					
                                                            //   $sl4='selected  ';
                                                            //   $sl3='';
                                                            // }else{
                                                            //   $sl3='';
                                                            //   $sl4='';
                                                            // }
                                                              
                                                              echo "<option value=1 >ชนะ</option>";
                                                              echo "<option value=2 >แพ้</option>";
                                                              echo    "</select>";
                                                            } elseif($score2==1){	
                                                              echo "===> ชนะ <input type='hidden' name='score2' value='1' >";
                                                            }else{
                                                              echo "===> แพ้ <input type='hidden' name='score2' value='2' >";
                                                            }
                                                          
                                                  
                                                  }
                                                  
                                                          }else{
                                                            echo "<input type='hidden' name='score2' value='0'>";
                                                          }
                                                  if(!empty($m3)){
                                                  echo "<br>----------<br>";
                                                  if($m3==1 || $m3==001){
                                                    echo "<b>ชนะบาย</b> <input type='hidden' name='score3' value='1'>" ;
                                                  }else{
                                                    echo "คู่แข่ง คือ <b>$m3</b> &nbsp;&nbsp;&nbsp;" ;
                                                            if($score3==0){
                                                              
                                                              echo "<select name='score3' >";
                                                            // if($score3==1){
                                                            //   $sl5='selected disabled ';
                                                            //   $sl6='disabled';
                                                            // }
                                                            // elseif($score3==2){					
                                                            //   $sl6='selected disabled ';
                                                            //   $sl5='disabled';
                                                            // }else{
                                                            //   $sl5='';
                                                            //   $sl6='';
                                                            // }
                                                              
                                                              echo "<option value=1 >ชนะ</option>";
                                                              echo "<option value=2 >แพ้</option>";
                                                              echo    "</select>";
                                                            } elseif($score3==1){	
                                                              echo "===> ชนะ <input type='hidden' name='score3' value='1' >";
                                                            }else{
                                                              echo "===> แพ้ <input type='hidden' name='score3' value='2' >";
                                                            }
                                                          
                                                         
                                                  
                                                  }
                                                  
                                                          }else{
                                                            echo "<input type='hidden' name='score3' value='0'>";
                                                          }
                                                  echo "<br>";
                                          ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success" id="submit"><i class="glyphicon glyphicon-inbox"></i> Submit</button>
                                        </div>
                                        </form>
                                </div>
                              </div>
                            </div>

<?php
	
	echo "</tr>";
	}
  echo "</table>";

} //ปิดเงื่อนไข else ไม่ให้เห็นหัวตาราง (บรรทัด 43)
  }
 	?>
 	</tbody>
            </table>
        </div>
        </div>
      </div>
    </div> 
    <?php
    
    $cm1=0;$sc1=0;
    $cm2=0;$sc2=0;
    $cm3=0;$sc3=0;
    $cm4=0;$sc4=0;
 $result2=mysqli_query($con,"SELECT match1,match2,match3,score1,score2,score3 FROM tour_player WHERE tour_no = $_SESSION[tour_id] ")or die("Sql Error>>".mysqli_error($con));
 while(list($m1,$m2,$m3,$score1,$score2,$score3)=mysqli_fetch_row($result2)){
        if($m1==0){
          $cm1++;
        }
        if($m2==0){
          $cm2++;
        }
        if($m3==0){
          $cm3++;
        }
        if($score1==0){
          $sc1++;
        }
        if($score2==0){
          $sc2++;
        }
        if($score3==0){
          $sc3++;
        }
        $cm4++;$sc4++;
 }

 $regis=mysqli_query($con,"SELECT tour_max,tour_endregis FROM tournament WHERE tour_no ='$_SESSION[tour_id]' ")or die("Sql Error>>".mysqli_error($con));
 while(list($t_max,$t_end)=mysqli_fetch_row($regis)){

     if($rows < $t_max && $cm1>0){
       echo "<div class='text-center'>";
      echo "<a href='index.php?module=tour&action=add_player_form' ><button type='button' class='btn btn-success btn-ra' style=' padding: 20px 20px; font-size:20px;' ><i>ลงทะเบียนออฟไลน์</i>&nbsp;</button></a>";
      echo "</div><br>";
     }else{
    
     }
 }
 if($cm1>0) {
  echo "<div class='text-center'>";
   echo "&nbsp;<a href='index.php?module=tour&action=gen_match&id=$_SESSION[tour_id]&&match=1'><button type='button' class='btn btn-primary'style=' padding: 10px 10px; font-size:16x;' ><i>สุ่มคู่การแข่งรอบแรก</i>&nbsp;</button></a>&nbsp;";
   echo "</div>";echo "</div>";
 }elseif($cm2>0 && $sc1==0){
  echo "<div class='text-center'>";
   echo "&nbsp;<a href='index.php?module=tour&action=gen_match&id=$_SESSION[tour_id]&&match=2'><button type='button' class='btn btn-primary' style=' padding: 20px 10px; font-size:116px;'><i>สุ่มคู่การแข่งรอบสอง</i>&nbsp;</button></a>&nbsp;";
   echo "</div>";
 }elseif($cm3>0 && $sc2==0){
  echo "<div class='text-center'>";
   echo "&nbsp;<a href='index.php?module=tour&action=gen_match&id=$_SESSION[tour_id]&&match=3'><button type='button' class='btn btn-primary' style=' padding: 20px 10px; font-size:16px;'><i>สุ่มคู่การแข่งรอบสาม</i>&nbsp;</button></a>&nbsp;";
   echo "</div>";
 }
 
 if($rows==0){ //ถ้าคำค้นไม่ตรงกับสินค้าใดๆ
 
}else{
  if($cm3==0 && $sc3==0){
    echo "<div class='text-center'>";
    echo "<form action='index.php?module=tour&action=single_tour&id=$_SESSION[tour_id]' method='post' enctype='multipart/form-data' class='form-horizontal'>";
    
    $num=2;
    $i=0;
    echo "<h4>กำหนดจำนวนผู้เข้ารอบตัดเชือก<h4>";
    echo "<select name='num_player' id='num_player'>";
    for($i=0;$i<16;$i++){
        echo "<option value='$num'>$num</option>";
        $num++;
    }
  
    
    echo "</select>";
     echo " <button class='btn btn-primary' id='submit'><i class='glyphicon glyphicon-inbox'></i> Submit</button>";
    echo"</form>";
   }
   echo "</div>";
}
  echo "<br>";
  
    mysqli_close($con);

    ?>
</div>
