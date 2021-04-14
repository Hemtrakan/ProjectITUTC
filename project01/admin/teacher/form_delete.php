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

    <title>ลบข้อมูลนักเรียน-นักศึกษา</title>
</head>

<body>

    <?php
    include("nav.php");
    ?>
    <div class="content">
        <h3 align="center">ลบข้อมูลครู-อาจารย์</h3>
        <br>
        <form name="update" action="delete.php?t_id=<?php echo $_GET["t_id"]; ?>" method="post">
            <?php
            include('../../connect.php');
            $sql = "SELECT * FROM tb_teacher as t
        INNER JOIN tb_dep as d ON t.dep_id=d.dep_id WHERE t_id = '$_GET[t_id]'";
            $rs = $con->query($sql);
            $r = $rs->fetch_assoc();
            if (!$rs) {
                echo "Not found t_id=" . $_GET["t_id"];
            } else {
            }
            ?>
            <table align="center">
                <tr>
                    <td colspan="2" align="center">
                        <?php echo "<img src='images/$r[t_img]' width='100px' height='100px'"; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">รหัสประจำตัวครู-อาจารย์ : </td>
                    <td>
                        <?php echo $r['t_id']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">รหัสผ่าน : </td>
                    <td>
                        <?php echo $r['t_pass']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">ชื่อ : </td>
                    <td>
                        <?php echo $r['t_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">นามสกุล : </td>
                    <td>
                        <?php echo $r['t_lastname']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">เบอร์โทร : </td>
                    <td>
                        <?php echo $r['t_tel']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">แผนก : </td>
                    <td>
                        <?php echo $r['dep_name']; ?>
                    </td>
                </tr>


                <tr align="center">
                    <td colspan="2">
                        <br>
                        <input class="btn btn-danger btn-block" type="submit" name="ok" value="Delete">
                        <input type="button" class="btn btn-warning btn-block" value="back" onclick="window.location.href='index.php'" />
                        <input type="hidden" name="t_id" value="<?= $r->t_id; ?>">
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