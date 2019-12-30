<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["loai"])){

        $loai = $_GET["loai"];
        $loai = trim($loai);
        DataProvider::changeURL("../../index.php?c=3&a=4&loai="."$loai");
    }
?>