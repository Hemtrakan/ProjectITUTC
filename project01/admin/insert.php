<?php
include('../connect.php');

$dep = $_GET['dep'];
$year = $_GET['year'];
$rank = $_GET['rank'];
$term = $_GET['term'];


/* print_r($dep); exit(); */

if ($dep == 'Insert') {
    $dep_id = $_POST['dep_id'];
    $dep_name = $_GET['dep_name'];
    $sql = "INSERT into tb_dep (dep_id,dep_name)
        values('$dep_id','$dep_name')";
    $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
    if ($rs) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มแผนกวิชาเรียบร้อยแล้ว');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
} elseif ($year == 'Insert') {
    $year_num = $_GET['year_num'];

    $sql = "INSERT into tb_schoolyear (year_id,year_num)
        values(null,'$year_num')";

    $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

    if ($rs) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มปีการศึกษาเรียบร้อยแล้ว');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
} elseif ($rank == 'Insert') {
    $rank_id = $_POST['rank_id'];
    $rank_name = $_GET['rank_name'];

    $sql = "INSERT into tb_rank (rank_id,rank_name)
        values('$rank_id','$rank_name')";

    $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

    if ($rs) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มระดับชั้นเรียบร้อยแล้ว');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
} elseif ($term == 'Insert') {
    $term_id = $_POST['term_id'];
    $term_name = $_GET['term_name'];

    $sql = "INSERT into tb_term (term_id,term_name)
        values('$term_id','$term_name')";

    $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

    if ($rs) {
        echo "<script>";
        echo "alert(\" เพิ่มข้อมูลเรียบร้อย\");";
        echo "window.history.back()";
        echo "</script>";
        header("location:index.php");
    } else {
        echo "<script>";
        echo "alert(\" ไม่สามารถเพิ่มข้อมูลได้\");";
        echo "window.history.back()";
        echo "</script>";
    }
} else {
    echo "<script>";
    echo "alert(\" ไม่สามารถเพิ่มข้อมูลได้\");";
    echo "window.history.back()";
    echo "</script>";
}
