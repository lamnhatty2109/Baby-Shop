<?php

session_start();
include "../lib/DataProvider.php";
if(isset($_GET["key"]))
{
    $key = $_GET["key"];
    $sql="SELECT * FROM SanPham WHERE TenSanPham LIKE '%$key%'";

    $result=DataProvider::ExecuteQuery($sql);
    $row=mysqli_fetch_array($result);

    if($row==null)
    {
        DataProvider::ChangeURL("../index.php?a=404&id=5");
    }
    else
    {
        DataProvider::ChangeURL("../index.php?a=7&key=$key");
    }
}
else if(isset($_GET["minPrice"]) && isset($_GET["maxPrice"]))
{
    $minPrice = $_GET["minPrice"];
    $maxPrice = $_GET["maxPrice"];
    $sql="SELECT * FROM SanPham WHERE GiaSanPham >= '$minPrice' AND GiaSanPham <= '$maxPrice'";

    $result=DataProvider::ExecuteQuery($sql);
    $row=mysqli_fetch_array($result);

    if($row==null)
    {
        DataProvider::ChangeURL("../index.php?a=404&id=4");
    }
    else
    {
        DataProvider::ChangeURL("../index.php?a=7&minPrice=$minPrice&maxPrice=$maxPrice");
    }
}
else
{
    DataProvider::ChangeURL("../index.php?a=404");
}
?>