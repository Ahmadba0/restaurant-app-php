<?php

include "../connect.php";

$revers_date = filterRequest("revers_date");
$res_id = filterRequest("res_id");


$stmt = $con -> prepare ("SELECT COUNT(revers_id) FROM `revers` WHERE `revers_date` =?  AND `res_id`=?  ");
$stmt -> execute (array($revers_date , $res_id));
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count > 0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
   // insertData("users" , $data);
}

//SELECT * FROM revers WHERE revers_date = '2001-01-01' AND revers_starttime = '08:00:00' AND revers_endtime = '10:00:00'
//SELECT COUNT(revers_id) FROM revers WHERE revers_date = '2001-01-01' AND revers_starttime = '08:00:00' AND revers_endtime = '10:00:00'