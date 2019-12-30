<?php
    include "../../../lib/DataProvider.php";
    if(isset($_GET["hang"])){

        $hang = $_GET["hang"];
        $hang = trim($hang);
        DataProvider::changeURL("../../index.php?c=4&a=4&hang="."$hang");
    }
?>