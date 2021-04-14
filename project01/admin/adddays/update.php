<?php
session_start();
include('../../connect.php');

$tb = $_SESSION["plusdays"];
$day = $_GET['day_id'];
$com = $_GET['plus_comments'];
$plus_num = $_GET['plus_num'];


/* echo $tb_holiday;
exit();
 */

$sql = "UPDATE $tb SET 
day_id = '$day',
plus_comments = '$com',
plus_num = '$plus_num '
WHERE plus_id = '".$_GET["plus_id"]."' ";

$rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));


if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขวันกิจกรรม (พิเศษ) สำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
    unset($_SESSION["plusdays"]);
} else {
    echo "ไม่สามารถลบข้อมูลได้";
}
unset($_SESSION["plusdays"]);