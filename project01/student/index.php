<?php session_start();

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


    <title>หน้าแรก</title>
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
                            <h1 class="card-title">ยินดีต้อนรับนักเรียน - นักศึกษา</h1>
                            <br>
                            <h4><?php
                                include('../connect.php');
                                $sql = "SELECT * FROM tb_dep WHERE dep_id = $dep_id";
                                $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                $r = mysqli_fetch_object($rs);
                                echo "รหัสนักศึกษา : " . $s_id . "<br>" . " ชื่อ" . $s_name . "  " . $s_lastname;
                                echo "<br>";
                                echo "เลขที่ : " . $s_number . " กลุ่ม " . $s_group;
                                echo "<br>";
                                echo " แผนกวิชา ";
                                if ($dep_id == $r->dep_id) {
                                    echo $r->dep_name;
                                }
                                echo ""
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                        <h2>ข่าวประชาสัมพันธ์วิทยาลัย</h2>

                        <!-- Button to Open the Modal -->
                        <br>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#UTC">
                            คลิบเพื่ออ่าน
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="UTC">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">ข่าวประชาสัมพันธ์วิทยาลัย</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <?php
                                        $sql = "SELECT * FROM tb_webboard WHERE dep_id = '0'";
                                        $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                        while ($r = mysqli_fetch_array($rs)) { ?>
                                            <?php echo "<img src='../admin/webboard/images/$r[img_id]' width='350px' height='100%'"; ?>
                                            <br>
                                            <h4>
                                                หัวข้อ : <?php echo $r['web_topic']; ?>
                                            </h4>
                                            <h6>
                                                <b> เนื้อหา </b>
                                                <br>
                                                <?php echo $r['web_story']; ?>
                                                <hr>
                                            </h6>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-md-6">
                    <div class="container">
                        <h2>ข่าวประชาสัมพันธ์ในแผนก</h2>
                        <br>
                        <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#UTC1">
                            คลิบเพื่ออ่าน
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="UTC1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">ข่าวประชาสัมพันธ์ในแผนก</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <?php
                                        $sql = "SELECT * FROM tb_webboard WHERE dep_id = $dep_id ORDER BY web_id";
                                        $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                        while ($r = mysqli_fetch_array($rs)) { ?>
                                            <?php echo "<img src='../admin/webboard/images/$r[img_id]' width='350px' height='100%'"; ?>
                                            <br>
                                            <h4>
                                                หัวข้อ : <?php echo $r['web_topic']; ?>
                                            </h4>
                                            <h6>
                                                <b> เนื้อหา </b>
                                                <br>
                                                <?php echo $r['web_story']; ?>
                                            </h6>
                                            <hr>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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