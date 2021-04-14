<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

    <title>ประเมินกิจกรรม</title>


</head>
<?php
include('nav.php');
?>

<body>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>ประเมินกิจกรรม</h3>
                            <form action="" name="s_h" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <h4>ปีการศึกษา/ภาคเรียน</h4>
                                        <div class="input-group">
                                            <select name="year_term" class="form-control">
                                                <?php
                                                $sql = "SELECT * FROM `tb_sum_check` as sc
                                                INNER JOIN tb_term as t ON sc.term_id = t.term_id
                                                INNER JOIN tb_schoolyear as s ON sc.year_id = s.year_id 
                                                ORDER BY sc_id DESC";
                                                $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                                while ($r = mysqli_fetch_array($rs)) {
                                                    $year_term = $r['year_num'] . "_" . $r['term_id'];
                                                    $year = $r['year_id'];
                                                    $term = $r['term_id'];
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
                                        <br>
                                        <h4>แผนกวิชา</h4>
                                        <div class="input-group">
                                            <select name="dep" class="form-control">
                                                <option value="">แผนก</option>
                                                <?php
                                                include("../connect.php");
                                                $sql1 = "SELECT * from tb_dep ORDER BY dep_id ASC";
                                                $rs1 = $con->query($sql1);
                                                while ($r1 = $rs1->fetch_object()) {
                                                ?>
                                                    <option value="<?= $r1->dep_name ?>" <?php
                                                                                            if ($_POST['dep'] == $r1->dep_name) {
                                                                                                echo "selected";
                                                                                            }
                                                                                            ?>><?= $r1->dep_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <h4>ระดับ</h4>
                                        <div class="input-group">
                                            <select name="rank" class="form-control">
                                                <option value="">ระดับชั้น</option>
                                                <?php
                                                include("../connect.php");
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
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <div class="input-group">
                                            <?php
                                            $a = $_POST['year_term'];
                                            echo "ปีการศึกษา/ภาคเรียน";
                                            echo "<br>";
                                            echo $a;
                                            echo "<br>";
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <br>
                                        <h4>กลุ่ม</h4>
                                        <div class="input-group">
                                            <select name="group" class="form-control">
                                                <option value="">กลุ่ม</option>
                                                <?php
                                                for ($x = 1; $x <= 12; $x++) {
                                                ?>
                                                    <option value="<?= $x; ?>" <?php
                                                                                if ($_POST['group'] == $x) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>กลุ่ม <?php echo $x; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <br>
                                        <h4>ชั้นปีที่</h4>
                                        <select name="year_id" class="form-control">
                                            <option value="">ชั้นปี</option>
                                            <?php
                                            $sql = "SELECT * FROM tb_schoolyear";
                                            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                            while ($r = mysqli_fetch_array($rs)) {
                                                $day = (date('Y') + 543);
                                                $dayyear = ($r['year_num'] + 1) - $day + 3;
                                                $dayyear1 = ($day - $r['year_num']);
                                                if ($dayyear >= 1 && $dayyear < 4) {
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
                                </div>


                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">ค้นหา</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <input type="button" class="btn btn-warning" value="back" onclick="window.location.href='estimate.php'" />
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
                        <br>
                        <table class="table table-striped" id="bootstrap-data-table-export">
                            <thead>
                                <tr align="center">
                                    <th>รหัสนักเรียน-นักศึกษา</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>แผนกวิชา</th>
                                    <th>ระดับชั้น - กลุ่ม</th>
                                    <th>จำนวนวันที่เข้าแถว</th>
                                    <th>บวกวัน (พิเศษ)</th>
                                    <th>รวม</th>
                                    <th>ผลกิจกรรม</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include('../connect.php');
                                /*  */
                                $sql = "SELECT * FROM tb_student as s 
                                    INNER JOIN tb_dep as d ON (s.dep_id=d.dep_id) 
                                    INNER JOIN tb_rank as r ON (s.rank_id=r.rank_id)
                                    INNER JOIN tb_schoolyear as y ON (s.year_id=y.year_id)";

                                if (isset($_POST['dep']) && $_POST['dep'] != "") {
                                    // ต่อคำสั่ง sql 
                                    $sql .= "AND dep_name LIKE '%" . trim($_POST['dep']) . "%'";
                                }

                                if (isset($_POST['group']) && $_POST['group'] != "") {
                                    // ต่อคำสั่ง sql 
                                    $sql .= " AND s_group LIKE '%" . trim($_POST['group']) . "%'";
                                }

                                if (isset($_POST['rank']) && $_POST['rank'] != "") {
                                    // ต่อคำสั่ง sql 
                                    $sql .= " AND rank_name LIKE '%" . trim($_POST['rank']) . "%' ";
                                }

                                if (isset($_POST['year_id']) && $_POST['year_id'] != "") {
                                    // ต่อคำสั่ง sql 
                                    $sql .= " AND year_num LIKE '%" . trim($_POST['year_id']) . "%' ";
                                }


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
                                            <?php
                                            $a = $_POST['year_term'];
                                            $day = (date('Y') + 543);
                                            $dayyear = ($a - $r['year_num'] + 1);
                                            if ($dayyear >= 1 &&  $dayyear <= 3) {
                                                if ($r['rank_id'] = 2 && $dayyear >= 1 && $dayyear <= 3) {
                                            ?>
                                                    <tr>
                                                        <td align="center"><?php echo $r['s_id'] ?></td>
                                                        <td><?php echo $r['s_name'] . "  -  " . $r['s_lastname']; ?></td>
                                                        <td><?php echo $r['dep_name']; ?></td>
                                                        <td align="center"><?php echo $r['rank_name'] . "" . $dayyear . " กลุ่ม  " . $r['s_group']; ?></td>
                                                        <td align="center"><?php echo  "จำนวนวันเข้าแถว " . $r1['COUNT(s_id)'] . " วัน "; ?></td>
                                                        <td align="center"><?php echo $r_act['SUM(plus_num)']; ?></td>
                                                        <td align="center"><?php echo $sum; ?></td>
                                                        <td align="center">
                                                            <?php
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
                                    }
                                }
                                ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>รหัสนักเรียน-นักศึกษา</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>แผนกวิชา</th>
                                    <th>ระดับชั้น - กลุ่ม</th>
                                    <th>จำนวนวันที่เข้าแถว</th>
                                    <th>บวกวัน (พิเศษ)</th>
                                    <th>รวม</th>
                                    <th>ผลกิจกรรม</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>


 -->
<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/init/datatables-init.js"></script>


<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="assets/js/init/weather-init.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="assets/js/init/fullcalendar-init.js"></script>

</html>