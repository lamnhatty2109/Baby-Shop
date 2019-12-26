<?php
    include "../../../lib/DataProvider.php";
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if(isset($_POST["txtTen"]))
    {
        $ten=$_POST["txtTen"];
        $mahang=$_POST["cmbHang"];
        $maloai=$_POST["cmbLoai"];
        $hinh=$_FILES["fHinh"]["name"];
        $gia=$_POST["txtGia"];
        $slton=$_POST["txtTon"];
        $mota=$_POST["txtMoTa"];
        $ngayNhap=date('Y-m-d H:i:s');
        $sql="INSERT INTO SanPham(TenSanPham, HinhURL, GiaSanPham, SoLuongTon, MoTa, MaLoaiSanPham, MaHangSanXuat, BiXoa, NgayNhap, SoLuocXem, SoLuongBan)
            VALUES('$ten', '$hinh', '$gia', '$slton', '$mota', '$maloai', '$mahang', 0, '$ngayNhap',0,0)";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=2");
?>