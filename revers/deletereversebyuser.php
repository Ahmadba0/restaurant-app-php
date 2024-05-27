<?php

include "../connect.php";


$revers_id = filterRequest("revers_id") ;



$stmt = $con->prepare("DELETE FROM `revers` WHERE `revers_id` = ? ") ;
$stmt->execute(array($revers_id)) ;
$count = $stmt->rowCount();


if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>