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

    <title>ครู - อาจารย์</title>
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
                            <h1 class="card-title">ยินดีต้อนรับครู - อาจารย์</h1>
                            <br>
                            <h4><?php
                                include('../connect.php');
                                $sql = "SELECT * FROM tb_dep WHERE dep_id = $dep_id";
                                $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                $r = mysqli_fetch_object($rs);
                                echo "<b>Username : </b>" . $t_id . "<br>" . " <b>ชื่อ : </b>" . $t_name . "  " . $t_lastname;
                                echo "<br>";
                                echo "<b>เบอร์โทร : </b>" . $t_tel;
                                echo "<br>";
                                echo "<b> แผนกวิชา </b>";
                                if ($dep_id == $r->dep_id) {
                                    echo $r->dep_name;
                                }
                                ?>
                            </h4>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <h2>รายชื่อนักเรียน - นักศึกษา</h2>
                            <form action="" name="s_h" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <input class="form-control" type="text" maxlength="2" value="<?php echo $_POST['year_id'] ?>" name="year_id" placeholder="ค้นหารหัสนักศึกษา จากรหัสปีการศึกษา เช่น 61">
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
                                    </div>

                                    <div class="col-md-4">
                                        <br>
                                        <button class="btn btn-success btn-sm" type="submit" name="s_h"><i class="fa fa-search"></i>&nbsp;ค้นหา</button>
                                        <input type="button" class="btn btn-danger btn-sm" value="Reset" onclick="window.location.href='index.php'" />
                                    </div>
                                </div>
                            </form>

                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <td align="center"><b>ลำดับ</td>
                                            <td align="center"><b>รหัสนักศึกษา</td>
                                            <td><b>ชื่อ - นามสกุล</td>
                                            <td align="center"><b>ระดับชั้น</td>
                                            <td align="center"><b>กลุ่ม - เลขที่</td>
                                            <td align="center"><b>แผนก</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php

                                            $sql = "SELECT * FROM tb_student as s 
                                                INNER JOIN tb_dep as d ON (s.dep_id=d.dep_id) 
                                                INNER JOIN tb_rank as r ON (s.rank_id=r.rank_id)
                                                INNER JOIN tb_schoolyear as y ON (s.year_id=y.year_id)
                                                WHERE d.dep_id = $dep_id ";

                                            if (isset($_POST['year_id']) && $_POST['year_id'] != "") {
                                                // ต่อคำสั่ง sql 
                                                $sql .= " AND s_id LIKE '" . ($_POST['year_id']) . "%'";
                                            }

                                            if (isset($_POST['rank']) && $_POST['rank'] != "") {
                                                // ต่อคำสั่ง sql 
                                                $sql .= " AND rank_name LIKE '%" . trim($_POST['rank']) . "%' ";
                                            }

                                            if (isset($_POST['s_level']) && $_POST['s_level'] != "") {
                                                // ต่อคำสั่ง sql 
                                                $sql .= " AND s_level LIKE '%" . trim($_POST['s_level']) . "%' ";
                                            }

                                            /* echo $sql; exit(); */
                                            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                            while ($r = mysqli_fetch_array($rs)) {
                                            ?>
                                                <?php $num++;
                                                if (isset($_POST['year_id'])) {
                                                ?>
                                        <tr>
                                            <td align="center"><b><?php echo $num; ?></td>
                                            <td align="center"><?php echo $r['s_id']; ?></td>
                                            <td><?php echo $r['s_name'] . " - " . $r['s_lastname']; ?></td>
                                            <td align="center"><?php echo $r['rank_name'] . "" . $dayyear; ?></td>
                                            <td align="center"><?php echo "กลุ่ม " . $r['s_group'] . " เลขที่ " . $r['s_number']; ?></td>
                                            <td align="center"><?php echo $r['dep_name']; ?></td>
                                        </tr>
                                <?php
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
        </form>
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
</body>

</html>