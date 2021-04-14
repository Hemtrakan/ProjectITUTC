<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <title>เช็คแถว</title>
</head>

<body>


    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">เช็คแถว</h1>
                            <form action="check.php" name="s_h" method="post">
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
                                        <button class="btn btn-success btn-sm" type="submit" name="s_h"><i class="fa fa-search"></i>&nbsp;ค้นหา</button>
                                        <input type="button" class="btn btn-danger btn-sm" value="Reset" onclick="window.location.href='index.php'" />
                                    </div>
                                </div>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>



</html>