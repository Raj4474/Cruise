<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
// check_login();
$aid=$_SESSION['a_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Transport Management System Transport Saccos, Matatu Industry">
  <meta name="author" content="MartDevelopers">

  <title>Cruise Management System - Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
  <!--Start Navigation Bar-->
  <?php include("vendor/inc/nav.php"); ?>
  <!--Navigation Bar-->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("vendor/inc/sidebar.php"); ?>
    <!--End Sidebar-->
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-users"></i>
                </div>
                <?php
                //code for summing up number of users 
                $result = "SELECT * FROM users";
                $stmt = mysqli_query($conn, $result);
                $user = mysqli_num_rows($stmt);
                ?>
                <div class="mr-5"><span class="badge badge-danger"><?php echo $user; ?></span> Users</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="admin-view-user.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-id-card"></i>
                </div>
                <?php
                //code for summing up number of drivers
                $result = "SELECT * FROM cruises";
                $stmt = mysqli_query($conn, $result);
                $cruise = mysqli_num_rows($stmt);
                ?>
                <div class="mr-5"><span class="badge badge-danger"><?php echo $cruise; ?></span> Cruises</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="admin-view-cruise.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-bus"></i>
                </div>
                <?php
                //code for summing up number of vehicles
                $result = "SELECT * FROM `ships`";
                $stmt = mysqli_query($conn, $result);
                $ships = mysqli_num_rows($stmt);
                ?>
                <div class="mr-5"><span class="badge badge-danger"><?= $ships; ?></span> Ships</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="admin-view-ship.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-address-book"></i>
                </div>
                <?php
                //code for summing up number of booking 
                $result = "SELECT * FROM `message`";
                $stmt = mysqli_query($conn, $result);
                $msgs = mysqli_num_rows($stmt);
                ?>
                <div class="mr-5"><span class="badge badge-danger"><?php echo $msgs; ?></span> Message</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="admin-view-feedback.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        <!--Bookings-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Bookings
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Check in</th>
                    <th>Check Out</th>
                  </tr>
                </thead>

                <tbody>
                  <?php

                  $ret = "SELECT * FROM `book`";
                  $data = mysqli_query($conn, $ret);
                  $total = mysqli_num_rows($data);
                  if ($total > 0) {
                    $cnt = 1;
                    while ($row = mysqli_fetch_assoc($data)) {
                      $uid = $row['u_id'];
                      $r1 = "select * from `users` where u_id = $uid";
                      $res = mysqli_query($conn, $r1);
                      $d1 = mysqli_fetch_assoc($res);
                  ?>
                      <tr>
                        <td><?= $cnt; ?></td>
                        <td><?= $d1['u_fname'] . " " . $d1['u_lname']; ?></td>
                        <td><?= $d1['u_phone']; ?></td>
                        <td><?= $d1['u_email']; ?></td>
                        <td><?= $row['b_in']; ?></td>
                        <td><?= $row['b_out']; ?></td>
                      </tr>
                  <?php
                      $cnt = $cnt + 1;
                    }
                  } else {
                    echo '<p class="empty">no booking added yet!</p>';
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            <?php
            date_default_timezone_set("Africa/Nairobi");
            echo "Generated : " . date("h:i:sa");
            ?>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include("vendor/inc/footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="admin-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>

</body>

</html>