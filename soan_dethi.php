<?php
require 'config/connect.php';
require 'side_bar.php';
$made = $_GET['made']??$_SESSION['ss_made'];

$i = 1;
?>
<div>
    <h1 style="margin: 20px 0px 0px 20px;">Soạn đề thi số: <?php echo $made?></h1>
    <div style="margin: -28px 0px 0px 780px;">
        <h1>Câu hỏi: </h1>
        <input type="text" id="search-box" placeholder="Nội dung câu hỏi..." style="width: 200px; margin-top: -15px;left: 78px;">
        <button class="btn-search" style="margin: -60px 0px 40px 300px;" id="btn-search">
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
    <div class="danhsachcauhoi">
    <table class="styled-table" style="width: 1140px;margin-left: 50px;table-layout: fixed;margin-top: 1px;">
                <thead style="display: table;">
                    <tr>
                        <td style="text-align: center;width: 50px">STT</td>
                        <td style="text-align: center;width: 120px">Mã câu hỏi</td>
                        <td style="width: 350px;">Nội dung câu hỏi</td>
                        <td style="text-align: center;width: 150px;">Hình ảnh</td>
                        <td style="text-align: center;width: 260px;">Âm thanh</td>
                        <td style="text-align: center;width: 200px;">Action</td>
                    </tr>
                </thead>
                <tbody style="display: block;height: 420px;overflow: auto;width: 100%;">
        <?php
         $stm = $pdo->query("SELECT *
         FROM tbl_cauhoi");
         $data = $stm->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $item){
            if($i % 2 !=0){
                ?>
                <tr style="display: table; width: 100%;table-layout: fixed;">
                    <td style="text-align: center;width: 50px;"><?php echo $i?></td>
                    <td style="text-align: center;width: 130px;"><?php echo $item->macauhoi?></td>
                    <td style="width: 350px;"><?php echo $item->noidungcauhoi?></td>
                    <?php 
                        if($item->hinhanh == null){
                            ?>
                                <td style="text-align: center;width: 140px;">No Imange</td>
                            <?php
                        }else{
                            ?>
                                <td style="text-align: center;width: 140px;"> 
                                    <img style="width: 70%;height: 70%;" src="./images/<?php echo $item->hinhanh?>" alt="">
                                </td>
                            <?php
                        }
                    ?>
                    <?php 
                        if($item->amthanh == null){
                            ?>
                                <td style="text-align: center;width: 260px;">No Audio</td>
                            <?php
                        }else{
                            ?>
                                <td style="text-align: center;width: 260px;">
                                <audio controls style="width: 250px;" >
                                    <source src="./audios/<?php echo $item->amthanh?>">
                                </audio>
                                </td>
                            <?php
                        }
                    ?>
                    <td style="text-align: center;">
                        <?php 
                            $sqlSelect = "SELECT * FROM `tbl_ctdethi` WHERE `macauhoi` ='$item->macauhoi' AND`made`='$made'";
                            $stmSelect = $pdo->query($sqlSelect);
                            if($stmSelect->rowCount() !=0){
                                ?>
                                <a 
                                    href="add_ctdethi.php?macauhoi=<?php echo $item->macauhoi?>&made=<?php echo $made?>">
                                    <svg width="30" height="30" fill="#2e9112" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h3a1 1 0 1 1 0 2H8a4 4 0 0 1-4-4V6a4 4 0 0 1 4-4h5.5a1 1 0 0 1 .715.3l5.5 5.626a1 1 0 0 1 .285.699v3.188a1 1 0 1 1-2 0V9.624h-3.5a2 2 0 0 1-2-2V4H8Zm6.5 1.453 2.124 2.172H14.5V5.453Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M17 14a1 1 0 0 1 1 1v2h2a1 1 0 1 1 0 2h-2v2a1 1 0 1 1-2 0v-2h-2a1 1 0 1 1 0-2h2v-2a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                    <a onclick="return confirm('Bạn có muốn xóa câu hỏi <?php echo $item->macauhoi?> khỏi đề <?php echo $made?> không???');"
                                        href="delete_ctdethi.php?made=<?php echo $made?>&macauhoi=<?php echo $item->macauhoi?>">
                                        <svg width="30" height="30" fill="#dd2727" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                            <path fill-rule="evenodd" d="M14 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                            <path fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                            <path fill-rule="evenodd" d="M6 9a1 1 0 0 1 1 1v8a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-8a1 1 0 1 1 2 0v8a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4v-8a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                            <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                <?php
                            }else{
                                ?>
                                    <a 
                                        href="add_ctdethi.php?macauhoi=<?php echo $item->macauhoi?>&made=<?php echo $made?>">
                                        <svg width="30" height="30" fill="#2e9112" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h3a1 1 0 1 1 0 2H8a4 4 0 0 1-4-4V6a4 4 0 0 1 4-4h5.5a1 1 0 0 1 .715.3l5.5 5.626a1 1 0 0 1 .285.699v3.188a1 1 0 1 1-2 0V9.624h-3.5a2 2 0 0 1-2-2V4H8Zm6.5 1.453 2.124 2.172H14.5V5.453Z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M17 14a1 1 0 0 1 1 1v2h2a1 1 0 1 1 0 2h-2v2a1 1 0 1 1-2 0v-2h-2a1 1 0 1 1 0-2h2v-2a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <svg width="30" height="30" fill="#deafaf" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M14 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M6 9a1 1 0 0 1 1 1v8a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-8a1 1 0 1 1 2 0v8a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4v-8a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                    </svg>
                                <?php
                            }
                        
                        ?>
                    </td>
                </tr>
                
             <?php
             $i++;
            }else{
                ?>
                <tr class="active-row" style="display: table; width: 100%;table-layout: fixed;">
                <td style="text-align: center;width: 50px;"><?php echo $i?></td>
                    <td style="text-align: center;width: 130px;"><?php echo $item->macauhoi?></td>
                    <td style="width: 350px;"><?php echo $item->noidungcauhoi?></td>
                    <?php 
                        if($item->hinhanh == null){
                            ?>
                                <td style="text-align: center;width: 140px;">No Imange</td>
                            <?php
                        }else{
                            ?>
                                <td style="text-align: center;width: 140px;"> 
                                    <img style="width: 70%;height: 70%;" src="./images/<?php echo $item->hinhanh?>" alt="">
                                </td>
                            <?php
                        }
                    ?>
                    <?php 
                        if($item->amthanh == null){
                            ?>
                                <td style="text-align: center;width: 260px;">No Audio</td>
                            <?php
                        }else{
                            ?>
                                <td style="text-align: center;width: 260px;">
                                <audio controls style="width: 250px;" >
                                    <source src="./audios/<?php echo $item->amthanh?>">
                                </audio>
                                </td>
                            <?php
                        }
                    ?>
                    <td style="text-align: center;">
                    <?php 
                        $sqlSelect = "SELECT * FROM `tbl_ctdethi` WHERE `macauhoi` ='$item->macauhoi' AND`made`='$made'";
                        $stmSelect = $pdo->query($sqlSelect);
                        if($stmSelect->rowCount() !=0){
                            ?>
                            <a 
                                href="add_ctdethi.php?macauhoi=<?php echo $item->macauhoi?>&made=<?php echo $made?>">
                                <svg width="30" height="30" fill="#2e9112" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h3a1 1 0 1 1 0 2H8a4 4 0 0 1-4-4V6a4 4 0 0 1 4-4h5.5a1 1 0 0 1 .715.3l5.5 5.626a1 1 0 0 1 .285.699v3.188a1 1 0 1 1-2 0V9.624h-3.5a2 2 0 0 1-2-2V4H8Zm6.5 1.453 2.124 2.172H14.5V5.453Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M17 14a1 1 0 0 1 1 1v2h2a1 1 0 1 1 0 2h-2v2a1 1 0 1 1-2 0v-2h-2a1 1 0 1 1 0-2h2v-2a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                                <a onclick="return confirm('Bạn có muốn xóa câu hỏi <?php echo $item->macauhoi?> khỏi đề <?php echo $made?> không???');"
                                    href="delete_ctdethi.php?made=<?php echo $made?>&macauhoi=<?php echo $item->macauhoi?>">
                                    <svg width="30" height="30" fill="#dd2727" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M14 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M6 9a1 1 0 0 1 1 1v8a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-8a1 1 0 1 1 2 0v8a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4v-8a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            <?php
                        }else{
                            ?>
                                <a 
                                    href="add_ctdethi.php?macauhoi=<?php echo $item->macauhoi?>&made=<?php echo $made?>">
                                    <svg width="30" height="30" fill="#2e9112" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h3a1 1 0 1 1 0 2H8a4 4 0 0 1-4-4V6a4 4 0 0 1 4-4h5.5a1 1 0 0 1 .715.3l5.5 5.626a1 1 0 0 1 .285.699v3.188a1 1 0 1 1-2 0V9.624h-3.5a2 2 0 0 1-2-2V4H8Zm6.5 1.453 2.124 2.172H14.5V5.453Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M17 14a1 1 0 0 1 1 1v2h2a1 1 0 1 1 0 2h-2v2a1 1 0 1 1-2 0v-2h-2a1 1 0 1 1 0-2h2v-2a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <svg width="30" height="30" fill="#deafaf" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M14 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M6 9a1 1 0 0 1 1 1v8a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-8a1 1 0 1 1 2 0v8a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4v-8a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                </svg>
                            <?php
                        }
                    
                    ?>
                    </td>
                </tr>
             <?php
             $i++;
            }
         }
         ?>
         </tbody>
         </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.btn-search').click(function() {
            var searchQuery = $('#search-box').val();
            $.post("search_cauhoi_soande.php", {
                query: searchQuery
                }, function(data) {
                    $(".danhsachcauhoi").html(data);
                });
        });
    });
</script>

