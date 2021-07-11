<?php
    require_once('connection.php');
    $query = "select SP_Ma, SP_Ten, SP_DonViTinh, SP_GiaHienTai from SanPham;";
	$result = $con->query($query)
	    or die("Query failed: " . $con->connect_error);

	if($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()){

?>

    <div class="col l-3 m-6 c-12">
        <div class="product cart-add">
            <h4 class="product-desr">Tên sản phẩm: <?php echo "$row[SP_Ten]" ?></h4>
            <span class="product-price">Giá sản phẩm: <?php echo number_format ($row['SP_GiaHienTai'],0,',',','). ' USD'?></span>
            <form action="cart.php?id=<?php echo $row["SP_Ma"]; ?>" method="POST">
            <div class="themvaogio">
                <button class="product-addtocart" type="submit" name="add-to-cart">
                                THÊM VÀO GIỎ
                </button>
            </div>
            </form><hr>
        </div>
    </div>

<?php

    	}
	}
?>