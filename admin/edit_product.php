<?php
   include 'navbar.php';
   include '../connect.php';
   $sql="SELECT * FROM product";
   $pro_id=$_GET['pro_id'];
   $sql="SELECT * FROM product WHERE pro_id='$pro_id'";
   $result=$con->query($sql);
   $row=mysqli_fetch_array($result);
   if(isset($_POST ['submit']))
   {
        $pro_name=$_POST['pro_name'];
        $pro_price=$_POST['pro_price'];
        $pro_qty=$_POST['pro_qty'];
        $filename=$_FILES['pro_pic']['name'];

        if(isset($filename))
        {
            @unlink('pro_pic/'.$row['pro_pic']);
            move_uploaded_file($_FILES['pro_pic']['tmp_name'],'pro_pic/'.$filename);
            $sql="UPDATE product SET pro_name='$pro_name',pro_price='$pro_price',pro_qty='$pro_qty',pro_pic='$filename' WHERE pro_id='$pro_id'";
        }
        else{
            $sql="UPDATE product SET pro_name='$pro_name',pro_price='$pro_price',pro_qty='$pro_qty' WHERE pro_id='$pro_id'";
            }
        $result=$con->query($sql);
        if(!$result){
            echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
        }else{
            echo "<script>window.location.href='product.php'</script>";
        }
   }
?>
<div class="container w-50 mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            เพิ่มข้อมูล User
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">pro_id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pro_id" readonly value="<?php echo $row['pro_id']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">pro_name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pro_name" value="<?php echo $row['pro_name']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">pro_price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pro_price" value="<?php echo $row['pro_price']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">pro_qty</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pro_qty" value="<?php echo $row['pro_qty']?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label"></label>
                    <div class="col-sm-10">
                        <img src="pro_pic/<?php echo $row['pro_pic']?>" width="50">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">รูปภาพ</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="pro_pic">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-success" name="submit" value="แก้ไขข้อมูล">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>