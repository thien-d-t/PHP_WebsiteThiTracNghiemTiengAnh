  <?php 
  session_start();
  require 'config/connect.php';


  $nd = $_GET['noidung']??"";
  $chungchi = $_GET['chungchi']??"";
  $thoigianthi = $_GET['thoigianthi']??"";

  $noidung = trim($nd);

  $sql = "INSERT INTO `tbl_dethi`(`tendethi`, `thoigianthi`,`machungchi`) 
  VALUES ('$noidung','$thoigianthi','$chungchi')";
  $stm = $pdo->prepare($sql);

  if($stm->execute() == true){
    $_SESSION['successMessage'] = "Thêm đề thi mới thành công";
    header("Location: DS_dethi.php");
    exit();
  }else{
    $_SESSION['errorMessage'] = "Lỗi: ";
    header("Location: DS_dethi.php");
    exit();
  }

?>