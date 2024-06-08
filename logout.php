<?php 
    if(!isset($_SESSION)) session_start();
    unset($_SESSION['admin']);
    
    if(!isset($_SESSION['admin'])){
        header('location:login.php');exit;
    }
    
?>
<!-- <pre></pre>
<h1>Trang chủ <?php #echo $_SESSION['admin']['taikhoan']?></h1>
<h1><?php #echo $_SESSION['admin']['hoten']?></h1>
<h1>Trang chủ</h1> -->
