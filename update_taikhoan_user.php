<?php 
session_start();
require 'config/connect.php';

$id_nguoidung = $_POST['id_nguoidung'];
$hoten = $_POST['name']??"";
$ngaysinh = $_POST['bod']??"";
$email = $_POST['email']??"";
$taikhoan = $_POST['username']??"";
$matkhau = $_POST['password']??"";


$sql = "UPDATE `tbl_nguoidung`
SET `hoten`='$hoten',`ngaysinh`='$ngaysinh',`email`='$email' ,`taikhoan`='$taikhoan',`matkhau`='$matkhau' 
WHERE `id_nguoidung`='$id_nguoidung' ";

$stm = $pdo->prepare($sql);

  if($stm->execute() == true){
    $_SESSION['successMessage'] = "Cập nhật thông tin người dùng $hoten thành công.";
    header("Location: trangCaNhan.php");
    exit();
  }else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: trangCaNhan.php");
    exit();
  }

  