<?php
require 'config/connect.php';
$macauhoi = $_POST['macauhoi'];
if($macauhoi == 0){
    $stm = $pdo->query('SELECT *
    FROM tbl_dapan
    LEFT JOIN tbl_cauhoi ON tbl_dapan.macauhoi = tbl_cauhoi.macauhoi');
    $data = $stm->fetchAll(PDO::FETCH_OBJ);
    $i =1;
    
        ?>
            <table class="styled-table" style="width: 720px;margin-left: 250px;table-layout: fixed;margin-top: 20px;">
                <thead style="display: table;">
                    <tr>
                        <td style="text-align: center;width: 50px">STT</td>
                        <td style="text-align: center;width: 120px">Mã đáp án</td>
                        <td style="width: 350px;">Nội dung đán án</td>
                        <td style="text-align: center;width: 200px;">Action</td>
                    </tr>
                </thead>
                <tbody style="display: block;height: 450px;overflow: auto;width: 100%;">
        <?php
        foreach($data as $item){
            if($i % 2 !=0){
                ?>
                <tr style="display: table; width: 100%;table-layout: fixed;">
                    <td style="text-align: center;width: 50px;"><?php echo $i?></td>
                    <td style="text-align: center;width: 130px;"><?php echo $item->madapan?></td>
                    <td style="width: 350px;"><?php echo $item->noidungdapan?></td>
                
                    <td style="text-align: center;">
                        <a 
                            href="edit_dapan.php?madapan=<?php echo $item->madapan?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa đáp án này không???');"
                            href="delete_dapan.php?madapan=<?php echo $item->madapan?>">
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
                    <td style="text-align: center;width: 130px;"><?php echo $item->madapan?></td>
                    <td style="width: 350px;"><?php echo $item->noidungdapan?></td>
                
                    <td style="text-align: center;">
                        <a 
                            href="edit_dapan.php?madapan=<?php echo $item->madapan?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa đáp án này không???');"
                            href="delete_dapan.php?madapan=<?php echo $item->madapan?>">
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
    $stm = $pdo->query("SELECT *
    FROM tbl_dapan
    LEFT JOIN tbl_cauhoi ON tbl_dapan.macauhoi = tbl_cauhoi.macauhoi
    WHERE tbl_dapan.macauhoi = '$macauhoi'");
    $data = $stm->fetchAll(PDO::FETCH_OBJ);
    $i =1;
        ?>
            <table class="styled-table" style="width: 720px;margin-left: 250px;table-layout: fixed;margin-top: 20px;">
                <thead style="display: table;">
                    <tr>
                        <td style="text-align: center;width: 50px">STT</td>
                        <td style="text-align: center;width: 120px">Mã đáp án</td>
                        <td style="width: 350px;">Nội dung đán án</td>
                        <td style="text-align: center;width: 200px;">Action</td>
                    </tr>
                </thead>
                <tbody style="display: block;height: 450px;overflow: auto;width: 100%;">
        <?php
        foreach($data as $item){
            if($i % 2 !=0){
                ?>
                <tr style="display: table; width: 100%;table-layout: fixed;">
                    <td style="text-align: center;width: 50px;"><?php echo $i?></td>
                    <td style="text-align: center;width: 130px;"><?php echo $item->madapan?></td>
                    <td style="width: 350px;"><?php echo $item->noidungdapan?></td>
                
                    <td style="text-align: center;">
                        <a 
                            href="edit_dapan.php?madapan=<?php echo $item->madapan?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa đáp án này không???');"
                            href="delete_dapan.php?madapan=<?php echo $item->madapan?>">
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
                    <td style="text-align: center;width: 130px;"><?php echo $item->madapan?></td>
                    <td style="width: 350px;"><?php echo $item->noidungdapan?></td>
                
                    <td style="text-align: center;">
                        <a 
                            href="edit_dapan.php?madapan=<?php echo $item->madapan?>">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a onclick="return confirm('Bạn có muốn xóa đáp án này không???');"
                            href="delete_dapan.php?madapan=<?php echo $item->madapan?>">
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
