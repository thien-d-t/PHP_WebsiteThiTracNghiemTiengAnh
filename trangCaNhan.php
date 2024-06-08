<?php 
    require 'config/connect.php';
    if(!isset($_SESSION)) session_start();
    
    if(!isset($_SESSION['admin'])){
        header('location:login.php');exit;
    }
?>
<!-- <pre></pre>
<h1>Trang chủ <?php #echo $_SESSION['admin']['taikhoan']?></h1>
<h1><?php #echo $_SESSION['admin']['hoten']?></h1>
<h1>Trang chủ</h1>
<a href="">logount <?php #unset($_SESSION['admin']);?></a> -->

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

      <a href="index.php" class="logo"> 
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
         <div class="flex-btn">
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
      <a class="btn">Hồ sơ</a>
   </div>

   <nav class="navbar">
      <a href="index.php"><i class="fas fa-home"></i><span>Trang chủ</span></a>
      <a href="edit_taikhoan_user.php"><i class="fa-solid fa-user"></i><span>Tài khoản</span></a>
   </nav>

</div>

<section class="home-grid">

   <h1 class="heading">Lịch sử làm bài</h1>

   <?php 
   $idUser = $_SESSION['admin']['id_nguoidung'];
    $stm = $pdo->query("SELECT * FROM tbl_ketqua JOIN tbl_dethi ON tbl_dethi.made= tbl_ketqua.made 
    join tbl_chungchi on tbl_chungchi.machungchi = tbl_dethi.machungchi
    WHERE id_nguoidung ='$idUser'
    ORDER BY tbl_ketqua.makq DESC");
    $data = $stm->fetchAll(PDO::FETCH_OBJ);
    if($stm->rowCount() == 0){
        echo"<h1>Bạn chưa làm đề thi thử nào hết!!</h1>";
    }else{
        foreach($data as $item){
            ?>
            <div class="body-history">
                <form action="chitietHistory.php" method="post" style="padding: 10px;">
                    <input style="display: none;"  type="text" name="made" value="<?php echo $item->made?>">
                    <input class="input-none" style="font-weight: bold;" type="text" name="" id="" value="<?php echo $item->tendethi?>" readonly>
                    <div style="display: flex; align-items: center;font-size: 11px;color:#808080">
                        <svg width="24" height="24" fill="#808080" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="m5.306 6.758.347 3.122-.476.042a2.389 2.389 0 0 0-2.154 2.028 24.113 24.113 0 0 0 0 7.1 2.39 2.39 0 0 0 2.154 2.028l1.134.1c1.22.107 2.444.161 3.668.162.175 0 .266-.212.154-.346a7.002 7.002 0 0 1 3.947-11.35.416.416 0 0 0 .333-.357l.28-2.529a4.89 4.89 0 0 0 0-1.095l-.022-.205a4.7 4.7 0 0 0-9.342 0l-.023.205a4.96 4.96 0 0 0 0 1.095ZM10.374 2.8A3.2 3.2 0 0 0 6.82 5.624l-.023.205a3.46 3.46 0 0 0 0 .764l.352 3.164a42.166 42.166 0 0 1 5.702 0l.352-3.164a3.46 3.46 0 0 0 0-.764l-.023-.205a3.2 3.2 0 0 0-2.806-2.825Z" clip-rule="evenodd"></path>
                        <path d="M16.25 15a.75.75 0 0 0-1.5 0v1.773c0 .24.115.465.309.606l1 .727a.75.75 0 1 0 .882-1.213l-.691-.502V15Z"></path>
                        <path fill-rule="evenodd" d="M15.5 22a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Zm0-1.5a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" clip-rule="evenodd"></path>
                        </svg>
                        <h1>Thời gian nộp bài: <input style="font-size: 15px;color:#808080" name="thoigiannopbai" type="text" value="<?php echo $item->thoigiannopbai?>" readonly></h1>
                    </div>
                    <div style="display: flex; align-items: center;font-size: 11px;color:#808080">
                        <svg width="24" height="24" fill="#808080" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12 5.75a7.25 7.25 0 1 0 0 14.5 7.25 7.25 0 0 0 0-14.5ZM3.25 13a8.75 8.75 0 1 1 17.5 0 8.75 8.75 0 0 1-17.5 0Z" clip-rule="evenodd"></path>
                        <path fill-rule="evenodd" d="M12 7.25a.75.75 0 0 1 .75.75v4.584l2.648 1.655a.75.75 0 1 1-.796 1.272l-3-1.875A.75.75 0 0 1 11.25 13V8a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"></path>
                        <path fill-rule="evenodd" d="M6.53 3.47a.75.75 0 0 1 0 1.06l-2.5 2.5a.75.75 0 0 1-1.06-1.06l2.5-2.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"></path>
                        <path fill-rule="evenodd" d="M17.47 3.47a.75.75 0 0 0 0 1.06l2.5 2.5a.75.75 0 1 0 1.06-1.06l-2.5-2.5a.75.75 0 0 0-1.06 0Z" clip-rule="evenodd"></path>
                        </svg>
                        <h1>Thời gian làm bài: <input style="font-size: 15px;color:#808080" name="thoigianlambai" type="text" value="<?php echo $item->thoigianlambai?>" readonly></h1>
                    </div>
                    <div style="display: flex; align-items: center;font-size: 11px;color:#808080">
                        <svg width="24" height="24" fill="#808080" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.483 5.26A2.486 2.486 0 0 0 5.29 7.422a39.402 39.402 0 0 0 0 9.154 2.486 2.486 0 0 0 2.193 2.163c2.977.333 6.057.333 9.034 0a2.486 2.486 0 0 0 2.192-2.163c.256-2.185.328-4.386.216-6.58a.2.2 0 0 1 .059-.152l1.038-1.04a.198.198 0 0 1 .339.125 40.903 40.903 0 0 1-.162 7.822c-.215 1.836-1.69 3.275-3.516 3.48a42.5 42.5 0 0 1-9.366 0c-1.827-.205-3.302-1.644-3.516-3.48a40.903 40.903 0 0 1 0-9.504c.214-1.837 1.69-3.275 3.516-3.48a42.502 42.502 0 0 1 9.366 0 3.989 3.989 0 0 1 1.76.64.19.19 0 0 1 .025.295l-.803.803a.211.211 0 0 1-.25.033 2.488 2.488 0 0 0-.898-.28 41.001 41.001 0 0 0-9.034 0Z"></path>
                        <path d="M21.03 6.03a.75.75 0 1 0-1.06-1.06l-8.47 8.47-2.47-2.47a.75.75 0 1 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l9-9Z"></path>
                        </svg>
                        <h1>Số câu đúng: <input style="font-size: 15px;color:#808080" type="text" value="<?php echo $item->socaudung?> câu" readonly></h1>
                    </div>
                    <div style="display: flex; align-items: center;font-size: 11px;color:#808080">
                        <svg width="24" height="24" fill="#808080" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.486 4.114c.675-1.162 2.353-1.162 3.028 0l2.065 3.56c.19.328.52.551.894.608l3.43.518c1.495.226 2.02 2.114.855 3.078l-2.499 2.07a1.25 1.25 0 0 0-.43 1.197l.7 3.676c.274 1.44-1.238 2.558-2.535 1.876L12.582 18.9a1.25 1.25 0 0 0-1.164 0l-3.412 1.797c-1.297.683-2.81-.436-2.535-1.876l.7-3.676a1.25 1.25 0 0 0-.43-1.197l-2.5-2.07c-1.164-.964-.64-2.852.856-3.078l3.43-.518a1.25 1.25 0 0 0 .894-.609l2.065-3.559Zm1.73.753a.25.25 0 0 0-.432 0l-2.066 3.56A2.75 2.75 0 0 1 7.75 9.764l-3.43.518a.25.25 0 0 0-.121.44l2.499 2.07a2.75 2.75 0 0 1 .947 2.632l-.7 3.676a.25.25 0 0 0 .362.268l3.412-1.796a2.75 2.75 0 0 1 2.562 0l3.412 1.796a.25.25 0 0 0 .362-.268l-.7-3.676a2.75 2.75 0 0 1 .947-2.632l2.5-2.07a.25.25 0 0 0-.123-.44l-3.43-.518a2.75 2.75 0 0 1-1.967-1.339l-2.066-3.559Z" clip-rule="evenodd"></path>
                        </svg>
                        <h1>Điểm: <input style="font-size: 15px;color:#808080" type="text" value="<?php echo $item->diemthi?> đ" readonly></h1>
                    </div>
                    <button class="btn-chitiet" type="submit">Xem chi tiết</button>
                </form>
                <div class="hashtag">#<?php echo $item->tenchungchi?></div>
            </div>
        <?php
        }
    }
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