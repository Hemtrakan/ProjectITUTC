<?php session_start(); 
include('../../connect.php');

  $s_id = $_SESSION['s_id'];
  $s_name = $_SESSION['s_name'];
  
 	if(!$s_id){
    Header("Location:../Login/logout.php");  
  }  
?>