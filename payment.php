<?php
    require_once('connection.php');
	//them vao hoa don
    $KH_Ma = $_POST['KH_Ma'];
    $HD_Ma = rand(0,9999);
	$ngaylap = date("Y/m/d");
	$insert_cart = "INSERT INTO HoaDon(HD_Ma,HD_NgayLap,HD_GiaTri,KH_ma) VALUES ('".$HD_Ma."','".$ngaylap."','".$subtotal."','".$KH_Ma."')";
	$cart_query = mysqli_query($con,$insert_cart);
	
	//diem tich luy
	$query = "Select KH_DiemTichLuy from KhachHang where KH_Ma = $KH_Ma";
	$result = $con->query($query);
	$row= $result->fetch_row();
	$diemdatichluy = $row[0];
	
	$diemdatichluy += floor(($subtotal/100));

	$insert_diemtichluy = "UPDATE KhachHang set KH_DiemTichLuy = $diemdatichluy where KH_Ma = $KH_Ma";
	$query = mysqli_query($con,$insert_diemtichluy);
	
	// stt hoa don
	$query = "Select HD_STT from HoaDon where HD_Ma = $HD_Ma";
	$result = $con->query($query);
	$row= $result->fetch_row();
	$HD_STT = $row[0];

	if($cart_query){
		//them gio hang chi tiet
		foreach($_SESSION['cart'] as $key => $value){
			$sp_ma = $value['SP_Ma'];
			$soluong = $value['SoLuong'];
            $giaban = $value['SP_GiaHienTai'];
			$insert_order_details = "INSERT INTO ChiTietHoaDon(SP_Ma,HD_STT,HD_Ma,SoLuong,SP_GiaHienTai) VALUES ('".$sp_ma."','".$HD_STT."','".$HD_Ma."','".$soluong."','".$giaban."')";
			mysqli_query($con,$insert_order_details);
		}
	}
	// @header('Location:camon.php');
	@header('Location:orders.php');
	unset($_SESSION["cart"]);
?>