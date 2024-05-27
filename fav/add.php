<?php

include "../connect.php";


$users_id = filterRequest("users_id");
$res_id = filterRequest("res_id");


$stmt = $con->prepare("SELECT * FROM `fav` WHERE `res_id` = ? AND `users_id` = ? ") ;
$stmt->execute(array($res_id , $users_id)) ;
$count = $stmt->rowCount();
if ($count>0) {
    echo json_encode(array("status" => "found"));
} else {
  /*     $data=array(
        "users_id" => $users_id,
        "res_id" => $res_id,
     
    );

    insertData("fav" , $data);*/

    $stmt = $con->prepare("INSERT INTO `fav`(`users_id`, `res_id`) VALUES (?,?)") ;
    $stmt->execute(array($users_id , $res_id)) ;
    $count = $stmt->rowCount(); 
    if ($count>0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "fail"));
    }
}






 

