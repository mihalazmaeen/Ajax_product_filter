
<?php
 include "config.php";


 if(isset($_POST['submit'])){
    $pname=$_POST['pname'];
    $brand=$_POST['brand'];
    $price=$_POST['price'];
    $ram=$_POST['ram'];
    $storage=$_POST['storage'];
    $camera=$_POST['camera'];
    $quantity=$_POST['quantity'];
    $status=$_POST['status'];

    $image=$_FILES['image']['name'];
    $tmp=$_FILES['image']['tmp_name'];
    $loc = 'images/'.$image;

    $sql="insert into products (pname,brand,price,ram,storage,camera,image,quantity,status) values ('$pname','$brand','$price','$ram','$storage','$camera','$image','$quantity','$status') ";
    if(mysqli_query($conn,$sql)==TRUE){
        move_uploaded_file($tmp, $loc);
        echo "Data Inserted";

    }else{
        echo "Data Not Inserted";
    }



 }
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
<label>Product Name</label>
<input type="text" name="pname"><br>
<label>Product Brand</label>
<input type="text" name="brand"><br>
<label>Product Price</label>
<input type="number" name="price"><br>
<label>Product Ram</label>
<input type="text" name="ram"><br>
<label>Product Storage</label>
<input type="text" name="storage"><br>
<label>Product Camera</label>
<input type="text" name="camera"><br>
<label>Product Quantity</label>
<input type="number" name="quantity"><br>
<label>Product Status</label>
<input type="text" name="status"><br>
<label>Product image</label>
<input type="file" name="image"><br>
<input type="submit" name="submit" value="submit">



</form>
 