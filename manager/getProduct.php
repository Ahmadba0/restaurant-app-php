<?php

include "../connect.php";


$resid = filterRequest("res_id") ;

$stmt = $con->prepare("SELECT * FROM `product` WHERE `res_id` = ? ") ;
$stmt->execute(array($resid)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>


