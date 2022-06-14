<?php
session_start();
function logout(){

if(isset($_SESSION)){
    session_unset();
    session_destroy();
    header("location: ../forms/login.html");
    die();  
}

}
logout();