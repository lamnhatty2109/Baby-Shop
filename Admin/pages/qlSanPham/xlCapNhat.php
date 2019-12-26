<?php
    include "../../../lib/DataProvider.php";

    if(isset($_POST["id"]))
    {
        $id=$_POST["id"];
        $ten=$_POST["txtTen"];
        $mahang=$_POST["cmbHang"];
        $maloai=$_POST["cmbLoai"];
        $hinh=$_FILES["fHinh"]["name"];
        $gia=$_POST["txtGia"];
        $slton=$_POST["txtTon"];
        $mota=$_POST["txtMoTa"];
        $slBan=$_POST["txtBan"];
        $sql="UPDATE SanPham SET TenSanPham='$ten', MaHangSanXuat='$mahang', MaLoaiSanPham='$maloai', MoTa='$mota', HinhURL='$hinh',
        GiaSanPham='$gia', SoLuongTon='$slton', SoLuongBan='$slBan' WHERE MaSanPham=$id";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=2");
?>