<?php 
session_start();
require 'config/connect.php';

$manguoidung = $_GET['id_nguoidung']??"";

$sql = "DELETE FROM tbl_nguoidung WHERE id_nguoidung ='$manguoidung'";
if($pdo->query($sql) == true){
    $_SESSION['successMessage'] = "Xóa tài khoản $manguoidung thành công.";
    header("Location: DS_taikhoan.php");
    exit();
}else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_taikhoan.php");
    exit();
}

  