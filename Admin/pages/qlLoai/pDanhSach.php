

<form action="pages/qlLoai/xlTimKiem.php" method="get">
    Nhập Tên Loai: <input type="text" name="loai" id="idLoai">
    <input type="submit" value="Tìm Kiếm">
</form>
<table>
    <tr>
        <th width="100">STT</th>
        <th width="200">Tên Loại Sản Phẩm</th>
        <th width="200">Tình Trạng</th>
        <th width="200">Thao Tác</th>
    </tr>
    <?php
    $sql = "SELECT * FROM loaisanpham";
    $result = DataProvider::ExecuteQuery($sql);

    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row["TenLoaiSanPham"] ?></td>
            <td>
                <?php
                    if ($row["BiXoa"] == 1)
                        echo "<img src='images_admin/locked.png' />";
                    else
                        echo "<img src='images_admin/active.png' />";
                    ?>
            </td>
            <td>
                <a href="pages/qlLoai/xlKhoa.php?id=<?php echo $row["MaLoaiSanPham"] ?>">
                    <img src="images_admin/lock.png" alt="">
                </a>
                <a href="index.php?c=3&a=2&id=<?php echo $row["MaLoaiSanPham"] ?>">
                    <img src="images_admin/edit.png" alt="">
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <a href="index.php?c=3&a=3">
            <img src="images_admin/new.png" alt="">
            </a>
        </td>
    </tr>
</table>