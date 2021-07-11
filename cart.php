<?php
    session_start();
    require_once('connection.php');
    $id = $_GET['id'];
    
    $sql = "select * from SanPham where SP_Ma = $id";

    $result = mysqli_query($con, $sql);

    $product_cart = array();

    foreach ($result as $value) {
        $product_cart[$value["SP_Ma"]] = $value;
    }

/*     $detail = $product_cart[$id];
    echo "<pre>";
    print_r($detail); */

    if (isset($_POST["add-to-cart"])) {
        if (!isset($_SESSION["cart"]) || $_SESSION["cart"] == null) {
            $product_cart[$id]["SoLuong"] = 1;
            $_SESSION["cart"][$id] = $product_cart[$id];

        }
        else {
            if (array_key_exists($id, $_SESSION["cart"])){
                $_SESSION["cart"][$id]["SoLuong"] += 1;
            } else {
                $product_cart[$id]["SoLuong"] = 1;
                $_SESSION["cart"][$id] = $product_cart[$id];
            }
        }

        header("location:shopping.php");
    }

?>