<?php
session_start();

$ID = $_SESSION['ID'];
$name = $_SESSION['name'];
$level = $_SESSION['level'];
if ($level != 'admin') {
  Header("Location: Login/logout.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <style>
    #weatherWidget .currentDesc {
      color: #ffffff !important;
    }

    .traffic-chart {
      min-height: 335px;
    }

    #flotPie1 {
      height: 150px;
    }

    #flotPie1 td {
      padding: 3px;
    }

    #flotPie1 table {
      top: 20px !important;
      right: -10px !important;
    }

    .chart-container {
      display: table;
      min-width: 270px;
      text-align: left;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    #flotLine5 {
      height: 105px;
    }

    #flotBarChart {
      height: 150px;
    }

    #cellPaiChart {
      height: 160px;
    }
  </style>

  <title>หน้าแรก</title>

</head>

<body>
  <?php
  include("nav.php");
  ?>
  <!-- แผนกวิชา -->
  <div class="content">
    <div class="animated fadeIn">
      <h4 class="heading-title mt-5 mb-3 text-secondary">แผนกวิชา, ปีการศึกษา, ระดับการศึกษา, ภาคเรียน</h4>
      <div class="row">
        <div class="col-sm-6">
          <section class="card">
            <div class="card-body text-secondary">
              <strong class="card-title">แผนกวิชา
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Dep">
                  เพิ่มแผนกวิชา
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="Dep">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">เพิ่มแผนกวิชา</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="insert.php" name="dep" id="dep">
                          กรุณากรอกชื่อแผนก : <input type="text" name="dep_name" placeholder=" เช่น : เทคโนโลยีสารสนเทศ">
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <input class="btn btn-success" type="submit" name="dep" value="Insert">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            </strong>
            <div class="card-body">
              <table class="table table-striped table-bordered" id="mytable">
                <thead class="thead-dark">
                  <tr align="center" class="text-white">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">แผนกวิชา</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include('../connect.php');
                  $sql = "SELECT * FROM tb_dep ORDER BY dep_name ASC";
                  $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                  while ($r = mysqli_fetch_array($rs)) {
                  ?>
                    <?php @$num++; ?>
                    <tr align="center">
                      <td><?php echo $num; ?></td>
                      <td><?php echo $r['dep_name']; ?></td>
                      <td>
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#Dep1">
                          Delete
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="Dep1">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">ลบแผนกวิชา</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                ชื่อแผนกวิชา : <input type="text" value="<?php echo $r['dep_name'] ?>" disabled>
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <input type="button" value="Delete" class="btn btn-danger" value="back" onclick="window.location.href='delete.php?dep_id=<?php echo $r['dep_id'] ?>'" />
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>
              <script type="text/javascript">
                $(document).ready(function() {
                  $('#mytable').DataTable();
                });
              </script>

            </div>
          </section>
        </div>

        <!-- ระดับการศึกษา -->
        <div class="col-sm-6">
          <section class="card">
            <div class="card-body text-secondary">
              <strong class="card-title">ระดับการศึกษา
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rank">
                  เพิ่มระดับการศึกษา
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="rank">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">เพิ่มระดับการศึกษา</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="insert.php" name="rank" id="rank">
                          กรุณากรอกระดับการศึกษา : <input type="text" name="rank_name" placeholder=" เช่น : ปวช - ปวส ">
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <input class="btn btn-success" type="submit" name="rank" value="Insert">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            </strong>

            <div class="card-body">
              <table class="table table-striped table-bordered" id="mytable1">
                <thead class="thead-dark">
                  <tr align="center" class="text-white">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">ระดับการศึกษา</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include('../connect.php');
                  $sql = "SELECT * FROM tb_rank ORDER BY rank_id ASC";
                  $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                  while ($r = mysqli_fetch_array($rs)) {
                  ?>
                    <?php @$num2++; ?>
                    <tr align="center">
                      <td><?php echo $num2; ?></td>
                      <td><?php echo $r['rank_name']; ?></td>
                      <td>
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#rank1">
                          Delete
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="rank1">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">ลบระดับการศึกษา</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                ระดับการศึกษา : <input type="text" value="<?php echo $r['rank_name'] ?>" disabled>
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <input type="button" value="Delete" class="btn btn-danger" onclick="window.location.href='delete.php?rank_id=<?php echo $r['rank_id'] ?>'" />
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>


              <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>
              <script type="text/javascript">
                $(document).ready(function() {
                  $('#mytable1').DataTable();
                });
              </script>
            </div>
          </section>
        </div>
      </div>
    </div>


    <!-- ปีการศึกษา -->
    <div class="row">
      <div class="col-sm-6">
        <section class="card">
          <div class="card-body text-secondary">
            <strong class="card-title">ปีการศึกษา
              <!-- Button to Open the Modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#year">
                เพิ่มปีการศึกษา
              </button>

              <!-- The Modal -->
              <div class="modal fade" id="year">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">เพิ่มปีการศึกษา</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form action="insert.php" name="year" id="year">
                        กรุณากรอกปีการศึกษา : <input type="text" name="year_num" placeholder=" เช่น 2560 - 2562">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <input class="btn btn-success" type="submit" name="year" value="Insert">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          </strong>

          <div class="card-body">
            <table class="table table-striped table-bordered" id="mytable2">
              <thead class="thead-dark">
                <tr align="center" class="text-white">
                  <th scope="col">ลำดับ</th>
                  <th scope="col">ปีการศึกษา</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include('../connect.php');
                $sql = "SELECT * FROM tb_schoolyear ORDER BY year_num ASC";
                $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                while ($r = mysqli_fetch_array($rs)) {
                ?>
                  <?php @$num3++; ?>
                  <tr align="center">
                    <td><?php echo $num3; ?></td>
                    <td><?php echo $r['year_num']; ?></td>
                    <td>
                      <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#year1">
                        Delete
                      </button>

                      <!-- The Modal -->
                      <div class="modal fade" id="year1">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">เพิ่มปีการศึกษา</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                              ปีการศึกษา : <input type="text" value="<?php echo $r['year_num'] ?>" disabled>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <input type="button" value="Delete" class="btn btn-danger" value="back" onclick="window.location.href='delete.php?year_id=<?php echo $r['year_id'] ?>'" />
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>

            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>

            <script type="text/javascript">
              $(document).ready(function() {
                $('#mytable2').DataTable();
              });
            </script>
          </div>
        </section>
      </div>


      <!-- ภาคเรียน -->
      <div class="col-sm-6">
        <section class="card">
          <div class="card-body text-secondary">
            <strong class="card-title">ภาคเรียน </strong>
          </div>

          <div class="card-body">
            <table class="table table-striped table-bordered" id="mytable3">
              <thead class="thead-dark">
                <tr align="center" class="text-white">
                  <th scope="col">ลำดับ</th>
                  <th scope="col">ภาคเรียน</th>

                </tr>
              </thead>
              <tbody>
                <?php
                include('../connect.php');
                $sql = "SELECT * FROM tb_term ORDER BY term_name ASC";
                $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                while ($r = mysqli_fetch_array($rs)) {
                ?>
                  <?php @$num4++; ?>
                  <tr align="center">
                    <td><?php echo $num4; ?></td>
                    <td><?php echo $r['term_name']; ?></td>

                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>

            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>

            <script type="text/javascript">
              $(document).ready(function() {
                $('#mytable3').DataTable();
              });
            </script>
          </div>
        </section>
      </div>
    </div>

</body>

</html>