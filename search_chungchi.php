<?php
require 'config/connect.php';

$query = $_POST['query'] ?? '';

if ($query) {
    $stm = $pdo->prepare("SELECT * FROM tbl_chungchi WHERE tenchungchi LIKE :query ORDER BY machungchi");
    $stm->execute(['query' => "%$query%"]);
    $data = $stm->fetchAll(PDO::FETCH_OBJ);

    if ($stm->rowCount() > 0) {
        echo '<table class="styled-table" style="width: 1140px;margin-left: 50px;table-layout: fixed;">';
        echo '<thead style="display: table;width: 100%">';
        echo '<tr>';
        echo '<td style="text-align: center">STT</td>';
        echo '<td style="text-align: center">Mã chứng chỉ</td>';
        echo '<td>Tên chứng chỉ</td>';
        echo '<td style="text-align: center; width: 30%">Mô tả</td>';
        echo '<td>Hành động</td>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody style="display: block;height: 470px;overflow: auto;width: 100%;">';
        
        $i = 1;
        foreach ($data as $item) {
            echo '<tr style="display: table; width: 100%;table-layout: fixed;">';
            echo '<td style="text-align: center;">' . htmlspecialchars($i) . '</td>';
            echo '<td style="text-align: center;">' . htmlspecialchars($item->machungchi) . '</td>';
            echo '<td>' . htmlspecialchars($item->tenchungchi) . '</td>';
            echo '<td style="text-align: center;width: 30%">' . htmlspecialchars($item->mota) . '</td>';
            echo '<td style="text-align: center;">
                    <a href="edit_chungchi.php?made=' . htmlspecialchars($item->machungchi) . '">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a onclick="return confirm(\'Bạn có muốn xóa chứng chỉ này không???\');" href="delete_chungchi.php?made=' . htmlspecialchars($item->machungchi) . '">
                        <svg width="30" height="30" fill="#dd2727" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M14 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M6 9a1 1 0 0 1 1 1v8a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-8a1 1 0 1 1 2 0v8a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4v-8a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </td>';
            echo '</tr>';
            $i++;
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p class="attention" style="text-align: center;">Không tìm thấy chứng chỉ nào</p>';
    }
} else {
    echo '<p class="attention" style="text-align: center;">Vui lòng nhập từ khóa tìm kiếm</p>';
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