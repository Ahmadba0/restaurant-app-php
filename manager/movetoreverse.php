<?php

include "../connect.php";


$waiting_id = filterRequest("waiting_id") ;

$revers_date = filterRequest("revers_date");
$revers_starttime =  filterRequest("revers_starttime");
$users_id = filterRequest("users_id");
$res_id = filterRequest("res_id");
$res_phone = filterRequest('res_phone');
$user_phone = filterRequest('user_phone');


$stmt = $con->prepare("DELETE FROM `waiting` WHERE `waiting_id` = ? ") ;
$stmt->execute(array($waiting_id)) ;
$count = $stmt->rowCount();


if ($count>0) {
    $data=array(
        "revers_date" => $revers_date, 
        "revers_starttime" => $revers_starttime,
        //"revers_endtime" => $revers_endtime,
        "users_id" => $users_id,
        "res_id" => $res_id,
        "res_phone"=>$res_phone,
     
    );
    insertData("revers" , $data);
    insertNotifivation("New Notification" , "your reverse is accepted" , $users_id , $res_id , $res_phone , "users$user_phone" , "none" , "homescreen");




    //echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>


