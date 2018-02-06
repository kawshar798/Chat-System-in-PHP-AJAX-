<?php 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_chats";

$db_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if(!$db_conn){
    die("Connection Failed".mysqli_connect_errno($db_conn));
}

function formateDate($date){
    return date('g: i a',  strtotime($date));
}


?>