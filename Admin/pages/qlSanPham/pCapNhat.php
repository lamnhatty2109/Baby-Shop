<?php
if (!isset($_GET["id"]))
    DataProvider::changeURL("index.php?c=404");
    $id = $_GET["id"];
    $sql = "SELECT * FROM SanPham WHERE MaSanPham = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    $MaLoaiSanPham = $row["MaLoaiSanPham"];
    $MaHangSanXuat = $row["MaHangSanXuat"];
    $MoTa = $row["MoTa"];
?>
<form action="pages/qlSanPham/xlCapNhat.php" method="POST" onsubmit="return KiemTra()" enctype="multipart/form-data">
    <fieldset>
        <legend>Cập Nhật Sản Phẩm</legend>
        <input type="hidden" name="id" value="<?php echo $row["MaSanPham"]; ?>">
        <div class="row">
            <div class="col col-1-of-2">
                <span>Tên Sản Phẩm:</span>
            </div>
            <div class="col col-2-of-2">
                <input type="text" name="txtTen" id="txtTen" value="<?php echo $row["TenSanPham"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col col-1-of-2">
                <span>Hình:</span>
            </div>
            <div class="col col-2-of-2">
                <div>
                    <img src='<?php echo "images/" . $row["HinhURL"] ?>' width="40" alt="">
                </div>
                <input type="file" name="fHinh" id="fHinh">
            </div>
        </div>

        <div class="row">
            <div class="col col-1-of-2">
                <span>Giá:</span>
            </div>
            <div class="col col-2-of-2">
                <input type="text" name="txtGia" id="txtGia" value="<?php echo $row["GiaSanPham"]; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col col-1-of-2">
                <span>Số Lượng Bán:</span>
            </div>
            <div class="col col-2-of-2">
                <input type="text" name="txtBan" id="txtBan" value="<?php echo $row["SoLuongBan"]; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col col-1-of-2">
                <span>Số Lượng Tồn:</span>
            </div>
            <div class="col col-2-of-2">
                <input type="text" name="txtTon" id="txtTon" value="<?php echo $row["SoLuongTon"]; ?>">
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

                        if ($row["MaLoaiSanPham"] == $MaLoaiSanPham)
                            echo "<option value='" . $row["MaLoaiSanPham"] . "'selected>" . $row["TenLoaiSanPham"] . "</option>";
                        else
                            echo "<option value='" . $row["MaLoaiSanPham"] . "'>" . $row["TenLoaiSanPham"] . "</option>";
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
                        if ($row["MaHangSanXuat"] == $MaHangSanXuat)
                            echo "<option value='" . $row["MaHangSanXuat"] . "'selected>" . $row["TenHangSanXuat"] . "</option>";
                        else
                            echo "<option value='" . $row["MaHangSanXuat"] . "'>" . $row["TenHangSanXuat"] . "</option>";
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
                <textarea name="txtMoTa" cols="50" rows="10">
                    <?php echo $MoTa ?>
                </textarea>
            </div>
        </div>
        <div>
            <input type="submit" value="Cập Nhật">
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