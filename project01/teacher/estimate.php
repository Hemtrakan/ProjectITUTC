<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css" />


    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }
    </style>
    <title>ประเมินกิจกรรม</title>
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
                            <strong class="card-title">ประเมินกิจกรรม</strong>
                            <form action="select_check.php" name="s_h" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <select name="year_term" class="form-control">
                                            <?php
                                            include('../connect.php');
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

                                    <div class="col-md-4">
                                        <br>
                                        <select name="group" class="form-control">
                                            <option value="">กลุ่ม</option>
                                            <?php
                                            for ($x = 1; $x <= 12; $x++) {
                                            ?>
                                                <option value="<?= $x; ?>" <?php
                                                                            if ($_POST['group'] == $x) {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>กลุ่ม<?php echo $x; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <select name="rank" class="form-control">
                                            <option value="">ระดับชั้น</option>
                                            <?php
                                            include('../connect.php');
                                            $sql1 = "SELECT * from tb_rank ORDER BY rank_id ASC";
                                            $rs1 = $con->query($sql1);
                                            while ($r1 = $rs1->fetch_object()) {
                                            ?>
                                                <option value="<?= $r1->rank_name ?>" <?php
                                                                                        if ($_POST['rank'] == $r1->rank_name) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>><?= $r1->rank_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        </p>
                                    </div>

                                    <div class="col-md-4">
                                        <br>
                                        <select name="year_id" class="form-control">
                                            <option value="">ชั้นปี</option>
                                            <?php
                                            $sql = "SELECT * FROM tb_schoolyear";
                                            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                            while ($r = mysqli_fetch_array($rs)) {
                                                $day = (date('Y') + 543);
                                                $dayyear = ($r['year_num']+1)-$day+3;
                                                $dayyear1 = ($day - $r['year_num']);
                                                if($dayyear >= 1 && $dayyear < 4){
                                            ?>
                                                    <option value="<?= $r['year_num']; ?>" <?php
                                                                                            if ($_POST['year_id'] == $r['year_num']) {
                                                                                                echo "selected";
                                                                                            }
                                                                                            ?>>ชั้นปีที่ <?php echo $dayyear1; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <br>
                                        <button class="btn btn-success btn-sm" type="submit" name="s_h"><i class="fa fa-search"></i>&nbsp;ค้นหา</button>
                                        <input type="reset" class="btn btn-danger btn-sm" value="Reset">
                                    </div>
                                </div>
                            </form>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>