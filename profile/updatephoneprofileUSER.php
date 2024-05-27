<?php

include "../connect.php";

$users_phone      = filterRequest("users_phone") ;
$users_id      = filterRequest("users_id") ;







$stmt1 = $con->prepare("UPDATE `users` SET `users_phone`=? WHERE `users_id` = ?") ;
$stmt1->execute(array($users_phone, $users_id )) ;
$count1 = $stmt1->rowCount();



if ( $count1>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
