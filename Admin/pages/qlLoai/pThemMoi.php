<form action="pages/qlLoai/xlThemMoi.php" method="get" onsubmit="return KiemTra()">
    <fieldset>
        <legend>Thêm Mới Loại Sản Phẩm</legend>
        <div class="row">
            <div class="col col-1-of-2">
                <span>Tên Loại Sản Phẩm</span>
            </div>
            <div class="col col-2-of-2">
                <input type="text" name="txtTen" id="txtTen">
                <input type="submit" value="Thêm Mới">
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
            err.innerHTML ="Tên Loại Không Được Rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";
        return true;
    }
</script>