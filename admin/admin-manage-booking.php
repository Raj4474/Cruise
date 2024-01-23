<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid=$_SESSION['a_id'];
    if(isset($_GET['b_id']))
      {
              $b_id = $_GET['b_id'];
              $ret="DELETE FROM book where b_id = $b_id"; 
              $stmt = mysqli_query($conn, $ret);
                  if($stmt)
                  {
                      $succ = "Booking Deleted";
                      header("location:admin-manage-booking.php");
                  }
                  else 
                  {
                      $err = "Please Try Again Later";
                  }
              }
  ?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php'); ?>

<body id="page-top">
<?php if(isset($succ)) {?>
                        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Success!","<?php echo $succ;?>!","success");
                    },
                        100);
        </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Failed!","<?php echo $err;?>!","Failed");
                    },
                        100);
        </script>

        <?php } ?>


  <?php include("vendor/inc/nav.php"); ?>


  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('vendor/inc/sidebar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Bookings</a>
          </li>
          <li class="breadcrumb-item active">View </li>
        </ol>

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
                    <th>Cruise Name</th>
                    <th>Action</th>
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
                        <td><?= $row['c_name']; ?></td>
                        <td>
                          <a href="admin-manage-booking.php?b_id=<?= $row['b_id'] ?>" class="badge badge-danger"><i class="fa fa-trash"></i> Delete</a>
                          </i>
                        </td>
                      </tr>
                  <?php
                      $cnt = $cnt + 1;
                    }
                  } else {
                    echo '<p class="empty">No Booking Added Yet!</p>';
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            <?php
            date_default_timezone_set("Africa/Nairobi");
            echo "The time is " . date("h:i:sa");
            ?>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="admin/vendor/js/swal.js"></script>

</body>

</html>