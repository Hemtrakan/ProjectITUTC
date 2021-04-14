<?php
session_start();
include('../../connect.php');

$tb = $_SESSION["plusdays"];

$sql = "DELETE FROM $tb WHERE plus_id  = '" . $_GET["plus_id"] . "' ";
$rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('ลบกิจกรรมสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
    unset($_SESSION["plusdays"]);
} else {
    echo "ไม่สามารถลบข้อมูลได้";
}
unset($_SESSION["plusdays"]);