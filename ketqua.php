<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FAVICON ===============-->
    <link
      rel="shortcut icon"
      href="assets/img/favicon.png"
      type="image/x-icon"
    />

    <!--=============== REMIXICONS ===============-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.min.css"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/ketqua.css" />
</head>
<body>
<header class="header" id="header">
      <nav class="container nav">
        <a href="index.php" class="nav__logo">
          <img
            src="./images/logo.png"
            alt=""
            style="position: relative; top: 10px; left: 20px"
          />
          <i>English </i>
          <p>test</p>
        </a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="#" class="nav__link active-link">Home</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link">Doing Test</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link">List Exam</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link">News</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link">About</a>
            </li>
          </ul>

          <!-- Button close -->
          <div class="nav__close" id="nav-close">
            <i class="ri-close-line"></i>
          </div>
        </div>

        <div class="nav__actions">
          <i class="ri-user-line"></i>

          <!-- Toggle Button -->
          <div class="nav__toggle" id="nav-toggle">
            <i class="ri-menu-line"></i>
          </div>
        </div>
      </nav>
    </header>

<?php 
    session_start();
    require 'config/connect.php';
    if(!isset($_SESSION['made'])){
        echo"ma de k ton tai";
    }else{

        
        $timestamp = time();
        $dateTime = new DateTime('@' . $timestamp);
        $dateTime->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $timeNopBai = $dateTime->format('Y-m-d H:i:s');
        $mangDapAn = array();
        
        $made = $_SESSION['made'];
        $idUser = $_SESSION['admin']['id_nguoidung'];
        $hoursThi = $_POST['data-hours'];
        $minutesThi = $_POST['data-minutes'];
        $secondsThi = $_POST['data-seconds'];

        $totalSeconds = $hoursThi * 3600 + $minutesThi * 60 + $secondsThi;
        $stmTime = $pdo->query("SELECT * FROM tbl_dethi where made = '$made'");
        $row = $stmTime->fetch(PDO::FETCH_OBJ);
        $timeN = ($row->thoigianthi * 60) - $totalSeconds;

        $hours = floor($timeN / 3600);
        $remainingSeconds = $timeN % 3600;
        $minutes = floor($remainingSeconds / 60);
        $remainingSeconds = $remainingSeconds % 60;   
        if($hours < 10){
            $h = "0".$hours;
        }else{
            $h = $hours;
        }
        if($minutes < 10){
            $m = "0".$minutes;
        }else{
            $m = $minutes;
        }    
        if($remainingSeconds < 10){
            $s = "0".$remainingSeconds;
        }else{
            $s = $remainingSeconds;
        }              
        $timeHoanThanh = "$h:$m:$s";

        //unset($_SESSION['made']);
        ?>
        <div class="div-cent">
        <?php
       // upddate luot thi +1
       $stmUpdateLuotThi= $pdo->prepare("UPDATE `tbl_dethi` SET `luotthi`= `luotthi` + 1  WHERE `made`='$made'");
       if($stmUpdateLuotThi->execute() == false){
        return;
       }else{
          $stmSelect = $pdo->query("SELECT * FROM tbl_dethi dt JOIN tbl_ctdethi ct ON dt.made=ct.made WHERE dt.made ='$made'");
          $rowSelect = $stmSelect->fetch(PDO::FETCH_OBJ);
          ?>
              <h1 style="text-align: center;position: relative;top:10px"><?php echo $rowSelect->tendethi?></h1>
              <div class="gird-body">
                  <div class="grid-item-left">
                      <div>
                          <svg width="24" height="24" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M12 5.75a7.25 7.25 0 1 0 0 14.5 7.25 7.25 0 0 0 0-14.5ZM3.25 13a8.75 8.75 0 1 1 17.5 0 8.75 8.75 0 0 1-17.5 0Z" clip-rule="evenodd"></path>
                          <path fill-rule="evenodd" d="M12 7.25a.75.75 0 0 1 .75.75v4.584l2.648 1.655a.75.75 0 1 1-.796 1.272l-3-1.875A.75.75 0 0 1 11.25 13V8a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"></path>
                          <path fill-rule="evenodd" d="M6.53 3.47a.75.75 0 0 1 0 1.06l-2.5 2.5a.75.75 0 0 1-1.06-1.06l2.5-2.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"></path>
                          <path fill-rule="evenodd" d="M17.47 3.47a.75.75 0 0 0 0 1.06l2.5 2.5a.75.75 0 1 0 1.06-1.06l-2.5-2.5a.75.75 0 0 0-1.06 0Z" clip-rule="evenodd"></path>
                          </svg>
                          <p style="margin: -20px 0px 0px 25px;">Thời gian làm bài </p>
                      </div>
                      <br>
                      <div>
                        <svg width="24" height="24" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="m5.306 6.758.347 3.122-.476.042a2.389 2.389 0 0 0-2.154 2.028 24.113 24.113 0 0 0 0 7.1 2.39 2.39 0 0 0 2.154 2.028l1.134.1c1.22.107 2.444.161 3.668.162.175 0 .266-.212.154-.346a7.002 7.002 0 0 1 3.947-11.35.416.416 0 0 0 .333-.357l.28-2.529a4.89 4.89 0 0 0 0-1.095l-.022-.205a4.7 4.7 0 0 0-9.342 0l-.023.205a4.96 4.96 0 0 0 0 1.095ZM10.374 2.8A3.2 3.2 0 0 0 6.82 5.624l-.023.205a3.46 3.46 0 0 0 0 .764l.352 3.164a42.166 42.166 0 0 1 5.702 0l.352-3.164a3.46 3.46 0 0 0 0-.764l-.023-.205a3.2 3.2 0 0 0-2.806-2.825Z" clip-rule="evenodd"></path>
                        <path d="M16.25 15a.75.75 0 0 0-1.5 0v1.773c0 .24.115.465.309.606l1 .727a.75.75 0 1 0 .882-1.213l-.691-.502V15Z"></path>
                        <path fill-rule="evenodd" d="M15.5 22a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Zm0-1.5a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" clip-rule="evenodd"></path>
                        </svg>
                          <p style="margin: -20px 0px 0px 25px;">Thời gian nộp bài </p>
                      </div>
                      <br>
                      <div>
                          <svg width="24" height="24" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2 7a5 5 0 0 1 5-5h10a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5h-2.25l-1.15 1.533a2 2 0 0 1-3.2 0L9.25 20H7a5 5 0 0 1-5-5V7Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h2.75a1 1 0 0 1 .8.4L12 20.333l1.45-1.933a1 1 0 0 1 .8-.4H17a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7Zm5.195 4.02A1 1 0 0 0 11 9a1 1 0 1 1-2 0 3 3 0 1 1 4 2.828V12a1 1 0 1 1-2 0v-1a1 1 0 0 1 1-1 1 1 0 0 0 .195-1.98Z" clip-rule="evenodd"></path>
                          <path d="M13 15a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"></path>
                          </svg>
                          <p style="margin: -20px 0px 0px 25px;">Số lượng câu hỏi </p>
                      </div>
                      <br>
                      <div>
                          <svg width="24" height="24" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path d="M7.483 5.26A2.486 2.486 0 0 0 5.29 7.422a39.402 39.402 0 0 0 0 9.154 2.486 2.486 0 0 0 2.193 2.163c2.977.333 6.057.333 9.034 0a2.486 2.486 0 0 0 2.192-2.163c.256-2.185.328-4.386.216-6.58a.2.2 0 0 1 .059-.152l1.038-1.04a.198.198 0 0 1 .339.125 40.903 40.903 0 0 1-.162 7.822c-.215 1.836-1.69 3.275-3.516 3.48a42.5 42.5 0 0 1-9.366 0c-1.827-.205-3.302-1.644-3.516-3.48a40.903 40.903 0 0 1 0-9.504c.214-1.837 1.69-3.275 3.516-3.48a42.502 42.502 0 0 1 9.366 0 3.989 3.989 0 0 1 1.76.64.19.19 0 0 1 .025.295l-.803.803a.211.211 0 0 1-.25.033 2.488 2.488 0 0 0-.898-.28 41.001 41.001 0 0 0-9.034 0Z"></path>
                          <path d="M21.03 6.03a.75.75 0 1 0-1.06-1.06l-8.47 8.47-2.47-2.47a.75.75 0 1 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l9-9Z"></path>
                          </svg>
                          <p style="margin: -20px 0px 0px 25px;">Số đáp án đúng </p>
                      </div>
                      <br>
                      <div>
                        <svg width="24" height="24" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m14.985 8.474-2.532-5.49a.5.5 0 0 0-.908 0l-2.533 5.49a.5.5 0 0 1-.395.287l-6.003.712a.5.5 0 0 0-.281.863l4.439 4.105a.5.5 0 0 1 .15.465l-1.178 5.93a.5.5 0 0 0 .735.533l5.276-2.953a.5.5 0 0 1 .488 0l5.275 2.953a.5.5 0 0 0 .735-.533l-1.178-5.93a.5.5 0 0 1 .15-.465l4.44-4.105a.5.5 0 0 0-.281-.863L15.38 8.76a.5.5 0 0 1-.395-.287Z"></path>
                        </svg>
                          <p style="margin: -20px 0px 0px 25px;">Điểm số </p>
                      </div>
                  </div>
                  <div class="grid-item-right">
                      <p><?php echo $timeHoanThanh?></p>
                      <br>
                      <p><?php echo $timeNopBai?></p>
                      <br>
                      <p style="margin-top: 5px;"><?php echo $stmSelect->rowCount()?> Câu</p>
                      <br>
        
          <?php
          //Tao bang ket qua 
          $stmKetQua = $pdo->prepare("INSERT INTO `tbl_ketqua`(`thoigianlambai`,`thoigiannopbai`,`made`, `id_nguoidung`) 
          VALUES ('$timeHoanThanh','$timeNopBai','$made','$idUser')");
          if($stmKetQua->execute() == true){
              $stm = $pdo->query("SELECT * FROM tbl_ctdethi JOIN tbl_cauhoi ON tbl_cauhoi.macauhoi = tbl_ctdethi.macauhoi 
                              WHERE tbl_ctdethi.made = '$made'");
              $data = $stm->fetchAll(PDO::FETCH_OBJ);
              $soCauDung = 0;
              $diemSo = 0;
              foreach($data as $item){
                  $macauhoi = $_POST["macauhoi$item->macauhoi"]??"";
                  $madapan = $_POST["value-radio$item->macauhoi"]??"";
                  //echo"$made,$macauhoi,$madapan,$idUser,$timeHoanThanh<br>";
                  $stmMaKQ = $pdo->query("SELECT * FROM tbl_ketqua WHERE id_nguoidung = '$idUser' AND made = '$made' ORDER BY makq DESC");
                  $rowMaKQ = $stmMaKQ->fetch(PDO::FETCH_OBJ);

                  $_SESSION['makq'] = $rowMaKQ->makq;
                  array_push($mangDapAn,$madapan);
                  
                  $stmCTKQ = $pdo->prepare("INSERT INTO `tbl_chitietketqua`(`makq`, `macauhoi`, `madapan`) 
                  VALUES ('$rowMaKQ->makq','$macauhoi','$madapan')");


                  if($stmCTKQ->execute() == true){
                      $stmSelectDapAn = $pdo->query("SELECT * FROM `tbl_ctdethi` ct JOIN tbl_cauhoi ch ON ct.macauhoi=ch.macauhoi 
                                          JOIN tbl_dapan da ON ch.macauhoi=da.macauhoi WHERE ct.made = '$made' AND da.madapan ='$madapan'");
                      $dataDapAn = $stmSelectDapAn->fetch(PDO::FETCH_OBJ);
                      if($dataDapAn->trangthai == 1){
                          $stmUpdateCauDung = $pdo->prepare("UPDATE `tbl_ketqua` SET `socaudung`= `socaudung` + 1, `diemthi` = `diemthi` + 1 WHERE makq ='$rowMaKQ->makq'");
                          if($stmUpdateCauDung->execute() == true){
                            $soCauDung +=1;
                            $diemSo +=1;
                          }
                      }
                  }
              }
          ?>
                <p style="margin-top: 4px;"><?php echo $soCauDung?> Câu</p>
                <br>
                <p style="margin-top: 4px;"><?php echo $diemSo?> điểm</p>
              </div>
            </div>
            <a href="index.php" class="btn-hoanthanh">
              Bạn đã hoàn thành bài thi
            </a>
          </div>
          <div class="showketqua">
              <button class="btn-show" id="btn-show">Kết quả bài thi 
                <svg style="position: relative;top: 7px;" width="24" height="24" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="m16 10-4 4-4-4"></path>
                </svg>
              </button>
          </div>
          <div class="grid-container" id="grid-container">
              <?php 
                  $makqShow = $_SESSION['makq'];
                  
                  unset($_SESSION['makq'],$_SESSION['madapan']);
                  $stm = $pdo->query("SELECT * FROM tbl_ctdethi JOIN tbl_cauhoi ON tbl_cauhoi.macauhoi = tbl_ctdethi.macauhoi 
                  WHERE tbl_ctdethi.made = '$made'");
                  $data = $stm->fetchAll(PDO::FETCH_OBJ);
                  $i=1;
                  $col = 2;
                  $countDapAn = 0;
                  if($stm->rowCount()>0){
                      foreach($data as $item){    
                          $maDapAnChon = $mangDapAn[$countDapAn];
                          ?>
                              <div class="card-cauhoi" style="grid-row:<?php echo $i?>;"id="noidungcauhoi<?php echo $item->macauhoi?>">
                                  <label style="font-size: 28px;"><?php echo $i?>. <?php echo $item->noidungcauhoi?></label>
                                  <input style="display: none" type="text" name="macauhoi<?php echo $item->macauhoi?>" id="" value="<?php echo $item->macauhoi?>">
                                      <?php 
                                          $stmDapAn = $pdo->query("SELECT * FROM tbl_dapan JOIN tbl_cauhoi ON tbl_cauhoi.macauhoi = tbl_dapan.macauhoi 
                                          WHERE tbl_cauhoi.macauhoi = '$item->macauhoi'");
                                          $n = 1;
                                          $dataDapAn = $stmDapAn->fetchAll(PDO::FETCH_OBJ);
                                          if($stmDapAn->rowCount()>0){
                                              ?>
                                              <ol type="A" class="container-dapan">
                                              <?php
                                              foreach($dataDapAn as $itemDapAn){
                                                  if($n <= $stmDapAn->rowCount()/2){
                                                          ?>
                                                          <li class="item"><?php echo $itemDapAn->noidungdapan?></li>
                                                          <?php
                                                  }else{
                                                          ?>
                                                          <li class="item1"><?php echo $itemDapAn->noidungdapan?></li>
                                                          <?php
                                                  }
                                              $n ++;  
                                              }
                                              ?>
                                              </ol>
                                              <?php
                                          }
                                      ?>

                                      <div class="body-dapan">
                                              <label style="font-size: 20px;color: #ffffff;position: relative;top:15px;left: 20px;">Đáp án của bạn: </label>
                                              <div class="radio-input">
                                                  <?php 
                                                      $mang = array('A','B','C','D');
                                                      $a = 0;
                                                      $countMang = 1;
                                                      foreach($dataDapAn as $itemDapAn){
                                                        if($itemDapAn->madapan == $maDapAnChon && $itemDapAn->trangthai == 1){
                                                          ?>
                                                              <input  value="<?php echo $itemDapAn->madapan?>" name="value-radio<?php echo $item->macauhoi?>" id="value-<?php echo $item->macauhoi?><?php echo $countMang?>" type="radio" disabled>
                                                              <label  style="background-color: #00FF00;" for="value-<?php echo $item->macauhoi?><?php echo $countMang?>"><?php echo $mang[$a]?></label>
                                                              <div style="color: #00FF00; position: absolute;left: 200px;">
                                                              <svg style="margin-top: 5px;position: relative;left: -30px;" width="24" height="24" fill="none" stroke="#1de23e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                              <path d="m6 12 4.243 4.243 8.485-8.485"></path>
                                                              </svg>
                                                                <p style="margin-top: -22px;">Đúng</p>
                                                              </div>

                                                          <?php
                                                        }else if($itemDapAn->madapan == $maDapAnChon && $itemDapAn->trangthai == 0){
                                                          ?>
                                                              <input value="<?php echo $itemDapAn->madapan?>" name="value-radio<?php echo $item->macauhoi?>" id="value-<?php echo $item->macauhoi?><?php echo $countMang?>" type="radio" disabled>
                                                              <label style="background-color: red;" for="value-<?php echo $item->macauhoi?><?php echo $countMang?>"><?php echo $mang[$a]?></label>
                                                              <div style="color: red; position: absolute;left: 200px;">
                                                              <svg style="margin-top: 5px;position: relative;left: -30px;" width="24" height="24" fill="none" stroke="#d91212" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                              <path d="M16 16 8 8"></path>
                                                              <path d="m16 8-8 8"></path>
                                                              </svg>
                                                                <p style="margin-top: -22px;">Sai</p>
                                                              </div>
                                                          <?php
                                                        }else if($itemDapAn->trangthai == 1){
                                                          ?>
                                                            <input  value="<?php echo $itemDapAn->madapan?>" name="value-radio<?php echo $item->macauhoi?>" id="value-<?php echo $item->macauhoi?><?php echo $countMang?>" type="radio" disabled>
                                                              <label  style="background-color: #00FF00;" for="value-<?php echo $item->macauhoi?><?php echo $countMang?>"><?php echo $mang[$a]?></label>
                                                          <?php
                                                        }
                                                        else{
                                                          ?>
                                                              <input value="<?php echo $itemDapAn->madapan?>" name="value-radio<?php echo $item->macauhoi?>" id="value-<?php echo $item->macauhoi?><?php echo $countMang?>" type="radio" disabled>
                                                              <label for="value-<?php echo $item->macauhoi?><?php echo $countMang?>"><?php echo $mang[$a]?></label>
                                                          <?php
                                                        }
                                                          
                                                          $a++;
                                                          $countMang++;
                                                      }
                                                  ?>
                                              </div>
                                          
                                      </div>  
                              </div>
                              <?php
                              $i++;
                              $countDapAn++;
                              }
                          }
                      ?>
          </div>
          <?php
        }else{
            echo"Tạo kết quả k thành công!!";
        }
      }
    }
?>
</body>
<script>
  $(document).ready(function() {
    $("#btn-show").click(function() {
      $("#grid-container").show();
    });
  });
</script>