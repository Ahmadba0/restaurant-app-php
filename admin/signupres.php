
<?php

include "../connect.php";

$users_name = filterRequest("users_name");
$users_password = sha1($_POST["users_password"]);
$users_phone = filterRequest("users_phone");
$users_check = filterRequest("users_check");
$users_type = filterRequest("users_type");
//$phone = filterRequest("phone");
//$verifycode = rand(10000,99999);

$stmt = $con -> prepare ("SELECT * FROM `users` WHERE `users_phone` = ?" );
$stmt -> execute (array($users_phone));
$count = $stmt->rowCount();

if ($count > 0) {
    printFailure("phone or email is exists..");
} else {
    $data=array(
        "users_name" => $users_name, 
        "users_phone" => $users_phone,
        "users_password" => $users_password,
        "users_check" => $users_check,
        "users_type" => $users_type,
     
    );

    //sendEmail($email,"verify ecommerce" , "verify code $verifycode");
    insertData("users" , $data);
}
