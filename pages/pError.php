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
            case 4:
                echo "<span>Giá không hợp lệ</span>";
            break;
            case 5:
                echo "<span>Không tìm thấy sản phẩm nào với tên trên</span>";
            break;
            case 10:
                echo "<span>Capcha không hợp lệ</span>";
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