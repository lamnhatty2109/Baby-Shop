<form action="pages/qlTaiKhoan/xlCapNhat.php" method="get">
    <fieldset>
        <legend>Cập Nhật Thông Tin Tài Khoản</legend>
        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT TenDangNhap, MaLoaiTaiKhoan FROM TaiKhoan WHERE MaTaiKhoan = $id";
            $result = DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);
            $tenDangNhap = $row["TenDangNhap"];
            $MaLoaiTaiKhoan = $row["MaLoaiTaiKhoan"];
        }
        ?>
        <div class="row">
            <div class="col col-1-of-2">
                <span>Tên Đăng Nhập</span>
            </div>
            <div class="col col-2-of-2">
                <?php echo $tenDangNhap ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-1-of-2">
                <span>Loại Tài Khoản</span>
            </div>
            <div class="col col-2-of-2">
                <select name="cmbLoaiTaiKhoan">
                    <?php
                        $sql = "SELECT * FROM LoaiTaiKhoan";
                        $result = DataProvider::ExecuteQuery($sql);
                        while($row = mysqli_fetch_array($result)){
                            if($row["MaLoaiTaiKhoan"] == $MaLoaiTaiKhoan)
                                echo "<option value='".$row["MaLoaiTaiKhoan"]."'selected>".$row["TenLoaiTaiKhoan"]."</option>";
                            else
                                echo "<option value='".$row["MaLoaiTaiKhoan"]."'>".$row["TenLoaiTaiKhoan"]."</option>";

                        }
                    ?>
                </select>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
            </div>
        </div>
        <div>
            <input type="submit" value="Cập Nhật">
        </div>
    </fieldset>
</form>