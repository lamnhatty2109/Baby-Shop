<?php
    if($_GET["tk"]){
        include "../../../lib/DataProvider.php";
        $tk = $_GET["tk"];
        $tk = trim($tk);
        $sql = "SELECT T.MaTaiKhoan, T.TenDangNhap, T.TenHienThi, T.DiaChi, T.DienThoai, T.Email,T.BiXoa,L.TenLoaiTaiKhoan FROM TAIKHOAN T, LOAITAIKHOAN L WHERE T.MALOAITAIKHOAN = L.MALOAITAIKHOAN
        AND T.TenDangNhap LIKE '%$tk%'";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        $mataikhoan = $row["MaTaiKhoan"];
        DataProvider::changeURL("../../index.php?c=1&a=3&ma="."$mataikhoan");
    }
?>