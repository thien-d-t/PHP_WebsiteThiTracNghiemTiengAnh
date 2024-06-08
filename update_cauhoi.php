<?php 
session_start();
require 'config/connect.php';

$macauhoi = $_POST['macauhoi']??"";
$anh = $_FILES['img']['name'];
$audio = $_FILES['audio']['name'];
$nd = $_POST['noidung']??"";
$noidung = trim($nd);

//echo"$macauhoi,<br> ảnh: $anh,<br> audio: $audio,<br> noidung: $noidung";

if($anh == "" && $audio == ""){
    $sql = "UPDATE `tbl_cauhoi` 
        SET `noidungcauhoi`='$noidung'
        WHERE macauhoi='$macauhoi'";
        //echo"rong";
} else if($anh == ""){
    $sql = "UPDATE `tbl_cauhoi` 
        SET `noidungcauhoi`='$noidung',
        `amthanh`='$audio'
        WHERE macauhoi='$macauhoi'";
        //echo"anh rong";
}else if($audio == ""){
    $sql = "UPDATE `tbl_cauhoi` 
        SET `noidungcauhoi`='$noidung',
        `hinhanh`='$anh'
        WHERE macauhoi='$macauhoi'";
        //echo"audio rong";
}if($anh != "" && $audio != ""){
    $sql = "UPDATE `tbl_cauhoi` 
        SET `noidungcauhoi`='$noidung',
        `hinhanh`='$anh',`amthanh`='$audio'
        WHERE macauhoi='$macauhoi'";
        //echo"day du";
}

$stm = $pdo->prepare($sql);
move_uploaded_file($_FILES['img']['tmp_name'], "images/$anh");
move_uploaded_file($_FILES['audio']['tmp_name'], "audios/$audio");
  if($stm->execute() == true){
    $_SESSION['successMessage'] = "Cập nhật thông tin câu hỏi số $macauhoi thành công.";
    header("Location: DS_cauhoi.php");
    exit();
  }else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_cauhoi.php");
    exit();
  }

  