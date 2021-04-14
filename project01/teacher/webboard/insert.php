<?php
session_start();
include('../../connect.php');

$ext = pathinfo(basename($_FILES['img_id']['name']), PATHINFO_EXTENSION);
$new_image = 'img_new_' . uniqid() . "." . $ext;
$image_path = "../../admin/webboard/images/";
$upload_path = $image_path . $new_image;
if ($ext == '') {
    $new_image = "NO_IMG.png";
}
$web_id = $_POST['web_id'];
$web_topic = $_POST['web_topic'];
$web_story = $_POST['web_story'];
$time = date('d-m-Y H:i:s');
$dep_id = $_SESSION['dep_id'];



$sql = "INSERT into tb_webboard (web_id, web_topic, web_story, img_id, time, dep_id,ID)
        values (null,'$web_topic','$web_story','$new_image',NOW(),'$dep_id','2')";

if ($con->query($sql)) {
    if ($ext != '') {
        // move_uploaded_file($a_image_path, "image/" . $a_image);
        move_uploaded_file($_FILES['img_id']['tmp_name'], $upload_path);
    }
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข่าวประชาสัมพันธ์สำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
}
