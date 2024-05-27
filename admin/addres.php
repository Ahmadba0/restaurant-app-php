<?php

include "../connect.php";

$resname = filterRequest("res_name") ;
$reslocation = filterRequest("res_location");
$resphone = filterRequest("res_phone");
$restype = filterRequest("res_type");
$resrating = filterRequest("res_rating");
$respassword = sha1($_POST['res_password']);
$file = imageUpload("file");

if($file != 'fail'){
$stmt = $con->prepare("INSERT INTO `restaurant`(`res_name`, `res_location`,`res_phone`,`res_type`,`res_rating`, `res_image`,`res_password`) VALUES (?,?,?,?,?,?,?)") ;
$stmt->execute(array($resname , $reslocation ,$resphone,$restype,$resrating,$file,$respassword)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
}else{
    echo "<pre>";
    echo json_encode(array("status" => "fail"));
    echo "</pre>";
}


?>