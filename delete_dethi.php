<?php 
session_start();
require 'config/connect.php';

$made = $_GET['made']??"";

$sql = "DELETE FROM tbl_dethi WHERE made='$made'";
if($pdo->query($sql) == true){
    $_SESSION['successMessage'] = "Xóa đề thi $made thành công.";
    header("Location: DS_dethi.php");
    exit();
}else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_dethi.php");
    exit();
}

  