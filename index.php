<?php
session_start();
include "lib/DataProvider.php";
$_SESSION["path"] = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>" />
    <link rel="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include "modules/mHeader.php";
    ?>
    <div class="container content">
        <div class="row after-header">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <?php
                include "modules/mSidebar.php";
                ?>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <?php
                include "modules/mSlider.php";
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php
                $a = 1;

                if (isset($_GET["key"]) == true) {
                    $key = $_GET["key"];
                    include "pages/pSanPhamTheoTen.php";
                } else {
                    if (isset($_GET["a"]) == true)
                        $a = $_GET["a"];
                    switch ($a) {
                        case 1:
                            include "pages/pIndex.php";
                            break;
                        case 2:
                            include "pages/pSanPhamTheoHang.php";
                            break;
                        case 3:
                            include "pages/pSanPhamTheoLoai.php";
                            break;
                        case 4:
                            include "pages/pChiTiet.php";
                            break;
                        case 5:
                            include "pages/GioHang/pIndex.php";
                            break;
                        case 6:
                            include "pages/TaoTaiKhoan/pIndex.php";
                            break;
                        case 7:
                            include "pages/pSanPhamTheoTen.php";
                            break;
                        default:
                            include "pages/pError.php";
                            break;
                    }
                }
                ?>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 search-box">
                <?php
                include "pages/pTimKiem.php";
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php
        include "modules/mFooter.php";
        ?>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>