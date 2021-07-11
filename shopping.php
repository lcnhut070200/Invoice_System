<?php
    session_start();
    require_once('connection.php');

    if (isset($_POST["update"])) {
        if (isset($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $value){
                if ($_POST["SoLuong".$value["SP_Ma"]] <= 0){
                    unset($_SESSION["cart"][$value["SP_Ma"]]);
                } else {
                    $_SESSION["cart"][$value["SP_Ma"]]["SoLuong"] = $_POST["SoLuong".$value["SP_Ma"]];
                }
            }

        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./style/shopping.css">
    </head>
    <body>
        <div class="header" id="header">
            <div class="banner">
                <p>HỆ THỐNG QUẢN LÝ CỬA HÀNG</p>
            </div>
            <br>
            <button><a href="index.php" style="font-size: 18px; text-decoration:none; color: #1D2D44; text-align: center;">VỀ LẠI TRANG CHỦ</a></button>
        <div>
            <br>
        <form action="shopping.php" method="post">
            <table cellspacing=1 style="width:100%;">
                <thead  style="background-color: white">
                    <tr>
                        <th style="width: 15%;">MÃ SẢN PHẨM</th>
                        <th  style="width: 15%;">TÊN SẢN PHẨM</th>
                        <th style="width: 15%;">ĐƠN GIÁ</th>
                        <th style="width: 15%;">SỐ LƯỢNG</th>
                        <th style="width: 15%;">THÀNH TIỀN</th>
                        <th style="width: 15%;">XOÁ SẢN PHẨM</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($_SESSION["cart"])){
                            foreach ($_SESSION["cart"] as $value ){
                                $thanhtien = 0;
                                $thanhtien = $value["SP_GiaHienTai"]*$value["SoLuong"];
                                global $subtotal;
                                $subtotal += $thanhtien;
                                ?>
                                <tr>
                                    <td align="center"><?php echo $value["SP_Ma"]; ?></td>
                                    <td align="center"><?php echo $value["SP_Ten"]; ?></td>
                                    <td align="center"><?php echo number_format ($value['SP_GiaHienTai'],0,',',','). ' USD'?></td>
                                    <td align="center"><input type="number" min="1" name="SoLuong<?php echo $value["SP_Ma"]; ?>" value="<?php echo $value["SoLuong"]; ?>"></td>
                                    <td align="center"><?php echo number_format ($thanhtien,0,',',','). ' USD'?></td>
                                    <td align="center"><a  style="color: #1D2D44;" href="delete.php?id=<?php echo $value["SP_Ma"];?>">DELETE</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <thead  style="background-color:white;">
                                <tr>
                                    <td align="center" name="subtotal" colspan="6"><h3>Tổng tiền: <?php echo number_format ($subtotal,0,',',','). ' USD'?></h3></td>
                                </tr>
                            </thead>
                            <?php
                        }
                    ?>

                </tbody>
            </table>
            <br>
            <div
            class="button" style="width:100%;">
                <button type="submit" name="update" style="font-size: 16px; border-radius: 8px; background-color: white; text-align:center;">
                        CẬP NHẬT GIỎ HÀNG
                </button>
                <input type="text" name="KH_Ma" placeholder="Mã khách hàng" style="height:20px; border-radius: 8px; background-color: white; text-align:center;">
                <button type="submit" name="thanhtoan" style="font-size: 16px; border-radius: 8px; background-color: white; text-align:center;">
                        THANH TOÁN
                </button>
            </div>
        </form>
        </div>
    </body>
    </html>

<?php
    if (isset($_POST["thanhtoan"])) {
        include 'payment.php';
    }
?>