<?php 
session_start();
require 'config/connect.php';

$hoten = $_POST['name'] ?? "";
$ngaysinh = $_POST['bod'] ?? "";
$email = $_POST['email'] ?? "";
$taikhoan = $_POST['username'] ?? "";
$matkhau = $_POST['password'] ?? "";
$manhomquyen = $_POST['role'] ?? 0;

$sql = "INSERT INTO `tbl_nguoidung` (`hoten`, `ngaysinh`, `email`, `taikhoan`, `matkhau`, `manhomquyen`) 
        VALUES (:hoten, :ngaysinh, :email, :taikhoan, :matkhau, :manhomquyen)";

$stm = $pdo->prepare($sql);

// Gán giá trị cho các placeholder
$stm->bindParam(':hoten', $hoten, PDO::PARAM_STR);
$stm->bindParam(':ngaysinh', $ngaysinh, PDO::PARAM_STR);
$stm->bindParam(':email', $email, PDO::PARAM_STR);
$stm->bindParam(':taikhoan', $taikhoan, PDO::PARAM_STR);
$stm->bindParam(':matkhau', $matkhau, PDO::PARAM_STR);
$stm->bindParam(':manhomquyen', $manhomquyen, PDO::PARAM_INT);

if ($stm->execute()) {
    $_SESSION['successMessage'] = "Thêm người dùng $hoten thành công.";
    header("Location: DS_taikhoan.php");
    exit();
} else {
    $_SESSION['errorMessage'] = "Lỗi: Không thể thêm người dùng.";
    header("Location: DS_taikhoan.php");
    exit();
}
?>
