
<?php
include('../../connect.php');

$term = $_POST['term'];
$year = $_POST['year'];

if ($term == '' || $year == '') {
    header("location:index.php");
}else{

/* echo $term;
echo "<br>";
echo $year;

exit(); */
$sql = "INSERT INTO tb_sum_check(sc_id,term_id,year_id)VALUE(null,'$term','$year')";
$rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

$sqlselect = "SELECT * FROM tb_sum_check as sc
INNER JOIN tb_schoolyear as s ON sc.year_id = s.year_id
WHERE sc.term_id = '$term' AND sc.year_id = '$year'";
$s = $con->query($sqlselect);
    $r1 = $s->fetch_object();

    /* echo $r1->sc_id;
    echo "<br>";
    echo $r1->term_id;
    echo "<br>";
    echo $r1->year_num;
    exit(); */
    $year_term = $r1->year_num."_".$r1->term_id;
    /* echo $year_term;
    exit(); */


/* ตารางเช็คกิจกรรม */
$sql_createat = "CREATE TABLE tb_checkactivity_$year_term(
        ac_id int  AUTO_INCREMENT PRIMARY KEY,
        s_id varchar(10),
        day_id TIMESTAMP,
        plus_id int(2)
    );";
$rs1 = mysqli_query($con, $sql_createat) or die("Error in query: $sql_createat " . mysqli_error($con));


/* ตารางเช็คแถว */
$sql_create = "CREATE TABLE tb_check_$year_term(
    check_id int  AUTO_INCREMENT PRIMARY KEY,
    s_id varchar(10),
    day_id TIMESTAMP
);";
$rs2 = mysqli_query($con, $sql_create) or die("Error in query: $sql_create " . mysqli_error($con));

/* ตารางวันหยุด */
$sql_create_holiday = "CREATE TABLE tb_holiday_$year_term(
    holiday_id int  AUTO_INCREMENT PRIMARY KEY,
    day_id date,
    holiday_comments varchar(255)
);";
$rs3 = mysqli_query($con, $sql_create_holiday) or die("Error in query: $sql_create_holiday " . mysqli_error($con));

/* ตารางเพิ่มกิจกรรม */

$sql_create_plus = "CREATE TABLE tb_plusdays_$year_term(
    plus_id int  AUTO_INCREMENT PRIMARY KEY,
    plus_num int(2),
    day_id date,
    plus_comments varchar(255)
);";
$rs4 = mysqli_query($con, $sql_create_plus) or die("Error in query: $sql_create_plus " . mysqli_error($con));

}
/* echo $sql; exit();   */

if ($rs2 || $rs1 || $rs3 || $rs4) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มตารางเช็คแถวสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
}

?>