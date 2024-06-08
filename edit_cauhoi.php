<?php

require 'config/connect.php';
require 'side_bar.php';


$macauhoi = $_GET['macauhoi'];

$sql = "SELECT *
  FROM tbl_cauhoi
  WHERE macauhoi='$macauhoi'";
$stm = $pdo->query($sql);
$row = $stm->fetch(PDO::FETCH_OBJ);
if($row->hinhanh != null && $row->amthanh != null){
  ?>
  <div class="form-edit" style="width: 60%;height: 520px;margin-bottom: 10px;">
    <form action="update_cauhoi.php" method="post" name="edit-form" onsubmit="return validateForm_edit()" enctype="multipart/form-data">
      <div class="header-form-edit" style="width: 742px;">
        <h1 style="position: absolute;">Cập nhật câu hỏi số: </h1>
        <input style="margin-left: 200px;" class="input-none" type="text" name="macauhoi" id="" value="<?php echo $macauhoi?>">
      </div>
      <div>
        <label  style="margin-left: 60px;">Ảnh:</label><br>
        <img style="width: 20%;height: 20%;margin-left: 70px;" src="./images/<?php echo $row->hinhanh?>" alt="">
        <br>
        <input style="margin-left: 50px;margin-top: 10px;" type="file" name="img" id="">
      </div>
      <br>
        <div style="margin: -230px 0px 0px 400px;">
        <label for="" style="margin-left: 10px;">Audio: </label>
        <br>  
        <div style="margin: 25px 0px 0px 20px;">
          <audio controls style="width: 250px;">
            <source src="./audios/<?php echo $row->amthanh?>">
          </audio>
        </div>
        <br>
        <input style="margin: 22px 0px 0px 0px;" type="file" name="audio" id="">
      </div>
      <br>         
        <div style="margin-left: 50px;">
          <label style="margin-left: 10px;" for="">Nội dung câu hỏi</label><br>
          <textarea id="subject" name="noidung" placeholder="Exam content.." style="height:100px;top:0px;width: 90%;"><?php echo $row->noidungcauhoi?></textarea>
        </div>
        <div style="margin-top: 50px;">
          <a class="close-modal" href="DS_cauhoi.php" style="position: relative;right: 50px;">Close</a>
          <input type="submit" value="Submit" style="position: relative;right: 50px;top: 0px;">
        </div>
    </form>
  </div>
  <?php
}else if($row->hinhanh == null && $row->amthanh == null){
  ?>
  <div class="form-edit" style="width: 60%;height: 520px;margin-bottom: 10px;">
    <form action="update_cauhoi.php" method="post" name="edit-form" onsubmit="return validateForm_edit()" enctype="multipart/form-data">
      <div class="header-form-edit" style="width: 742px;">
        <h1 style="position: absolute;">Cập nhật câu hỏi số: </h1>
        <input style="margin-left: 200px;" class="input-none" type="text" name="macauhoi" id="" value="<?php echo $macauhoi?>">
      </div>
      <div>
        <label  style="margin-left: 60px;">Ảnh:</label><br>
        <label style="margin-left: 70px;">No Image</label>
        <br>
        <input style="margin-left: 50px;margin-top: 10px;" type="file" name="img" id="">
      </div>
      <br>
        <div style="margin: -176px 0px 0px 400px;">
        <label for="" style="margin-left: 10px;">Audio: </label>
        <br>  
        <label style="margin-left: 20px;">No Audio</label>
        <br>
        <input style="margin: 9.5px 0px 0px 0px;" type="file" name="audio" id="">
      </div>
      <br>         
        <div style="margin-left: 50px;">
          <label style="margin-left: 10px;" for="">Nội dung câu hỏi</label><br>
          <textarea id="subject" name="noidung" placeholder="Exam content.." style="height:100px;top:0px;width: 90%;"><?php echo $row->noidungcauhoi?></textarea>
        </div>
        <div style="margin-top: 70px;">
          <a class="close-modal" href="DS_cauhoi.php" style="position: relative;right: 50px;">Close</a>
          <input type="submit" value="Submit" style="position: relative;right: 50px;top: 0px;">
        </div>
    </form>
  </div>
  <?php
}else if($row->amthanh == null){
  ?>
  <div class="form-edit" style="width: 60%;height: 520px;margin-bottom: 10px;">
    <form action="update_cauhoi.php" method="post" name="edit-form" onsubmit="return validateForm_edit()" enctype="multipart/form-data">
      <div class="header-form-edit" style="width: 742px;">
        <h1 style="position: absolute;">Cập nhật câu hỏi số: </h1>
        <input style="margin-left: 200px;" class="input-none" type="text" name="macauhoi" id="" value="<?php echo $macauhoi?>">
      </div>
      <div>
        <label  style="margin-left: 60px;">Ảnh:</label><br>
        <img style="width: 20%;height: 20%;margin-left: 70px;" src="./images/<?php echo $row->hinhanh?>" alt="">
        <br>
        <input style="margin-left: 50px;margin-top: 10px;" type="file" name="img" id="">
      </div>
      <br>
        <div style="margin: -230px 0px 0px 400px;">
        <label for="" style="margin-left: 10px;">Audio: </label>
        <br>  
        <label style="margin-left: 20px;margin-top: 20px;">No Audio</label>
        <br>
        <input style="margin: 43.5px 0px 0px 0px;" type="file" name="audio" id="">
      </div>
      <br>         
        <div style="margin-left: 50px;margin-top: -20px;">
          <label style="margin-left: 10px;" for="">Nội dung câu hỏi</label><br>
          <textarea id="subject" name="noidung" placeholder="Exam content.." style="height:100px;top:0px;width: 90%;"><?php echo $row->noidungcauhoi?></textarea>
        </div>
        <div style="margin-top: 60px;">
          <a class="close-modal" href="DS_cauhoi.php" style="position: relative;right: 50px;">Close</a>
          <input type="submit" value="Submit" style="position: relative;right: 50px;top: 0px;">
        </div>
    </form>
  </div>
  <?php
}else{
  ?>
  <div class="form-edit" style="width: 60%;height: 520px;margin-bottom: 10px;">
    <form action="update_cauhoi.php" method="post" name="edit-form" onsubmit="return validateForm_edit()" enctype="multipart/form-data">
      <div class="header-form-edit" style="width: 742px;">
        <h1 style="position: absolute;">Cập nhật câu hỏi số: </h1>
        <input style="margin-left: 200px;" class="input-none" type="text" name="macauhoi" id="" value="<?php echo $macauhoi?>">
      </div>
      <div>
        <label  style="margin-left: 60px;">Ảnh:</label><br>
        <label style="margin-left: 70px;">No Image</label>
        <br>
        <input style="margin-left: 50px;margin-top: 10px;" type="file" name="img" id="">
      </div>
      <br>
        <div style="margin: -176px 0px 0px 400px;">
        <label for="" style="margin-left: 10px;">Audio: </label>
        <div style="margin-left: 20px;">
          <audio controls style="width: 250px;">
            <source src="./audios/<?php echo $row->amthanh?>">
          </audio>
        </div>
        <br>
        <input style="margin-top: -6.5px;" type="file" name="audio" id="">
      </div>
      <br>         
        <div style="margin-left: 50px;margin-top: -20px;">
          <label style="margin-left: 10px;" for="">Nội dung câu hỏi</label><br>
          <textarea id="subject" name="noidung" placeholder="Exam content.." style="height:100px;top:0px;width: 90%;"><?php echo $row->noidungcauhoi?></textarea>
        </div>
        <div style="margin-top: 60px;">
          <a class="close-modal" href="DS_cauhoi.php" style="position: relative;right: 50px;">Close</a>
          <input type="submit" value="Submit" style="position: relative;right: 50px;top: 0px;">
        </div>
    </form>
  </div>
  <?php
}
?>

<script>
    function quay_lai_trang_truoc() {
        history.back();
    }

    function validateForm_edit(){
      var noidung = document.forms["edit-form"]["noidung"].value;


      if(noidung == null || noidung ==""){
        alert("Vui lòng nhập nội dung câu hỏi");
        return false;
      }
    }
</script>
