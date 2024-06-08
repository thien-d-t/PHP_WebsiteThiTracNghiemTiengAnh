<?php
require 'side_bar.php';
require 'config/connect.php';
?>

<div class="row">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">

        <div class="search_acc">
            <input type="text" id="search-box" placeholder="Tìm kiếm chứng chỉ..." >
            <button class="btn-cl" id="search-button">Tìm kiếm</button>

            <button class="add_acc">Thêm chứng chỉ</button>
        </div>

        <!-- Hiển thị kết quả tìm kiếm -->
        <div id="search-results"></div>

        <div class="danhsachdethi"></div>

        <!-- Hiển thị thêm tài khoản -->
        <div id="add-account-form" style="display: none;"></div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Xử lý sự kiện khi nhấn nút tìm kiếm
        $('#search-button').click(function() {
            var searchQuery = $('#search-box').val();
            if (searchQuery.trim() !== '') {
                $.post("search_chungchi.php", {
                    query: searchQuery
                }, function(data) {
                    $("#search-results").html(data);
                });
            } else {
                $("#search-results").html('<p class="attention">Vui lòng nhập thông tin tìm kiếm.</p>');
            }
        });

        // Tải danh sách tài khoản mặc định
        $.ajax({
            url: "danhsach_chungchi.php",
            type: "GET",
            success: function(data) {
                $(".danhsachdethi").html(data);
            },
            error: function(xhr, status, error) {
                $(".danhsachdethi").html('<p class="attention">Không thể tải danh sách chứng chỉ. Vui lòng thử lại sau.</p>');
            }
        });

        // Xử lý sự kiện khi nhấn nút thêm chungchi
        $('.add_acc').click(function() {
            $.ajax({
                url: "insert_chungchi.php",
                type: "GET",
                success: function(data) {
                    $("#add-account-form").html(data);
                    $("#add-account-form").show();
                    $(".danhsachdethi").hide();
                    $(".search_acc").hide();
                },
                error: function(xhr, status, error) {
                    $("#add-account-form").html('<p class="attention">Không thể tải biểu mẫu thêm chứng chỉ. Vui lòng thử lại sau.</p>');
                }
            });
        });
    });
</script>

<style>
    .search_acc{
        display: flex;
        width: 100%;
        margin-top: 40px;
    }

    .search_acc > #search-box{
        width: 250px;
        margin-left: 5rem;
        height: 40px;
    }

    .search_acc > #search-button{
        width: 100px;
        height: 38px;
        text-align: center;
        margin-top: -19px;
        border: 1px solid transparent;
        background-color: #008bf8;
        color: #ffffff;
        margin-left: 10px;
        border-radius: 5px;
        font-size: 15px;
        font-weight: bold;
        cursor: pointer;
    }

    .search_acc > #search-button:hover{
        background-color: #30aded;
        color: #333;
    }

    .attention {
        color: #ed3030;
        font-size: 16px;
        font-family: 500;
        text-align: center;
    }

    .add_acc{
        width: 140px;
        height: 38px;
        text-align: center;
        margin-top: -19px;
        border: 1px solid transparent;
        background-color: #008bf8;
        color: #ffffff;
        margin-left: auto;
        margin-right: 5vh;
        border-radius: 5px;
        font-size: 15px;
        font-weight: bold;
        cursor: pointer;
    }

    .add_acc:hover{
        background-color:#30aded;
        color: #000;
    }
</style>