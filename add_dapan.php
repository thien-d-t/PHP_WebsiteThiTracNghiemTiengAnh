<?php 
  session_start();
  require 'config/connect.php';


  $macauhoi = $_GET['macauhoi']??"";
  $nd = $_GET['noidungdapan']??"";


  $noidung = trim($nd);

   echo"$macauhoi, $noidung";

  $sql = "INSERT INTO `tbl_dapan`(`noidungdapan`,`macauhoi`) VALUES ('$noidung','$macauhoi')";

  $stm = $pdo->prepare($sql);

  if($stm->execute() == true){
    $_SESSION['successMessage'] = "Thêm đáp án mới thành công";
    header("Location: DS_dapan.php");
    exit();
  }else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_dapan.php");
    exit();
  }

?>