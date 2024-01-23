<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid=$_SESSION['a_id'];
//Add USer
if (isset($_POST['add_cruise'])) {

  $c_name = $_POST['c_name'];
  $c_days = $_POST['c_days'];
  $c_price = $_POST['c_price'];
  $c_category = $_POST['c_category'];

  $filename = $_FILES["cruise_img"]["name"];
  $tempname = $_FILES["cruise_img"]["tmp_name"];
  $fileSize = $_FILES["cruise_img"]["size"];
  $fileExt = explode('.',$filename);
  $fileActualExt = strtolower(end($fileExt));


  $folder = "vendor/c_img/".$filename;
  $allowedExt = array("jpg","jpeg","png","pdf");
  if(in_array($fileActualExt, $allowedExt)){
    if($fileSize < 10000000){
      // $conn = mysqli_connect("localhost","root","","db1");
      $sql = "insert into cruises (c_name, c_days, c_price, c_pic, c_category) values('$c_name','$c_days',$c_price,'$filename','$c_category')";
      // print_r($sql);

      mysqli_query($conn,$sql);
      if(move_uploaded_file($tempname,$folder)){
        $succ = "Cruise Added";
      } else {
        $err = "Please Try Again Later";
      }
  // $result = mysqli_query($conn,"select * from image");
      // if ($stmt) {
      //   $succ = "Cruise Added";
      // } else {
      //   $err = "Please Try Again Later";
      // }
    }else{
      $err = "File Size Limit beyond acceptance";
    }
  }else{
    $err = "You can't upload this extention of file";
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
          <li class="breadcrumb-item active">Add Cruise</li>
        </ol>
        <hr>
        <div class="card">
          <div class="card-header">
            Add Cruise
          </div>
          <div class="card-body">
            <!--Add User Form-->
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">Cruise Name</label>
                <input type="text" required class="form-control" id="exampleInputEmail1" name="c_name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Duration</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="c_days">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="c_price">
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Cruise Category</label>
                <select class="form-control" name="c_category" id="exampleFormControlSelect1">
                  <option value="Classic">Classic Cruise Lines</option>
                  <option value="Advanture">Advanture Cruise Lines</option>
                  <option value="Royal">Royal Cruise Lines</option>
                  <option value="Premium">Premium Cruise Lines</option>
                  <option value="Entry-Luxury">Entry-Luxury Cruise Lines</option>
                  <option value="Ultra-Luxury">Ultra-Luxury Cruise Lines</option>
                  <option value="Mass-Market">Mass-Market Cruise Lines</option>
                </select>
              </div>

              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Cruise Picture</label>
                <input type="file" class="btn btn-success" id="exampleInputEmail1" name="cruise_img">
              </div>

              <button type="submit" name="add_cruise" class="btn btn-primary">Add Cruise</button>
            </form>
            <!-- End Form-->
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