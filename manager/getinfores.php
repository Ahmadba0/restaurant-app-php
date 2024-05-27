<?php

include "../connect.php";


$resphone = filterRequest("res_phone") ;

$stmt = $con->prepare("SELECT * FROM `restaurant` WHERE `res_phone` = ? ") ;
$stmt->execute(array($resphone)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>


