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
                            <h1 class="card-title">รายชื่อครู-อาจารย์</h1>
                            <form action="" name="s_h" method="get">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <select name="dep" class="form-control">
                                            <option value="">แผนก</option>
                                            <?php
                                            include('../../connect.php');
                                            $sql1 = "SELECT * from tb_dep ORDER BY dep_id ASC";
                                            $rs1 = $con->query($sql1);
                                            while ($r1 = $rs1->fetch_object()) {
                                            ?>
                                                <option value="<?= $r1->dep_name ?>" <?php
                                                                                        if ($_POST['dep'] == $r1->dep_name) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>><?= $r1->dep_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <a href="form_insert.php"><i class="fa fa-plus"></i>&nbsp;เพิ่มรายชื่อครู - อาจารย์</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <button class="btn btn-success btn-sm" type="submit" name="s_h"><i class="fa fa-search"></i>&nbsp;ค้นหา</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="mytable">
                            <thead>
                                <tr align="center">
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อผู้ใช้งาน</th>
                                    <th scope="col">รหัสผ่าน</th>
                                    <th scope="col">ชื่อ</th>
                                    <th scope="col">นามสกุล</th>
                                    <th scope="col">เบอร์โทร</th>
                                    <th scope="col">แผนกวิชา</th>
                                    <th scope="col">รูปภาพ</th>
                                    <th scope="col">แก้ไขข้อมูล</th>
                                    <th scope="col">ลบข้อมูล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    include('../../connect.php');
                                    $sql = "SELECT t.*,d.dep_name FROM tb_teacher as t
                                    INNER JOIN tb_dep as d ON (t.dep_id=d.dep_id)";


                                    if (isset($_GET['dep']) && $_GET['dep'] != "") {
                                        // ต่อคำสั่ง sql 
                                        $sql .= "AND dep_name LIKE '%" . trim($_GET['dep']) . "%'";
                                    }


                                    /* echo $sql; exit(); */
                                    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                    while ($r = mysqli_fetch_array($rs)) {
                                    ?>
                                        <?php $num++; ?>
                                <tr align="center">
                                    <td><?php echo $num; ?></td>
                                    <td><?php echo $r['t_id']; ?></td>
                                    <td><?php echo $r['t_pass']; ?></td>
                                    <td><?php echo $r['t_name']; ?></td>
                                    <td><?php echo $r['t_lastname']; ?></td>
                                    <td><?php echo $r['t_tel']; ?></td>
                                    <td><?php echo $r['dep_name']; ?></td>
                                    <td><?php echo "<img src='images/$r[t_img]' width='100px' height='100px'"; ?></td>
                                    <td>
                                        <input type="button" value="Edit" class="btn btn-warning btn-block" onclick="window.location.href='form_update.php?t_id=<?php echo $r['t_id'] ?>'" />
                                    </td>

                                    <td>
                                        <input type="button" value="Delete" class="btn btn-danger btn-block" onclick="window.location.href='form_delete.php?t_id=<?php echo $r['t_id'] ?>'" />
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