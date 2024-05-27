<?php

include "../connect.php";

$usersid   = filterRequest("users_id") ;
$usersname      = filterRequest("users_name") ;




$stmt = $con->prepare("UPDATE `users` SET `users_name`=? WHERE `users_id` = ?") ;
$stmt->execute(array($usersname, $usersid )) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
