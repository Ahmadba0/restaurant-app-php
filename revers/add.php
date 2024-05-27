<?php

include "../connect.php";

$revers_date = filterRequest("revers_date");
$revers_starttime =  filterRequest("revers_starttime");
//$revers_endtime = filterRequest("revers_endtime");
$users_id = filterRequest("users_id");
$res_id = filterRequest("res_id");
$res_phone = filterRequest('res_phone');

    $data=array(
        "revers_date" => $revers_date, 
        "revers_starttime" => $revers_starttime,
        //"revers_endtime" => $revers_endtime,
        "users_id" => $users_id,
        "res_id" => $res_id,
        "res_phone"=>$res_phone,
     
    );

insertData("revers" , $data);
    //sendGCM("aaa","aaaaaa","users$res_phone" , "none" , "notification");
insertNotifivation("New Notification" , "A new reverse in your restaurant" , $users_id , $res_id , $res_phone , "users$res_phone" , "none" , "notification");

    //insertNotifivation("بلاغنا" , "لقد تم رؤية طلبك وهو في حالة المعالجة" , $user_id , "users$res_phone" , "none" , "refreshDetaielsPage" , $report_id);
