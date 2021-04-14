<?php
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข่าวประชาสัมพันธ์</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="content">
        <div align="center">
            <h1>เพิ่มข่าวประชาสัมพันธ์</h1>
        </div>
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <table align="center">
                <br>
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label>หัวข้อ :</label>
                            <textarea class="form-control" rows="1" name="web_topic" id="comment"></textarea>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label>เนื้อหา :</label>
                            <textarea class="form-control" rows="5" name="web_story" id="comment"></textarea>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td align="right">เพิ่มรูปภาพ : </td>
                    <td>
                        <input type="file" name="img_id">
                    </td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <br>
                        <input class="btn btn-success btn-block" type="submit" name="ok" value="Insert">
                        <input class="btn btn-danger btn-block" type="reset" name="reset" value="Reset">
                        <input type="button" class="btn btn-warning btn-block" value="back" onclick="window.location.href='index.php'" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>