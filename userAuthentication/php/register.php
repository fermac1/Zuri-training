<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);
echo 'User Successfully registered';
}


function registerUser($username, $email, $password){
    //save data into the file
    $filename = "../storage/users.csv";
    $file = fopen($filename, "a");//open file in append mode
    fwrite($file, $username); //write to file
    fwrite($file, $email);
    fwrite($file, $password);
    fclose($file);//close file
    
    // echo "OKAY";
}