<?php 
require('func.php');
require('config/connect.php');
$user = isset($_REQUEST['user'])?$_REQUEST['user']:null;
$pws= isset($_REQUEST['password'])?$_REQUEST['password']:null;  
$email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
$hoten= isset($_REQUEST['name'])?$_REQUEST['name']:null;  

$stm = $pdo->query("select * from tbl_nguoidung where email = '$email'");
if($stm->rowCount()>0){
    ?>
    
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 400px;left: 1130px;">
        <strong>Email đã được đăng ký!!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}else{
    echo 'tài k';
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 400px;left: 1130px;">
        <strong>Đăng ký tài khoản thành công!!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}