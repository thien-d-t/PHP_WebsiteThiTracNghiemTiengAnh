<?php
require_once 'config/connect.php';
$macc = $_POST['macc'];
if($macc == 0){
    ?>
        <p>
            <select class="select-date" style="width: 200px;position: relative;left: 460px;top:-35px">
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
                <select class="select-date-made" style="width: 200px;position: relative;left: 460px;top:-35px">
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
<h1 style="margin-top: -74px;margin-left: 750px;">Câu hỏi số: <span id="text-date" style="display: inline;"></span></h1>
<div class="danhsachcauhoi"></div>

<script>
    $(document).ready(function () {
        macdinh();
        $('.select-date-made').change(function () {
            var made = $(this).val();
            //$('#text-date').text(text);
            $.post("select_cauhoi.php", { made: made}, function (data) {
                $(".danhsachcauhoi").html(data);
            })
        });
        function macdinh() {
            var id = 0;
            $.post("select_cauhoi.php", { made: id}, function (data) {
                $(".danhsachcauhoi").html(data);
            })
        }
    });
</script>
