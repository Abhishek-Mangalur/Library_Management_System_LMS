<?php
    include "connection.php";
    error_reporting(0);

    $pname = $_GET['rn'];
    $query = "DELETE FROM publisher WHERE pname = '$pname'";

    $data = mysqli_query($conn,$query);
    if($data){
        echo "<script>window.open('adminhome.php','_self')</script>";
    }else{
        echo "Failed";
    }
    header('Location: adminhome.php');
?>