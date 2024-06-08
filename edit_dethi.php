<?php

require 'config/connect.php';
require 'side_bar.php';


$made = $_GET['made'];

$sql = "SELECT *
FROM tbl_dethi
LEFT JOIN tbl_chungchi
ON tbl_dethi.machungchi = tbl_chungchi.machungchi
WHERE made='$made'";
$stm = $pdo->query($sql);
$row = $stm->fetch(PDO::FETCH_OBJ);
?>
<div>
<div class="form-edit" >
  
  <form action="update_dethi.php" method="post" name="edit-form" onsubmit="return validateForm_edit()">
    <div class="header-form-edit">
      <h1>Cập nhật đề thi số: </h1>
      <input class="input-none" type="text" name="made" id="" value="<?php echo $made?>">
    </div>
    <label  style="margin-left: 50px;">Chứng chỉ:</label><br>
      <select id="country" name="chungchi" style="width: 150px;margin: 20px 50px;">
        <option selected value="<?php echo $row->machungchi ?>">
          <?php echo $row->tenchungchi ?>
        </option>
        <?php
          $sql = "SELECT * FROM tbl_chungchi order by machungchi";
          $stm = $pdo->query($sql);
          $data = $stm->fetchAll(PDO::FETCH_OBJ);
          if($stm->rowCount()>0){
            foreach($data as $item){
              ?>
                <option value="<?php echo $item->machungchi ?>">
                  <?php echo $item->tenchungchi ?>
                </option>
              <?php
            }
            ?>
            <?php 
          }
          ?>
      </select>
      <label for="" style="margin-left: 150px;position: relative;top:-65px">Thời gian thi:</label>
      <input type="number" name="thoigianthi" id=""placeholder="Thời gian thi..." style="margin-left: 400px;position: relative;top:-90px;width: 150px;" value="<?php echo $row->thoigianthi ?>">
      <label for="" style="margin-left: 5px; position: relative;top:-90px">minute</label>
      <br>
                
      <div style="position: relative;top: -80px;margin-left: 50px;">
        <label for="">Nội dung đề thi</label><br>
        <textarea id="subject" name="noidung" placeholder="Exam content.." style="height:100px;top:0px;width: 90%;">123</textarea>
      </div>
      <a class="close-modal" href="DS_dethi.php" style="position: relative;right: 100px;">Close</a>
      <input type="submit" value="Submit" style="position: relative;right: 50px;top: -20px;">
  </form>
</div>
</div>
<script>
    function quay_lai_trang_truoc() {
        history.back();
    }

    function validateForm_edit(){
      var noidung = document.forms["edit-form"]["noidung"].value;
      var thoigianthi = document.forms["edit-form"]["thoigianthi"].value;


      if (thoigianthi == null || thoigianthi == "") {
          alert("Vui lòng thiết lập thời gian thi");
          return false;
      }else if(noidung == null || noidung ==""){
          alert("Vui lòng nhập mô tả đề thi");
          return false;
      }
    }
</script>
