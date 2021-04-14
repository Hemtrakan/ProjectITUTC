<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <title>navber</title>
</head>

<body>


    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"><i class="menu-icon fa fa-home"></i>หน้าแรก</a>
                    </li>

                    <li class="menu-title">การเช็คแถว</li>
                    <li>
                        <a href="check/index.php"><i class="menu-icon fa fa-check-square-o"></i>การเช็คกิจกรรมเข้าแถว</a>
                    </li>
                    <li>
                        <a href="checkactivity/index.php"><i class="menu-icon fa fa-check-square"></i>การเช็คกิจกรรม</a>
                    </li>

                    <li class="menu-title">เมนูการจัดการข้อมูล</li><!-- /.menu-title -->
                    <li>
                        <a href="teacher/index.php" class="active"> <i class="menu-icon fa fa-briefcase"></i>จัดการข้อมูลอาจารย์</a>
                    </li>
                    <li>
                        <a href="student/index.php"> <i class="menu-icon fa fa-book"></i>จัดการข้อมูลนักเรียน</a>
                    </li>
                    <li>
                        <a href="webboard/index.php"> <i class="menu-icon fa fa-table"></i>จัดการข่าวประชาสัมพันธ์</a>
                    </li>


                    <!-- /.menu-title -->

                    <li class="menu-title">การประเมินกิจกรรม</li>

                    <li>
                        <a href="estimate.php"><i class="menu-icon fa fa-trophy"></i>ประเมินกิจกรรม (สรุปผล)</a>
                    </li>

                    <li class="menu-title">จัดการวันหยุดและกิจกรรม (พิเศษ)</li>
                    <li>
                        <a href="holiday/index.php"> <i class="menu-icon fa fa-tasks"></i>จัดการวันหยุด</a>
                    </li>
                    <li>
                        <a href="adddays/index.php"><i class="menu-icon fa fa-calendar-o"></i>จัดการกิจกรรม (พิเศษ)</a>
                    </li>

                    <li class="menu-title">จัดการภาคเรียนและปีการศึกษา</li>
                    <li>
                        <a href="add_tb_check/index.php"><i class="menu-icon fa fa-plus-square-o"></i>เพิ่มเทอมในการเช็คแถว</a>
                    </li>


                    <li class="menu-title">ออกจากระบบ</li>
                    <li>
                        <a herf="" data-toggle="modal" data-target="#myModal">
                            แก้ไขข้อมูลส่วนตัว
                            <i class="menu-icon fa fa-gears">
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="Login/logout.php"> <i class="menu-icon fa fa-power-off"></i>ออกจากระบบ</a>
                        <ul class="sub-menu children dropdown-menu">
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.jpg" width="15%" height="15%" alt="Logo"> Admin</a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <br>


                </div>
            </div>
        </header>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header modal-lg">
                        <h4 class="modal-title">แก้ไขข้อมูลส่วนตัว</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <?php
                    include('../connect.php');
                    $sql = "SELECT * FROM login";
                    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                    $r = mysqli_fetch_array($rs)
                    ?>
                    <!-- Modal body -->
                    <div class="modal-body ">
                        <form action="update.php" name="update" method="post" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>
                                        <br>
                                        <?php echo "<img src='images/$r[login_img]' width='100px' height='100px'"; ?>
                                    </td>
                                    <td>
                                        <input type="file" name="login_img">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ชื่อผู้ดูแลระบบ :
                                    </td>
                                    <td>
                                        <input type="text"  value="<?php echo $r['name']; ?>" name="name">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ชื่อผู้ใช้งาน :
                                    </td>
                                    <td>
                                        <input type="text"  value="<?php echo $r['username']; ?>" name="username">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        รหัสผ่านเดิม :
                                    </td>
                                    <td>
                                        <input type="password"  placeholder="*****" name="password1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        รหัสผ่านใหม่ :
                                    </td>
                                    <td>
                                        <input type="password"  placeholder="*****" name="password2">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ยืนยันรหัสผ่าน :
                                    </td>
                                    <td>
                                        <input type="password"  placeholder="*****" name="password3">
                                    </td>
                                </tr>
                            </table>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-warning" value="Edit">
                        <input type="hidden" name="ID" value="<?= $r['ID']; ?>">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#header -->

        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>

        <!--  Chart js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

        <!--Chartist Chart-->
        <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
        <script src="assets/js/init/weather-init.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>

</body>

</html>