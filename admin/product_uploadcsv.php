<?php
    include '../connect.php';
    $filename=$_FILES['csv_file']['name'];
    if(isset($filename)){
        move_uploaded_file($_FILES['csv_file']['tmp_name'],'csv/'.$filename);
        $file_csv=fopen('csv/'.$filename,"r");
        while($row_csv=fgetcsv($file_csv,1000,",")){
            $pro_name=$row_csv[0];
            $pro_price=$row_csv[1];
            $pro_qty=$row_csv[2];
            $sql2="INSERT INTO product(pro_name,pro_price,pro_qty) VALUES('$pro_name','$pro_price','$pro_qty')";
            $result2=$con->query($sql2);
        }
        fclose($file_csv);
        header('location:product.php');
    }
?>