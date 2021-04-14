<?php
session_start();
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
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <title>Document</title>
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
                            <h1 class="card-title">กิจกรรม (พิเศษ)</h1>
                            <h4 align="center">
                                <a href="form_insert.php"><i class="fa fa-plus"></i>&nbsp;เพิ่มกิจกรรม (พิเศษ)</a>
                            </h4>
                            <form action="" method="post">
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
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success">ค้นหา</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr align="center">
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ปี/เดือน/วัน</th>
                                    <th scope="col">รายละเอียด</th>
                                    <th scope="col">จำนวนวันที่เพิ่ม</th>
                                    <th scope="col">ปีการศึกษา_ภาคเรียน</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = $_POST['year_term'];
                                $tb_plusdays = "tb_plusdays_$a";
                                $tb_plusdays1 = "ปีการศึกษา : $a";
                                $_SESSION["plusdays"] = $tb_plusdays;
                                $_SESSION["plusdays1"] = $tb_plusdays1;
                                $sql = "SELECT * FROM $tb_plusdays";
                                $rs = mysqli_query($con, $sql);
                                while ($r = mysqli_fetch_array($rs)) {
                                ?>
                                    <?php $num++; ?>
                                    <tr align="center">
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $r['day_id']; ?></td>
                                        <td><?php echo $r['plus_comments']; ?></td>
                                        <td><?php echo $r['plus_num']; ?></td>
                                        <td><?php echo $tb_plusdays1; ?></td>
                                        <td>
                                            <input type="button" value="Edit" class="btn btn-warning btn-block" onclick="window.location.href='form_update.php?plus_id=<?php echo $r['plus_id'] ?>'" >
                                        </td>
                                        <td>
                                            <input type="button" value="Delete" class="btn btn-danger btn-block" onclick="window.location.href='form_delete.php?plus_id=<?php echo $r['plus_id'] ?>'" >
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>