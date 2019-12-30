<?php
    session_start();
    include "../../lib/DataProvider.php";
    include "../../lib/ShoppingCart.php";

    $id=$_GET["id"];
    $gioHang=unserialize($_SESSION["GioHang"]);

            $gioHang->delete($id);
            $_SESSION["GioHang"]=serialize($gioHang);

    DataProvider::ChangeURL("../../index.php?a=5");
?>