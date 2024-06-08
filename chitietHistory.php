<?php 
    require 'config/connect.php';
    if(!isset($_SESSION)) session_start();
    
    if(!isset($_SESSION['admin'])){
        header('location:login.php');exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ADMIN</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="./css/history.css" />

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="admin.php" class="logo"> 
         <img src="images/logo.png" alt="" width="70px" height="50px" >
         <p style="position: absolute;left: 90px;top:15px; font-style: italic;">English</p>
         <p style="position: absolute;left: 75px;top:35px; font-style: italic;">Test</p>
      </a>

      <!-- <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form> -->

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name"><?php echo $_SESSION['admin']['hoten']?></h3>
         <p class="role">Admin</p>
         <a href="profile.html" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.html" class="option-btn">login</a>
            <button type="button" id="dialog" href="logout.php" class="option-btn">Logout</button>
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="images/pic-1.jpg" class="image" alt="">
      <h3 class="name"><?php echo $_SESSION['admin']['hoten']?></h3>
      <a href="profile.html" class="btn">Hồ sơ</a>
   </div>

   <nav class="navbar">
      <a href="index.php"><i class="fas fa-home"></i><span>Trang chủ</span></a>
      <a href="edit_taikhoan_user.php"><i class="fa-solid fa-user"></i><span>Tài khoản</span></a>
   </nav>

</div>

<section class="home-grid">
    <a href="trangCaNhan.php" class="btn-thoat">
        <svg width="24" height="24" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.03 8.53a.75.75 0 1 0-1.06-1.06l-4 4a.748.748 0 0 0 0 1.06l4 4a.75.75 0 1 0 1.06-1.06l-2.72-2.72H18a.75.75 0 0 0 0-1.5H8.31l2.72-2.72Z"></path>
        </svg>
        <h2 style="color: #FFFFFF;position: relative;left: 5px;">Back</h2>
    </a>
   <?php 
    $idUser = $_SESSION['admin']['id_nguoidung'];
    $made = $_POST['made']??"";
    $thoigiannopbai = $_POST['thoigiannopbai']??"";

    $stmSelectMaKQ = $pdo->query("SELECT * FROM tbl_ketqua WHERE id_nguoidung ='$idUser' AND made ='$made' AND thoigiannopbai ='$thoigiannopbai'");
    $dataKQ = $stmSelectMaKQ->fetch(PDO::FETCH_OBJ);
    $maKQ = $dataKQ->makq;
    
    ?>
        <div class="grid-container" id="grid-container">
            <?php 
                $stm = $pdo->query("SELECT * FROM tbl_ctdethi JOIN tbl_cauhoi ON tbl_cauhoi.macauhoi = tbl_ctdethi.macauhoi 
                WHERE tbl_ctdethi.made = '$made'");
                $data = $stm->fetchAll(PDO::FETCH_OBJ);
                $i=1;
                $col = 2;
                $countDapAn = 0;
                if($stm->rowCount()>0){
                    foreach($data as $item){
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
                                    
                                    
                                    $mangDapAnChon = array();
                                    $stmDapAnChon = $pdo->query("SELECT * FROM tbl_chitietketqua WHERE makq ='$maKQ'");
                                    $dataDapAnChon = $stmDapAnChon->fetchAll(PDO::FETCH_OBJ);
                                    foreach($dataDapAnChon as $itemDapAnChon){
                                        $countMang = 1;
                                        $a = 0;
                                        foreach($dataDapAn as $itemDapAn){
                                            if($itemDapAnChon->macauhoi==$item->macauhoi && $itemDapAn->madapan == $itemDapAnChon->madapan && $itemDapAn->trangthai == 1){
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
                                            }else if($itemDapAnChon->macauhoi==$item->macauhoi && $itemDapAn->madapan == $itemDapAnChon->madapan && $itemDapAn->trangthai == 0) {
                                                ?>
                                                <input value="<?php echo $itemDapAn->madapan?>" name="value-radio<?php echo $item->macauhoi?>" id="value-<?php echo $item->macauhoi?><?php echo $countMang?>" type="radio" disabled>
                                                <label style="background-color: red;" for="value-<?php echo $item->macauhoi?><?php echo $countMang?>"><?php echo $mang[$a]?></label>
                                                <div style="color: red; position: absolute;left: 200px;">
                                                    <svg style="margin-top: 5px;position: relative;left: -30px;" width="24" height="24" fill="none" stroke="#d91212" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 16 8 8"></path>
                                                    <path d="m16 8-8 8"></path>
                                                    </svg>
                                                    <p style="margin-top: -28px;">Sai</p>
                                                </div>
                                                <?php
                                            }else if($itemDapAnChon->macauhoi==$item->macauhoi && $itemDapAn->trangthai == 1){
                                                ?>
                                                    <input  value="<?php echo $itemDapAn->madapan?>" name="value-radio<?php echo $item->macauhoi?>" id="value-<?php echo $item->macauhoi?><?php echo $countMang?>" type="radio" disabled>
                                                    <label  style="background-color: #00FF00;" for="value-<?php echo $item->macauhoi?><?php echo $countMang?>"><?php echo $mang[$a]?></label>
                                                <?php
                                            }else if($itemDapAnChon->macauhoi==$item->macauhoi && $itemDapAn->trangthai == 0){
                                                ?>
                                                    <input value="<?php echo $itemDapAn->madapan?>" name="value-radio<?php echo $item->macauhoi?>" id="value-<?php echo $item->macauhoi?><?php echo $countMang?>" type="radio" disabled>
                                                    <label for="value-<?php echo $item->macauhoi?><?php echo $countMang?>"><?php echo $mang[$a]?></label>
                                                <?php
                                              }
                                            $a++;
                                            $countMang++;
                                        }
                                    }
                                    
                                    ?>
                                </div>         
                            </div>  
                        </div>
                        
                    <?php
                    $i++;
                    }
                }
                ?>
        </div>
    <?php
   ?>   

</section>


<!-- custom js file link  -->
<script src="js/script.js"></script>

   
</body>
</html>
<script>
   document.getElementById("dialog").addEventListener('click',function(){
      Swal.fire({
      title: "Are you sure?",
      text: "Do you really want to log out??",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, logout now!"
      }).then((result) => {
      if (result.isConfirmed) {
         location.href ="logout.php";
      }
      });
   });
</script>