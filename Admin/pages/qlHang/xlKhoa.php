<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql = "SELECT COUNT(*) From SanPham WHERE MaHangSanXuat = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);

        if($row[0] == 0)
        {
            $sql = "DELETE FROM HangSanXuat WHERE MaHangSanXuat = $id";
        }
        else{
            $sql = "UPDATE HangSanXuat SET BiXoa = 1 - BiXoa WHERE MaHangSanXuat = $id";
        }
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::changeURL("../../index.php?c=4");
?>