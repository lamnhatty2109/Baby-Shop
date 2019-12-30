<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["sp"])){
        $sp = $_GET["sp"];
        $sp = trim($sp);
        DataProvider::changeURL("../../index.php?c=2&a=4&sp="."$sp");
    }
?>