<?php
    if(isset($_POST['submit']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        echo $username."<br>";
        echo $password;
        $con=mysqli_connect('localhost','root','','php42') or die ("ไม่สามารถเชื่อมต่อ Database ได้");
        /*if(!$con){
            echo "ไม่สามารถเชื่อมต่อ Database ได้";
        }else{
            echo "เชื่อมต่อ Database สำเร็จ";
        }*/
        $sql= "SELECT * FROM user WHERE username='$username' and password='$password'";
        //mysqli_query($sql,$con);
        $result=$con->query($sql);
        /*$row=mysqli_fetch_array($result);
        echo $row['username'];
        echo $row['password'];*/
        $num=mysqli_num_rows($result);
        if($num==0){
            echo "<script>alert('username หรือ password ไม่ถูกต้อง')</script>";
        }else{
            echo "<script>alert('ล็อกอินสำเร็จ')</script>";
        }
    }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body style="background:#f1f1f1">
    <div class="container w-25" style="margin-top:300px;">
        <div class="card">
            <div class="card-header bg-success text-white">Login </div>
            <div class="card-body ">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>   
            </div>
        </div>
    </div>
</body>
</html>