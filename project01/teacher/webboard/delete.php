<?php
include('../../connect.php');
$web_id = $_POST['web_id'];

$sql = "delete from tb_webboard where web_id = '" . $_GET["web_id"] . "' ";

$rs = $con->query($sql);
if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('ลบข่าวประชาสัมพันธ์สำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    echo "ไม่สามารถลบข้อมูลได้";
}
