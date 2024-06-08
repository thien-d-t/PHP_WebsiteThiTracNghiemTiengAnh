<?php 
  session_start();
  require 'config/connect.php';


  $made = $_POST['made']??"";
  $nd = $_POST['noidung']??"";
  $anh = $_FILES['img']['name']??null;
  $audio = $_FILES['audio']['name']??null;

  $noidung = trim($nd);

   //echo"$anh, $audio, $made, $noidung";

  if($made == 0){
    $sql = "INSERT INTO `tbl_cauhoi`(`noidungcauhoi`, `hinhanh`, `amthanh`) 
    VALUES ('$noidung','$anh','$audio')";

    $stm = $pdo->prepare($sql);
    move_uploaded_file($_FILES['img']['tmp_name'], "images/$img");
    move_uploaded_file($_FILES['audio']['tmp_name'], "audios/$audio");

    if($stm->execute() == true){
      $_SESSION['successMessage'] = "Thêm câu hỏi mới thành công";
      header("Location: DS_cauhoi.php");
      exit();
    }else{
      $_SESSION['errorMessage'] = "Lỗi: ";
      header("Location: DS_cauhoi.php");
      exit();
    }
  }else{
    $sql = "INSERT INTO `tbl_cauhoi`(`noidungcauhoi`, `hinhanh`, `amthanh`) 
    VALUES ('$noidung','$anh','$audio')";
    $stm = $pdo->prepare($sql);
    move_uploaded_file($_FILES['img']['tmp_name'], "images/$img");
    move_uploaded_file($_FILES['audio']['tmp_name'], "audios/$audio");

    if($stm->execute() == true){
      $selectMaCauHoi = "SELECT `macauhoi` FROM `tbl_cauhoi` WHERE `noidungcauhoi` = '$noidung'";
      $stmSelect = $pdo->query($selectMaCauHoi);
      $data = $stmSelect->fetch(PDO::FETCH_OBJ);

      $insertCTDeThi = "INSERT INTO `tbl_ctdethi`(`made`, `macauhoi`) VALUES ('$made','$data->macauhoi')";

      $stmInsert = $pdo->prepare($insertCTDeThi);

      if($stmInsert->execute() == true){
        $_SESSION['successMessage'] = "Thêm câu hỏi mới thành công vào đề thi $made";
        header("Location: DS_cauhoi.php");
        exit();
      }else{
        $_SESSION['errorMessage'] = "Lỗi: ";
        header("Location: DS_cauhoi.php");
        exit();
      }
      
    }
  }

  

?>