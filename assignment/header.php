<?php
session_start();

if(empty($_SESSION["studentID"])){
    header("Location: member_login.php");
}


