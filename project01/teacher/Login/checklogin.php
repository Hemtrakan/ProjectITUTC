<?php 
session_start();
        if(isset($_POST['t_id'])){
          include('../../connect.php');
                  $t_id = $_POST['t_id'];
                  $t_pass = $_POST['t_pass'];

                  $sql="SELECT * FROM tb_teacher
                  WHERE  t_id ='$t_id' AND  t_pass ='$t_pass' ";
                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["t_id"] = $row["t_id"];
                      $_SESSION["t_name"] = $row["t_name"];
                      $_SESSION["t_lastname"] = $row["t_lastname"];
                      $_SESSION["t_tel"] = $row["t_tel"];
                      $_SESSION["dep_id"] = $row["dep_id"];
                      
                      
                      /* echo $_SESSION["s_lastname"];
                      exit(); */

                      if($_SESSION["t_id"]){ 
                  
                        Header("Location: ../index.php");
                      }
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
        }else{

             Header("Location: index.php"); //user & password incorrect back to login again
 
        }
?>