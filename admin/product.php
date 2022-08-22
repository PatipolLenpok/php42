<?php
   include 'navbar.php';
   include '../connect.php';
   $sql="SELECT * FROM product";
   $result=$con->query($sql);//$result-mysqli_query($con,$sql);
   
?>
<div class="container mt-5 w-75">
   <div class="row">
        <div class="col-4">
            <a href="add_user.php" class="btn btn-primary mb-3">+เพิ่มข้อมูล</a>
        </div>
        <div class="col-8">
            <form action="product_uploadcsv.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-3">
                    <label for="" class="">อัพโหลดโหลดไฟล์</label>
                </div>
                <div class="col-5">
                    <input type="file" class="form-control" class="mb-3" name="csv_file">
                </div>
                <div class="col-4">
                    <input type="submit" name="addm" class="btn btn-primary mb-3" value="+เพิ่มข้อมูลที่ละหลายคน">
                </div>
            </div>
            </form>
        </div>
    </div>
   <table class="table table-striped">
      <tr class="bg-success">
      <th class="text-white">รหัสสินค้า</th>
      <th class="text-white">ชื่อสินค้า</th>
      <th class="text-white">ราคาสินค้า</th>
      <th class="text-white">จำนวน</th>
      <th class="text-white">รูปภาพ</th>
      <th class="text-white">การจัดการ</th>
      
      </tr>
      <?php
         $count=1; 
         while($row=mysqli_fetch_array($result))
         {

         
      ?>
      <tr>
         <td><?php echo $row['pro_id']?></td>
         <td><?php echo $row['pro_name']?></td>
         <td><?php echo $row['pro_price']?></td>
         <td><?php echo $row['pro_qty']?></td>
         <td>
            <img src="pro_pic/<?php echo $row['pro_pic']?>" width="50">
         </td>
         <td>
            <a href="edit_product.php?pro_id=<?php echo $row['pro_id']?>" class="btn btn-warning"><i  class="bi bi-pencil-square"></i></a>
            <a href="del_product.php?pro_id=<?php echo $row['pro_id']?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบหรือไม่')"><i  class="bi bi-x-circle"></i></a>
         </td>
      </tr>
      <?php }?>
   </table>
</div>