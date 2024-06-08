<?php
require 'config/connect.php';
?>
<div>
<h1 style="text-align: center; color: red; font-size: 25px; font-weight: bold; margin-top: 3rem;">THÊM TÀI KHOẢN</h1>  
  <div class="form-edit">
    <form action="add_taikhoan.php" method="post" name="edit-form" onsubmit="return validateForm_edit()" enctype="multipart/form-data">
    <div class="form-group" style="margin-top: 10px;">
        <label for="name">Họ và Tên:</label>
        <input type="text" name="name">
      </div>
      <div class="form-group">
        <label for="bod">Ngày sinh:</label>
        <input type="text" name="bod" >
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email">
      </div>
      <div class="form-group">
        <label for="username">Tài Khoản:</label>
        <input type="text" name="username">
      </div>
      <div class="form-group">
        <label for="password">Mật Khẩu:</label>
        <input type="text" name="password">
      </div>
      <div class="form-group">
        <label for="manhomquyen">Nhóm quyền:</label>
        <?php
        $sql = "SELECT * FROM tbl_nhomquyen WHERE manhomquyen IN (1, 2) ORDER BY manhomquyen";
        $stm = $pdo->query($sql);
        ?>
        <select name="role" class="role_select">
          <option value="0"> -- Not Value --</option>
          <?php
          $data = $stm->fetchAll(PDO::FETCH_OBJ);
          if ($stm->rowCount() > 0) {
            foreach ($data as $item) {
          ?>
              <option value="<?php echo $item->manhomquyen; ?>">
                <?php echo $item->tennhomquyen; ?>
              </option>
          <?php
            }
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <a href="DS_taikhoan.php" class="btn_cancel">Hủy</a>
        <button type="submit">Thêm tài khoản</button>
      </div>
    </form>
  </div>
</div>
<script>
  function quay_lai_trang_truoc() {
    history.back();
  }
</script>

<style>
  .form-edit {
    width: 60%;
    height: 540px;
    margin: 20px auto 10px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .form-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .form-group label {
    width: 30%;
    text-align: right;
    margin-right: 20px;
  }

  .form-group input {
    width: 60%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .form-group button {
    width: 20%;
    padding: 10px;
    border: none;
    background-color: #008bf8;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 20%;
  }

  .form-group button:hover {
    background-color: #006bbf;
  }

  .form-group .btn_cancel {
    border: 1px solid grey;
    background-color: grey;
    width: 70px;
    height: 40px;
    text-align: center;
    padding: 10px;
    font-size: 15px;
    color: #ffffff;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 40%;
  }

  .form-group .btn_cancel:hover {
    background-color: red;
  }

  .form-group .role_select{
    margin-top: 20px;
    width: 60%;
  }
</style>
