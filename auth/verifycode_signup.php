
<?php

include "../connect.php";

$users_phone = filterRequest("users_phone");
$users_verifycode = filterRequest("users_verifycode");
//$phone = filterRequest("phone");
//$verifycode = rand(10000,99999);
$data=array(
    "users_verifycode" => $users_verifycode,
    "users_check" => 1,
);

updateData("users" , $data , "users_phone = '$users_phone'");

    

