<?php
    include "../../../lib/DataProvider.php";
    $ddh = $_GET["ddh"];
    $ddh = trim($ddh);
    DataProvider::changeURL("../../index.php?c=5&a=4&ddh="."$ddh");
?>