

<form action="pages/qlHang/xlTimKiem.php" method="get">
    Nhập Tên Hãng: <input type="text" name="hang" id="idTK">
    <input type="submit" value="Tìm Kiếm">
</form>
<table cellspacing="0">
    <tr>
        <th width="100">STT</th>
        <th width="300">Tên Hãng Sản Xuất</th>
        <th width="100">Tình Trạng</th>
        <th width="200">Thao Tác</th>
    </tr>
    <?php
    $sql = "SELECT * FROM HangSanXuat";
    $result = DataProvider::ExecuteQuery($sql);

    $i = 1;
    while ($row = mysqli_fetch_array($result)) {

        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row["TenHangSanXuat"]; ?></td>
            <td>
                <?php
                    if ($row["BiXoa"] == 1)
                        echo "<img src='images_admin/locked.png' />";
                    else
                        echo "<img src='images_admin/active.png' />";
                    ?>
            </td>
            <td>
                <a href="pages/qlHang/xlKhoa.php?id=<?php echo $row["MaHangSanXuat"] ?>">
                    <img src="images_admin/lock.png" alt="">
                </a>
                <a href="index.php?c=4&a=2&id=<?php echo $row["MaHangSanXuat"] ?>">
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
        <a href="index.php?c=4&a=3">
            <img src="images_admin/new.png" alt="">
        </a>
        </td>
    </tr>
</table>