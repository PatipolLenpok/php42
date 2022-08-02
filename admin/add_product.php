<?php
    include 'navbar.php';
    include '../connect.php';
    if(isset($_POST ['submit'])){
        $pro_name=$_POST['pro_name'];
        $pro_price=$_POST['pro_price'];
        $pro_qty=$_POST['pro_qty'];
        if($pro_name=="" || $pro_price=="" || $pro_qty=="")
        {
            echo "<script>alert('ยังไม่ได้กรอกข้อมูล หรือ กรอกข้อมูลไม่ครบ')</script>";
        }else{
            $sql2="SELECT pro_name FROM product WHERE pro_name='$pro_name'";
            $result2=$con->query($sql2);
            $num=mysqli_num_rows($result2);
            if($num==1){
                echo "<script>alert('สินค้านี้มีอยู่แล้ว')</script>";
            }else{
                $sql="INSERT INTO product (pro_name,pro_price,pro_qty) VALUES('$pro_name','$pro_price','$pro_qty')";
            $result=$con->query($sql);
            if(!$result){
                echo "<script>('ไม่สามารถเพิ่มข้อมูลได้')</script)";
            }
            else{
                echo "<script>window.location.href='product.php'</script>";
                }
            }

            
        }
        
    }
?>
<div class="container w-50 mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            เพิ่มข้อมูล Product
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">pro_name</label>
                    <div class="col-sm-10">
                        <input type="pro_name" class="form-control" name="pro_name">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">pro_price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pro_price">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label">pro_qty</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pro_qty">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 com-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-success" name="submit" value="เพิ่มข้อมูล">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>