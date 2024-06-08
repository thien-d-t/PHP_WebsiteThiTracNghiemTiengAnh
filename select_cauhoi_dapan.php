<?php
require_once 'config/connect.php';
$made = $_POST['made'];
if($made == 0){
    ?>
        <p>
            <select class="select-date" style="width: 200px;position: relative;left: 540px;top:-83px" name="macauhoi">
                <option value="0"> -- Not Value --</option>
            </select>
        </p>
    <?php
}else{
    $stm = $pdo->query("SELECT macauhoi
    FROM tbl_cauhoi ch
    JOIN tbl_dethi dt ON dt.made = ch.made
    WHERE ch.made = '$made'
    GROUP BY macauhoi");
    $data = $stm->fetchAll(PDO::FETCH_OBJ);
        ?>
            <p>
                <select class="select-date-macauhoi" style="width: 200px;position: relative;left: 540px;top:-83px" name="macauhoi">
                    <option value="0"> -- Not Value --</option>
                    <?php
                        if($stm->rowCount()>0){
                            foreach($data as $item){
                                ?>
                                    <option value="<?php echo $item->macauhoi ?>">
                                        <?php echo $item->macauhoi ?>
                                    </option>
                                <?php
                            }
                            ?>
                            <?php 
                        }else{
                            echo"không có câu hỏi";
                        }
                    ?>
                </select>
            </p>
         <?php 
}
?>
<div class="noidungcauhoi"></div>

<script>
    $(document).ready(function () {
        macdinh();
        $('.select-date-macauhoi').change(function () {
            var macauhoi = $(this).val();
            //$('#text-date').text(text);
            $.post("noidungCauHoi.php", { macauhoi: macauhoi}, function (data) {
                $(".noidungcauhoi").html(data);
            })
        });
        function macdinh() {
            var id = 0;
            $.post("noidungCauHoi.php", { macauhoi: id}, function (data) {
                $(".noidungcauhoi").html(data);
            })
        }
    });
</script>
