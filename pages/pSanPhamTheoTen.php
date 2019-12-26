<h2><img src="img/eye-icon.png"/>Tìm kiếm sản phẩm</h2>
<?php
if (isset($_GET["key"])) {
    $key = $_GET["key"];
    
    $sql = "SELECT * FROM SanPham WHERE TenSanPham LIKE '%$key%'";
    $result = DataProvider::ExecuteQuery($sql);
}
else if(isset($_GET["minPrice"])){
    $minPrice = $_GET["minPrice"];
    $maxPrice = $_GET["maxPrice"];

    $sql = "SELECT * FROM SanPham WHERE GiaSanPham >= '$minPrice' AND GiaSanPham <= '$maxPrice'";
    
    $result = DataProvider::ExecuteQuery($sql);
} 
else {
    DataProvider::ChangeURL("index.php?a=404");
}
?>

<div class="row">
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="box">

                <a href="index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>">
                    <img src="images/<?php echo $row["HinhURL"]; ?>" />
                    <div class="pname"> <?php echo $row["TenSanPham"]; ?></div>
                    <div class="pprice">Giá: <?php echo $row["GiaSanPham"]; ?>đ</div>
                </a>
            </div>

        </div>
    <?php
    }
    ?>
</div>