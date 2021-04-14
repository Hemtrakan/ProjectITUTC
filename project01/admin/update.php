<?php
include('../connect.php');

$ext = pathinfo(basename($_FILES['login_img']['name']), PATHINFO_EXTENSION);
$new_image = 'img_' . uniqid() . "." . $ext;
$image_path = "images/";
$upload_path = $image_path . $new_image;

if ($ext == '') {
    $new_image = "human.png";
}

$ID = $_POST['ID'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

if ($_FILES['login_img']['tmp_name'] != '') {
    $sql = "update login set
    name = '$name',
    username = '$username',
    password = '$password',
    login_img = '$new_image'
    where ID = $ID ";
} else {
    $sql = "update login set
    name = '$name',
    username = '$username',
    password = '$password'
    where ID = $ID ";
}


if ($con->query($sql)) {
    if ($ext != '') {
        // move_uploaded_file($a_image_path, "image/" . $a_image);
        move_uploaded_file($_FILES['login_img']['tmp_name'], $upload_path);
    }
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข้อมูลส่วนตัวสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
}
