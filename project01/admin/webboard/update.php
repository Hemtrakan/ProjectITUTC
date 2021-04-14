<?php
session_start(); 
include('../../connect.php');

$ext = pathinfo(basename($_FILES['img_id']['name']), PATHINFO_EXTENSION);
$new_image = 'img_new_' . uniqid() . "." . $ext;
$image_path = "images/";
$upload_path = $image_path . $new_image;

if ($ext == '') {
    $new_image = "NO_IMG.png";
}

$web_id = $_POST['web_id'];
$web_topic = $_POST['web_topic'];
$web_story = $_POST['web_story'];
$ID = $_SESSION['ID'];
$time = date('d-m-Y H:i:s');

if($_FILES['img_id']['tmp_name'] != ''){
    $sql = "update tb_webboard set
        web_story = '$web_story',
        web_topic = '$web_topic',
        ID = '$ID',
        img_id = '$new_image',
        time = NOW()
        where web_id = '" . $_GET["web_id"] . "' ";
}else{
    $sql = "update tb_webboard set
        web_story = '$web_story',
        web_topic = '$web_topic',
        ID = '$ID',
        time = NOW()
        where web_id = '" . $_GET["web_id"] . "' ";
}

/* echo $sql; exit(); */

if ($con->query($sql)) {
    if ($ext != '') {
        // move_uploaded_file($a_image_path, "image/" . $a_image);
        move_uploaded_file($_FILES['img_id']['tmp_name'], $upload_path);
    }
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข่าวประชาสัมพันธ์แล้ว');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
    } else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
    }
