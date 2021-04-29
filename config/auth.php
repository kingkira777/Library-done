<?php 
session_start();

$no = $_SESSION["no"];
$name = $_SESSION["name"];
$username = $_SESSION["username"];
$access = $_SESSION["access"];

if(empty($no)){
    header("Location: login.php");
}