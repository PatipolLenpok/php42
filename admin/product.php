<?php
   include 'navbar.php';
   include '../connect.php';
   $sql="SELECT * FROM product";
   $result=$con->query($sql);//$result-mysqli_query($con,$sql);
   
?>
<div class="container mt-5 w-75">
   <a href="add_product.php" class="btn btn-primary mb-3">+เพิ่มข้อมูล</a>
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