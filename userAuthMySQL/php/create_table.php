<?php
    include('../config.php');
    $sql = "CREATE TABLE Students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_names VARCHAR(120) NOT NULL,
        country VARCHAR(32) NOT NULL,
        email VARCHAR(60),
        gender VARCHAR(10),
        password VARCHAR(255)
    )";
    $conn = db();
    if($conn){
    if(mysqli_query($conn, $sql)){
        echo 'table created successfully';
    }else{
        echo 'error'. mysqli_error($conn);
    }
    mysqli_close($conn);
    }
?>