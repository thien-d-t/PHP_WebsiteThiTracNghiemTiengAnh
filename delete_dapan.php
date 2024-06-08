<?php 
session_start();
require 'config/connect.php';

$madapan = $_GET['madapan']??"";

$sql = "DELETE FROM tbl_dapan WHERE madapan='$madapan'";
if($pdo->query($sql) == true){
    $_SESSION['successMessage'] = "Xóa đáp án $madapan thành công.";
    header("Location: DS_dapan.php");
    exit();
}else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_dapan.php");
    exit();
}

  