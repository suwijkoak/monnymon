<?php



?>

          <?php 
            $id=$_GET['id'];
                        

          $item_show=mysqli_query($con,"SELECT * FROM product WHERE product_id='$id' ")or die("Sql Error1>>".mysqli_error($con));
          list($pro_id,$pro_name,$pro_cate,$pro_detail,$pro_price,$pro_sprice,$pro_num,$pro_pic)=mysqli_fetch_row($item_show);
          
          ?>
    <div class="site-section">
      <div class="container">
      <form action="order.php" method="post">
        <div class="row">
          <div class="col-md-6">
            <img src="images/<?php echo $pro_pic; ?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $pro_name; ?></h2>
            <p><?php echo $pro_detail; ?></p>
            <p><strong class="text-primary h4"><?php echo $pro_price; ?> บาท</strong></p>
            
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <input type="number" class="form-control text-center" name="quantity" value="1" min="1" max="<?php echo $pro_num; ?>">

            </div>
            </div>
                    <div>
                        <p><strong class="text-primary h4">เหลือทั้งหมด  <?php echo $pro_num; ?>  ชิ้น</strong></p>
                    </div>
            <button type="submit" class="buy-now btn btn-sm btn-primary" name="add">Add To Cart   <i class="icon icon-shopping_cart"></i></button>
            
            <input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">

          </div>
        </div>
        </form>
      </div>
    </div>