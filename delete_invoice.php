<?php
    require_once("connection.php");

    $id = $_GET['id']; // get id through query string
    $sql_delete_invoice = "delete from HoaDon where HD_STT = '$id'";
    $result = mysqli_query($con,$sql_delete_invoice);

    if($result)
    {
        
        mysqli_close($con);
        header('Location: orders.php'); // redirects to all records page
        exit;
    }
    else
    {
        echo "Error deleting record"; // display error message if not delete
    }
?>