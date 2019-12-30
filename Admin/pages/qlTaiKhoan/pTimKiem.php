<?php
    if(isset($_GET["ma"])){
        ?>
        <table>
    <tr>
        <th width="100">Mã Tài Khoản</th>
        <th width="200">Tên đăng Nhập</th>
        <th width="200">Tên Hiển Thị</th>
        <th width="200">Địa Chỉ</th>
        <th width="150">Điện Thoại</th>
        <th width="200">Email</th>
        <th width="75">Tình trạng</th>
        <th width="150">Loại Tài Khoản</th>
        <th width="100">Thao Tác</th>
    </tr>
    <?php
        $ma = $_GET["ma"];
        $sql = "SELECT T.MaTaiKhoan, T.TenDangNhap, T.TenHienThi, T.DiaChi, T.DienThoai, T.Email,T.BiXoa,L.TenLoaiTaiKhoan FROM TAIKHOAN T, LOAITAIKHOAN L WHERE T.MALOAITAIKHOAN = L.MALOAITAIKHOAN AND T.MaTaiKhoan = $ma";
        $result = DataProvider::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result))
        {
            ?>
                <tr>
                    <td><?php echo $row["MaTaiKhoan"]?></td>
                    <td><?php echo $row["TenDangNhap"]?></td>
                    <td><?php echo $row["TenHienThi"]?></td>
                    <td><?php echo $row["DiaChi"]?></td>
                    <td><?php echo $row["DienThoai"]?></td>
                    <td><?php echo $row["Email"]?></td>
                    <td>
                        <?php
                            if($row["BiXoa"] == 1)
                                echo "<img src='images_admin/locked.png' />";
                            else
                                echo "<img src='images_admin/active.png' />";
                        ?>
                    </td>
                    <td><?php echo $row["TenLoaiTaiKhoan"]?></td>
                    <td>
                        <a href="pages/qlTaiKhoan/xlKhoa.php?id=<?php echo $row["MaTaiKhoan"] ?>">
                            <img src="images_admin/lock.png" alt="">
                        </a>
                        <a href="index.php?c=1&a=2&id=<?php echo $row["MaTaiKhoan"] ?>">
                            <img src="images_admin/edit.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php
        }
    ?>
</table>
        <?php
    }
?>