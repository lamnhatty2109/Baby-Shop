<?php
    include "../../../lib/DataProvider.php";
    if(isset($_POST["txtTen"]) && isset($_POST["txtGia"]) && isset($_POST["txtTon"])  )
    {
        $ten = $_POST["txtTen"];
        $Gia = $_POST["txtGia"];
        $slTon = $_POST["txtTon"];
        $loaiSP = $_POST["cmbLoai"];
        $hangSX = $_POST["cmbHang"];
        $moTa = $_POST["txtMoTa"];
        //Xu Li Upload Hinh Len website
        $imageType = $_FILES["fHinh"]["type"];
        $hinhURL = $_FILES["fHinh"]["name"];
        $ngayNhap = date("y-m-d h:m:s");
        if($imageType == "image/jpg" || $imageType == "image/gif" 
                || $imageType == "image/jpeg" || $imageType == "image/png"){
            //echo $_FILES["fHinh"]["name"];
            $file = move_uploaded_file($_FILES["fHinh"]["tmp_name"],"../../images/".$_FILES["fHinh"]["name"]);
            //copy file to new directory
            copy("../../images/".$_FILES["fHinh"]["name"], "../../../images/".$_FILES["fHinh"]["name"]);                     

        }else{
           DataProvider::changeURL("../../index.php?c=404");    
        }
        $sql = "INSERT INTO SanPham(TenSanPham, HinhURL, GiaSanPham,NgayNhap, SoLuongTon, SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham, MaHangSanXuat) values ('$ten','$hinhURL',$Gia,'$ngayNhap',$slTon,0,0,'$moTa',0,$loaiSP,$hangSX)";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::changeURL("../../index.php?c=2");
?>