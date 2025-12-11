<?php
session_start();
include('layout/header.php');
$check = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tk = $_POST['taikhoan'];
    $mk = $_POST['matkhau'];

    $kn = mysqli_connect("localhost", "root", "", "tracnghiemtinhoc") or die("Không thể kết nối CSDL");

    $lenhsql = "SELECT * FROM account WHERE user='$tk' AND password='$mk'";
    $kq = mysqli_query($kn, $lenhsql);

    if ($dong = mysqli_fetch_array($kq)) {
        $_SESSION['ms'] = $dong['ms'];
        $_SESSION['hoten'] = $dong['hoten'];
        $_SESSION['user'] = $dong['user'];
        $_SESSION['password'] = $dong['password'];
        $_SESSION['role'] = $dong['role'];

        if ($dong['role'] === 'admin') {
            header('location: admin.php');
            exit();
        } else {
            header('location: TrangChu.php');
            exit();
        }
    } else {
        $check = 1;
    }
}
?>
<link rel="stylesheet" href="style/dangnhap.css">
<main>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h2>Đăng Nhập</h2>

        <input type="text" name="taikhoan" placeholder="Tài khoản" 
            value="<?php if (isset($_POST['taikhoan'])) echo $_POST['taikhoan']; ?>">

        <input type="password" name="matkhau" placeholder="Mật khẩu" 
            value="<?php if (isset($_POST['matkhau'])) echo $_POST['matkhau']; ?>">

        <button type="submit">Đăng Nhập</button>

        <div class="login-footer">
            Chưa có tài khoản? <a href="DangKy.php">Đăng ký ngay</a>
        </div>

        <?php if ($check == 1): ?>
            <div class="error-message">Tên đăng nhập hoặc mật khẩu không đúng</div>
        <?php endif; ?>
    </form>
</main>
<!-- footer -->
<?php include('layout/footer.php'); ?>
