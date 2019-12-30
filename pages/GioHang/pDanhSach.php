<div class="quanlygiohang">
    <h3>Quản lý giỏ hàng</h3>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thao tác</th>
        </tr>
        <?php
        $tongGia = 0;
        if (isset($_SESSION["GioHang"])) {
            $soSanPham = count($gioHang->listProduct);
            for ($i = 0; $i < $soSanPham; $i++) {
                $id = $gioHang->listProduct[$i]->id;
                $sql = "SELECT * FROM SanPham WHERE MaSanPham = $id";
                $result = DataProvider::ExecuteQuery($sql);
                $row = mysqli_fetch_array($result);
        ?>
                <form action="pages/Giohang/xlCapNhatGioHang.php" name="frmGioHang" method="post">
                    <tr>
                        <td>1</td>
                        <td>
                            <?php echo $row["TenSanPham"]; ?>
                        </td>
                        <td align="center">
                            <img src="images/<?php echo $row["HinhURL"]; ?>" width="50">
                        </td>
                        <td>
                            <?php echo $row["GiaSanPham"]; ?>
                        </td>
                        <td>
                            <input type="number" name="txtSL" value="<?php echo $gioHang->listProduct[$i]->num; ?>" width="45" size="5" />
                            <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>" />
                        </td>
                        <td>
                            <button type="submit" class="btn btn-default"><img src="img/icon-update.png" width="40" title="Cập nhật số lượng"></button>
                            <a href="pages/GioHang/xlXoaSanPham.php?id=<?php echo $gioHang->listProduct[$i]->id; ?>"><img src="img/icon-delete.png" alt="" height="40px"></a>
                        </td>
                </form>
                            <!-- <form action="pages/GioHang/xlXoaSanPham.php" method="post">
                                <input type="hidden" name="txtSL" value="0" width="45" size="5" />
                                <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>" />
                                <button type="submit" class="btn btn-default" onclick=""><img src="img/icon-delete.png" width="40" title="Xóa sản phẩm"></button>
                            </form>
                        </td>
                    </tr> -->
        <?php
                $tongGia += $row["GiaSanPham"] * $gioHang->listProduct[$i]->num;
            }
        }
        $_SESSION["TongGia"] = $tongGia;
        ?>

    </table>
    <div class="pprice">
        Tổng thành tiền: <?php echo $tongGia; ?> đ
    </div>
    <a href="pages/GioHang/xlDatHang.php">
        <img src="img/shopping-cart.png" height="50" title="Đặt hàng">
    </a>
</div>