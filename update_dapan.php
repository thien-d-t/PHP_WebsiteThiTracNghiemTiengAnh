<?php 
session_start();
require 'config/connect.php';

$madapan = $_POST['madapan']??"";
$nd = $_POST['noidungdapan']??"";
$noidung = trim($nd);


$sql = "UPDATE `tbl_dapan` SET `noidungdapan`='$noidung' WHERE `madapan`='$madapan'";

$stm = $pdo->prepare($sql);

  if($stm->execute() == true){
    $_SESSION['successMessage'] = "Cập nhật thông tin đáp án $madapan thành công.";
    header("Location: DS_dapan.php");
    exit();
  }else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_dapan.php");
    exit();
  }

  