<?php
    require_once '../connect.php';
    $pro_id=$_GET['pro_id'];
    $sql="DELETE FROM product WHERE pro_id='$pro_id'";
    $result=$con->query($sql);
    if(!$result){
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    }else{
        echo "<script>window.location.href='product.php'</script>";
    }
?>