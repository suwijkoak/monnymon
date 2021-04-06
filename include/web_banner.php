<?php
echo"<ol class='carousel-indicators'>";
echo"<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>";
echo"<li data-target='#carouselExampleIndicators' data-slide-to='1'></li>";
echo"<li data-target='#carouselExampleIndicators' data-slide-to='2'></li>";
echo"</ol>";
echo"<div class='carousel-inner' data-interval='100' >";
echo"<div class='carousel-item active'>";
  echo"<img class='d-block w-100' src='images/banner/banner1.jpg' alt='First slide' width='100%' height='500'>";
echo"</div>";
echo"<div class='carousel-item' data-interval='100' >";
  echo"<img class'd-block w-100' src='images/banner/banner2.jpg' alt='Second slide' width='100%' height='500'>";
echo"</div>";
echo"<div class='carousel-item' data-interval='100' >";
  echo"<img class='d-block w-100' src='images/banner/banner3.jpg' alt='Third slide' width='100%' height='500'>";
echo"</div>";
echo"</div>";
echo"<a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>";
echo"<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
echo"<span class='sr-only'>Previous</span>";
echo"</a>";
echo"<a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>";
echo"<span class='carousel-control-next-icon' aria-hidden='true'></span>";
echo"<span class='sr-only'>Next</span>";
echo"</a>";
?>