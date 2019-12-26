<?php
    session_start();
    include "../../lib/DataProvider.php";
    include "../../lib/ShoppingCart.php";
    if(isset($_SESSION["GioHang"]))
    {
        $gioHang=unserialize($_SESSION["GioHang"]);
        $maTaiKhoan=$_SESSION["MaTaiKhoan"];

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $ngayLap=date("Y-m-d H:i:s");
        $ngayLapTam=date("Y-m-d");
        $maTinhTrang=1;
        $tongGia=$_SESSION["TongGia"];

        $sql="SELECT MaDonDatHang FROM DonDatHang WHERE NgayLap like '$ngayLapTam%' ORDER BY MaDonDatHang DESC LIMIT 1";
        $result=DataProvider::ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        $r="081012003";
        $sttMaDonHang=0;
        if($row != null)
        {
            $sttMaDonHang=substr($row["MadonDatHang"],6,3);
        }
        $sttMaDonHang+=1;
        $sttMaDonHang=sprintf("%03s",$sttMaDonHang);
        $maDonDatHang=date("d").date("m").substr(date("Y"),2,2).$sttMaDonHang;

        $sql="INSERT INTO DonDatHang(MaDonDatHang, NgayLap,TongThanhTien,MaTaiKhoan, MaTinhTrang) VALUES('$maDonDatHang','$ngayLap',$tongGia,$maTaiKhoan,$maTinhTrang)";
        DataProvider::ExecuteQuery($sql);
        $soLuongSanPham=count($gioHang->listProDuct);
        for($i=0;$i<$soLuongSanPham; $i++)
        {
            $id=$gioHang->listProDuct[$i]->id;
            $sl=$gioHang->listProDuct[$i]->num;

            $sql="SELECT GiaSanPham, SoLuongTon FROM SanPham Where MaSanPham = $id";
            $result=DataProvider::ExecuteQuery($sql);

            $row=mysqli_fetch_array($result);
            $soLuongTonHienTai=$row["SoLuongTon"];
            $giaSanPham=$row["GiaSanPham"];

            $sttChiTietDonDatHang = sprintf("%02s",$i);
            $maChiTietDonDatHang=$maDonDatHang.$sttChiTietDonDatHang;

            $sql="INSERT INTO ChiTietDonDatHang(MaChiTietDonHang, SoLuong, HiaBan, MaDonDatHang, MaSanPham)
                    VALUES('$maChiTietDonDatHang',$sl,$giaSanPham,'$maDonDatHang',$id)";
            DataProvider::ExecuteQuery($sql);

        }
        unset($_SESSION["GioHang"]);
        DataProvider::ChangeURL("../../index.php?a=5&sub=2");

    }
    else
    DataProvider::ChangeURL("../../index.php?a=404");
?>