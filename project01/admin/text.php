<?php
/* header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$conn = new mysqli("localhost", "root", "12345678", "project01");
$stmt = $conn->prepare("SELECT * FROM tb_student as s 
INNER JOIN tb_dep as d ON s.dep_id=d.dep_id
INNER JOIN tb_rank as r ON s.rank_id=r.rank_id
INNER JOIN tb_schoolyear as y ON s.year_id=y.year_id");
$stmt->bind_param("ss", $obj->table, $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp); */


echo "<script type='text/javascript'>";
        echo "alert('แก้ไขตารางในการเช็คกิจกรรมเข้าแถวเรียบร้อย');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
