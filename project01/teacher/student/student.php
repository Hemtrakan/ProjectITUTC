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


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css" />


    <title>เช็คแถว</title>
</head>

<body>


    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">รายชื่อนักเรียน-นักศึกษา</h1>
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
                                    </div>

                                    <div class="col-md-4">
                                        <br>
                                        <button class="btn btn-success btn-sm" type="submit" name="s_h"><i class="fa fa-search"></i>&nbsp;ค้นหา</button>
                                        <input type="button" class="btn btn-danger btn-sm" value="Reset" onclick="window.location.href='index.php'" />
                                    </div>
                                </div>
                            </form>

                            <hr>


                            <div class="card-body">
                                <table class="table table-striped" id="mytable">
                                    <thead>
                                        <tr align="center">
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">รหัสนักศึกษา</th>
                                            <th scope="col">ชื่อ - นามสกุล</th>
                                            <th scope="col">แผนกวิชา</th>
                                            <th scope="col">ระดับ - ชั่น - กลุ่ม - เลขที่ </th>
                                            <th scope="col">รูปภาพ</th>
                                            <th scope="col">แก้ไขข้อมูล</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php

                                            include('../../connect.php');
                                            $sql = "SELECT * FROM tb_student as s 
                                    INNER JOIN tb_dep as d ON (s.dep_id=d.dep_id) 
                                    INNER JOIN tb_rank as r ON (s.rank_id=r.rank_id)
                                    INNER JOIN tb_schoolyear as y ON (s.year_id=y.year_id)
                                    WHERE d.dep_id = $dep_id";

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
                                        <tr align="center">
                                            <td><?php echo $num; ?></td>
                                            <td><?php echo $r['s_id']; ?></td>
                                            <td><?php echo $r['s_name'] . " - " . $r['s_lastname']; ?></td>
                                            <td><?php echo $r['dep_name']; ?></td>
                                            <td><?php echo $r['rank_name'] . "" . $dayyear . " กลุ่ม  " . $r['s_group'] . " เลขที่ " . $r['s_number']; ?></td>
                                            <td><?php echo "<img src='images/$r[s_img]' width='100px' height='100px'"; ?></td>
                                            <td>
                                                <input type="button" value="Edit" class="btn btn-warning btn-block" value="back" onclick="window.location.href='form_update.php?s_id=<?php echo $r['s_id'] ?>'" />
                                            </td>
                                        </tr>
                                <?php
                                                }
                                            }
                                ?>
                                </tr>
                                    </tbody>
                                </table>
                                <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>

                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#mytable').DataTable();
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>



</html>