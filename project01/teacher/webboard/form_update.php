<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขข้อมูลข่าวประชาสัมพันธ์</title>
</head>

<body>

    <?php
    include("nav.php");
    ?>
    <div class="content">
        <h3 align="center">ข้อมูลเพิ่มเติม</h3>
        <br>
        <form name="update" action="update.php?web_id=<?php echo $_GET["web_id"]; ?>" method="post" enctype="multipart/form-data">
            <?php
            include('../../connect.php');
            $sql = "select * from tb_webboard where web_id = '" . $_GET["web_id"] . "' ";
            $rs = $con->query($sql);
            $r = $rs->fetch_assoc();
            if (!$rs) {
                echo "Not found web_id=" . $_GET["web_id"];
            } else {
            }
            ?>
            <table align="center">
                <tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label>หัวข้อ :</label>
                            <textarea class="form-control" rows="1" name="web_topic" id="comment"><?php echo $r['web_topic']; ?></textarea>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label>เนื้อหา :</label>
                            <textarea class="form-control" rows="5" name="web_story" id="comment"><?php echo $r['web_story']; ?></textarea>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td align="right">รูปภาพเดิม : </td>
                    <td>
                        <?php
                        echo "<img src='../../admin/webboard/images/$r[img_id]' width='100px' height='100px'> ";
                        ?>
                        เพิ่มรูปภาพใหม่ : <input type="file" name="img_id" />
                    </td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <br>
                        <input class="btn btn-success btn-block" type="submit" name="ok" value="Edit">
                        <input type="button" class="btn btn-warning btn-block" value="back" onclick="window.location.href='index.php'" />
                        <input type="hidden" name="web_id" value="<?= $r->web_id; ?>">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>