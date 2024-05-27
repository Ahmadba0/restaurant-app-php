<?php

include "../connect.php";


$location = filterRequest("res_location") ;

$stmt = $con->prepare("SELECT * FROM `restaurant` WHERE `res_location` = ? ") ;
$stmt->execute(array($location)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>


