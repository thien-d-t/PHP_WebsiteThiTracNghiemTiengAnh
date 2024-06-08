<?php 
session_start();
require 'config/connect.php';

$macauhoi = $_GET['macauhoi']??"";

$sql = "DELETE FROM tbl_cauhoi WHERE macauhoi='$macauhoi'";
if($pdo->query($sql) == true){
    $_SESSION['successMessage'] = "Xóa câu hỏi $macauhoi thành công.";
    header("Location: DS_cauhoi.php");
    exit();
}else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_cauhoi.php");
    exit();
}

  