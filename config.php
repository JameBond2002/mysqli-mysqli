
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "transactions";

$path = 'https://' . $_SERVER['SERVER_NAME'] . "/";

$server = mysqli_connect($host, $user, $pass, $db);
if (!$server) {
	die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ!" .function mysqli_error(mysqli $mysqli) );
}
mysqli_set_charset($server, "utf8");

date_default_timezone_set("Asia/Bangkok");
?>
