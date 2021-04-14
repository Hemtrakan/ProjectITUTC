<?php session_start(); 
include('../../connect.php');

  $t_id = $_SESSION['t_id'];
  $t_name = $_SESSION['t_name'];
  $dep_id = $_SESSION['dep_id'];
  
 	if(!$t_id){
    Header("Location:../Login/logout.php");  
  }  
?>