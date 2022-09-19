<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


</head>

<body>
<h3 class="text-center text-light bg-info p-2">Ajax Filter</h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <h5>Filter Product</h5>
            <hr>
            <h6 class="text-info">Select Brand</h6>
            <ul class="list-group">
            <?php
$sql = "select distinct brand from products order by brand";
$result = $conn->query($sql);
while($row=$result->fetch_assoc()){
 ?>
 <li class="list-group-item">
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input product_check" value="<?$row['brand'];?>" id="brand"><?= $row['brand'];?>
        </label>
    </div>
 </li> 
 <?php  
}

            ?>

            </ul>
            <h6 class="text-info">Select Brand</h6>
            <ul class="list-group">
            <?php
$sql = "select distinct ram from products order by ram";
$result = $conn->query($sql);
while($row=$result->fetch_assoc()){
 ?>
 <li class="list-group-item">
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input product_check" value="<?$row['ram'];?>" id="ram"><?= $row['ram'];?>
        </label>
    </div>
 </li> 
 <?php  
}

            ?>

            </ul>
            <h6 class="text-info">Select Brand</h6>
            <ul class="list-group">
            <?php
$sql = "select distinct storage from products order by storage";
$result = $conn->query($sql);
while($row=$result->fetch_assoc()){
 ?>
 <li class="list-group-item">
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input product_check" value="<?$row['storage'];?>" id="storage"><?= $row['storage'];?>
        </label>
    </div>
 </li> 
 <?php  
}

            ?>

            </ul>
            <h6 class="text-info">Select Brand</h6>
            <ul class="list-group">
            <?php
$sql = "select distinct camera from products order by camera";
$result = $conn->query($sql);
while($row=$result->fetch_assoc()){
 ?>
 <li class="list-group-item">
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input product_check" value="<?$row['camera'];?>" id="camera"><?= $row['camera'];?>
        </label>
    </div>
 </li> 
 <?php  
}

            ?>

            </ul>
        </div>
        <div class="col-lg-9">
            <h5 class="text-center" id="text-change">All Products</h5>
            <hr>
            <div class="text-center">
                <img src="images/loader.gif" id="loader" width="200" style="display:none" alt="">
            </div>
            <div class="row" id="result">
                <?php
$sql = "select * from products";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
    <div class="card-deck">
        <div class="card border-secondary">
            <img src="./images/<?= $row['image']; ?> " class="card-img-top">
            <div class="card-img-overlay">
                <h6 style="margin-top:300px;" class="text-light bg-info text-center rounded p-2"><?= $row['pname']; ?></h6>
            </div>
            <div class="card-body">
                <h4 class="card-title text-danger">Price: <?= number_format($row['price']); ?>-</h4>
                <p>
                RAM: <?= $row['ram'];?><br>
                Storage: <?= $row['storage'];?><br>
                Camera: <?= $row['camera'];?><br>

                </p>
            
            </div>
        </div>
    </div>
</div>
<?php
}
                ?>

            </div>
        </div>
    </div>
</div>



</body>

</html>