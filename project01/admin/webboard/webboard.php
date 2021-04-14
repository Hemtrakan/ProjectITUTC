<?php
include("session.php");
$ID = $_SESSION['ID'];
$name = $_SESSION['name'];
$level = $_SESSION['level'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css" />


    <title>Webboard</title>
</head>

<body>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">ข่าวประชาสัมพันธ์</h1>
                            <h5 align="center">
                                <a href="form_insert.php"><i class="fa fa-plus"></i>&nbsp;เพิ่มข่าวประชาสัมพันธ์</a>
                            </h5>
                            <table class="table table-striped" id="mytable">
                                <thead>
                                    <tr align="center">
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">รูปภาพ</th>
                                        <th scope="col">หัวข้อข่าว</th>
                                        <th scope="col">ผู้โพสข่าว</th>
                                        <th scope="col">แผนกวิชา</th>
                                        <th scope="col">วันที่</th>
                                        <th scope="col">ดูข้อมูลเพิ่มเติม</th>
                                        <th scope="col">ลบข้อมูล</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tb_webboard AS w
                                    LEFT JOIN tb_dep as d ON  w.dep_id =d.dep_id";
                                    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                                    while ($r = mysqli_fetch_array($rs)) {
                                        @$num++;
                                    ?>
                                        <tr align="center">
                                            <td>
                                                <?php echo $num; ?>
                                            </td>
                                            <td><?php
                                                echo "<img src='images/$r[img_id]' width='100px' height='100px'";
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $r['web_topic']; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($r['dep_id'] != "1") {
                                                    echo "งานกิจกรรม";
                                                } else {
                                                    echo "อาจารย์";
                                                } ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($r['dep_id'] == "0") {
                                                    echo "งานกิจกรรม";
                                                } else {
                                                    echo $r['dep_name'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $r['time']; ?>
                                            </td>
                                            <td>
                                                <input type="button" value="Edit" class="btn btn-warning btn-block" onclick="window.location.href='form_update.php?web_id=<?php echo $r['web_id'] ?>'" />
                                            </td>

                                            <td>
                                                <input type="button" value="Delete" class="btn btn-danger btn-block" onclick="window.location.href='form_delete.php?web_id=<?php echo $r['web_id'] ?>'" />
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                </tabel>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
</script>

</html>