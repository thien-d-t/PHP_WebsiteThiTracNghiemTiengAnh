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
        <a class="primary-btn" href="#themDeThi">Thêm </a>
        <div class="danhsachdethi">

        </div>
    </div>
</div>

<!-- modal them  -->
<div id="themDeThi" class="overlay">
  <div class="popup" style="height: 420px;">
        <div class="header-form">
            <h1 style="margin-top: 10px;">Thêm đề thi mới</h1>
            <a class="close" href="#">&times;</a>
        </div>
        <div class="">
            <form action="add_dethi.php" method="get" name="add-form" onsubmit="return validateForm_add()">
                <label style="position: relative;top:-20px">Chứng chỉ:</label><br>
                <select id="country" name="chungchi" style="width: 200px;">
                <option value="0"> -- Not Value --</option>
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

                <label for="" style="margin-left: 150px;position: relative;top:-70px">Thời gian thi:</label>
                <input type="number" name="thoigianthi" id=""placeholder="Thời gian thi.." style="margin-left: 350px;position: relative;top:-70px;width: 200px;">
                <label for="" style="margin-left: 5px; position: relative;top:-65px">minute</label>
                <br>
                
                <div style="position: relative;top: -60px;">
                <label for="">Nội dung đề thi</label>
                    <textarea id="subject" name="noidung" placeholder="Write something.." style="height:100px;top:5px"></textarea>
                </div>
                <a class="close-modal" href="#">Close</a>
                <input type="submit" value="Submit">
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
            $.post("danhsach_dethi.php", { id: macc }, function (data) {
                $(".danhsachdethi").html(data);
            })
        });
        function macdinh() {
            var id = 0;
            $.post("danhsach_dethi.php", { id: id }, function (data) {
                $(".danhsachdethi").html(data);
            })
        }
    });
</script>
<script>
    function validateForm_add(){
      var noidung = document.forms["add-form"]["noidung"].value;
      var chungchi = document.forms["add-form"]["chungchi"].value;
      var thoigianthi = document.forms["add-form"]["thoigianthi"].value;


      if (chungchi == 0) {
        alert("Vui lòng chọn chứng chỉ");
          return false;
      } else if (thoigianthi == null || thoigianthi == "") {
          alert("Vui lòng thiết lập thời gian thi");
          return false;
      }else if(noidung == null || noidung ==""){
          alert("Vui lòng nhập mô tả đề thi");
          return false;
      }
    }
</script>


