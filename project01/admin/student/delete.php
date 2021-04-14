<?php 
include('../../connect.php');
    $s_id = $_POST['s_id'];

    $sql = "delete from tb_student where s_id = '".$_GET["s_id"]."' ";

    $rs = $con->query($sql);
    if($con){
        echo "<script type='text/javascript'>";
    echo "alert('ลบรายชื่อนักศึกษาแล้ว');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
    }else{
        echo "ไม่สามารถแก้ไขข้อมูลได้";
    }
