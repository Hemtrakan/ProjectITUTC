<?php
include('../../connect.php');

$a = $_POST['year_term'];
$year_term = "tb_check_$a";
/* echo $year_term;
    exit(); */
/* ตาราง check */

$num = 2 ;
for($ii=0;$ii<=$num;$ii++){
$AUTO_INCREMENT = '';
for ($i = 0; $i < count($_POST["check"]); $i++) {
    if ($_POST["check"][$i] != "") {
        $sql = "INSERT INTO $year_term(check_id,s_id,day_id)VALUE(null,'" . $_POST["check"][$i] . "',NOW())";
        $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
    }
}
} 
/* echo $sql; exit();   */

if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('เช็คแถวสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
}
