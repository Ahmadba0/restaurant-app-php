<?php

include "../connect.php";


$waiting_id = filterRequest("waiting_id") ;



$stmt = $con->prepare("DELETE FROM `waiting` WHERE `waiting_id` = ? ") ;
$stmt->execute(array($waiting_id)) ;
$count = $stmt->rowCount();


if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>