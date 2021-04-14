<?php
include('../../connect.php');
session_start();


$tb_holiday = $_SESSION["tb_holiday"];


/* echo $tb_holiday;
exit();
 */

$sql = "DELETE FROM $tb_holiday WHERE holiday_id = '" . $_GET["holiday_id"] . "' ";

$rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));


if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('ลบวันหยุดสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
    unset($_SESSION["tb_holiday"]);
    unset($_SESSION["tb_holiday1"]);
} else {
    echo "ไม่สามารถลบข้อมูลได้";
}
unset($_SESSION["tb_holiday"]);
unset($_SESSION["tb_holiday1"]);