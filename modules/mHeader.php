<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="">
</head>

<body>
    <div class="header">
        <div class="container">
            <a href="index.php">
                <img src="img/logo.png" alt="">
            </a>
            <div class="login_nav">
                <?php
                if (isset($_SESSION["MaTaiKhoan"])) {
                ?>
                    <?php echo $_SESSION["TenHienThi"]; ?>
                    <img src="img/vertical-stick.png" >
                    <a href="modules/xlDangXuat.php">Đăng xuất</a>
                    <a href="index.php?a=5">
                        <!-- icon shopping cart chỗ này -->
                        <img src="img/shopping-cart.png"  title="Giỏ hàng">
                    </a>
                <?php
                } else {
                ?>
                    <form name="frmLogin" action="modules/xlDangNhap.php" method="post" onsubmit="return KiemTraDangNhap()">
                        <input type="text" name="txtUS" id="txtUS" size="12" maxlength="20" width="15" placeholder="Username">
                        <input type="password" name="txtPS" id="txtPS" size="12" maxlength="20" width="15" placeholder="Password">
                        <input type="submit" value="Đăng nhập" class="btn btn-default">
                        <input type="button" value="Đăng ký" class="btn btn-default" onclick="ChuyenTrangDangKy()" />
                    </form>
                    <script type="text/javascript">
                        function ChuyenTrangDangKy() {
                            location = "index.php?a=6";
                        }
                    </script>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>