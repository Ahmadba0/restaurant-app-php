<?php

include "../connect.php";

$resid   = filterRequest("res_id") ;
$resphone      = filterRequest("res_phone") ;
$usersid      = filterRequest("users_id") ;





$stmt = $con->prepare("UPDATE `restaurant` SET `res_phone`=? WHERE `res_id` = ?") ;
$stmt->execute(array($resphone, $resid )) ;
$count = $stmt->rowCount();

$stmt1 = $con->prepare("UPDATE `users` SET `users_phone`=? WHERE `users_id` = ?") ;
$stmt1->execute(array($resphone, $usersid )) ;
$count1 = $stmt1->rowCount();



if ($count>0 || $count1>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
