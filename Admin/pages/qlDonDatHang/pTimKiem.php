<style>
    .classThanhToan {
        background: #9984A8;
    }

    .classGiaoHang {
        background: #613DBF;
    }

    .classHuy {
        background: rgb(251, 47, 156);
    }

    table {
        margin: 0 auto;
        width: 1140px;
    }
</style>
<?php
if (isset($_GET["ddh"])) {
?>

    <table cellspacing="0">
        <tr>
            <th width="100">STT</th>
            <th width="150">Mã đơn đặt hàng</th>
            <th width="100">Ngày Lập</th>
            <th width="200">Khách Hàng</th>
            <th width="100">Tình Trạng</th>
            <th width="200">Thao Tác</th>
        </tr>
        <?php
        $ddh = $_GET["ddh"];
        $sql = "SELECT D.MaDonDatHang, D.NgayLap, D.MaTinhTrang, T.TenHienThi, TT.TenTinhTrang 
            FROM DONDATHANG D, TAIKHOAN T, TINHTRANG TT WHERE D.MATAIKHOAN = T.MATAIKHOAN AND D.MATINHTRANG = TT.MATINHTRANG
            AND D.MaDonDatHang LIKE '%$ddh%'";
        $result = DataProvider::ExecuteQuery($sql);

        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
            $c = "";
            switch ($row["MaTinhTrang"]) {
                case 2:
                    $c = "classGiaoHang";
                    break;
                case 3:
                    $c = "classThanhToan";
                    break;
                case 4:
                    $c = "classHuy";
                    break;
            }
        ?>
            <tr class="<?php echo $c ?>">
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["MaDonDatHang"]; ?></td>
                <td><?php echo $row["NgayLap"]; ?></td>
                <td><?php echo $row["TenHienThi"]; ?></td>
                <td><?php echo $row["TenTinhTrang"] ?></td>
                <td>
                    <a href="index.php?c=5&a=2&id=<?php echo $row["MaDonDatHang"] ?>">
                        <img src="images_admin/edit.png">
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