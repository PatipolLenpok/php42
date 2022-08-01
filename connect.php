<?php
    $host="localhost";
    $user="root";
    $password="";
    $dbname="php42";

    $con=mysqli_connect($host,$user,$password,$dbname) or die ("ไม่สามารถเชื่อมต่อ Database ได้");
    $con->query("SET NAMES UTF8");
?>