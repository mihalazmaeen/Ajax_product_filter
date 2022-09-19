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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-ui-Slider-Pips/1.11.5/jquery-ui-slider-pips.min.js" integrity="sha512-pVQ8Pa4StWWGWldpcG0HiT+wnRJOYi+6jI6wPxKpgCPSJBChB6huhHFYRFXyg3rhbrNs3L/WqpkSppC5oLsnJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
<h3 class="text-center text-light bg-info p-2">Ajax Filter</h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <h5>Filter Product</h5>
            <hr>
            <h6 class="text-info">Price</h6>
            <input type="hidden" id="hidden_minimum_price" value="0">
            <input type="hidden" id="hidden_maximum_price" value="150000">
            <p id="price_show">1000-150000</p>
            <div id="price_range"></div>
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
            <input type="checkbox" class="form-check-input product_check" value="<?= $row['brand']; ?>" id="brand"><?= $row['brand'];?>
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
            <input type="checkbox" class="form-check-input product_check" value="<?= $row['ram']; ?>" id="ram"><?= $row['ram'];?>
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
            <input type="checkbox" class="form-check-input product_check" value="<?= $row['storage']; ?>" id="storage"><?= $row['storage'];?>
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
            <input type="checkbox" class="form-check-input product_check" value="<?= $row['camera'];?>" id="camera"><?= $row['camera'];?>
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
                <img src="images/loader.gif" id="loader" width="200" style="display:none;" alt="">
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
                <h4 class="card-title text-danger">Price: <?= number_format($row['price']); ?>/-</h4>
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

<script type="text/javascript">
    $(document).ready(function(){

        $(".product_check").click(function(){
            $("#loader").show();
            let action='data';
            let minimum_price=$('#hidden_minimum_price').val();
            let maximum_price=$('#hidden_maximum_price').val();
            let brand=get_filter_text('brand');
            let ram=get_filter_text('ram');
            let camera=get_filter_text('camera');
            let storage=get_filter_text('storage');
            $.ajax({
                url:'action.php',
                method:'POST',
                data:{action:action,minimum_price:minimum_price,maximum_price:maximum_price,brand:brand,ram:ram,camera:camera,storage:storage},
                success:function(response){
                    $("#result").html(response);
                    $("#loader").hide();
                    $("#textChange").text("Filtered Products");
                }
            });


        });
        function get_filter_text(text_id){
            let filterData=[];
            $('#'+text_id+':checked').each(function(){
                filterData.push($(this).val());

            });
            return filterData;
        }
        $('#price_range').slider({
            range:true,
            min:1000,
            max:150000,
            values:[1000,150000],
            step:500,
            stop:function(event,ui){
                $('#price_show').html(ui.values[0] + '-' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                get_filter_text();
            }
        });
    });

</script>

</body>

</html>