<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขข้อมูลนักเรียน-นักศึกษา</title>
</head>

<body>

    <?php
    include("nav.php");
    ?>
    <div class="content">
        <h3 align="center">แก้ไขข้อมูลนักเรียน-นักศึกษา</h3>
        <br>
        <form name="update" action="update.php?s_id=<?php echo $_GET["s_id"]; ?>" method="post" enctype="multipart/form-data">
            <?php
            include('../../connect.php');
            $sql = "SELECT * FROM tb_student as s 
        INNER JOIN tb_dep as d ON s.dep_id = d.dep_id
        INNER JOIN tb_rank as r ON s.rank_id = r.rank_id
        INNER JOIN tb_schoolyear as y ON s.year_id = y.year_id
         WHERE s_id = '" . $_GET["s_id"] . "' ";
            $rs = $con->query($sql);
            $r = $rs->fetch_array();
            ?>
            <table align="center">
                <tr>
                    <td align="right">รหัสนักศึกษา </td>
                    <td>
                        <?php echo $r['s_id']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">รหัสผ่าน : </td>
                    <td>
                        <input class="form-control"  type="text" name="s_pass" value="<?php echo $r['s_pass']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">ชื่อ : </td>
                    <td>
                        <input class="form-control" type="text" name="s_name" value="<?php echo $r['s_name']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">นามสกุล : </td>
                    <td>
                        <input class="form-control" type="text" name="s_lastname" value="<?php echo $r['s_lastname']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">เลขที่: </td>
                    <td>
                        <?php echo $r['s_number']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">แผนก : </td>
                    <td>
                        <?php echo $r['dep_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">กลุ่ม : </td>
                    <td>
                        <?php echo $r['s_group']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">ระดับการศึกษา : </td>
                    <td>
                        <?php echo $r['rank_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">ปีการศึกษา : </td>
                    <td>
                        <?php echo $r['year_num']; ?>
                    </td>
                </tr>

                <tr>
                    <td align="right">รูปภาพ : </td>
                    <td>
                        <?php echo "<img src='../../admin/student/images/$r[s_img]' width='100px' height='100px'"; ?>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input  type="file" name="s_img">
                    </td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <br>
                        <input class="btn btn-success btn-block" type="submit" name="ok" value="Edit">
                        <input type="button" class="btn btn-warning btn-block" value="back" onclick="window.location.href='index.php'" />
                        <input type="hidden" name="s_id" value="<?= $r['s_id']; ?>">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>


</html>