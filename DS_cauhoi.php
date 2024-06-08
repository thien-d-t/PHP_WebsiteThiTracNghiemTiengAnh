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
    
        <a class="primary-btn" href="#themCauHoi" style="position: relative;top:-520px;">Thêm </a>
    </div>
</div>

<!-- modal them  -->
<div id="themCauHoi" class="overlay">
  <div class="popup" style="height: 550px;">
        <div class="header-form" style="width: 762px;">
            <h1 style="margin-top: 10px;">Thêm câu hỏi mới</h1>
            <a class="close" href="#">&times;</a>
        </div>
        <div class="">
            <form action="add_cauhoi.php" method="post" name="add-form" onsubmit="return validateForm_add()" enctype="multipart/form-data">
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
                <label style="margin-left: 450px;position: relative;top:-110px">Đề thi số:</label><br>
                <div style="position: relative;top:-80px;left: -20px;" class="select-dethi-formAdd"></div>

                <div style="position: relative;top: -90px;">
                    <label style="position: relative;top:-20px;left: 20px;">Ảnh:</label><br>
                    <input style="position: relative;top:-20px;" type="file" name="img" id="">

                    <label for="" style="margin-left: 150px;position: relative;top:-70px">Audio:</label>
                    <input style="position: relative;top:-70px;left: 420px;" type="file" name="audio" id="">
                </div>
                <br>
                
                <div style="position: relative;top: -150px;">
                <label style="margin-left: 20px;" for="">Nội dung câu hỏi</label>
                    <textarea id="subject" name="noidung" placeholder="Write something.." style="height:100px;top:5px"></textarea>
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
            $.post("select_dethi.php", { macc: macc }, function (data) {
                $(".danhsachdethi").html(data);
            })
        });
        function macdinh() {
            var id = 0;
            $.post("select_dethi.php", { macc: id }, function (data) {
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
            $.post("select_dethi_formAdd.php", { macc: macc }, function (data) {
                $(".select-dethi-formAdd").html(data);
            })
        });
        function macdinh() {
            var id = 0;
            $.post("select_dethi_formAdd.php", { macc: id }, function (data) {
                $(".select-dethi-formAdd").html(data);
            })
        }
    });
</script>
<script>
    function validateForm_add(){
      var noidung = document.forms["add-form"]["noidung"].value;

    if(noidung == null || noidung ==""){
        alert("Vui lòng nhập nội dung câu hỏi");
        return false;
      }
    }
</script>


