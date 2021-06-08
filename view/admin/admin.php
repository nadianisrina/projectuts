<?php
include "../../model/data.php";
$db=new data();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">McD</a>
                </div>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="assets/img/find_user.png" class="img-responsive" />
                     
                    </li>


                    <li>
                        <a href="../../index.php"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-image: url('images/bg-01.jpg');">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Admin Dashboard</h1>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <h3>Table  User</h3>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($db->viewuser() as $a){
                                ?>
                                <tr>
                                    <td><?php echo $a ['nomor'] ?></td>
                                    <td><?php echo $a ['nama'] ?></td>
                                    <td><?php echo $a ['password'] ?></td>
                                    <td>
                                        <a href="../edituser.php?nomor=<?php echo $a ['nomor'] ?>" class="btn btn-primary btn-lg btn-block ">Edit</a>
                                        <a href="../../controller/proses.php?aksi=delete_user&nomor=<?php echo $a['nomor'] ?>" class="btn btn-danger btn-lg btn-block mt-2r">Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-6">
                        <h3>Table  Order</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pesanan</th>
                                        <th>Note</th>
                                        <th>Jumlah</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($db->vieworder() as $b){
                                ?>
                                <tr>
                                    <td><?php echo $b ['no'] ?></td>
                                    <td><?php echo $b ['nama'] ?></td>
                                    <td><?php echo $b ['note'] ?></td>
                                    <td><?php echo $b ['jumlah'] ?><desc> pcs</desc></td>
                                    <td><?php echo $b ['alamat'] ?></td>
                                    <td>
                                    <a href="../editorder.php?no=<?php echo $b ['no'] ?>" class="btn btn-primary btn-lg btn-block ">Edit</a>
                                    <a href="../../controller/proses.php?aksi=delete_order&no=<?php echo $b['no'] ?>" class="btn btn-success btn-lg btn-block mt-2r">Hapus/<br>Selesai</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>