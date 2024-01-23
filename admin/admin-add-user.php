<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid=$_SESSION['a_id'];
//Add USer
if (isset($_POST['add_user'])) {

  $u_fname = $_POST['u_fname'];
  $u_lname = $_POST['u_lname'];
  $u_phone = $_POST['u_phone'];
  $u_email = $_POST['u_email'];
  $u_pwd = $_POST['u_pwd'];
  $u_dob = $_POST['u_dob'];
  $u_country = $_POST['u_country'];

  if (strlen($u_pwd) < 8 || strlen($u_phone) != 10) {
    if(strlen($u_pwd) < 8){
      $err = "Password Must Be 8 Character !!";
    }
    if(strlen($u_phone) != 10){
      $err = "Phone Number Must Be 10 Digits !!";
    }
  } else {

    $query = "insert into users (u_fname, u_lname, u_phone, u_dob, u_country, u_email, u_pwd) values('$u_fname',  '$u_lname', '$u_phone', '$u_dob', '$u_country', '$u_email', '$u_pwd')";
    $stmt = mysqli_query($conn, $query);
    if ($stmt) {
      $succ = "User Added";
    } else {
      $err = "Please Try Again Later";
    }
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
            <a href="#">Users</a>
          </li>
          <li class="breadcrumb-item active">Add User</li>
        </ol>
        <hr>
        <div class="card">
          <div class="card-header">
            Add User
          </div>
          <div class="card-body">
            <!--Add User Form-->
            <form method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="u_fname" required="required">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="u_lname" required="required">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="text" maxlength="10" class="form-control" id="exampleInputEmail1" name="u_phone" required="required">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="u_email" required="required">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="u_pwd" id="exampleInputPassword1" required="required">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Date Of Birth</label>
                <input type="date" class="form-control" id="exampleInputEmail1" name="u_dob" required="required">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Country</label>
                <select class="form-control" aria-label="Default select example" name="u_country" required="required">
                  <option>Country/Region of residence</option>
                  <option value="United States of America">United States of America</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="China">China</option>
                  <option value="Australia">Australia</option>
                  <option value="Canada">Canada</option>
                  <option value="Dubai">Dubai</option>
                  <option value="Italy">Italy</option>
                  <option value="India">India</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Peru">Peru</option>
                  <option value="Russia">Russia</option>
                  <option value="South Korea">South Korea</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                </select>
              </div>


              <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
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