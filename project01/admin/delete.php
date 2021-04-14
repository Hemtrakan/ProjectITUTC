<?php
include('../connect.php');


$dep =  $_GET['dep_id'];
$year =  $_GET['year_id'];
$rank = $_GET['rank_id'];
$term = $_GET['term_id'];



/* print_r($dep); exit(); */

if (isset($dep)) {
    $dep_id = $_POST['dep_id'];

    $sql = "delete from tb_dep where dep_id = '" . $_GET["dep_id"] . "' ";
    $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

    if ($rs) {
        echo "<script type='text/javascript'>";
        echo "alert('ลบแผนกวิชาเรียบร้อยแล้ว');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('ไม่สามารถลบข้อมูลได้');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
}
if (isset($year)) {
    $year_id = $_POST['year_id'];

    $sql = "delete from tb_schoolyear where year_id = '" . $_GET["year_id"] . "' ";
    $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

    if ($rs) {
        echo "<script type='text/javascript'>";
        echo "alert('ลบปีการศึกษาเรียบร้อยแล้ว');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('ไม่สามารถลบข้อมูลได้');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }

}
if (isset($rank)) {
    $rank_id = $_POST['rank_id'];

    $sql = "delete from tb_rank where rank_id = '" . $_GET["rank_id"] . "' ";
    $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

    if ($rs) {
        echo "<script type='text/javascript'>";
        echo "alert('ลบข้อมูลระดับการศึกษาเรียบร้อยแล้ว');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('ไม่สามารถลบข้อมูลได้');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
}

if (isset($term)) {
    $term_id = $_POST['term_id'];

    $sql = "delete from tb_term where term_id = '" . $_GET["term_id"] . "' ";
    $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

    if ($rs) {
        echo "<script>";
        echo "alert(\" ลบข้อมูลเรียบร้อย\");";
        echo "window.history.back()";
        echo "</script>";
        header("location:index.php");
    } else {
        echo "<script>";
        echo "alert(\" ไม่สามารถลบข้อมูลได้\");";
        echo "window.history.back()";
        echo "</script>";
    }
}
