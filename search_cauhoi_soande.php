<?php
require 'config/connect.php';

$query = $_POST['query'] ?? '';
// echo "$query";

if ($query) {
    $stm = $pdo->prepare("SELECT * FROM tbl_cauhoi WHERE noidungcauhoi LIKE :query");
    $stm->execute(['query' => "%$query%"]);
    $data = $stm->fetchAll(PDO::FETCH_OBJ);

    $i = 1;
    if ($stm->rowCount() > 0) {
        ?>
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
                        <a 
                            href="edit_cauhoi.php?macauhoi=<?php echo $item->macauhoi?>">
                            <svg width="30" height="30" fill="#2e9112" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h3a1 1 0 1 1 0 2H8a4 4 0 0 1-4-4V6a4 4 0 0 1 4-4h5.5a1 1 0 0 1 .715.3l5.5 5.626a1 1 0 0 1 .285.699v3.188a1 1 0 1 1-2 0V9.624h-3.5a2 2 0 0 1-2-2V4H8Zm6.5 1.453 2.124 2.172H14.5V5.453Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M17 14a1 1 0 0 1 1 1v2h2a1 1 0 1 1 0 2h-2v2a1 1 0 1 1-2 0v-2h-2a1 1 0 1 1 0-2h2v-2a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
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

                        <a 
                            href="edit_cauhoi.php?macauhoi=<?php echo $item->macauhoi?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa câu hỏi này không???');"
                            href="delete_cauhoi.php?macauhoi=<?php echo $item->macauhoi?>">
                            <svg width="30" height="30" fill="#dd2727" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M14 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M6 9a1 1 0 0 1 1 1v8a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-8a1 1 0 1 1 2 0v8a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4v-8a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        
                    </td>
                </tr>
             <?php
             $i++;
            }
         }
         ?>
         </tbody>
         </table>
         <?php 
    } else {
        echo '<p class="attention" style="text-align: center;">Không tìm thấy chứng chỉ nào</p>';
    }
} else {
    $stm = $pdo->query("SELECT * FROM tbl_cauhoi");
    $data = $stm->fetchAll(PDO::FETCH_OBJ);

    $i = 1;
    if ($stm->rowCount() > 0) {
        ?>
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

                        <a 
                            href="edit_cauhoi.php?macauhoi=<?php echo $item->macauhoi?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa câu hỏi này không???');"
                            href="delete_cauhoi.php?macauhoi=<?php echo $item->macauhoi?>">
                            <svg width="30" height="30" fill="#dd2727" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M14 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M6 9a1 1 0 0 1 1 1v8a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-8a1 1 0 1 1 2 0v8a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4v-8a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
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

                        <a 
                            href="edit_cauhoi.php?macauhoi=<?php echo $item->macauhoi?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa câu hỏi này không???');"
                            href="delete_cauhoi.php?macauhoi=<?php echo $item->macauhoi?>">
                            <svg width="30" height="30" fill="#dd2727" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M14 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M6 9a1 1 0 0 1 1 1v8a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-8a1 1 0 1 1 2 0v8a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4v-8a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        
                    </td>
                </tr>
             <?php
             $i++;
            }
         }
         ?>
         </tbody>
         </table>
         <?php 
    }
}
?>


 <style>
   .attention {
        color: #ed3030;
       font-size: 16px;
       font-family: 500;
        text-align: center;
    }
 </style>