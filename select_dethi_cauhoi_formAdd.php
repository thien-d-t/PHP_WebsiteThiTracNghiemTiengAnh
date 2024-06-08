<?php
require_once 'config/connect.php';
$macc = $_POST['macc'];
if($macc == 0){
    ?>
        <p>
            <select class="select-date" style="width: 200px;position: relative;left: 290px;top:-37px">
                <option value="0"> -- Not Value --</option>
            </select>
        </p>
    <?php
}else{
    $stm = $pdo->query("SELECT made
    FROM tbl_dethi t
    JOIN tbl_chungchi c ON t.machungchi = c.machungchi
    WHERE t.machungchi = '$macc'");
    $data = $stm->fetchAll(PDO::FETCH_OBJ);
        ?>
            <p>
                <select class="select-date-made" style="width: 200px;position: relative;left: 290px;top:-37px">
                    <option value="0"> -- Not Value --</option>
                    <?php
                        if($stm->rowCount()>0){
                            foreach($data as $item){
                                ?>
                                    <option value="<?php echo $item->made ?>">
                                        <?php echo $item->made ?>
                                    </option>
                                <?php
                            }
                            ?>
                            <?php 
                        }else{
                            echo"không có đề thi";
                        }
                    ?>
                </select>
            </p>
         <?php 
}
?>
<label style="margin-top: -132px;margin-left: 550px;">Câu hỏi số: <span id="text-date" style="display: inline;"></span></label>
<div class="select-macauhoi"></div>

<script>
    $(document).ready(function () {
        macdinh();
        $('.select-date-made').change(function () {
            var made = $(this).val();
            //$('#text-date').text(text);
            $.post("select_cauhoi_dapan.php", { made: made}, function (data) {
                $(".select-macauhoi").html(data);
            })
        });
        function macdinh() {
            var id = 0;
            $.post("select_cauhoi_dapan.php", { made: id}, function (data) {
                $(".select-macauhoi").html(data);
            })
        }
    });
</script>
