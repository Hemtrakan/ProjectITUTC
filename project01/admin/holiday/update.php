<?php
session_start();
include('../../connect.php');

$tb_holiday = $_SESSION["tb_holiday"];
$day = $_GET['day_id'];
$com = $_GET['holiday_comments'];


/* echo $tb_holiday;
exit();
 */

$sql = "UPDATE $tb_holiday SET 
day_id = '$day',
holiday_comments = '$com'
WHERE holiday_id = '".$_GET["holiday_id"]."' ";

$rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));


if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขวันหยุดสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
    unset($_SESSION["tb_holiday"]);
} else {
    echo "ไม่สามารถลบข้อมูลได้";
}
