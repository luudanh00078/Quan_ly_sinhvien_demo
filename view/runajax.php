<?php

// if(isset($_REQUEST["name"])){
//    $name = $_REQUEST["name"];
//    echo "<h2 style='color: red'>Xin chao ban: $name</h2>";
// }
// else{
//    echo "khong co tham so";
// }
// include_once("../model/entity/user.php");
// $userName = $_REQUEST["name"];
// if(isset($userName))
// $user = new User("ld","123","Luu Danh");
// $jsonUser = json_encode($user);
// echo $jsonUser;
//
include_once("../model/entity/user.php");
$userName = $_REQUEST["name"];
if(isset($userName)== "abc"){
    $user = new User("ld","123","Luu Danh");
}
else{
    $user = new User($userName,"1234","Luu Danh");
}

$jsonUser = json_encode($user);
echo $jsonUser;
//
