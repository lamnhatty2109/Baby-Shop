<div class="quanlygiohang">
    <h3>Quản lý giỏ hàng</h3>
    <table>
        <tr>
            <th width="50">STT</th>
            <th width="200">Tên sản phẩm</th>
            <th width="60">Hình</th>
            <th width="100">Giá</th>
            <th width="100">Số lượng</th>
            <th width="100">Thao tác</th>
        </tr>
        <?php
            $tongGia=0;
            if(isset($_SESSION["GioHang"]))
            {
                $soSanPham=count($gioHang->listProduct);
                for($i=0; $i < $soSanPham; $i++)
                {
                    $id=$gioHang->listProduct[$i]->id;
                    $sql="SELECT * FROM SanPham WHERE MaSanPham = $id";
                    $result=DataProvider::ExecuteQuery($sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <form action="pages/Giohang/xlCapNhatGioHang.php" name="frmGioHang" method="post">
                        <tr>
                            <td>1</td>
                            <td>
                                <?php echo $row["TenSanPham"];?>
                            </td>
                            <td align="center">
                                <img src="images/<?php echo $row["HinhURL"]; ?>" width= "50">
                            </td>
                            <td>
                                <?php echo $row["GiaSanPham"]; ?>
                            </td>
                            <td>
                                <input type="number" name="txtSL" value="<?php echo $gioHang->listProduct[$i]->num; ?>" width="45" size="5" />
                                <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>"/>
                            </td>
                            <td>
                                <input type="submit" value="Cập nhật số lượng"  class="btn btn-primary"/>
                            </td>
                        </tr>
                    </form>
                    <?php 
                    $tongGia += $row["GiaSanPham"] * $gioHang->listProduct[$i]->num;
                }
            }
            $_SESSION["TongGia"]=$tongGia;
            ?>

    </table>
    <div class="pprice">
            Tổng thành tiền: <?php echo $tongGia; ?> đ
    </div>
    <a href="pages/GioHang/xlDatHang.php">
            <img src="img/dathang.png" width="100">
    </a>
</div>