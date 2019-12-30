<table>
    <tr>
        <th width="100">STT</th>
        <th width="200">Tên Sản Phẩm</th>
        <th width="100">Hình</th>
        <th width="100">Giá</th>
        <th width="200">Ngày Nhập</th>
        <th width="100">Số Lượng Tồn</th>
        <th width="100">Số Lượng Bán</th>
        <th width="100">Số Lược Xem</th>
        <th width="100">Loại</th>
        <th width="100">Hãng</th>
        <th width="250">Mô Tả</th>
        <th width="50">Trạng Thái</th>
        <th width="100">Thao Tác</th>
    </tr>
    <?php
    $sp = $_GET["sp"];
    $sql = "SELECT s.*,l.TenLoaiSanPham, h.TenHangSanXuat  
            FROM SanPham s,LoaiSanPham l, HangSanXuat h where s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat AND s.TenSanPham LIKE '%$sp%'";
    $result = DataProvider::ExecuteQuery($sql);
    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row["TenSanPham"] ?></td>
            <td>
                <img src="images/<?php echo $row["HinhURL"]; ?>" width="80" alt="">
            </td>
            <td><?php echo $row["GiaSanPham"] ?></td>
            <td><?php echo $row["NgayNhap"] ?></td>
            <td><?php echo $row["SoLuongTon"] ?></td>
            <td><?php echo $row["SoLuongBan"] ?></td>
            <td><?php echo $row["SoLuocXem"] ?></td>
            <td><?php echo $row["TenLoaiSanPham"] ?></td>
            <td><?php echo $row["TenHangSanXuat"] ?></td>
            <td>
                <?php
                    if (strlen($row["MoTa"]) > 20) {
                        $sMoTa = substr($row["MoTa"], 0, 20) . "...(Mở Rộng)";
                    } else {
                        $sMoTa = $row["MoTa"];
                    }
                    ?>
                <div id="MoTa_<?php echo $row["MaSanPham"]; ?>">
                    <?php echo $sMoTa; ?>
                </div>
                <div class="fullMoTa" id="fullMoTa_<?php echo $row["MaSanPham"] ?>">
                    <?php echo $row["MoTa"]; ?>
                </div>
            </td>
            <td>
                <?php
                    if ($row["BiXoa"] == 1)
                        echo "<img src='images_admin/locked.png' />";
                    else
                        echo "<img src='images_admin/active.png' />";
                    ?>
            </td>
            <td>
                <a href="pages/qlSanPham/xlKhoa.php?id=<?php echo $row["MaSanPham"] ?>">
                    <img src="images_admin/lock.png" alt="">
                </a>
                <a href="index.php?c=2&a=2&id=<?php echo $row["MaSanPham"] ?>">
                    <img src="images_admin/edit.png" alt="">
                </a>
            </td>
        </tr>
        <script type="text/javascript">
            //De Javascript Trong Vong Lap De No Nhan Cai $row + Cho echo Tung Cai Id
            //----> Neu Khong No Se Chi Nhan Cai Dau Tien
            //Gan Id Vao Javascript 
            var MoTa = document.getElementById("MoTa_<?php echo $row["MaSanPham"]; ?>");
            var fullMoTa = document.getElementById("fullMoTa_<?php echo $row["MaSanPham"]; ?>");
            fullMoTa.style.display = "none";

            function toggleDisplay(element) {
                if (element.style.display === "none") {
                    element.style.display = "block";
                } else {
                    element.style.display = "none";
                }
            }
            //Turn Off MoTaFull Neu < 20
            if (MoTa.toString().length < 20) {
                fullMoTa.style.display = "none";
            }
            MoTa.onclick = function() {
                //De Binh Thuong No se chay Xuong Duoi cung --> Sai --> Moi Lan onclick se Click 1 Lan
                var fullMoTa = document.getElementById("fullMoTa_<?php echo $row["MaSanPham"]; ?>");
                toggleDisplay(fullMoTa);
                this.style.display = "none";
            }
            fullMoTa.onclick = function() {
                var MoTa = document.getElementById("MoTa_<?php echo $row["MaSanPham"]; ?>");
                toggleDisplay(MoTa);
                this.style.display = "none";
            }
        </script>
    <?php
    }
    ?>
</table>