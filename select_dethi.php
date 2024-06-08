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
        <div style="position: relative; top: -70px;left: 750px;">
            <h1>Câu hỏi: </h1>
            <input type="text" id="search-box" placeholder="Nội dung câu hỏi..." style="width: 200px; margin-top: -15px;left: 78px;">
            <button class="btn-search" style="margin: -62px 0px 0px 300px;" id="btn-search">
                <div class="svg-wrapper-1">
                <div class="svg-wrapper">
                <svg width="30" height="30" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm-7 5a7 7 0 1 1 14 0 7 7 0 0 1-14 0Z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M13.793 13.793a1 1 0 0 1 1.414 0l4.5 4.5a1 1 0 0 1-1.414 1.414l-4.5-4.5a1 1 0 0 1 0-1.414Z" clip-rule="evenodd"></path>
                </svg>
                </div>
                </div>
                <span>Search</span>
            </button>
        </div>
        
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
            <div style="position: relative; top: -70px;left: 750px;">
            <h1>Câu hỏi: </h1>
            <input type="text" id="search-box" placeholder="Nội dung câu hỏi..." style="width: 200px; margin-top: -15px;left: 78px;">
            <button class="btn-search" style="margin: -62px 0px 0px 300px;" id="btn-search">
                <div class="svg-wrapper-1">
                <div class="svg-wrapper">
                <svg width="30" height="30" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm-7 5a7 7 0 1 1 14 0 7 7 0 0 1-14 0Z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M13.793 13.793a1 1 0 0 1 1.414 0l4.5 4.5a1 1 0 0 1-1.414 1.414l-4.5-4.5a1 1 0 0 1 0-1.414Z" clip-rule="evenodd"></path>
                </svg>
                </div>
                </div>
                <span>Search</span>
            </button>
        </div>
         <?php 
}
?>
<div class="danhsachcauhoi"></div>

<script>
    $(document).ready(function () {
        macdinh();
        $('.select-date-made').change(function () {
            var made = $(this).val();
            //$('#text-date').text(text);
            $.post("danhsach_cauhoi.php", { made: made}, function (data) {
                $(".danhsachcauhoi").html(data);
            })
        });
        function macdinh() {
            var id = 0;
            $.post("danhsach_cauhoi.php", { made: id}, function (data) {
                $(".danhsachcauhoi").html(data);
            })
        }

        
    });
</script>
<script>
    $(document).ready(function () {
        $('.btn-search').click(function() {
            var searchQuery = $('#search-box').val();
            $.post("search_cauhoi.php", {
                query: searchQuery
                }, function(data) {
                    $(".danhsachcauhoi").html(data);
                });
        });
    });
</script>