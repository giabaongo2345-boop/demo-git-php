<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="style/dangky.css">
</head>
<body>
<?php
    $check = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['ms'], $_POST['name'], $_POST['pass1'], $_POST['pass2'], $_POST['user'])) {
            $ms = $_POST['ms'];
            $name = $_POST['name'];
            $mk1 = $_POST['pass1'];
            $mk2 = $_POST['pass2'];
            $user = $_POST['user'];

            if ($ms != null) {
                if ($name != null) {
                    if ($user == null) {
                        $check = "Chưa có tên đăng nhập";
                    } else if ($mk1 == $mk2) {
                        $kn = mysqli_connect("localhost", "root", "", "tracnghiemtinhoc") or die("khong the ket noi csdl");
                        $sql1 = "SELECT * FROM account WHERE ms='$ms'";
                        $sql2 = "SELECT * FROM account WHERE user='$user'";
                        $kq = mysqli_query($kn, $sql1);
                        if (!mysqli_fetch_array($kq)) {
                            $kq = mysqli_query($kn, $sql2);
                            if (!mysqli_fetch_array($kq)) {
                                $sql = "INSERT INTO account (ms, hoten, user, password, role)
                                VALUES ('$ms', '$name', '$user', '$mk1', 'user')";

                                mysqli_query($kn, $sql);
                                $check = 1;
                            } else {
                                $check = "Tên đăng nhập đã tồn tại";
                            }
                        } else {
                            $check = "ID đã tồn tại";
                        }
                    } else {
                        $check = "Mật khẩu nhập lại không đúng";
                    }
                } else {
                    $check = "Chưa có Họ và Tên";
                }
            } else {
                $check = "Chưa có ID";
            }
        }
    }
?>

<div class="form-container">
    <h1><a href="trangChu.php"><img src="hinhanh/logo1.png" alt="LOGO" width="200" height="100"></a></h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h2>Đăng ký tài khoản</h2>

        <label>ID</label>
        <input type="text" name="ms" value="<?php if (isset($_POST['ms'])) echo $_POST['ms']; ?>">

        <label>Họ và tên</label>
        <input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">

        <label>Tên đăng nhập</label>
        <input type="text" name="user" value="<?php if (isset($_POST['user'])) echo $_POST['user']; ?>">

        <label>Mật khẩu</label>
        <input type="password" name="pass1" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">

        <label>Nhập lại mật khẩu</label>
        <input type="password" name="pass2" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">

        <button type="submit">Đăng ký</button>

    <p class="message">
        <?php 
            if ($check === 1) {
                echo "<script>
                        alert('Đăng ký thành công');
                        window.location.href = 'dangnhapweb.php';
                    </script>";
            } else if ($check !== 0) {
                echo $check;
            }
        ?>
    </p>

    </form>
</div>

</body>
</html>
