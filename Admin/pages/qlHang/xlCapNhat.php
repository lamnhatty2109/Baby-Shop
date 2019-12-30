<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $ten = $_GET["txtTen"];
        $sql = "UPDATE HangSanXuat SET TenHangSanXuat = '$ten' WHERE MaHangSanXuat = '$id'";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::changeURL("../../index.php?c=4");
?>