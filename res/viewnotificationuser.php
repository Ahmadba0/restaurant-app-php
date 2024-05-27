

<?php

include "../connect.php";
$usersid = filterRequest('users_id');
$stmt = $con->prepare("SELECT * FROM `usersnotification` WHERE `users_id` = ?") ;
$stmt->execute(array($usersid)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

