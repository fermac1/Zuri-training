<?php
session_start();
function logout(){
    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/

if(isset($_SESSION['email'])){
    session_unset();
    session_destroy();
    header("location: ../forms/login.html");
    die();  
}

}
logout();