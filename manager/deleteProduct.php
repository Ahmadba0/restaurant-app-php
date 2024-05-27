<?php

include "../connect.php";


$productid = filterRequest("product_id") ;


//$imagename1 = filterRequest("imagename1");
//$imagename2 = filterRequest("imagename2");

$stmt = $con->prepare("DELETE FROM `product` WHERE `product_id` = ?") ;
$stmt->execute(array($productid)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}


?>
