<?php session_start();
require 'conn.php';
function real_string($str) {
	global $conn;
	$real = $conn->real_escape_string($str);
	return $real;
}

if(isset($_GET["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = $conn->query("SELECT * FROM users WHERE username='".$username."' ORDER BY id DESC");
    $chkUser = $query->num_rows;

    if ($chkUser>0) {
        $row = $query->fetch_assoc();
        if ($password == $row["password"]) {
            if($row["status"]==1){
                $_SESSION["username"] = $row["username"];
                $_SESSION["UserID"] = $row["id"];
                $_SESSION["password"] = $row["password"];

                $data = array('msg' => 'เข้าสู่ระบบสำเร็จ ระบบกำลังพาคุณไป', 'status' => 200);
                echo json_encode($data);
                exit();
            }else{
                $data = array('msg' => 'ยูสเซอร์นี้ถูกระงับการใช้งาน', 'status' => 500);
                echo json_encode($data);
                exit();
            }
        }else{
            $data = array('msg' => 'Password ของคุณไม่ถูกต้อง', 'status' => 500);
            echo json_encode($data);
            exit();
        }

    }else{
        $data = array('msg' => 'ไม่พบชื่อผู้ใช้นี้ในระบบ', 'status' => 500);
        echo json_encode($data);
        exit();
    }
}

if(isset($_GET["register"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $bank_number = $_POST["bank_number"];
    $bank_code = $_POST["bank_code"];


    if($username==""){
        $data = array('msg' => 'กรุณากรอก Username', 'status' => 500);
        echo json_encode($data);
        exit();
    }

    if($password==""){
        $data = array('msg' => 'กรุณากรอก Password', 'status' => 500);
        echo json_encode($data);
        exit();
    }

    if($bank_number==""){
        $data = array('msg' => 'กรุณากรอก เลขบัญชี', 'status' => 500);
        echo json_encode($data);
        exit();
    }

    if($bank_code==""){
        $data = array('msg' => 'กรุณาเลือกธนาคาร', 'status' => 500);
        echo json_encode($data);
        exit();
    }
    $query = $conn->query("SELECT * FROM users WHERE username='".$username."' ORDER BY id DESC");
    $chkUser = $query->num_rows;

    if($chkUser>0){
        $data = array('msg' => 'มี Username นี้อยู่ในระบบแล้ว', 'status' => 500);
        echo json_encode($data);
        exit();
    }

    $query2 = $conn->query("SELECT * FROM users WHERE username='".$bank_number."' ORDER BY id DESC");
    $chkAcc = $query2->num_rows;

    if($chkAcc>0){
        $data = array('msg' => 'มี เลขบัญชีนี้ นี้อยู่ในระบบแล้ว', 'status' => 500);
        echo json_encode($data);
        exit();
    }

    $sql = "INSERT INTO `users`(`id`, `username`, `password`, `bank_number`, `bank_code`) VALUES (null,'" . $username . "','" . $password . "','" . $bank_number . "','" . $bank_code . "')";
    if ($conn->query($sql) === TRUE) {

        $query = $conn->query("SELECT * FROM users WHERE username='".$username."' ORDER BY id DESC");
        $row = $query->fetch_assoc();
        $_SESSION["username"] = $row["username"];
        $_SESSION["UserID"] = $row["id"];
        $_SESSION["password"] = $row["password"];

        $data = array('msg' => 'สมัครสมาชิกสำเร็จแล้ว', 'status' => 200);
        echo json_encode($data);
        exit();
    }
}

if($_SESSION["UserID"]==""){
    $data = array('msg' => 'bad', 'status' => 500);
    echo json_encode($data);
    exit();
}