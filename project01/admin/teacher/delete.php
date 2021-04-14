<?php
include('../../connect.php');
$t_id = $_POST['t_id'];

$sql = "delete from tb_teacher where t_id = '" . $_GET["t_id"] . "' ";

$rs = $con->query($sql);
if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('ลบรายชื่ออาจารย์สำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    echo "ไม่สามารถแก้ไขข้อมูลได้";
}
