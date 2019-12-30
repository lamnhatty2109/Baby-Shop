<h2><img src="img/hot-icon.png"/>Sản phẩm bán chạy nhất</h2>
<?php
$sql = "SELECT * FROM SanPham WHERE BiXoa = 0 ORDER BY SoLuongBan DESC LIMIT 0, 10";
$result = DataProvider::ExecuteQuery($sql);
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