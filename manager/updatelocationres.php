<?php

include "../connect.php";

$resid   = filterRequest("res_id") ;
$reslocation      = filterRequest("res_location") ;




$stmt = $con->prepare("UPDATE `restaurant` SET `res_location`=? WHERE `res_id` = ?") ;
$stmt->execute(array($reslocation, $resid )) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
