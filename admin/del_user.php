<?php
    require_once '../connect.php';
    $username=$_GET['username'];
    $sql="DELETE FROM user WHERE username='$username'";
    $result=$con->query($sql);
    if(!$result){
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    }else{
        echo "<script>window.location.href='user.php'</script>";
    }
?>
