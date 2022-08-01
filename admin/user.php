<?php
   include 'navbar.php';
   include '../connect.php';
   $sql="SELECT * FROM user";
   $result=$con->query($sql);
?>