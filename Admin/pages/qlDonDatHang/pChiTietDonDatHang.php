<link rel="stylesheet" href="../../css/styles.css">
<style>
    table {
        margin: 0 auto;
        width: 1140px;
    }
</style>
<?php
if (!isset($_GET["id"]))
    DataProvider::changeURL("index.php?c=404");
$id = $_GET["id"];
$sql = "SELECT d.MaDonDatHang, d.NgayLap, d.TongThanhTien,t.TenHienThi,t.DiaChi,t.DienThoai,tt.MaTinhTrang, tt.TenTinhTrang 
            FROM DonDatHang d,TaiKhoan t,TinhTrang tt WHERE d.MaTaiKhoan = t.MaTaiKhoan AND d.MaTinhTrang = tt.MaTinhTrang AND MaDonDatHang = $id";
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);
?>

<fieldset>
    <legend>Thông Tin Đơn Đặt Hàng</legend>
    <div class="row">
        <div class="col col-1-of-2">
            <span>Mã đơn đặt hàng:</span>
        </div>
        <div class="col col-2-of-2">
            <?php echo $row["MaDonDatHang"]; ?>
        </div>
    </div>
    <div class="row">
        <div class="col col-1-of-2">
            <span>Ngày Đặt Hàng:</span>
        </div>
        <div class="col col-2-of-2">
            <?php echo $row["NgayLap"]; ?>
        </div>
    </div>
    <div class="row">
        <div class="col col-1-of-2">
            <span>Tên Khách Hàng:</span>
        </div>
        <div class="col col-2-of-2">
            <?php echo $row["TenHienThi"]; ?>
        </div>
    </div>
    <div class="row">
        <div class="col col-1-of-2">
            <span>số điện thoại:</span>
        </div>
        <div class="col col-2-of-2">
            <?php echo $row["DienThoai"]; ?>
        </div>
    </div>
    <div class="row">
        <div class="col col-1-of-2">
            <span>Địa Chỉ Giao Hàng:</span>
        </div>
        <div class="col col-2-of-2">
            <?php echo $row["DiaChi"]; ?>
        </div>
    </div>
    <div class="row">
        <div class="col col-1-of-2">
            <span>Tổng Thành Tiền:</span>
        </div>
        <div class="col col-2-of-2">
            <?php echo $row["TongThanhTien"]; ?>
        </div>
    </div>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=2&id=<?php echo $id; ?>" class="btnGiaoHang">
        Giao Hàng
    </a>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=3&id=<?php echo $id; ?>" class="btnThanhToan">
        Thanh Toán
    </a>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=4&id=<?php echo $id ?>" class="btnHuy">
        Hủy Đơn Hàng
    </a>
    <a href="#" onclick="window.print();" class="btnInDonHang">
        In Đơn Hàng
    </a>
</fieldset>
<h2>Chi Tiết Đơn Hàng</h2>
<table cellspacing="0" >
    <tr>
        <th width="100">STT</th>
        <th width="150">Tên Sản Phẩm</th>
        <th width="100">Hình</th>
        <th width="100">Số Lượng</th>
        <th width="100">Giá Bán</th>
    </tr>
    <?php
    $sql = "SELECT s.TenSanPham, s.HinhURL, c.SoLuong, c.GiaBan FROM ChiTietDonDatHang c, SanPham s WHERE c.MaSanPham = s.MaSanPham
                AND c.MaDonDatHang = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row["TenSanPham"]; ?></td>
            <td>
                <img height="35" src="../images/<?php echo $row["HinhURL"]; ?>">
            </td>
            <td><?php echo $row["SoLuong"]; ?></td>
            <td><?php echo $row["GiaBan"]; ?></td>
        </tr>
    <?php
    }
    ?>
</table>