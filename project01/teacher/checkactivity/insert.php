<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css" />

<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
<link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
<link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
<link rel="stylesheet" href="../assets/css/style.css">
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

<?php

include('../../connect.php');
$plus_id = $_POST['plus_id'];
if ($plus_id != "") {
    /* ตาราง check */
    $a = $_POST['year_term'];
    $year_term = "tb_checkactivity_$a";

    /* echo $year_term;
exit(); */
    $s_id = count($_POST["check"])[$i];
    $plus_id = $_POST['plus_id'];


    $sqli = "SELECT t.s_id,s.* FROM $year_term as t
INNER JOIN tb_student as s
WHERE plus_id = $plus_id";
    $rs1 = mysqli_query($con, $sqli) or die("Error in query: $sqli" . mysqli_error($con));
    while ($r = mysqli_fetch_array($rs1)) {
        /* echo $r['s_id'];
    echo "<br>"; */
        $s_id1 = $r['s_id'];
        $s_name = $r['s_name'];
        $s_lastname = $r['s_lastname'];
        /* echo "<br>"; */
    }

    if ($plus_id = $s_id1) {
        echo "<h3 align='center'>";
        echo "ไม่สามารถเพิ่มกิจกรรมได้";
        echo "<br>";
        echo "</h3>";
        echo "<br>";
        echo "<h4 align='center'>";
        echo "เพิ่มกิจกรรมให้นักศึกษาซ้ำ";
        echo "</h4>";
        
?>
<br>
<p align="center">
<input  type="button" class="btn btn-warning" value="back" onclick="window.location.href='index.php'" />
</p>
        
<?php
    } else {
        $plus_id = $_POST['plus_id'];
        for ($i = 0; $i < count($_POST["check"]); $i++) {
            if ($_POST["check"][$i] != "") {
                $sql = "INSERT INTO $year_term(ac_id,s_id,day_id,plus_id)VALUE(null,'" . $_POST["check"][$i] . "',NOW(),'$plus_id')";
                $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
            }
        }
    }
} else {
    echo "<script type='text/javascript'>";
    echo "alert('ไม่ได้เลือกกิจกรรมที่จะเช็ค');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
}
if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('เช็คกิจกรรมสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
}


    /* echo $sql; exit(); */
