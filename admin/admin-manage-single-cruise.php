<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid=$_SESSION['a_id'];
//Add USer
if (isset($_POST['update_cruise'])) {
  $id = $_GET['c_id'];
  $c_name = $_POST['c_name'];
  $c_days = $_POST['c_days'];
  $c_price = $_POST['c_price'];
  $c_category = $_POST['c_category'];
  
  $c_pic = $_FILES["c_pic"]["name"];
  move_uploaded_file($_FILES["c_pic"]["tmp_name"], "vendor/c_img/" . $_FILES["c_pic"]["name"]);
  // unlink($row['c_pic']);
  $query = "update cruises set c_name='$c_name', c_days=$c_days ,c_price=$c_price,c_pic='$c_pic' ,c_category='$c_category' where c_id = $id";
  $stmt = mysqli_query($conn, $query);
  if ($stmt) {
    $succ = "Cruise Updated";
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
            <a href="#">Drivers</a>
          </li>
          <li class="breadcrumb-item active">Add Driver</li>
        </ol>
        <hr>
        <div class="card">
          <div class="card-header">
            Add User
          </div>
          <div class="card-body">
            <!--Add User Form-->
            <?php
            $aid = $_GET['c_id'];
            $ret = "SELECT * FROM cruises where c_id=$aid";
            $data = mysqli_query($conn, $ret);
            while ($row = mysqli_fetch_assoc($data)) {
            ?>
              <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Cruise Name</label>
                  <input type="text" value="<?php echo $row['c_name']; ?>" required class="form-control" id="exampleInputEmail1" name="c_name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cruise Days</label>
                  <input type="text" class="form-control" value="<?php echo $row['c_days']; ?>" id="exampleInputEmail1" name="c_days">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cruise Price</label>
                  <input type="text" class="form-control" value="<?php echo $row['c_price']; ?>" id="exampleInputEmail1" name="c_price">
                </div>

                <div class="form-group">
                <label for="exampleFormControlSelect1">Cruise Category</label>
                <select class="form-control" name="c_category" id="exampleFormControlSelect1" value="<?= $row['c_category']; ?>">
                  <option value="Classic" <?php if($row['c_category'] == "Classic"){ echo "Selected";} ?>>Classic Cruise Lines</option>
                  <option value="Advanture" <?php if($row['c_category'] == "Advanture"){ echo "Selected";} ?>>Advanture Cruise Lines</option>
                  <option value="Royal" <?php if($row['c_category'] == "Royal"){ echo "Selected";} ?>>Royal Cruise Lines</option>
                  <option value="Premium" <?php if($row['c_category'] == "Premium"){ echo "Selected";} ?>>Premium Cruise Lines</option>
                  <option value="Entry-Luxury" <?php if($row['c_category'] == "Entry-Luxury"){ echo "Selected";} ?>>Entry-Luxury Cruise Lines</option>
                  <option value="Ultra-Luxury" <?php if($row['c_category'] == "Ultra-Luxury"){ echo "Selected";} ?>>Ultra-Luxury Cruise Lines</option>
                  <option value="Mass-Market" <?php if($row['c_category'] == "Mass-Market"){ echo "Selected";} ?>>Mass-Market Cruise Lines</option>
                </select>
              </div>

              <div class="card form-group" style="width: 30rem">
                <h5 class="card-title">Cruise Picture</h5>
                  <img src="vendor/c_img/<?=$row['c_pic'];?>" class="card-img-top">
                  <div class="card-body">
                    <input type="file" class="btn btn-success" id="exampleInputEmail1" name="c_pic">
                  </div>
                </div>

                <button type="submit" name="update_cruise" class="btn btn-primary">Update Cruise</button>
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