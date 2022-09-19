<?php
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
require 'config.php';
if(isset($_POST['action'])){
    $sql = "SELECT * from products WHERE brand != ''";
    if(isset($_POST['brand'])){
        $brand = implode("','",$_POST["brand"]);
        $sql .= "AND brand IN ('".$brand."')";
       
    }
    if(isset($_POST['ram'])){
        $ram = implode("','",$_POST['ram']);
        $sql .= "AND ram IN ('".$ram."')";
    }
    if(isset($_POST['storage'])){
        $storage = implode("','",$_POST['storage']);
        $sql .= "AND storage IN ('".$storage."')";
    }
    if(isset($_POST['camera'])){
        $camera = implode("','",$_POST['camera']);
        $sql .= "AND camera IN ('".$camera."')";
    }
    if(isset($_POST['minimum_price'],$_POST['maximum_price'])&& !empty($_POST['minimum_price'])&& !empty($_POST['maximum_price'])){
        $query = "AND price between '" . $_POST['minimum_price'] . "' AND '" . $_POST['maximum_price'] . "' ";
    }
    $result = $conn->query($sql);
    $output ='';
    if($result -> num_rows > 0){
        
        while($row=$result->fetch_assoc()){
            $output .='<div class="col-md-3 mb-2">
            <div class="card-deck">
                <div class="card border-secondary">
                    <img src="./images/'.$row['image'].'" class="card-img-top">
                    <div class="card-img-overlay">
                        <h6 style="margin-top:300px;" class="text-light bg-info text-center rounded p-2">'.$row['pname'].'</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-danger">Price:'. number_format($row['price']).'/-</h4>
                        <p>
                        RAM: '.$row['ram'].'<br>
                        Storage:'.$row['storage'].'<br>
                        Camera:'.$row['camera'].'<br>
        
                        </p>
                    
                    </div>
                </div>
            </div>
        </div>';
        }

    }else{
        $output = "<h3>No products Found </h3>";
    }
    echo $output;

}



?>