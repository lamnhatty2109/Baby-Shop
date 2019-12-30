<?php
    if(!isset($_GET["id"]))
        DataProvider::changeURL("index.php?c=404");
    $id = $_GET["id"];
    $sql = "SELECT * FROM HangSanXuat WHERE MaHangSanXuat = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>
<style>
   
</style>
<form action="pages/qlHang/xlCapNhat.php" method="get" onsubmit="return KiemTra()">
    <fieldset>
        <legend>Cập Nhật Thông Tin Hãng Sản Xuất</legend>
        <div class="row">
            <div class="col col-1-of-2">
                <span>Tên Hãng</span>
            </div>
            <div class="col col-2-of-2">
                <input type="text" name="txtTen" id="txtTen" value="<?php echo $row["TenHangSanXuat"]; ?>">
                <input type="hidden" name="id" value="<?php echo $row["MaHangSanXuat"]; ?>">
                <input type="submit" value="Cập Nhật">
            </div>
        </div> 
        <div id="error"></div>       
    </fieldset>
</form>
<script type="text/javascript">
    function KiemTra(){
        var ten = document.getElementById("txtTen");
        var err = document.getElementById("error");
        if(ten.value == "")
        {
            err.innerHTML ="Tên Hãng Không Được Rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";
        return true;
    }
</script>