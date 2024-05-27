<?php

include "../connect.php";

$resid   = filterRequest("res_id") ;
$resname      = filterRequest("res_name") ;




$stmt = $con->prepare("UPDATE `restaurant` SET `res_name`=? WHERE `res_id` = ?") ;
$stmt->execute(array($resname, $resid )) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
