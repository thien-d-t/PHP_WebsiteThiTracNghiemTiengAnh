<?php 
    require 'side_bar.php';
    require 'config/connect.php';
?>
<div class="row">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h1 style="margin-top: 20px;margin-left: 20px;">Chứng chỉ: <span id="text-date" style="display: inline;"></span></h1>
        <?php
            $sql = "SELECT * FROM tbl_chungchi order by machungchi";
            $stm = $pdo->query($sql);
        ?>
        <p>
            <select class="select-date" style="width: 200px;position: relative;left: 120px;top:-35px">
                <option value="0"> -- Not Value --</option>
                <?php
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
        </p>
        <h1 style="margin-top: -74px;margin-left: 400px;">Đề số: <span id="text-date" style="display: inline;"></span></h1>
        <div class="danhsachdethi"></div>
        <a class="primary-btn" href="#themDapAn" style="margin-top: -570px;position: relative;right: 190px;">Thêm </a>
    </div>
</div>

<!-- modal them  -->
<div id="themDapAn" class="overlay">
  <div class="popup" style="height: 580px;">
        <div class="header-form">
            <h1 style="margin-top: 10px;">Thêm đáp án mới</h1>
            <a class="close" href="#">&times;</a>
        </div>
        <div class="">
            <form action="add_dapan.php" method="get" name="add-form" onsubmit="return validateForm_add()" enctype="multipart/form-data">
                <label style="position: relative;top:-20px;left: 20px;">Chứng chỉ:</label><br>
                <?php
                    $sql = "SELECT * FROM tbl_chungchi order by machungchi";
                    $stm = $pdo->query($sql);
                ?>
                <p>
                    <select class="select-date-formAdd" style="width: 200px;position: relative;left: 10px;top:-20px">
                        <option value="0"> -- Not Value --</option>
                        <?php
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
                </p>
                <label style="margin-left: 280px;position: relative;top:-115px">Đề thi số:</label><br>
                <div style="position: relative;top:-80px;left: -20px;" class="select-dethi-cauhoi-formAdd"></div>
                
                <br>
                <div style="position: relative;top: -160px;">
                    <label style="margin-left: 20px;" for="">Nội dung đáp án</label>
                    <textarea id="subject" name="noidungdapan" placeholder="Write something.." style="height:100px;top:5px"></textarea>
                </div>
                
                <div style="margin-top: -80px;">
                <a class="close-modal" href="#">Close</a>
                <input type="submit" value="Submit">
                </div>
            </form>
        </div>
  </div>
</div>

</body>
</html>
<script>
    $(document).ready(function () {
        macdinh();
        $('.select-date').change(function () {
            var macc = $(this).val();
            //$('#text-date').text(text);
            $.post("select_dethi_cauhoi.php", { macc: macc }, function (data) {
                $(".danhsachdethi").html(data);
            })
        });
        function macdinh() {
            var id = 0;
            $.post("select_dethi_cauhoi.php", { macc: id }, function (data) {
                $(".danhsachdethi").html(data);
            })
        }
    });
</script>

<script>
    $(document).ready(function () {
        macdinh();
        $('.select-date-formAdd').change(function () {
            var macc = $(this).val();
            //$('#text-date').text(text);
            $.post("select_dethi_cauhoi_formAdd.php", { macc: macc }, function (data) {
                $(".select-dethi-cauhoi-formAdd").html(data);
            })
        });
        function macdinh() {
            var id = 0;
            $.post("select_dethi_cauhoi_formAdd.php", { macc: id }, function (data) {
                $(".select-dethi-cauhoi-formAdd").html(data);
            })
        }
    });
</script>
<script>
    function validateForm_add(){
      var noidung = document.forms["add-form"]["noidung"].value;
      var dethi = document.forms["add-form"]["made"].value;

      if(dethi == 0){
        alert("Vui lòng chọn đề thi");
        return false;
      }else if(noidung == null || noidung ==""){
        alert("Vui lòng nhập nội dung câu hỏi");
        return false;
      }
    }
</script>


