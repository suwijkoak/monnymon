<?php
if($_SESSION['valid_type']==1){ //ถ้า session valid_type ไม่ว่าง
	$user_type=admin2_menu();
	}elseif($_SESSION['valid_type']==2){
		$user_type=customer2_menu();
	}

	/*function select_menu2($type){
		switch($type){
			case "1" : admin2_menu();break;
			case "2" : customer2_menu();break;
		}
	}
	*/
	function admin2_menu(){
        //echo "<li><a href='index.php?module=tour&action=list_tour'><i class='fas fa fa-address-card'></i>รายการแข่ง</a></li>";
        echo "<li class='has-sub'>";
        echo                    "<a class='js-arrow' href='#'><i class='fas fa fa-user'></i>  ข้อมูลส่วนตัว</a>";
		echo                    "<ul class='navbar-mobile-sub__list list-unstyled js-sub-list'>";
		echo                        "<li>";
        echo                           "<a href='index.php?module=user&action=show_profile'>ข้อมูลส่วนตัว</a>";
        echo                        "</li>";
        // echo                        "<li>";
        // echo                           "<a href='index.php?module=user&action=profile'>แก้ไขข้อมูลส่วนตัว</a>";
        // echo                        "</li>";
        echo                        "<li>";
        echo                            "<a href='index.php?module=user&action=re_password'>เปลี่ยนรหัสผ่าน</a>";
        echo                        "</li>";
        /*echo                        "<li>";
        echo                            "<a href='forget-pass.html'>Forget Password</a>";
        echo                        "</li>";*/
        echo                    "</ul>";
        echo "<li><a href='index.php?module=topic&action=manage_topic_self'><i class='fas fa fa-address-card'></i>จัดการกระทู้ของตนเอง</a></li>";
        echo "<li><a href='index.php?module=topic&action=manage_topic_shop'><i class='fas fa fa-address-card'></i>จัดการกระทู้ร้าน</a></li>";
		echo "<li class='has-sub'>";
        echo                    "<a class='js-arrow' href='#'>";
        echo                    "<i class='fas fa fa-star'></i>จัดการการแข่ง</a>";
		echo                    "<ul class='navbar-mobile-sub__list list-unstyled js-sub-list'>";
		echo                        "<li>";
        echo                           "<a href='index.php?module=tour&action=list_tour'>เพิ่มรายการแข่ง</a>";
        echo                        "</li>";
        echo                        "<li>";
        echo                           "<a href='index.php?module=tour&action=tour_draw'>จับคู่การแข่งรอบเก็บคะแนน</a>";
        echo                        "</li>";
        echo                        "<li>";
        echo                            "<a href='index.php?module=user&action=re_password'>จับคู่การแข่งรอบคัดออก</a>";
        echo                        "</li>";
        /*echo                        "<li>";
        echo                            "<a href='forget-pass.html'>Forget Password</a>";
        echo                        "</li>";*/
        echo                    "</ul>";
		//echo "<li><a href='index.php?module=order&action=list_order'><i class='fas fa fa-address-card'></i>ข้อมูลการสั่งซื้อส่วนตัว</a></li>";

		echo "<li><a href='index.php?module=item&action=manage_item'><i class='fas fa fa-shopping-cart'></i> จัดการข้อมูลสินค้า</a></li>";
        echo "<li><a href='index.php?module=order&action=manage_order'><i class='fas fa fa-truck'></i>ตรวจสอบคำสั่งซื้อ</a></li>";
        echo "<li><a href='index.php?module=card&action=manage_card'><i class='fas fa fa-gamepad'></i>จัดการข้อมูลการ์ด</a></li>";
  	 	echo "<li><a href='index.php?module=user&action=manage_user'><i class='fas fa fa-address-card'></i>จัดการข้อมูลสมาชิก</a></li>";
   		//echo "<li><a href='#'><i class='fas fa fa-comments'></i>จัดการกระทู้</a></li>";
    	//echo "<li><a href='#'><i class='fas fa fa-star'></i>จัดการการแข่ง</a></li>";
		//echo "<li><a href='#'><i class='fas fa fa-dashboard'></i>สถิติ</a></li>";
		// echo "<li><a href='#'><i class='fas fa fa-file'></i>ออกรายงาน</a>";
		
	}

	function customer2_menu(){
        echo "<li class='has-sub'>";
		echo                    "<a class='js-arrow' href='#'>";
        echo                    "<i class='fas fa fa-user'></i>ข้อมูลส่วนตัว</a>";
		echo                    "<ul class='navbar-mobile-sub__list list-unstyled js-sub-list'>";
		echo                        "<li>";
        echo                           "<a href='index.php?module=user&action=show_profile'>ข้อมูลส่วนตัว</a>";
        echo                        "</li>";
        // echo                        "<li>";
        // echo                           "<a href='index.php?module=user&action=profile'>แก้ไขข้อมูลส่วนตัว</a>";
        // echo                        "</li>";
        echo                        "<li>";
        echo                            "<a href='index.php?module=user&action=re_password'>เปลี่ยนรหัสผ่าน</a>";
        echo                        "</li>";
        /*echo                        "<li>";
        echo                            "<a href='forget-pass.html'>Forget Password</a>";
        echo                        "</li>";*/
        echo                    "</ul>";
		echo "<li><a href='index.php?module=order&action=list_order'><i class='fas fa fa-address-card'></i>ข้อมูลการสั่งซื้อส่วนตัว</a></li>";
        echo "<li><a href='index.php?module=topic&action=manage_topic_self'><i class='fas fa fa-address-card'></i>จัดการกระทู้ของตนเอง</a></li>";
  	 	echo "<li><a href='index.php?module=user&action=manage_user'><i class='fas fa fa-address-card'></i>ประวัติการแข่ง</a></li>";
	}

?>
