<?php

include "../connect.php";


$usersid = filterRequest("users_id") ;
$usersname = filterRequest("users_name") ;

$stmt = $con->prepare("SELECT * FROM `usersfav` WHERE `users_id` = ? AND `users_name` = ? ") ;
$stmt->execute(array($usersid , $usersname)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>


