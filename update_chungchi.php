<?php 
session_start();
require 'config/connect.php';

$machungchi = $_POST['machungchi'];
$tenchungchi = $_POST['name'] ?? "";
$mota = $_POST['mota'] ?? "";

$sql = "UPDATE tbl_chungchi SET tenchungchi = :tenchungchi, mota = :mota WHERE machungchi = :machungchi";
$stm = $pdo->prepare($sql);

// Gán giá trị cho các placeholder
$stm->bindParam('machungchi', $machungchi, PDO::PARAM_STR);
$stm->bindParam('tenchungchi', $tenchungchi, PDO::PARAM_STR);
$stm->bindParam('mota', $mota, PDO::PARAM_STR);

if ($stm->execute()) {
    $_SESSION['successMessage'] = "Cập nhật thông tin chứng chỉ $tenchungchi thành công.";
    header("Location: DS_chungchi.php");
    exit();
} else {
    $_SESSION['errorMessage'] = "Lỗi: Không thể cập nhật thông tin chứng chỉ.";
    header("Location: DS_chungchi.php");
    exit();
}
?>
