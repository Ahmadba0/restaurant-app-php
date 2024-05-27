<?php

include "../connect.php";


$resid = filterRequest("res_id") ;
$usersid = filterRequest("users_id");
//$imagename1 = filterRequest("imagename1");
//$imagename2 = filterRequest("imagename2");

$stmt = $con->prepare("DELETE FROM `fav` WHERE `users_id` = ? AND `res_id`=?") ;
$stmt->execute(array($usersid,$resid)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}


?>
