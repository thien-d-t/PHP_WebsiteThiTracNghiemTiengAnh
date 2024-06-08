<?php
require_once 'config/connect.php';
$id = $_POST['id'];
if($id == 0){
    $stm = $pdo->query('SELECT *
    FROM tbl_dethi LEFT JOIN tbl_chungchi ON tbl_dethi.machungchi = tbl_chungchi.machungchi
    ORDER BY tbl_dethi.made');
    $data = $stm->fetchAll(PDO::FETCH_OBJ);
    $i =1;
    if($stm->rowCount()>0){
        ?>
            <table class="styled-table" style="width: 1140px;margin-left: 50px;table-layout: fixed;margin-top: 1px;">
                <thead style="display: table;">
                    <tr>
                        <td style="text-align: center">STT</td>
                        <td style="text-align: center">Mã đề thi</td>
                        <td style="width: 450px;">Nội dung</td>
                        <td style="text-align: center;width: 150px;">Thời gian thi</td>
                        <td style="text-align: center;width: 150px;">Chứng chỉ</td>
                        <td style="text-align: center;width: 222px;">Action</td>
                    </tr>
                </thead>
                <tbody style="display: block;height: 450px;overflow: auto;width: 100%;">
        <?php
        foreach($data as $item){
            if($i % 2 !=0){
                ?>
                <tr style="display: table; width: 100%;table-layout: fixed;">
                    <td style="text-align: center;width: 50px;"><?php echo $i?></td>
                    <td style="text-align: center;width: 120px;"><?php echo $item->made?></td>
                    <td style="width: 450px;"><?php echo $item->tendethi?></td>
                    <td style="text-align: center;width: 150px;"><?php echo $item->thoigianthi?> phút</td>
                    <td style="text-align: center;width: 150px;"><?php echo $item->tenchungchi?></td>
                    <td style="text-align: center;">
                        <a 
                            href="soan_dethi.php?made=<?php echo $item->made?>">
                            <svg width="30" height="30" fill="#2e9112" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 1 1 0 2H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Zm7-1a1 1 0 0 1 1-1h2a3 3 0 0 1 3 3v2a1 1 0 1 1-2 0V7a1 1 0 0 0-1-1h-2a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M19.5 11a1 1 0 0 1 .707.293l1.987 1.987a1 1 0 0 1 0 1.414l-6.074 6.074a2 2 0 0 1-1.022.547l-2.187.437a1 1 0 0 1-1.176-1.176l.437-2.187a2 2 0 0 1 .547-1.022l6.074-6.074A1 1 0 0 1 19.5 11Zm0 2.414-5.367 5.367-.143.716.716-.143 5.367-5.367-.573-.573Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a 
                            href="edit_dethi.php?made=<?php echo $item->made?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa khuyến mãi này không???');"
                            href="delete_dethi.php?made=<?php echo $item->made?>">
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
                    <td style="text-align: center;width: 120px;"><?php echo $item->made?></td>
                    <td style="width: 450px;"><?php echo $item->tendethi?></td>
                    <td style="text-align: center;width: 150px;"><?php echo $item->thoigianthi?> phút</td>
                    <td style="text-align: center;width: 150px;"><?php echo $item->tenchungchi?></td>
                    <td style="text-align: center;">
                        <a 
                            href="soan_dethi.php?made=<?php echo $item->made?>">
                            <svg width="30" height="30" fill="#2e9112" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 1 1 0 2H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Zm7-1a1 1 0 0 1 1-1h2a3 3 0 0 1 3 3v2a1 1 0 1 1-2 0V7a1 1 0 0 0-1-1h-2a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M19.5 11a1 1 0 0 1 .707.293l1.987 1.987a1 1 0 0 1 0 1.414l-6.074 6.074a2 2 0 0 1-1.022.547l-2.187.437a1 1 0 0 1-1.176-1.176l.437-2.187a2 2 0 0 1 .547-1.022l6.074-6.074A1 1 0 0 1 19.5 11Zm0 2.414-5.367 5.367-.143.716.716-.143 5.367-5.367-.573-.573Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a
                            href="edit_dethi.php?made=<?php echo $item->made?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa khuyến mãi này không???');"
                            href="delete_dethi.php?made=<?php echo $item->made?>">
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
    }else{
        echo"Lỗi đọc DB";
    }
}else{
    $stm = $pdo->query("SELECT *
    FROM tbl_dethi t
    JOIN tbl_chungchi c ON t.machungchi = c.machungchi
    WHERE t.machungchi = '$id'");
    $data = $stm->fetchAll(PDO::FETCH_OBJ);
    $i =1;
        ?>
            <table class="styled-table" style="width: 1140px;margin-left: 50px;table-layout: fixed;margin-top: 1px;">
                <thead style="display: table;">
                    <tr>
                        <td style="text-align: center">STT</td>
                        <td style="text-align: center">Mã đề thi</td>
                        <td style="width: 450px;">Nội dung</td>
                        <td style="text-align: center;width: 150px;">Thời gian thi</td>
                        <td style="text-align: center;width: 150px;">Chứng chỉ</td>
                        <td style="text-align: center;width: 222px;">Action</td>
                    </tr>
                </thead>
                <tbody style="display: block;height: 450px;overflow: auto;width: 100%;">
        <?php
        foreach($data as $item){
            if($i % 2 !=0){
                ?>
                <tr style="display: table; width: 100%;table-layout: fixed;">
                    <td style="text-align: center;width: 50px;"><?php echo $i?></td>
                    <td style="text-align: center;width: 120px;"><?php echo $item->made?></td>
                    <td style="width: 450px;"><?php echo $item->tendethi?></td>
                    <td style="text-align: center;width: 150px;"><?php echo $item->thoigianthi?> phút</td>
                    <td style="text-align: center;width: 150px;"><?php echo $item->tenchungchi?></td>
                    <td style="text-align: center;">
                        <a 
                            href="soan_dethi.php?made=<?php echo $item->made?>">
                            <svg width="30" height="30" fill="#2e9112" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 1 1 0 2H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Zm7-1a1 1 0 0 1 1-1h2a3 3 0 0 1 3 3v2a1 1 0 1 1-2 0V7a1 1 0 0 0-1-1h-2a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M19.5 11a1 1 0 0 1 .707.293l1.987 1.987a1 1 0 0 1 0 1.414l-6.074 6.074a2 2 0 0 1-1.022.547l-2.187.437a1 1 0 0 1-1.176-1.176l.437-2.187a2 2 0 0 1 .547-1.022l6.074-6.074A1 1 0 0 1 19.5 11Zm0 2.414-5.367 5.367-.143.716.716-.143 5.367-5.367-.573-.573Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a 
                            href="edit_dethi.php?made=<?php echo $item->made?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa khuyến mãi này không???');"
                            href="delete_dethi.php?made=<?php echo $item->made?>">
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
                    <td style="text-align: center;width: 120px;"><?php echo $item->made?></td>
                    <td style="width: 450px;"><?php echo $item->tendethi?></td>
                    <td style="text-align: center;width: 150px;"><?php echo $item->thoigianthi?> phút</td>
                    <td style="text-align: center;width: 150px;"><?php echo $item->tenchungchi?></td>
                    <td style="text-align: center;">
                        <a 
                            href="soan_dethi.php?made=<?php echo $item->made?>">
                            <svg width="30" height="30" fill="#2e9112" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 1 1 0 2H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Zm7-1a1 1 0 0 1 1-1h2a3 3 0 0 1 3 3v2a1 1 0 1 1-2 0V7a1 1 0 0 0-1-1h-2a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M19.5 11a1 1 0 0 1 .707.293l1.987 1.987a1 1 0 0 1 0 1.414l-6.074 6.074a2 2 0 0 1-1.022.547l-2.187.437a1 1 0 0 1-1.176-1.176l.437-2.187a2 2 0 0 1 .547-1.022l6.074-6.074A1 1 0 0 1 19.5 11Zm0 2.414-5.367 5.367-.143.716.716-.143 5.367-5.367-.573-.573Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a 
                            href="edit_dethi.php?made=<?php echo $item->made?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa khuyến mãi này không???');"
                            href="delete_dethi.php?made=<?php echo $item->made?>">
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
