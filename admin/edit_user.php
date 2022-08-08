<?php
   include 'navbar.php';
   include '../connect.php';
   $sql="SELECT * FROM user";
   $username=$_GET['username'];
   $sql="SELECT * FROM user WHERE username='$username'";
   $result=$con->query($sql);
   $row=mysqli_fetch_array($result);
   if(isset($_POST ['submit']))
   {
        $password=$_POST['password'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $filename=$_FILES['user_pic']['name'];
        if(isset($filename))
        {
            @unlink('user_pic/'.$row['User_pic']);
            move_uploaded_file($_FILES['user_pic']['tmp_name'],'user_pic/'.$filename);
            $sql="UPDATE user SET password='$password',name='$name',email='$email',user_pic='$filename' WHERE username='$username'";
        }
        else{
                $sql="UPDATE user SET password='$password',name='$name',email='$email' WHERE username='$username'";
            }
        $result=$con->query($sql);
        if(!$result){
            echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
        }
        else{
            echo "<script>window.location.href='user.php'</script>";
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
                    <label for="" class="col-sm-2 com-form-label">username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" readonly value="<?php echo $row['Username']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" value="<?php echo $row['Password']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?php echo $row['Name']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?php echo $row['Email']?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label"></label>
                    <div class="col-sm-10">
                        <img src="user_pic/<?php echo $row['User_pic']?>" width="50">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">รูปภาพ</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="user_pic">
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