<?php
include('../config.php');
    $sql = "CREATE DATABASE zuriphp";
    $conn = db();
    if($conn){
    if(mysqli_query($conn, $sql)){
        echo 'created successfully';
    }else{
        echo 'error';
    }

    mysqli_close($conn);
    }
?>