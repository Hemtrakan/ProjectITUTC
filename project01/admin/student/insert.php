<?php
include('../../connect.php');
$ext = pathinfo(basename($_FILES['s_img']['name']), PATHINFO_EXTENSION);
$new_image = 'img_' . uniqid() . "." . $ext;
$image_path = "images/";
$upload_path = $image_path . $new_image;

if ($ext == '') {
    $new_image = "human.png";
}

$s_id = $_POST['s_id'];
$s_pass = $_POST['s_pass'];
$s_name = $_POST['s_name'];
$s_lastname = $_POST['s_lastname'];
$s_number = $_POST['s_number'];
$dep_id = $_POST['dep_id'];
$s_group = $_POST['s_group'];
$rank_id = $_POST['rank_id'];
$year_id = $_POST['year_id'];

$sql = "insert into tb_student (s_id,s_pass,s_name,s_lastname,s_number,dep_id,s_group,rank_id,year_id,s_img)
    values('$s_id','$s_pass','$s_name','$s_lastname','$s_number','$dep_id','$s_group','$rank_id','$year_id','$new_image')";



if ($con->query($sql)) {
    if ($ext != '') {
        // move_uploaded_file($a_image_path, "image/" . $a_image);
        move_uploaded_file($_FILES['s_img']['tmp_name'], $upload_path);
    }
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มรายชื่อนักศึกษาสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    header("ไม่สามารถเพิ่มข้อมูลได้");
}

    /* echo -$s_id;
    echo -$s_pass;
    echo -$s_name;
    echo -$s_lastname;
    echo -$s_number;
    echo -$dep_id;
    echo -$s_group;
    echo -$rank_id;
    echo -$s_level;
    echo -$year_id;
    exit(); */
