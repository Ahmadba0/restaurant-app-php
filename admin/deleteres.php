<?php

include "../connect.php";


$resphone = filterRequest("res_phone") ;
$usersphone = filterRequest("users_phone") ;

//$imagename1 = filterRequest("imagename1");
//$imagename2 = filterRequest("imagename2");

$stmt = $con->prepare("DELETE FROM `restaurant` WHERE `res_phone` = ?") ;
$stmt->execute(array($resphone)) ;
$count = $stmt->rowCount();

$stmt1 = $con->prepare("DELETE FROM `users` WHERE `users_phone` = ?") ;
$stmt1->execute(array($usersphone)) ;
$count1 = $stmt1->rowCount();

if ($count>0 && $count1>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}


?>
