<?php 
session_start();
require 'config/connect.php';

$tenchungchi = $_POST['name'] ?? "";
$mota = $_POST['mota'] ?? "";

$sql = "INSERT INTO `tbl_chungchi` (`tenchungchi`, `mota`) VALUES (:tenchungchi, :mota)";

$stm = $pdo->prepare($sql);

$stm->bindParam(':tenchungchi', $tenchungchi);
$stm->bindParam(':mota', $mota);

if($stm->execute()){
    $_SESSION['successMessage'] = "Thêm chứng chỉ $tenchungchi thành công.";
    header("Location: DS_chungchi.php");
    exit();
}else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_chungchi.php");
    exit();
}
  