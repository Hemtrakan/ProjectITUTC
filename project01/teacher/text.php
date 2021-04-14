<?php
include('../connect.php');
$sql = "SELECT * FROM `tb_sum_check` as sc
                                            INNER JOIN tb_term as t ON sc.term_id = t.term_id
                                            INNER JOIN tb_schoolyear as s ON sc.year_id = s.year_id 
                                            ORDER BY sc_id DESC";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($r = mysqli_fetch_array($rs)) {
    $year_term = $r['year_num'] . "_" . $r['term_id'];
?>

    <?php echo $year_term?>
                                            <?php } ?>