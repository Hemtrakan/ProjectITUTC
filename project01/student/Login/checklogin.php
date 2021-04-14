<?php
session_start();
include('../../connect.php');
if (isset($_POST['s_id'])) {
  $s_id = $_POST['s_id'];
  $s_pass = $_POST['s_pass'];

  $sql = "SELECT * FROM tb_student 
                  WHERE  s_id = '$s_id' AND s_pass = '$s_pass' ";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $_SESSION['s_id'] = $row["s_id"];
    $_SESSION['s_name'] = $row["s_name"];
    $_SESSION["s_lastname"] = $row["s_lastname"];
    $_SESSION["s_number"] = $row["s_number"];
    $_SESSION["dep_id"] = $row["dep_id"];
    $_SESSION["s_group"] = $row["s_group"];
    $_SESSION["year_id"] = $row["year_id"];
    $_SESSION["rank_id"] = $row["rank_id"];

    if ($_SESSION["s_id"]) {
      Header("Location: ../index.php");
    }
  } else {
    echo "<script>";
    echo "alert(\" username หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {

  Header("Location: index.php"); //user & password incorrect back to login again

}
