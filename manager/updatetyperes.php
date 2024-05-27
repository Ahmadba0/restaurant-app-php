<?php

include "../connect.php";

$resid   = filterRequest("res_id") ;
$restype      = filterRequest("res_type") ;




$stmt = $con->prepare("UPDATE `restaurant` SET `res_type`=? WHERE `res_id` = ?") ;
$stmt->execute(array($restype, $resid )) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
