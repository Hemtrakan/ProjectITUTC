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


    $s_id = $_POST['check'];
    $plus_id = $_POST['plus_id'];
    /* print_r($s_id);
    echo "<br>";
    print_r($plus_id);
    echo "<br>";
    exit(); */
    
    $check = "SELECT s_id, plus_id FROM $year_term 
	WHERE s_id = '$s_id' AND plus_id = '$plus_id'";
    $result1 = mysqli_query($con, $check) or die(mysqli_error($con));
    $num = mysqli_num_rows($result1);
    if ($num > 0) {
?>
        <h2 align="center">
            ไม่สามารถบวกเพิ่มกิจกรรมนี้ได้
        </h2>
        <h3 align="center">
            เนื่องจากได้เพิ่มกิจกรรมนี้ไปแล้ว
        </h3>
        <br>
        <p align="center">
            <input type="button" class="btn btn-warning" value="back" onclick="window.location.href='index.php'"/>
        </p>
    <?php
    } else {
        $plus_id = $_POST['plus_id'];
        for ($i = 0; $i < count($_POST["check"]); $i++) {
            if ($_POST["check"][$i] != "") {
                $sql = "INSERT INTO $year_term(ac_id,s_id,day_id,plus_id)VALUE('','" . $_POST["check"][$i] . "',NOW(),'$plus_id')";
                $rs = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
            }
        }
    }
} else {
    echo "<script type='text/javascript'>";
    echo "alert('ไม่ได้เลือกกิจกรรมที่จะเช็ค');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
    ?>
    <br>
    <p align="center">
        <input type="button" class="btn btn-warning" value="back" onclick="window.location.href='index.php'" />
    </p>
<?php
}
if ($rs) {
    echo "<script type='text/javascript'>";
    echo "alert('เช็คกิจกรรมสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
}


    /* echo $sql; exit(); */
