<?php
require_once 'config/connect.php';
$macauhoi = $_POST['macauhoi'];
if($macauhoi == 0){
    ?>
        <div style="position: relative;top: -80px;left: 20px;">
            <label style="margin-left: 20px;" for="">Nội dung câu hỏi</label>
            <textarea id="subject" name="noidung" placeholder="Write something.." style="height:100px;top:5px"></textarea>
        </div>
    <?php
}else{
    $stm = $pdo->query("SELECT * FROM `tbl_cauhoi` WHERE macauhoi = '$macauhoi'");
    $data = $stm->fetch(PDO::FETCH_OBJ);
        ?>
            <div style="position: relative;top: -80px;left: 20px;">
                <label style="margin-left: 20px;" for="">Nội dung câu hỏi</label>
                <textarea id="subject" name="noidung" placeholder="Write something.." style="height:100px;top:5px" readonly><?php echo $data->noidungcauhoi ?></textarea>
            </div>
         <?php 
}
?>

