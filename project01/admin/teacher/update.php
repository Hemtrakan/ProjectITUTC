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

if ($_FILES['t_img']['tmp_name'] != '') {
    $sql = "UPDATE tb_teacher SET 
    t_name = '$t_name',
    t_lastname = '$t_lastname',
    t_tel = '$t_tel',
    dep_id = '$dep_id',
    t_pass = '$t_pass',
    t_img = '$new_image'
    WHERE t_id = '" . $_GET["t_id"] . "'";
} else {
    $sql = "UPDATE tb_teacher SET 
    t_name = '$t_name',
    t_lastname = '$t_lastname',
    t_tel = '$t_tel',
    dep_id = '$dep_id',
    t_pass = '$t_pass' 
    WHERE t_id = '" . $_GET["t_id"] . "'";
}

if ($con->query($sql)) {
    if ($ext != '') {
        // move_uploaded_file($a_image_path, "image/" . $a_image);
        move_uploaded_file($_FILES['t_img']['tmp_name'], $upload_path);
    }
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขรายชื่ออาจารย์สำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
}
        
    /* echo "รหัสนักศึกษา : ";
    echo $t_id; 
    echo " รหัสผ่าน : ";
    echo $t_pass; 
    echo " ชื่อ : ";
    echo $t_name;
    echo " นามสุกล : ";
    echo $t_lastname;
    echo " เลขที่ : ";
    echo $t_tel;
    echo " แผนก : ";
    echo $dep_id;
    exit(); */
