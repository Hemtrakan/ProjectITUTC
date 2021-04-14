<?php session_start(); 
include('../../connect.php');

$s_id = $_SESSION['s_id'];
$s_name = $_SESSION['s_name'];
$s_lastname =  $_SESSION["s_lastname"];
$s_number =  $_SESSION["s_number"];
$dep_id = $_SESSION["dep_id"];
$s_group = $_SESSION["s_group"];
$year_id = $_SESSION["year_id"];
$rank_id = $_SESSION["rank_id"];
 	if(!$s_id){
    Header("Location:Login/logout.php");  
  }  
?>