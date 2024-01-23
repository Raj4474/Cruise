<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid=$_SESSION['a_id'];
//Add USer
if (isset($_POST['upate_veh'])) {
  $id = $_GET['s_id'];
  $s_name = $_POST['s_name'];
  $s_imo = $_POST['s_imo'];
  $s_max_pass = $_POST['s_max_pass'];
  
  $s_pic = $_FILES["s_pic"]["name"];
  move_uploaded_file($_FILES["s_pic"]["tmp_name"], "vendor/img/" . $_FILES["s_pic"]["name"]);
  $query = "update ships set s_name='$s_name', s_imo='$s_imo' ,s_img='$s_pic', s_max_pass=$s_max_pass where s_id = $id";
  $stmt = mysqli_query($conn, $query);
  if ($stmt) {
    $succ = "Ship Updated";
  } else {
    $err = "Please Try Again Later";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php'); ?>

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

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Ships</a>
          </li>
          <li class="breadcrumb-item active">Update Vehicle</li>
        </ol>
        <hr>
        <div class="card">
          <div class="card-header">
            Update Vehicle
          </div>
          <div class="card-body">
            <!--Add User Form-->
            <?php
            $aid = $_GET['s_id'];
            $ret = "SELECT * FROM `ships` where s_id=$aid";
            // print_r($ret);
            $data = mysqli_query($conn, $ret);
            while ($row = mysqli_fetch_assoc($data)) {
            ?>
              <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Ship Name</label>
                  <input type="text" value="<?php echo $row['s_name']; ?>" required class="form-control" id="exampleInputEmail1" name="s_name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ship IMO Number</label>
                  <input type="text" value="<?php echo $row['s_imo']; ?>" class="form-control" id="exampleInputEmail1" name="s_imo">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Maximum Passengers</label>
                  <input type="text" value="<?php echo $row['s_max_pass']; ?>" class="form-control" id="exampleInputEmail1" name="s_max_pass">
                </div>

                <div class="card form-group" style="width: 30rem">
                  <img src="vendor/img/<?php echo $row['s_img']; ?>" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title">Ship Picture</h5>
                    <input type="file" class="btn btn-success" id="exampleInputEmail1" name="s_pic">
                  </div>
                </div>
                <hr>
                <button type="submit" name="upate_veh" class="btn btn-primary">Update Ship</button>
              </form>
              <!-- End Form-->
            <?php } ?>
          </div>
        </div>

        <hr>


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
    <!--INject Sweet alert js-->
    <script src="vendor/js/swal.js"></script>

</body>

</html>