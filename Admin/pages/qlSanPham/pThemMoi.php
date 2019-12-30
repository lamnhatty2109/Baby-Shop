<form action="pages/qlSanPham/xlThemMoi.php" method="post" onsubmit="return KiemTra()" enctype="multipart/form-data">
    <fieldset>
        <legend>Thêm Sản Phẩm Mới</legend>
        <div class="row">
            <div class="col col-1-of-2">
                <span>Tên Sản Phẩm:</span>
            </div>
            <div class="col col-2-of-2">
                <input type="text" name="txtTen" id="txtTen">
            </div>
        </div>

        <div class="row">
            <div class="col col-1-of-2">
                <span>Hình:</span>
            </div>
            <div class="col col-2-of-2">
                <input type="file" name="fHinh" id="fHinh">
            </div>
        </div>

        <div class="row">
            <div class="col col-1-of-2">
                <span>Giá:</span>
            </div>
            <div class="col col-2-of-2">
                <input type="text" name="txtGia" id="txtGia">
            </div>
        </div>

        <div class="row">
            <div class="col col-1-of-2">
                <span>Số Lượng Tồn:</span>
            </div>
            <div class="col col-2-of-2">
                <input type="text" name="txtTon" id="txtTon">
            </div>
        </div>
        <div class="row">
            <div class="col col-1-of-2">
                <span>Loại Sản Phẩm</span>
            </div>
            <div class="col col-2-of-2">
                <select name="cmbLoai" id="">
                    <?php
                    $sql = "SELECT * FROM LoaiSanPham WHERE BiXoa = 0";
                    $result = DataProvider::ExecuteQuery($sql);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row["MaLoaiSanPham"]; ?>"><?php echo $row["TenLoaiSanPham"] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col col-1-of-2">
                <span>Hãng Sản Xuất</span>
            </div>
            <div class="col col-2-of-2">
                <select name="cmbHang">
                    <?php
                    $sql = "SELECT * FROM HangSanXuat WHERE BiXoa = 0";
                    $result = DataProvider::ExecuteQuery($sql);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row["MaHangSanXuat"]; ?>"><?php echo $row["TenHangSanXuat"] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col col-1-of-2">
                <span>Mô tả</span>
            </div>
            <div class="col col-2-of-2">
                <textarea name="txtMoTa" cols="50" rows="6"></textarea>
            </div>
        </div>
        <div>
            <input type="submit" value="Thêm Mới">
        </div>
        <div id="error"></div>
    </fieldset>
</form>
<script type="text/javascript">
    function KiemTra() {
        var ten = document.getElementById("txtTen");
        var err = document.getElementById("error");
        if (ten.value == "") {
            err.innerHTML = "Tên Sản Phẩm Không Được Rỗng";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";

        var ten = document.getElementById("txtGia");
        var err = document.getElementById("error");
        if (ten.value == "") {
            err.innerHTML = "Giá Sản Phẩm Không Được Rỗng";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";

        var ten = document.getElementById("txtTon");
        var err = document.getElementById("error");
        if (ten.value == "") {
            err.innerHTML = "Số Lượng Tồn Không Được Rỗng";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";

        return true;
    }
</script>