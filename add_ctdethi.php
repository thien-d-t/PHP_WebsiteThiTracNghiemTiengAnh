<?php 
session_start();
unset($_SESSION['ss_made']);
require 'config/connect.php';

$made = $_GET['made'];
$macauhoi = $_GET['macauhoi'];

$_SESSION['ss_made'] = $made;

//echo"$made,$macauhoi";

$sqlselect ="SELECT * FROM `tbl_ctdethi` WHERE `made`='$made' AND `macauhoi`='$macauhoi'";
$stm = $pdo->query($sqlselect);


if($stm->rowCount()==0){
    $sqlInsert = "INSERT INTO `tbl_ctdethi`(`made`, `macauhoi`) VALUES ('$made','$macauhoi')";
    $stmInsert= $pdo->prepare($sqlInsert);

    if($stmInsert->execute() == true){
        $_SESSION['successMessage'] = "Thêm câu hỏi $macauhoi vào đề thi $made thành công!!!";
        header("Location: soan_dethi.php");
        exit();
    }else{
        $_SESSION['errorMessage'] = "Lỗi: ";
        header("Location: soan_dethi.php");
        exit();
    }
}else{
    $_SESSION['successMessage'] = "Câu hỏi đã có trong đề $made rồi!!!";
    header("Location: soan_dethi.php");
    exit();
}


