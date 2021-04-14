<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <title>เพิ่มภาคเรียน / ปีการศึกษาในการเช็คแถว
    </title>
</head>

<body>


    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">เพิ่มภาคเรียน / ปีการศึกษาในการเช็คแถว</h1>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <select name="term" class="form-control">
                                            <option value="">ภาคเรียน</option>
                                            <?php
                                            include('../../connect.php');
                                            $sql1 = "SELECT * from tb_term ORDER BY term_id ASC";
                                            $rs1 = $con->query($sql1);
                                            while ($r1 = $rs1->fetch_object()) {
                                            ?>
                                                <option value="<?= $r1->term_id ?>"><?= $r1->term_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <br>
                                        <select name="year" class="form-control">
                                            <option value="">ปีการศึกษา</option>
                                            <?php
                                            include('../../connect.php');
                                            $sql1 = "SELECT * from tb_schoolyear ORDER BY year_num DESC";
                                            $rs1 = $con->query($sql1);
                                            while ($r1 = $rs1->fetch_object()) {
                                            ?>
                                                <option value="<?= $r1->year_id ?>"><?= $r1->year_num; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <br>
                                        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="ค้นหา">
                                        <input type="button" name="submit" class="btn btn-success btn-sm" onclick="window.location.href='form_insert.php'" value="เพิ่มภาคเรียน / ปีการศึกษาในการเช็คแถว">
                                    </div>
                                </div>
                            </form>

                            <br>

                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr align="center">
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ปีการศึกษา/ภาคเรียน</th>
                                            <th scope="col">แก้ไข</th>
                                            <th scope="col">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php

                                            include('../../connect.php');
                                            $sql = "SELECT * FROM `tb_sum_check` as sc
                                            INNER JOIN tb_term as t ON sc.term_id = t.term_id
                                            INNER JOIN tb_schoolyear as s ON sc.year_id = s.year_id
                                            ";

                                            if (isset($_POST['term']) && $_POST['term'] != "") {
                                                // ต่อคำสั่ง sql 
                                                $sql .= "AND term_name LIKE '%" . ($_POST['term']) . "%'";
                                            }

                                            if (isset($_POST['year']) && $_POST['year'] != "") {
                                                // ต่อคำสั่ง sql 
                                                $sql .= " AND year_num LIKE '%" . ($_POST['year']) . "%'";
                                            }

                                            /* echo $sql; exit(); */
                                            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                            while ($r = mysqli_fetch_array($rs)) {
                                            ?>
                                                <?php $num++; ?>
                                        <tr align="center">
                                            <td><?php echo $num; ?></td>
                                            <td><?php echo $r['term_name'] . " ปีการศึกษา " . $r['year_num']; ?></td>
                                            <td>
                                                <input type="button" value="Edit" class="btn btn-warning btn-block" value="back" onclick="window.location.href='form_update.php?sc_id=<?php echo $r['sc_id'] ?>'" />
                                            </td>

                                            <td>
                                                <input type="button" value="Delete" class="btn btn-danger btn-block" value="back" onclick="window.location.href='form_delete.php?sc_id=<?php echo $r['sc_id'] ?>'" />
                                            </td>
                                        </tr>
                                    <?php
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
</body>



</html>