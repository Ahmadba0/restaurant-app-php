<?php

include "../connect.php";

$resid = filterRequest("res_id");
$file = imageUpload("file");

$stmt = $con->prepare("SELECT * FROM `restaurant` WHERE `res_id` = '$resid' ");

$stmt->execute();

$count = $stmt->rowCount();

if($file != 'fail'){

if($count > 0){
    $data = array(
        "res_img1" => $file,
        
    );
    updateData("restaurant" , $data , "res_id = '$resid'");
}else{
    printFailure(" not correct");
}
}else{
    echo "<pre>";
    echo json_encode(array("status" => "fail"));
    echo "</pre>";
}





