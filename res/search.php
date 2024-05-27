<?php
include "../connect.php";

$search = filterRequest("search");

getAllData("restaurant" , "res_name LIKE '%$search%' OR res_location LIKE '%$search%'");


?>