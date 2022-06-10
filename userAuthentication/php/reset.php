<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];//complete this;
    $newpassword = $_POST['password']; //complete this;
 
    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){
    //open file and check if the username exist inside
    //if it does, replace the password
    $file =  file_get_contents("../storage/users.csv", 'a');
    if(strstr($file, "$email")){
        $open_file =  fopen("../storage/users.csv", 'a');
         fwrite($open_file, $newpassword);
    }else{
            echo "User does not exist";
        }
    }