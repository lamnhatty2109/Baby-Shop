<?php
    include "../../../lib/DataProvider.php";
    if(isset($_POST["id"]))
    {     
        $id = $_POST["id"];
        $ten = $_POST["txtTen"];
        $Gia = $_POST["txtGia"];
        $slTon = $_POST["txtTon"];
        $loaiSP = $_POST["cmbLoai"];
        $hangSX = $_POST["cmbHang"];
        $moTa = $_POST["txtMoTa"];
        $slBan = $_POST["txtBan"];
        //Xu Li Upload Hinh Len website
        $imageType = $_FILES["fHinh"]["type"];
        $hinhURL = $_FILES["fHinh"]["name"];
        $ngayNhap = date("y-m-d h:m:s");
        if($imageType == "image/jpg" || $imageType == "image/gif" 
                || $imageType == "image/jpeg" || $imageType == "image/png"){
                    echo "$hinhURL";
               move_uploaded_file($_FILES["fHinh"]["tmp_name"],"../../images/".$_FILES["fHinh"]["name"]);
            
               copy("../../images/".$_FILES["fHinh"]["name"], "../../../images/".$_FILES["fHinh"]["name"]);                     
        }else{
          // DataProvider::changeURL("../../index.php?c=404");    
        }
        $sql = "UPDATE SanPham SET TenSanPham = '$ten',SoLuongBan = $slBan,GiaSanPham = $Gia, NgayNhap = '$ngayNhap', SoLuongTon = $slTon,MoTa = '$moTa',MaLoaiSanPham = $loaiSP, MaHangSanXuat = $hangSX WHERE MaSanPham = $id";
        DataProvider::ExecuteQuery($sql);
        //Sửa Lỗi Mất Dữ Liệu file trong lúc Cập nhật
        if($hinhURL == ""){
          //  DataProvider::changeURL("../../index.php?c=2");
        }
        else{
            $sql = "UPDATE SanPham SET HinhURL = '$hinhURL' WHERE MaSanPham = $id";
        }
       DataProvider::ExecuteQuery($sql);
    }
   DataProvider::changeURL("../../index.php?c=2");
?>
