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
    include("nav.php")
    ?>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">ประเมินกิจกรรม</strong>
                            <form action="" name="s_h" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <div class="input-group">
                                            <?php
                                            $a = $_POST['year_term'];
                                            ?>
                                            <select name="year_term" class="form-control">
                                                <?php
                                                include('../../connect.php');
                                                $sql = "SELECT * FROM `tb_sum_check` as sc
                                            INNER JOIN tb_term as t ON sc.term_id = t.term_id
                                            INNER JOIN tb_schoolyear as s ON sc.year_id = s.year_id 
                                            ORDER BY sc_id DESC";
                                                $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                                while ($r = mysqli_fetch_array($rs)) {
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
                                    </div>

                                    <div class="col-md-4">


                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">ค้นหา</button>
                                        <input type="button" class="btn btn-warning" value="back" onclick="window.location.href='select_check.php'" />
                                    </div>



                                    <?php
                                    $a = $_POST['year_term'];
                                    $year_term1 = "tb_holiday_$a";
                                    ?>
                                    <div class="col-md-4">
                                        วันหยุดทั้งหมด
                                        <?php
                                        $sqlh = "SELECT COUNT(holiday_id) FROM $year_term1";
                                        $rsh = mysqli_query($con, $sqlh) or die(mysqli_error($con));
                                        while ($rh = mysqli_fetch_array($rsh)) {
                                            $counth = $rh['COUNT(holiday_id)'];
                                            echo $rh['COUNT(holiday_id)'];
                                            $number = 90;
                                            echo " จำนวนวันที่ต้องเข้าแถว";
                                            $sumh = $number - $counth;
                                        }
                                        ?>
                                        <?php echo $sumh; ?>
                                    </div>

                                    <div class="col-md-4">
                                        80 % ของ
                                        <?php
                                        $sqlh = "SELECT COUNT(holiday_id) FROM $year_term1";
                                        $rsh = mysqli_query($con, $sqlh) or die(mysqli_error($con));
                                        while ($rh = mysqli_fetch_array($rsh)) {
                                            $counth = $rh['COUNT(holiday_id)'];
                                            echo $sumh . " วัน = ";
                                            $sumhd = ($sumh) / 100 * 80;
                                            echo ceil($sumhd);
                                            echo " วัน ";
                                        }
                                        ?>
                                        </h1>
                                    </div>
                                </div>
                        </div>
                        </form>

                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr align="center">
                                        <th scope="col">ชื่อ - นามสกุล</th>
                                        <th scope="col">จำนวนวันที่เข้าแถว</th>
                                        <th scope="col">บวกวันเข้าแถวพิเศษ</th>
                                        <th scope="col">รวมวันเข้าแถว</th>
                                        <th scope="col">ผลกิจกรรม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        include('../../connect.php');
                                        /*  */
                                        $sql = "SELECT * FROM tb_student as s 
                                    INNER JOIN tb_dep as d ON (s.dep_id=d.dep_id) 
                                    INNER JOIN tb_rank as r ON (s.rank_id=r.rank_id)
                                    INNER JOIN tb_schoolyear as y ON (s.year_id=y.year_id)
                                    WHERE s.s_id = $s_id";
                                        $a = $_POST['year_term'];
                                        $year_term = "tb_check_$a";
                                        $tb_checkactivity = "tb_checkactivity_$a";
                                        $tb_plusdays = "tb_plusdays_$a";
                                        /* echo $sql; exit(); */
                                        $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                        while ($r = mysqli_fetch_array($rs)) {
                                            /*  */
                                            $sqlcount = "SELECT COUNT(s_id) FROM $year_term WHERE s_id = $r[s_id]";
                                            $rs1 = mysqli_query($con, $sqlcount) or die(mysqli_error($con));
                                            while ($r1 = mysqli_fetch_array($rs1)) {
                                                $count = $r1['COUNT(s_id)'];
                                                $s_id = $r['s_id'];
                                                /*  */
                                                $sqlcheckact = "SELECT SUM(plus_num) FROM $tb_checkactivity as c
                                                                        INNER JOIN $tb_plusdays as p ON c.plus_id = p.plus_id
                                                                        WHERE s_id =  $r[s_id] ";
                                                $rs_checkact = mysqli_query($con, $sqlcheckact) or die(mysqli_error($con));
                                                while ($r_act = mysqli_fetch_array($rs_checkact)) {
                                                    $act = $r_act['SUM(plus_num)'];
                                                    $sum = $count + $act;
                                        ?>
                                    <tr align="center">
                                        <td><?php echo $r['s_name'] . "  -  " . $r['s_lastname']; ?></td>
                                        <td><?php echo  "จำนวนวันเข้าแถว " . $r1['COUNT(s_id)'] . " วัน "; ?></td>
                                        <td><?php echo $r_act['SUM(plus_num)']; ?></td>
                                        <td><?php echo $sum; ?></td>
                                        <td><?php
                                                    if ($sum <= $sumhd) { ?>
                                                <font color="red">
                                                    <?php echo "ไม่ผ่านกิจกรรมเข้าแถว"; ?>
                                                </font>
                                            <?php
                                                    } else {
                                            ?>
                                                <font color="blue">
                                                    <?php echo "ผ่านกิจกรรมเข้าแถว"; ?>
                                                </font>
                                            <?php
                                                    }
                                            ?>
                                        </td>
                                    </tr>
                        <?php
                                                }
                                            }
                                        }

                        ?>
                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>