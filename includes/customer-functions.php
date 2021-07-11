<?php

    function InsertRecord() {
            global $con;
            $kh_ten = $_POST['KH_TEN'];
            $kh_gt = $_POST['KH_GT'];
            $kh_ns = $_POST['KH_NS'];

            $query = "INSERT INTO KhachHang (KH_Ten,KH_GioiTinh,KH_NgaySinh) VALUES ('$kh_ten','$kh_gt',STR_TO_DATE('$kh_ns','%d/%m/%Y'));";
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
                            <td style="font-weight:bold;"> Mã khách hàng </td>
                            <td style="font-weight:bold;"> Tên khách hàng </td>
                            <td style="font-weight:bold;"> Giới tính </td>
                            <td style="font-weight:bold;"> Ngày sinh </td>
                            <td style="font-weight:bold;"> Điểm tích luỹ </td>
                            <td style="font-weight:bold;"> Delete </td>
                        </tr>';
            $query = "select*from khachhang";
            $result = mysqli_query($con,$query);

            while($row=mysqli_fetch_assoc($result))
            {
                $value.= '
                            <tr>
                                <td> '.$row['KH_Ma'].' </td>
                                <td> '.$row['KH_Ten'].' </td>
                                <td> '.$row['KH_GioiTinh'].' </td>
                                <td> '.DATE("d/m/Y",strtotime($row['KH_NgaySinh'])).' </td>
                                <td> '.$row['KH_DiemTichLuy'].'</td>
                                <td> <button class="btn btn-danger" id="btn_delete" data-id1='.$row['KH_Ma'].'><span class="fa fa-trash"></span></button> </td>
                            </tr>';
            }
            $value.='</table>';
            echo json_encode(['status'=>'success','html'=>$value]);
        }
        ?>

<?php
    function delete_record()
        {
            global $con;
            $Del_Id = $_POST['Del_ID'];
            $query = "delete from KhachHang where KH_Ma='$Del_Id' ";
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

