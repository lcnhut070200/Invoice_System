<?php
    require_once('connection.php');

    function InsertRecord() {
            global $con;
            $sp_ten = $_POST['sp_ten'];
            $sp_dvt = $_POST['sp_donvitinh'];
            $sp_ght = $_POST['sp_giahientai'];
            $image = $_POST['image'];

            $query = "Insert into sanpham(SP_Ten,SP_DonViTinh,SP_GiaHienTai) value ('$sp_ten','$sp_dvt','$sp_ght')";
            $result = mysqli_query($con, $query);

            if($result)
            {
                echo ' Your Record Has Been Saved in the Database';
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
?>

<?php
        function display_record()
        {
            global $con;
            $value = "";
            $value = '<table class="table table-bordered">
                        <tr>
                            <td style="font-weight:bold;"> Mã sản phẩm </td>
                            <td style="font-weight:bold;"> Tên sản phẩm </td>
                            <td style="font-weight:bold;"> Đơn vị tính </td>
                            <td style="font-weight:bold;"> Giá bán hiện tại </td>
                            <td style="font-weight:bold;"> Delete </td>
                        </tr>';
            $query = "select*from sanpham";
            $result = mysqli_query($con,$query);

            while($row=mysqli_fetch_assoc($result))
            {
                $value.= ' <tr>
                                <td> '.$row['SP_Ma'].' </td>
                                <td> '.$row['SP_Ten'].' </td>
                                <td> '.$row['SP_DonViTinh'].' </td>
                                <td> '.number_format ($row['SP_GiaHienTai'],0,',',','). ' USD'.' </td>
                                <td><button class="btn btn-danger" id="btn_delete" data-id1='.$row['SP_Ma'].'><span class="fa fa-trash"></span></button> </td>
                            </tr>';
            }
            $value.='</table>';
            echo json_encode(['status'=>'success','html'=>$value]);
        }
        ?>

<?php
        function get_record()
        {
            global $con;
            $masp = $_POST['ProductID'];
            $query = "select*from sanpham where SP_Ma='$masp'";
            $result = mysqli_query($con,$query);

            while($row=mysqli_fetch_assoc($result))
            {
                $SP_data = "";
                $SP_data[0]=$row['SP_Ma'];
                $SP_data[1]=$row['SP_Ten'];
                $SP_data[2]=$row['SP_DonViTinh'];
                $SP_data[3]=$row['SP_GiaHienTai'];
            }
            echo json_encode($SP_data);
        }
    ?>

<?php
    function delete_record()
        {
            global $con;
            $Del_Id = $_POST['Del_ID'];
            $query = "delete from SanPham where SP_Ma='$Del_Id' ";
            $result = mysqli_query($con,$query);

            if($result)
            {
                echo ' Your Record Has Been Delete ';
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
    ?>

