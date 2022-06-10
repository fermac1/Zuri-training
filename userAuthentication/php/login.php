<?php
 session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];//finish this line
    $password = $_POST['password'];//finish this

loginUser($email, $password);

}

function loginUser($email, $password){
    
    // $file = file_get_contents("../storage/users.csv", "r");
    // if(strstr($file, "$email") AND strstr($file, "$password")){
    //     $_SESSION['email'] = $email;
        

    //     header("location: ../dashboard.php");
    // }else{
    //     header("location: ../forms/login.html");
    // }
    $file = fopen("../storage/users.csv", "r");
    while(!feof($file)){
        $list[] = fgetcsv($file, 1024);
        if(($list[1] = $email) && ($list[2]= $password)){
           
            // echo $list[1];
            $_SESSION['email'] = $list[1];
            // $_SESSION[$list[0]] = $username;
            if(isset($_SESSION['email'])){
            header("location: ../dashboard.php");
            exit();
        }
        $email1 = $_SESSION['email'];
            }else{
                header("location: ../forms/login.html");
            }
    }

    fclose($file);

    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
}


