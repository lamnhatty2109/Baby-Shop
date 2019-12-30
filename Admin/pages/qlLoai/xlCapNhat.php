<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $ten = $_GET["txtTen"];
        $sql = "UPDATE LoaiSanPham SET TenLoaiSanPham = '$ten' WHERE MaloaiSanPham = '$id'";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::changeURL("../../index.php?c=3");
?>