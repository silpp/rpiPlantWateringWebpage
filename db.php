<?php
$server= '192.168.1.107:3306';
$user = 'root';
$password = 'silp2274';
$db = 'rpi';

$conn = mysqli_connect($server,$user,$password,$db);
if(!$conn){
    die("Connection Failed:".mysqli_connect_error());
}
if (!$conn->set_charset('utf8')) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit;
}

?>