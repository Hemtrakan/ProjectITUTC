<?php
include('../../connect.php');

$ext = pathinfo(basename($_FILES['s_img']['name']), PATHINFO_EXTENSION);
$new_image = 'img_' . uniqid() . "." . $ext;
$image_path = "../../admin/student/images/";
$upload_path = $image_path . $new_image;

if ($ext == '') {
    $new_image = "human.png";
}

/* echo $_FILES['s_img']['tmp_name']; exit(); */

$s_id = $_POST['s_id'];
$s_pass = $_POST['s_pass'];
$s_name = $_POST['s_name'];
$s_lastname = $_POST['s_lastname'];
$s_number = $_POST['s_number'];
$dep_id = $_POST['dep_id'];
$s_group = $_POST['s_group'];
$rank_id = $_POST['rank_id'];
$s_level = $_POST['s_level'];
$year_id = $_POST['year_id'];

if ($_FILES['s_img']['tmp_name'] != '') {
    $sql = "UPDATE tb_student set
    s_pass = '$s_pass',
    s_name = '$s_name',
    s_lastname = '$s_lastname'
    where s_id = '" . $_GET["s_id"] . "' ";
} else {
    $sql = "UPDATE tb_student set
    s_pass = '$s_pass',
    s_name = '$s_name',
    s_lastname = '$s_lastname'
    where s_id = '" . $_GET["s_id"] . "' ";
}

/* echo "รหัสนักศึกษา : ";
    echo $s_id; 
    echo " รหัสผ่าน : ";
    echo $s_pass; 
    echo " ชื่อ : ";
    echo $s_name;
    echo " นามสุกล : ";
    echo $s_lastname;
    echo " เลขที่ : ";
    echo $s_number;
    echo " แผนก : ";
    echo $dep_id;
    echo " กลุ่มที่ : ";
    echo $s_group;
    echo " ชั่นปี : ";
    echo $rank_id;
    echo " ระดับชั่น : ";
    echo $s_level;
    echo " ปีการศึกษา : ";
    echo $year_id;
    exit(); */

/* echo $sql; exit(); */

if ($con->query($sql)) {
    if ($ext != '') {
        // move_uploaded_file($a_image_path, "image/" . $a_image);
        move_uploaded_file($_FILES['s_img']['tmp_name'], $upload_path);
    }
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขรายชื่อนักศึกษาสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('ไม่สามารถแก้ไขรายชื่อได้');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
}
