<?php
include('../../connect.php');

/* ตาราง plusdays */

$day = $_GET['day_id'];
$plus_comments = $_GET['plus_comments'];
$plus = $_GET['plus_num'];
/* ตาราง tb_sum_add */

$a = $_GET['year_term'];
$year_term = "tb_plusdays_$a";

/*  */
$sql = "INSERT INTO $year_term(plus_id,plus_num,day_id,plus_comments)VALUE(null,'$plus','$day','$plus_comments')";
$rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

/*   */
/* $sqlselect = "SELECT plus_id FROM tb_plusdays WHERE day_id = '$day' AND plus_comments = '$plus_comments'";
    $s = $con->query($sqlselect);
    $r1 = $s->fetch_object(); */

/*  */
/* $sql1 = "INSERT INTO tb_sum_add(add_id,plus_id,sc_id)VALUE('$add_id','$r1->plus_id','$sc_id')";
    $rs1 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error($con)); */



if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มกิจกรรมสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
}
