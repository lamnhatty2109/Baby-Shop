<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql = "SELECT COUNT(*) From SanPham WHERE MaLoaiSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);

        if($row[0] == 0)
        {
            $sql = "DELETE FROM LoaiSanPham WHERE MaLoaiSanPham = $id";
        }
        else{
            $sql = "UPDATE LoaiSanPham SET BiXoa = 1 - BiXoa WHERE MaLoaiSanPham = $id";
        }
        DataProvider::ExecuteQuery($sql);

       
    }
    DataProvider::changeURL("../../index.php?c=3");
?>