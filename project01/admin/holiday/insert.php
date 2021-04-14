<?php
include('../../connect.php');

/* ตาราง Holiday */

$day = $_GET['day_id'];
$com = $_GET['holiday_comments'];
/* ตาราง tb_sum_hday */
$sum_id = $_GET['sum_id'];


$a = $_GET['year_term'];
$year_term = "tb_holiday_$a";




$sql = "INSERT INTO $year_term(holiday_id,day_id,holiday_comments)VALUE('$holiday_id','$day','$com')";
$rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));


/* $sqlselect = "SELECT holiday_id FROM tb_holiday WHERE day_id = '$day' AND holiday_comments = '$com'";
    $s = $con->query($sqlselect);
    $r1 = $s->fetch_object();

    echo $r1->holiday_id; exit();

    $sql1 = "INSERT INTO tb_sum_hday(sum_id,holiday_id,sc_id)VALUE('$sum_id','$r1->holiday_id','$sc_id')";


    
    $rs1 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error($con)); */

if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มวันหยุดสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
}
