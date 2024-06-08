<?php 
session_start();
require 'config/connect.php';

$machungchi = $_GET['machungchi']??"";
$tenchunchi = $_GET['tenchungchi']??"";

$sql = "DELETE FROM tbl_chungchi WHERE machungchi ='$machungchi'";
if($pdo->query($sql) == true){
    $_SESSION['successMessage'] = "Xóa chứng chỉ $tenchungchi thành công.";
    header("Location: DS_chungchi.php");
    exit();
}else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_chungchi.php");
    exit();
}

  