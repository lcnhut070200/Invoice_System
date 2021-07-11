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
</div>
<h2 style="text-align: center;" >QUẢN LÝ ĐƠN HÀNG</h2>

<?php
    require_once("connection.php");
    $sql_lietke_dh ="SELECT * FROM HoaDon,KhachHang WHERE HoaDon.KH_Ma = KhachHang.KH_Ma ORDER BY HoaDon.HD_STT ASC" ;
    $query_lietke_dh = mysqli_query($con,$sql_lietke_dh);
?>
<table style="width:100%" align="center" border="1" >
    <tr>
        <th>STT hoá đơn</th>
        <th>Tên khách hàng</th>
        <th>Giá trị đơn hàng</th>
        <th>Ngày lập</th>
        <th>Chi tiết</th>
        <th>Xoá</th>
    </tr>
    <?php
    $i = 0 ;
    while($row = mysqli_fetch_array($query_lietke_dh)){
            $i++;
    ?>
    <tr>
        <td align="center"><?php echo $row['HD_STT'] ?></td>
        <td align="center"><?php echo $row['KH_Ten'] ?></td>
        <td align="center"><?php echo number_format ($row['HD_GiaTri'],0,',',',') ?> USD</td>
        <td align="center"><?php echo DATE("d/m/Y",strtotime($row['HD_NgayLap'])) ?></td>
        <td align="center">
            <a style="color:black;" href="order_details.php?code=<?php echo $row['HD_Ma'] ?>">Xem</a> 
        </td>
        <td align="center">
            <a style="color:black;" href="javascript:confirmDelete('delete_invoice.php?id=<?php echo $row['HD_STT'] ?>')">Delete</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
   document.location = delUrl;
  }
}
</script>
