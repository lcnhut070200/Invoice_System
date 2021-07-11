<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nienluan";

    $con = mysqli_connect($servername, $username, $password, $dbname);
    if ($con->connect_error)
    {
        echo "Không thể kết nối database";
    }
?>