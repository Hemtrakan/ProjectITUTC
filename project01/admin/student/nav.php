<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    

    <title>navber</title>
</head>

<body>


    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../index.php"><i class="menu-icon fa fa-home"></i>หน้าแรก</a>
                    </li>

                    <li class="menu-title">การเช็คแถว</li>
                    <li>
                        <a href="../check/index.php"><i class="menu-icon fa fa-check-square-o"></i>เช็คแถว</a>
                    </li>
                    <li>
                        <a href="../checkactivity/index.php"><i class="menu-icon fa fa-check-square"></i>เช็คกิจกรรม</a>
                    </li>

                    <li class="menu-title">เมนูการจัดการข้อมูล</li><!-- /.menu-title -->
                    <li>
                        <a href="../teacher/index.php" class="active"> <i class="menu-icon fa fa-briefcase"></i>การจัดการข้อมูลอาจารย์</a>
                    </li>
                    <li>
                        <a href="../student/index.php"> <i class="menu-icon fa fa-book"></i>การจัดการข้อมูลนักเรียน</a>
                    </li>
                    <li>
                        <a href="../webboard/index.php"> <i class="menu-icon fa fa-table"></i>ข่าวประชาสัมพันธ์</a>
                    </li>


                    <!-- /.menu-title -->

                    <li class="menu-title">การประเมินกิจกรรม</li>
                    
                    <li>
                        <a href="../estimate.php"><i class="menu-icon fa fa-trophy"></i>ประเมินกิจกรรม (สรุปผล)</a>
                    </li>

                    <li class="menu-title">ตารางวันหยุด</li>
                    <li>
                        <a href="../holiday/index.php"> <i class="menu-icon fa fa-tasks"></i>จัดการวันหยุด</a>
                    </li>
                    <li>
                        <a href="../adddays/index.php"><i class="menu-icon fa fa-calendar-o"></i>+ วันเข้าแถว (พิเศษ)</a>
                    </li>

                    <li class="menu-title">จัดการภาคเรียนและปีการศึกษา</li>
                    <li>
                        <a href="../add_tb_check/index.php"><i class="menu-icon fa fa-plus-square-o"></i>เพิ่มเทอมในการเช็คแถว</a>
                    </li>


                    <li class="menu-title">ออกจากระบบ</li>
                    <li>
                        <a href="../Login/logout.php"> <i class="menu-icon fa fa-power-off"></i>ออกจากระบบ</a>
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
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไขข้อมูลส่วนตัว</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <?php
                    include('../../connect.php');
                    $sql = "SELECT * FROM login";
                    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                    $r = mysqli_fetch_array($rs)
                    ?>
                    <!-- Modal body -->
                    <div class="modal-body">
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
                                        Name :
                                    </td>
                                    <td>
                                        <input type="text" value="<?php echo $r['name']; ?>" name="name">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Username :
                                    </td>
                                    <td>
                                        <input type="text" value="<?php echo $r['username']; ?>" name="username">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Password :
                                    </td>
                                    <td>
                                        <input type="password" placeholder="*****" name="password" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ระดับการจัดการข้อมูล :
                                    </td>
                                    <td>
                                        <select name="level">
                                            <option value="">กรุณาเลือก</option>
                                            <option value="admin">admin</option>
                                            <option value="teacher">teacher</option>
                                        </select>
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

        

</body>

</html>