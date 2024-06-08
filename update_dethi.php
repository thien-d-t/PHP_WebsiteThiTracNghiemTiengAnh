<?php 
session_start();
require 'config/connect.php';

$made = $_POST['made']??"";
$chungchi = $_POST['chungchi']??"";
$thoigianthi = $_POST['thoigianthi']??"";
$nd = $_POST['noidung']??"";
$noidung = trim($nd);


$sql = "UPDATE `tbl_dethi` 
SET `tendethi`='$noidung',`thoigianthi`='$thoigianthi',`machungchi`='$chungchi' WHERE made='$made'";

$stm = $pdo->prepare($sql);

  if($stm->execute() == true){
    $_SESSION['successMessage'] = "Cập nhật thông tin đề thi $made thành công.";
    header("Location: DS_dethi.php");
    exit();
  }else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_dethi.php");
    exit();
  }

  