<!-- trangChu.php -->
<?php
session_start();
include('layout/header.php');
include('db_connect.php');
?>

<!-- body -->
<div class="content">
    <a href="ontap.php" class="option">
        <h3>Ôn tập</h3>
        <img src="hinhanh/icon_review.jpg" alt="Ôn tập" style="width: 200px; height: 180px;">
        <p>Ôn tập theo chương</p>
    </a>
    <a href="kiemtra.php" class="option">
        <h3>Kiểm tra</h3>
        <img src="hinhanh/icon_result.jpg" alt="Kết quả" style="width: 200px; height: 180px;">
        <p>Kiểm tra kiến thức</p>
    </a>
</div>

<!-- footer -->
<?php include('layout/footer.php'); ?>
