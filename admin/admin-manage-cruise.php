<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid=$_SESSION['a_id'];

if (isset($_GET['del'])) {
  $delete_id = $_GET['del'];
  // print_r($select_ship);
  $select_cruise = "SELECT * FROM `cruises` WHERE c_id='$delete_id'";
  $data = mysqli_query($conn, $select_cruise);
  $result = mysqli_fetch_assoc($data);
  // $pic = 'vender/c_img/'.$result['c_pic'];
  // unlink($pic);


  $select_ship = "DELETE FROM `cruises` WHERE c_id='$delete_id'";
  $data = mysqli_query($conn, $select_ship);

  if ($data) {
    $succ = "Driver Fired";
  } else {
    $err = "Try Again Later";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php'); ?>

<body id="page-top">

  <?php include("vendor/inc/nav.php"); ?>


  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('vendor/inc/sidebar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Cruise</a>
          </li>
          <li class="breadcrumb-item active">Manage Cruises</li>
        </ol>
        <?php if (isset($succ)) { ?>
          <!--This code for injecting an alert-->
          <script>
            setTimeout(function() {
                swal("Success!", "<?php echo $succ; ?>!", "success");
              },
              100);
          </script>

        <?php } ?>
        <?php if (isset($err)) { ?>
          <!--This code for injecting an alert-->
          <script>
            setTimeout(function() {
                swal("Failed!", "<?php echo $err; ?>!", "Failed");
              },
              100);
          </script>

        <?php } ?>


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
            Registered Users
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>#</th>
                    <th>Cruise Image</th>
                    <th>Cruise Name</th>
                    <th>Cruise Days</th>
                    <th>Cruise Price</th>
                    <th>Cruise Category</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <?php

                    $ret="SELECT * FROM `cruises`"; 
                    $data = mysqli_query($conn, $ret);
                    $total = mysqli_num_rows($data);
                    if($total > 0){
                      $cnt = 1;
                     while($row = mysqli_fetch_assoc($data)){ 
                ?>
                  <tbody>
                    <tr>
                    <td><?php echo $cnt;?></td>
                    <td><image src="vendor/c_img/<?php echo $row['c_pic']; ?>" class="all_image" width="30%" height="30%" /></td>
                    <td><?php echo $row['c_name'];?></td>
                    <td><?php echo $row['c_days'];?></td>
                    <td><?php echo $row['c_price'];?></td>
                    <td><?php echo $row['c_category'];?></td>
                      <td>
                        <a href="admin-manage-single-cruise.php?c_id=<?php echo $row['c_id']; ?>" class="badge badge-success">Update</a>
                        <a href="admin-manage-cruise.php?del=<?php echo $row['c_id']; ?>" class="badge badge-danger">Fire</a>
                      </td>
                    </tr>
                  </tbody>
                  <?php 
                  $cnt = $cnt+1; 
                }
         
              }else{
                echo '<p class="empty">No Cruise Added Yet!</p>';
              }
                ?>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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

</body>

</html>