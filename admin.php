<?php
session_start();
include('layout/header_admin.php');
include('db_connect.php');

// Kiểm tra nếu chưa đăng nhập hoặc không phải admin thì chuyển hướng về đăng nhập
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: dangnhap.php');
    exit();
}
?>

<!-- Giao diện admin -->
<main>
    <h2 style="text-align: center;">Chào mừng quản trị viên, <?php echo $_SESSION['hoten']; ?>!</h2>
</main>
<!-- Nội dung trang chủ -->
<div class="content">
    <a href="quanlicauhoi.php" class="option">
        <h3>Quản lí câu hỏi</h3>
        <img src="hinhanh/icon_review.jpg" alt="Ôn tập" style="width: 200px; height: 180px;">
    </a>
    <a href="quanlitaikhoan.php" class="option">
        <h3>Quản lí tài khoản</h3>
        <img src="hinhanh/account.jpg" alt="Kết quả" style="width: 200px; height: 180px;">
    </a>
</div>

<?php include('layout/footer.php'); ?>
