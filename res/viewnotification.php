

<?php

include "../connect.php";
$res_phone = filterRequest('res_phone');
$stmt = $con->prepare("SELECT * FROM `usersnotification` WHERE `res_phone` = ?") ;
$stmt->execute(array($res_phone)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

