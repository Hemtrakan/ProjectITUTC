<?php session_start();
include('../../connect.php');

$s_id = $_SESSION['s_id'];
$s_name = $_SESSION['s_name'];
$s_lastname =  $_SESSION["s_lastname"];
$s_number =  $_SESSION["s_number"];
$dep_id = $_SESSION["dep_id"];
$s_group = $_SESSION["s_group"];
$year_id = $_SESSION["year_id"];
$rank_id = $_SESSION["rank_id"];
if (!$s_id) {
    Header("Location:Login/logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

    <title>การเข้าแถว</title>
</head>

<body>

    <?php
    include("nav.php");
    ?>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">วันหยุด</h1>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <select name="year_term" class="form-control">
                                            <?php
                                            include("../connect.php");
                                            $sql3 = "SELECT * FROM `tb_sum_check` as sc
                                            INNER JOIN tb_term as t ON sc.term_id = t.term_id
                                            INNER JOIN tb_schoolyear as s ON sc.year_id = s.year_id 
                                            ORDER BY sc_id DESC";
                                            $rs2 = mysqli_query($con, $sql3) or die(mysqli_error($con));
                                            ?>
                                            <option value="">เลือกปีการศึกษา</option>
                                            <?php
                                            while ($r = mysqli_fetch_array($rs2)) {
                                                $year_term = $r['year_num'] . "_" . $r['term_id'];

                                            ?>
                                                <option value="<?= $year_term; ?>" <?php
                                                                                    if ($_POST['year_term'] == $year_term) {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>><?= " ปีการศึกษา " . $r['year_num'] . " / " . $r['term_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                            </form>

                            <div class="col-md-4">
                                <br>
                                <button class="btn btn-success btn-sm" type="submit" name="s_h"><i class="fa fa-search"></i>&nbsp;ค้นหา</button>
                                <br>
                                <?php
                                $a = $_POST['year_term'];
                                $year_term = "tb_holiday_$a";
                                ?>
                            </div>
                            <div class="col-md-4">
                                <br>
                                <?php
                                include("../connect.php");
                                $sqlcount = "SELECT COUNT(holiday_id) FROM $year_term";
                                $rs1 = mysqli_query($con, $sqlcount);
                                $r1 = mysqli_fetch_array($rs1);
                                ?>
                                จำนวนวันหยุด : <?php echo $r1['COUNT(holiday_id)']; ?>
                            </div>
                        </div>

                        <br>



                        <div class="row">
                            <div class="col-md-12">

                                <table class="table table-striped">
                                    <thead>
                                        <tr align="center">
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">วันที่หยุด</th>
                                            <th scope="col">รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php

                                            include("../connect.php");
                                            $sql = "SELECT * FROM $year_term ";
                                            /* echo $sql; exit(); */
                                            $rs = mysqli_query($con, $sql);
                                            while ($r = mysqli_fetch_array($rs)) {
                                            ?>
                                                <?php $num++; ?>
                                        <tr align="center">
                                            <td><?php echo $num; ?></td>
                                            <td><?php echo $r['day_id']; ?></td>
                                            <td><?php echo $r['holiday_comments']; ?></td>

                                        </tr>
                                    <?php
                                            }
                                    ?>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>


<script src="../assets/js/lib/data-table/datatables.min.js"></script>
<script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="../assets/js/lib/data-table/jszip.min.js"></script>
<script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="../assets/js/init/datatables-init.js"></script>

</html>