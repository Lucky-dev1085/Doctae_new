<?php
session_start();
if(isset($_POST)){
    if(isset($_POST["logout"])){
        session_destroy();
    }
    if(isset($_POST["login"])){
        $_SESSION['admin'] = $_POST["email"]; 
    }    
}   
?>