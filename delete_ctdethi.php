<?php 
session_start();
require 'config/connect.php';

$made = $_GET['made']??"";
$macauhoi = $_GET['macauhoi']??"";
$_SESSION['ss_made'] = $made;

//echo"$made,$macauhoi";
$sql = "DELETE FROM tbl_ctdethi WHERE made='$made' AND macauhoi='$macauhoi'";
if($pdo->query($sql) == true){
    $_SESSION['successMessage'] = "Xóa câu hỏi $macauhoi ra khỏi đề thi $made thành công.";
    header("Location: soan_dethi.php");
    exit();
}else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: soan_dethi.php");
    exit();
}

  