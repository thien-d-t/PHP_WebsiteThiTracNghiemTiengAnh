<?php

require 'config/connect.php';
require 'side_bar.php';


$madapan = $_GET['madapan'];

$sql = "SELECT *
  FROM tbl_dapan
  LEFT JOIN tbl_cauhoi
  ON tbl_cauhoi.macauhoi = tbl_dapan.macauhoi
  WHERE tbl_dapan.madapan='$madapan'";
$stm = $pdo->query($sql);
$row = $stm->fetch(PDO::FETCH_OBJ);
?>
<div>
<div class="form-edit" style="width: 60%;height: 480px;">
  
  <form action="update_dapan.php" method="post" name="edit-form" onsubmit="return validateForm_edit()">
    <div class="header-form-edit" style="width: 742px;">
      <h1>Cập nhật đáp án số: </h1>
      <input style="margin-left: 200px;" class="input-none" type="text" name="madapan" id="" value="<?php echo $madapan?>">
    </div>
    <br>
      <div style="position: relative;top: 0px;margin-left: 50px;">
        <label style="margin-left: 10px;" for="">Nội dung câu hỏi</label><br>
        <textarea id="subject" name="" placeholder="Exam content.." style="height:100px;top:0px;width: 90%;" readonly><?php echo $row->noidungcauhoi?></textarea>
        
        <label style="margin-left: 10px;" for="">Nội dung câu trả lời </label><br>
        <textarea id="subject" name="noidungdapan" placeholder="Exam content.." style="height:100px;top:0px;width: 90%;"><?php echo $row->noidungdapan?></textarea>
    </div>
      
      <div style="position: relative;top:70px">
      <a class="close-modal" href="DS_cauhoi.php" style="position: relative;right: 50px;">Close</a>
      <input type="submit" value="Submit" style="position: relative;right: 50px;top: 0px;">
      </div>
  </form>
</div>
</div>
<script>
    function quay_lai_trang_truoc() {
        history.back();
    }

    function validateForm_edit(){
      var noidung = document.forms["edit-form"]["noidungdapan"].value;


      if(noidung == null || noidung ==""){
        alert("Vui lòng nhập nội dung đáp án");
        return false;
      }
    }
</script>
