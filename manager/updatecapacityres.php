<?php

include "../connect.php";

$resid       = filterRequest("res_id") ;
$rescapacity = filterRequest("res_capacity") ;





$stmt = $con->prepare("UPDATE `restaurant` SET `res_capacity`=?  WHERE `res_id` = ?") ;
$stmt->execute(array($rescapacity, $resid )) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
