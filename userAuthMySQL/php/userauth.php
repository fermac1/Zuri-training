<?php

require_once "../config.php";

//register users
function registerUser($fullnames, $country, $email, $gender, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    $sql = "SELECT * FROM students WHERE email = '$email' ";
   //check if user with this email already exist in the database
   if(mysqli_num_rows(mysqli_query($conn, $sql)) > 0){
    echo 'email already exists';
   }else{  
       $insert = "INSERT INTO students (`full_names`, `country`, `email`, `gender`, `password`) VALUES('$fullnames', '$country', '$email', '$gender', '$password')";
       if(mysqli_query($conn, $insert)){
           echo 'User successfully registered';
       }else{
           echo'error1';
       }
   }

}


//login users
function loginUser($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
session_start();
    // echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    //open connection to the database and check if username exist in the database
    $sql = "SELECT * FROM students WHERE email = '$email' AND password = '$password' ";
    $query = mysqli_query($conn, $sql);
    if($conn){
        if(mysqli_num_rows($query) === 1){
            $data = mysqli_fetch_assoc($query);
            if($data['email'] === $email && $data['password'] === $password){
                $_SESSION['full_names'] = $data['full_names'];

                header("location: ../dashboard.php");
                die;
            }
          
        }else{
            header("location: ../forms/login.html");
            die;
        }
        mysqli_close($conn);
    }
    //if it does, check if the password is the same with what is given
    //if true then set user session for the user and redirect to the dasbboard
}


function resetPassword($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";
    //open connection to the database and check if username exist in the database
    $sql = "SELECT * FROM students WHERE email = '$email' ";
    $query = mysqli_query($conn, $sql);
    if($conn){
        if(mysqli_num_rows($query) === 1){
            $data = mysqli_fetch_assoc($query);
            if($data['email'] === $email){
                $update = "UPDATE students SET password = '$password' WHERE email = '$email' ";
                if(mysqli_query($conn, $update)){
                    echo 'changed successfully';
                }
        }
    }else{
        echo 'User does not exist';
    }
    //if it does, replace the password with $password given
}
}

function getusers(){
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo"<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            
            $_SESSION['id'] = $data['id'];
            //show data
            echo "<tr style='height: 30px'>".
                "<td style='width: 50px; background: blue'>" . $data['id'] . "</td>
                <td style='width: 150px'>" . $data['full_names'] .
                "</td> <td style='width: 150px'>" . $data['email'] .
                "</td> <td style='width: 150px'>" . $data['gender'] . 
                "</td> <td style='width: 150px'>" . $data['country'] . 
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                 "value=" . $data['id'] . ">".
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>".
                "</tr>";
                
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}

 function deleteaccount($id){
     $conn = db();
     //delete user with the given id from the database
     $sql = "DELETE FROM students WHERE id = '$id' ";
     if($conn){
         if(mysqli_query($conn, $sql)){
             echo 'deleted successfully';
         }else{
             echo ' error';
         }
         mysqli_close($conn);
     }
 }
