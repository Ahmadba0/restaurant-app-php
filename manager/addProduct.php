<?php

include "../connect.php";

$productname = filterRequest("product_name") ;
$productnote = filterRequest("product_note");
$productprice = filterRequest("product_price");
$resid = filterRequest("res_id");
$file = imageUpload("file");

if($file != 'fail'){
$stmt = $con->prepare("INSERT INTO `product`(`product_name`, `product_note`,`product_price`, `product_image` , `res_id`) VALUES (?,?,?,?,?)") ;
$stmt->execute(array($productname , $productnote , $productprice , $file , $resid)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
}else{
    echo "<pre>";
    echo json_encode(array("status" => "fail"));
    echo "</pre>";
}


?>