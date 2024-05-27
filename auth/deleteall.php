<?php
include "../connect.php";

$usersphone = filterRequest("usersphone");

$stmt = $con->prepare("DELETE FROM `users` WHERE `users_phone` = ?");
$stmt->execute(array($usersphone));
$count = $stmt->rowCount();
$data = $stmt->fetchColumn();
if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}
