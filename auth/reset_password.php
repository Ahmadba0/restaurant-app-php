
<?php

include "../connect.php";

$users_phone = filterRequest("users_phone");
$users_password = sha1($_POST['users_password']);



//$phone = filterRequest("phone");
//$verifycode = rand(10000,99999);
$data=array(
    "users_password" => $users_password,
);

updateData("users" , $data , "users_phone = '$users_phone'");

    

