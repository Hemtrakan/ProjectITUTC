<?php
include('session.php');
$t_id = $_SESSION['t_id'];
$t_name = $_SESSION['t_name'];
$t_lastname =  $_SESSION["t_lastname"];
$t_tel =  $_SESSION['t_tel'];
$dep_id = $_SESSION['dep_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้ลมูลส่วนตัว</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="content">
        <h3 align="center">แก้ไขข้ลมูลส่วนตัว</h3>
        <br>
        <form name="update" action="update.php?t_id=<?php echo $t_id; ?>" method="post" enctype="multipart/form-data">
            <?php
            $sql = "SELECT * FROM tb_teacher as t
            INNER JOIN tb_dep as d ON t.dep_id = d.dep_id
             WHERE t_id = '$t_id' ";
            $rs = $con->query($sql);
            $r = $rs->fetch_array();
            ?>
            <table align="center">
                <tr>
                    <td align="right">รหัสประจำตัวครู-อาจารย์ : </td>
                    <td>
                        <?php echo $r['t_id']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">รหัสผ่าน : </td>
                    <td>
                        <input class="form-control" type="text" name="t_pass" value="<?php echo $r['t_pass']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">ชื่อ : </td>
                    <td>
                        <input class="form-control" type="text" name="t_name" value="<?php echo $r['t_name']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">นามสกุล : </td>
                    <td>
                        <input class="form-control" type="text" name="t_lastname" value="<?php echo $r['t_lastname']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">เบอร์โทร: </td>
                    <td>
                        <input class="form-control" type="number" name="t_tel" value="<?php echo $r['t_tel']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">แผนก : </td>
                    <td>
                        <input class="form-control" type="text" name="t_tel" value="<?php echo $r['dep_name']; ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td align="right">รูปภาพ : </td>
                    <td>
                        <?php echo "<img src='../admin/teacher/images/$r[t_img]' width='100px' height='100px'"; ?>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="file" name="t_img">
                    </td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <br>
                        <input class="btn btn-success btn-block" type="submit" name="ok" value="Edit">
                        <input type="button" class="btn btn-warning btn-block" value="back" onclick="window.location.href='index.php'" />
                        <input type="hidden" name="t_id" value="<?= $r->t_id; ?>">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>