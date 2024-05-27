<?php
include "../connect.php";
$users_phone = filterRequest("users_phone");

$stmt = $con->prepare("SELECT * FROM users WHERE users_phone = ? ");
$stmt->execute(array($users_phone));
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
}else{
    echo json_encode(array("status" => "fail"));
}