<?php
include('../../connect.php');

$ext = pathinfo(basename($_FILES['t_img']['name']), PATHINFO_EXTENSION);
$new_image = 'img_' . uniqid() . "." . $ext;
$image_path = "images/";
$upload_path = $image_path . $new_image;

if ($ext == '') {
    $new_image = "human.png";
}
$t_id = $_POST['t_id'];
$t_pass = $_POST['t_pass'];
$t_name = $_POST['t_name'];
$t_lastname = $_POST['t_lastname'];
$t_tel = $_POST['t_tel'];
$dep_id = $_POST['dep_id'];

$sql = "insert into tb_teacher(
        t_id,
        t_pass,
        t_name,
        t_lastname,
        t_tel,
        dep_id,
        t_img) 
    values(
        '$t_id',
        '$t_pass',
        '$t_name',
        '$t_lastname',
        '$t_tel',
        '$dep_id',
        '$new_image')";

/* echo $sql; exit(); */

if ($con->query($sql)) {
    if ($ext != '') {

        move_uploaded_file($_FILES['t_img']['tmp_name'], $upload_path);
    }
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มรายชื่ออาจารย์สำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
}

    /* echo -$t_id;
    echo -$t_pass;
    echo -$t_name;
    echo -$t_lastname;
    echo -$t_tel;
    echo -$dep_id;
    exit(); */
