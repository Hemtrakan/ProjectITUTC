<?php session_start();

$t_id = $_SESSION['t_id'];
$t_name = $_SESSION['t_name'];
$t_lastname =  $_SESSION["t_lastname"];
$t_tel =  $_SESSION['t_tel'];
$dep_id = $_SESSION['dep_id'];
if (!$t_id) {
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

    <title>เช็คกิจกรรม</title>
</head>

<body>


    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">เช็คกิจกรรม</h1>
                            <form action="" name="s_h" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <select name="year_term" class="form-control">
                                            <?php
                                            include('../../connect.php');
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
                                            include('../../connect.php');
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

                                    <div class="col-md-4">
                                        <br>
                                        <button class="btn btn-success btn-sm" type="submit" name="s_h"><i class="fa fa-search"></i>&nbsp;ค้นหา</button>
                                        <input type="button" class="btn btn-danger btn-sm" value="Reset" onclick="window.location.href='index.php'" />
                                    </div>
                                </div>
                            </form>

                            <hr>

                            <form action="insert.php" method="post" name="insert">
                                <div class="row">


                                    <div class="col-md-4">
                                        <p>
                                            <?php
                                            $a = $_POST['year_term'];
                                            $tb_plusday = "tb_plusdays_$a";
                                            $year_term = "ปีการศึกษา $a";

                                            $term = "tb_checkactivity_$a";
                                            ?>
                                            <select name="plus_id" class="form-control">
                                                <option value="">เลือกกิจกรรม</option>
                                                <?php
                                                $sql1 = "SELECT * FROM $tb_plusday
                                                 ORDER BY plus_id DESC";
                                                $rs1 = $con->query($sql1);
                                                while ($r1 = mysqli_fetch_array($rs1)) {
                                                ?>
                                                    <option value="<?= $r1['plus_id'] ?>"><?= $r1['plus_comments'] . "  " . $year_term; ?></option>
                                                <?php } ?>
                                            </select>
                                        </p>
                                    </div>


                                    <div class="col-md-4">
                                        <?php
                                        $a = $_POST['year_term'];
                                        $tb_plusday = "tb_plusdays_$a";
                                        echo "ปีการศึกษา : ";
                                        $year_term = "ปีการศึกษา $a";
                                        ?>
                                        <input type="text" name="year_term" value="<?= $a; ?>" readonly>
                                    </div>



                                    <div class="col-md-4">
                                        <button class="btn btn-outline-success btn-sm" type="submit" name="submit" value="ยืนยันการเช็คกิจกรรม"><i class="fa fa-check"></i>&nbsp; ยืนยันการเช็คกิจกรรม
                                        </button>
                                        <input class="btn btn-outline-danger btn-sm" type="reset" name="reset" value="Reset">
                                    </div>
                                </div>

                                <script language="JavaScript">
                                    function toggle(source) {
                                        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                        for (var i = 0; i < checkboxes.length; i++) {
                                            if (checkboxes[i] != source)
                                                checkboxes[i].checked = source.checked;
                                        }
                                    }
                                </script>

                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr align="center">
                                                <th scope="col">ลำดับ</th>
                                                <th scope="col">รหัสนักศึกษา</th>
                                                <th scope="col">ชื่อ - นามสกุล</th>
                                                <th scope="col">ระดับชั้น</th>
                                                <th scope="col">กลุ่ม - เลขที่</th>
                                                <th scope="col">แผนก</th>
                                                <th scope="col"><input type="checkbox" onclick="toggle(this);" />Check all?<br /> <br> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php

                                                $sql = "SELECT * FROM tb_student as s 
                                    INNER JOIN tb_dep as d ON (s.dep_id=d.dep_id) 
                                    INNER JOIN tb_rank as r ON (s.rank_id=r.rank_id)
                                    INNER JOIN tb_schoolyear as y ON (s.year_id=y.year_id)
                                    WHERE d.dep_id = $dep_id";

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


                                                /* echo $sql; exit(); */
                                                $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                                while ($r = mysqli_fetch_array($rs)) {
                                                ?>
                                                    <?php $num++;
                                                    $a = $_POST['year_term'];
                                                    $day = (date('Y') + 543);
                                                    $dayyear = ($a - $r['year_num'] + 1);
                                                    if ($dayyear >= 1 &&  $dayyear <= 3) {
                                                        if ($r['rank_id'] = 2 && $dayyear >= 1 && $dayyear <= 2) {
                                                    ?>
                                            <tr align="center">
                                                <td><?php echo $num; ?></td>
                                                <td><?php echo $r['s_id']; ?></td>
                                                <td><?php echo $r['s_name'] . " - " . $r['s_lastname']; ?></td>
                                                <td><?php echo $r['rank_name'] . "" . $dayyear; ?></td>
                                                <td><?php echo "กลุ่ม " . $r['s_group'] . " เลขที่ " . $r['s_number']; ?></td>
                                                <td><?php echo $r['dep_name']; ?></td>
                                                <td><input type="checkbox" name="check[]" value="<?php echo $r['s_id']; ?>"></td>
                                            </tr>
                                <?php
                                                        }
                                                    }
                                                }
                                ?>
                                </tr>
                                        </tbody>
                                    </table>
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