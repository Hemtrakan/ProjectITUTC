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

<?php
include("nav.php");
?>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">เพิ่มภาคเรียน / ปีการศึกษาในการเช็คแถว</h1>

                            <form action="insert.php" method="post">
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
                                        <input type="submit" name="submit" class="btn btn-success btn-sm"  value="เพิ่มภาคเรียน / ปีการศึกษาในการเช็คแถว"><span></span>
                                        <input type="button" class="btn btn-danger btn-sm" value="back" onclick="window.location.href='index.php'" />
                                    </div>
                                </div>
                            </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>



</html>