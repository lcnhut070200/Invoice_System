<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem đơn hàng</title> 
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
        .header {
            position: fixed;
            width: 100%;
        }
        .banner {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #1D2D44;
            color: #fff;
            font-weight: 500;
            height: 28px;
            text-transform: uppercase;
            font-size: 12px;
        }
    </style>
</head>
<body>
<div id="container">
        <div class="header" id="header">
            <div class="banner">
                <p>HỆ THỐNG QUẢN LÝ CỬA HÀNG</p>
            </div>
            <br>
</body>
</html>
<div style="margin-left:5px;">
    <button><a href="index.php" style="font-size: 18px; text-decoration:none; color: #1D2D44; text-align: center;">VỀ LẠI TRANG CHỦ</a></button>
    <button><a href="orders.php" style="font-size: 18px; text-decoration:none; color: #1D2D44; text-align: center;">QUẢN LÝ HOÁ ĐƠN</a></button>
</div>
<h2 style="text-align: center;">CHI TIẾT ĐƠN HÀNG</h2>
<hr>
<?php
    require_once("connection.php");
    $code = $_GET['code'];
    $sql_lietke_dh ="SELECT * FROM ChiTietHoaDon,SanPham WHERE ChiTietHoaDon.SP_Ma = SanPham.SP_Ma
    AND ChiTietHoaDon.HD_Ma='".$code."' ORDER BY ChiTietHoaDon.HD_STT ASC" ;
    $query_lietke_dh = mysqli_query($con,$sql_lietke_dh);
?>
<table style="width:100%" border="1" align="center" style="border-collapse: collapse;">
    <tr>
        <th>STT hoá đơn</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
    $i = 0 ;
    $subtotal = 0;
    while($row = mysqli_fetch_array($query_lietke_dh)){
            $i++;
            $thanhtien = $row["SP_GiaHienTai"]*$row["SoLuong"];
            $subtotal += $thanhtien;
    ?>
    <tr>
        <td  align="center"><?php echo $row['HD_STT'] ?></td>
        <td  align="center"><?php echo $row['SP_Ma'] ?></td>
        <td  align="center"><?php echo $row['SP_Ten'] ?></td>
        <td  align="center"><?php echo $row['SoLuong'] ?></td>
        <td  align="center"><?php echo number_format ($row['SP_GiaHienTai'],0,',',','). ' USD'?></td>
        <td  align="center"><?php echo number_format ($thanhtien,0,',',','). ' USD' ?></td>
       
    </tr>
    <?php
    }
    ?>
    <tr>
    <td colspan="7" align="center">
            <h3>Tổng tiền: <?php echo number_format ($subtotal,0,',',',').' USD' ?></h3>
        </td>

    </tr>
</table>

