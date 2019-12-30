<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $a  = $_GET["a"];
        $sql = "UPDATE DonDatHang SET MaTinhTrang = $a WHERE MaDonDatHang = $id";
        DataProvider::ExecuteQuery($sql);

        if($a == 4)
        {
            $sql= "SELECT MaSanPham, SoLuong FROM ChiTietDonHang WHERE MaDonHang = $id";
            $result = DataProvider::ExecuteQuery($sql);
            while($row = mysqli_fetch_array($result))
            {
                $soluong = $row["SoLuong"];
                $masanpham = $row["MaSanPham"];
                $sql = "UPDATE SanPham SET SoLuongTon = SoLuongTon + $soluong WHERE MaSanPham = $masanpham";
                DataProvider::ExecuteQuery($sql); 
            }
        }
    }
    DataProvider::changeURL("../../index.php?c=5");
?>