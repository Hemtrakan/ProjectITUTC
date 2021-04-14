<?php
include("session.php");
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

    <title>เพิ่มข้อมูลนักศึกษา</title>

</head>

<body>

    <?php
    include("nav.php");
    ?>
    <div class="content">
        <h3 align="center">เพิ่มข้อมูลนักเรียน-นักศึกษา</h3>
        <br>
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <table align="center">
                <tr>
                    <td align="right">รหัสนักศึกษา : </td>
                    <td>
                        <input class="form-control" type="number" name="s_id" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">รหัสผ่าน : </td>
                    <td>
                        <input class="form-control" type="text" name="s_pass" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">ชื่อ : </td>
                    <td>
                        <input class="form-control" type="text" name="s_name" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">นามสกุล : </td>
                    <td>
                        <input class="form-control" type="text" name="s_lastname" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">เลขที่ : </td>
                    <td>
                        <input class="form-control" type="number" name="s_number" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">แผนก : </td>
                    <td>
                        <select name="dep_id" class="form-control">
                            <?php
                            include('../../connect.php');
                            $sql1 = "select * from tb_dep";
                            $rs1 = $con->query($sql1);
                            while ($r1 = $rs1->fetch_object()) {
                            ?>
                                <option value="<?= $r1->dep_id ?>"><?= $r1->dep_name; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">กลุ่ม : </td>
                    <td>
                        <input class="form-control" type="number" name="s_group" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">ระดับการศึกษา : </td>
                    <td>
                        <select name="rank_id" class="form-control">
                            <?php
                            include('../../connect.php');
                            $sql1 = "select * from tb_rank ORDER BY rank_id ASC";
                            $rs1 = $con->query($sql1);
                            while ($r1 = $rs1->fetch_object()) {
                            ?>
                                <option value="<?= $r1->rank_id ?>"><?= $r1->rank_name; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td align="right">ปีการศึกษา : </td>
                    <td>
                        <select name="year_id" class="form-control">
                            <?php
                            include('../../connect.php');
                            $sql1 = "select * from tb_schoolyear ORDER BY year_num DESC";
                            $rs1 = $con->query($sql1);
                            while ($r1 = $rs1->fetch_object()) {
                            ?>
                                <option value="<?= $r1->year_id ?>"><?= $r1->year_num; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td align="right">รูปภาพ : </td>
                    <td>
                        <input type="file" name="s_img">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <br>
                        <input class="btn btn-success btn-block" type="submit" name="ok" value="Insert">
                        <input class="btn btn-danger btn-block" type="reset" name="reset" value="Reset">
                        <input type="button" class="btn btn-warning btn-block" value="back" onclick="window.location.href='index.php'" />
                    </td>
                </tr>
            </table>
        </form>
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