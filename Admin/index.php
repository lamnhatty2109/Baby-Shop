<?php
session_start();
include "../lib/DataProvider.php";
//Check Admin
if (!isset($_SESSION["MaTaiKhoan"]) || $_SESSION["MaLoaiTaiKhoan"] != 2)
    DataProvider::changeURL("../index.php");
$c = 0;
if (isset($_GET["c"])) {
    $c = $_GET["c"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div id="header">
        <a href="index.php">
            Hệ thống quản lí sản phẩm baby Shop
        </a>
    </div>
    <div id="menu">
        <?php
        include "modules/mMenu.php";
        include "modules/mLogin.php";
        ?>
    </div>
    <div id="content">
        <?php
        switch ($c) {
            case 0:
                include "pages/pIndex.php";
                break;
            case 1:
                include "pages/qlTaiKhoan/pIndex.php";
                break;
            case 2:
                include "pages/qlSanPham/pIndex.php";
                break;
            case 3:
                include "pages/qlLoai/pIndex.php";
                break;
            case 4:
                include "pages/qlHang/pIndex.php";
                break;
            case 5:
                include "pages/qlDonDatHang/pIndex.php";
                break;
            default:
                include "pages/pError.php";
                break;
        }
        ?>
    </div>
    <div id="footer">
        &copy; Design by student of FIT - HCMUS
    </div>
</body>

</html>