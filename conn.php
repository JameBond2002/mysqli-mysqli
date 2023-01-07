<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "transactions";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
	die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ!" . function mysqli_error(mysqli $mysqli));
}

mysqli_set_charset($conn, "utf8");
date_default_timezone_set("Asia/Bangkok");

?>