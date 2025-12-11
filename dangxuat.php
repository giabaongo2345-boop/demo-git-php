<?php
session_start();
session_unset(); // Xóa tất cả session
session_destroy(); // Hủy session
header('Location: trangChu.php'); // Chuyển hướng về trang chủ
exit;
?>
