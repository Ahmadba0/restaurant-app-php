<?php

include "../connect.php";

$usersid = filterRequest("users_id");
$file = imageUpload("file");

$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_id` = '$usersid' ");

$stmt->execute();

$count = $stmt->rowCount();

if($file != 'fail'){

if($count > 0){
    $data = array(
        "users_image" => $file,
        
    );
    updateData("users" , $data , "users_id = '$usersid'");
}else{
    printFailure(" not correct");
}
}else{
    echo "<pre>";
    echo json_encode(array("status" => "fail"));
    echo "</pre>";
}





