<?php session_start();
include('../connect.php');
$t_id = $_SESSION['t_id'];
$t_name = $_SESSION['t_name'];
$t_lastname =  $_SESSION["t_lastname"];
$t_tel =  $_SESSION['t_tel'];
$dep_id = $_SESSION['dep_id'];
if (!$t_id) {
    Header("Location:Login/logout.php");
}
?>