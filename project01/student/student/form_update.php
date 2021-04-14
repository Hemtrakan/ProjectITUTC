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
                            <h1 class="card-title">แก้ไขข้อมูล</h1>
                            <form name="update" action="update.php?s_id=<?php echo $s_id; ?>" method="post" enctype="multipart/form-data">
                                <?php
                                include('../../connect.php');
                                $sql = "SELECT * FROM tb_student as s
                                INNER JOIN tb_dep as d ON s.dep_id = d.dep_id
                                INNER JOIN tb_rank as r ON s.rank_id = r.rank_id
                                INNER JOIN tb_schoolyear sr ON s.year_id = sr.year_id
                                WHERE s_id = $s_id ";
                                $rs = $con->query($sql);
                                $r = $rs->fetch_array();
                                ?>
                                <table align="center">
                                    <tr>
                                        <td align="right">รหัสนักศึกษา</td>
                                        <td>
                                            <?php echo $r['s_id']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">รหัสผ่าน : </td>
                                        <td>
                                            <input class="form-control" type="password" name="s_pass" value="<?php echo $r['s_pass']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">ชื่อ : </td>
                                        <td>
                                            <input class="form-control" type="text" name="s_name" value="<?php echo $r['s_name']; ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">นามสกุล : </td>
                                        <td>
                                            <input class="form-control" type="text" name="s_lastname" value="<?php echo $r['s_lastname']; ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">แผนกวิชา : </td>
                                        <td>
                                            <?php echo $r['dep_name']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">เลขที่ : </td>
                                        <td>
                                            <?php echo $r['s_number']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">ระดับขั้น : </td>
                                        <td>
                                            <?php echo $r['rank_name'] . "" . $r['s_level']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">รูปภาพ : </td>
                                        <td>
                                            <?php echo "<img src='../../admin/student/images/$r[s_img]' width='100px' height='100px'"; ?>
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td colspan="2">
                                            <input type="file" name="s_img">
                                        </td>
                                    </tr>

                                    <tr align="center">
                                        <td colspan="2">
                                            <br>
                                            <input class="btn btn-success btn-block" type="submit" name="ok" value="Edit">
                                            <input type="button" class="btn btn-warning btn-block" value="back" onclick="window.location.href='index.php'" />
                                            <input type="hidden" name="s_id" value="<?= $r->s_id; ?>">
                                        </td>
                                    </tr>
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