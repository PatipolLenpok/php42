<?php
   include 'navbar.php';
   include '../connect.php';
   $sql="SELECT * FROM user";
   $result=$con->query($sql);//$result-mysqli_query($con,$sql);
   
?>

<div class="container mt-5 w-75">
   <div class="row">
        <div class="col-4">
            <a href="add_user.php" class="btn btn-primary mb-3">+เพิ่มข้อมูล</a>
        </div>
        <div class="col-8">
            <form action="user_uploadcsv.php" method="POST" enctype="multipart/form-data">
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
      <th class="text-white">ลำดับที่</th>
      <th class="text-white">ชื่อ - นามสกุล</th>
      <th class="text-white">username</th>
      <th class="text-white">email</th>
      <th class="text-white">รูปภาพ</th>
      <th class="text-white">การจัดการ</th>
      </tr>
      <?php
         $count=1; 
         while($row=mysqli_fetch_array($result))
         {

         
      ?>
      <tr>
         <td><?php echo $count;$count++;?></td>
         <td><?php echo $row['Name']?></td>
         <td><?php echo $row['Username']?></td>
         <td><?php echo $row['Email']?></td>
         <td>
            <img src="user_pic/<?php echo $row['User_pic']?>" width="50">
         </td>
         <td>
            <a href="edit_user.php?username=<?php echo $row['Username']?>" class="btn btn-warning"><i  class="bi bi-pencil-square"></i></a>
            <a href="del_user.php?username=<?php echo $row['Username']?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบหรือไม่')"><i  class="bi bi-x-circle"></i></a>
         </td>
      </tr>
      <?php }?>
   </table>
</div>