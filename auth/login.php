<?php

include "../connect.php";
 
$users_phone = filterRequest("users_phone"); 
$users_password = sha1($_POST['users_password']);

/*
$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND  users_password = ? AND users_approve = 1  ");
$stmt->execute(array($email, $password));
$count = $stmt->rowCount();
result($count) ; */

getData(
    "users" , " users_phone = ? AND  users_password = ?" , array($users_phone, $users_password)
);
//ab036652.000webhostapp.com./restaurant1/auth/login.php