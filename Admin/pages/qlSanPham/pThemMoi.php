<form action="pages/qlSanPham/xlThemMoi.php" method="post" onsubmit="return KiemTra();" enctype="multipart/form-data">
    <fieldset class="themSanPham">
        <legend>Thêm sản phẩm</legend>
        <div>
            <span>Tên sản phẩm:</span>
            <input type="text" name="txtTen" id="txtTen"/>
            <i id="errTen"></i>
        </div>
        <div>
            <span>Hãng sản xuất</span>
            <select name="cmbHang">
                <?php
                    $sql="SELECT * FROM HangSanXuat WHERE BiXoa=0";
                    $result=DataProvider::ExecuteQuery($sql);
                    while($row=mysqli_fetch_array($result)){
                        ?>
                            <option value="<?php echo $row["MaHangSanXuat"]; ?>"><?php echo $row["TenHangSanXuat"];?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div>
            <span>LoaiSanPham</span>
            <select name="cmbLoai">
                    <?php
                        $sql="SELECT * FROM LoaiSanPham WHERE BiXoa = 0";
                        $result=DataProvider::ExecuteQuery($sql);
                        while($row=mysqli_fetch_array($result))
                        {
                            ?>
                                <option value="<?php echo $row["MaLoaiSanPham"];?>"><?php echo $row["TenLoaiSanPham"];?></option>
                            <?php
                        }
                    ?>
            </select>
        </div>
        <div>
            <span>Hình</span>
            <input type="file" name="fHinh">
        </div>
        <div>
            <span>Giá</span>
            <input type="text" name="txtGia" id="xtGia"/>
            <i id="errGia"></i>
        </div>
        <div>
            <span>Số lượng tồn</span>
            <input type="text" name="txtTon" id="txtTon" />
            <i id="errTon"></i>
        </div>
        <div>
            <span>Mô tả</span>
            <textarea name="txtMoTa"></textarea>
        </div>
        <div>
            <input type="submit" value="Thêm mới">
        </div>
    </fieldset>
</form>
<script type="text/javascript">
    function KiemTra()
    {
        var ten=document.getElementByID("txtTen");
        var err=document.getElementByID("errTen");
        if(ten.value=="")
        {
            err.innderHTML="Tên sản phẩm không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML="";
        var gia=document.getElementByID("txtGia");
        var err=document.getElementByID("errGia");
        if(gia.value=="")
        {
            err.innderHTML="Giá sản phẩm không được rỗng";
            gia.focus();
            return false;
        }
        else
            err.innerHTML="";
        var ten=document.getElementByID("txtTon");
        var err=document.getElementByID("errTon");
        if(ten.value=="")
        {
            err.innderHTML="Số lượng tồn không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML="";
        return true;
    }
</script>