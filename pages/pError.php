<h1>Error 404</h1>
<?php 
    if(isset($_GET["id"]))
    {
        switch ($_GET["id"]){
            case 1:
                echo "<span>Tên đăng  nhập và mật khẩu không tồn tại</span>";
            break;
            case 2:
                echo "<span>Không tìm thấy sản phẩm nào</span>";
            break;
            case 3:
                echo "<span>Bạn cần nhập đủ thông tin giá</span>";
            break;
            default: 
                echo "";
        break;
        }
    }
?>

<style>
    h1, span{
        color: white;
    }
</style>