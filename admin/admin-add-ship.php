<?php
session_start();
include('vendor/inc/config.php');
$conn = mysqli_connect("localhost","root","","$db");
include('vendor/inc/checklogin.php');
check_login();
$aid=$_SESSION['a_id'];
//Add USer
if (isset($_POST['add_ship'])) {

  $s_name = $_POST['s_name'];
  $s_imo_no = $_POST['s_imo_no'];
  $s_max_pass = $_POST['s_max_pass'];
  // $s_pic = $_FILES["s_pic"]["name"];


    $filename = $_FILES["s_pic"]["name"];
    $tempname = $_FILES["s_pic"]["tmp_name"];
    $fileSize = $_FILES['s_pic']['size'];
    $fileExt = explode('.',$filename);
    $fileActualExt = strtolower(end($fileExt));
  

    $folder = "vendor/img/".$filename;
    $allowedExt = array("jpg","jpeg","png","pdf");
    if(in_array($fileActualExt, $allowedExt)){
      if($fileSize < 10000000){
        // $conn = mysqli_connect("localhost","root","","db1");
        $sql = "insert into ships (s_name, s_imo, s_max_pass, s_img ) values ('$s_name', '$s_imo_no', $s_max_pass,'$filename')";
        // print_r($sql);
        mysqli_query($conn,$sql);
        if(move_uploaded_file($tempname,$folder)){
          $succ = "Image Uploded Successfully !";
        }else{
          $err = "Failed Upload Image ";
        }
    // $result = mysqli_query($conn,"select * from image");
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
            <a href="#">Ship</a>
          </li>
          <li class="breadcrumb-item active">Add Ship</li>
        </ol>
        <hr>
        <div class="card">
          <div class="card-header">
            Add New Ship
          </div>
          <div class="card-body">
            <!--Add User Form-->
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">Ship Name</label>
                <input type="text" required class="form-control" id="exampleInputEmail1" name="s_name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Ship IMO Number</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="s_imo_no">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Maximum Passenger</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="s_max_pass">
              </div>

              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Ship Picture</label>
                <input type="file" class="btn btn-success" id="exampleInputEmail1" name="s_pic">
              </div>

              <button type="submit" name="add_ship" class="btn btn-primary">Add Ship</button>
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