<?php
session_start();
include('admin/vendor/inc/config.php');

$aid = $_SESSION['u_id'];
if (!isset($aid)) {
  header('location:login.php');
}
$ret = "SELECT * FROM users WHERE u_id = '$aid'";
$data = mysqli_query($conn, $ret);
$row = mysqli_fetch_assoc($data);
$u_id = $row['u_id'];




if (isset($_POST['pic_upload'])) {
  $fileName = $_FILES['profile_pic']['name'];
  $tempName = $_FILES['profile_pic']['tmp_name'];
  if ($fileName) {
    $img = 'images/user_profile_img/' . $fileName;
    move_uploaded_file($tempName, $img);
    unlink($row['u_img']);
    $s2 = "UPDATE users SET u_img = '$img' WHERE u_id = $u_id";
    $uploaded = mysqli_query($conn, $s2);
    if ($uploaded) {
      $succ = "uploaded !!";
      header('location:profile.php');
    } else {
      $err = "Not Upload Try Again !!";
    }
  } else {
    $img = $row['u_img'];
  }


}
if (isset($_POST['updatebtn'])) {

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $country = $_POST['country'];
  $phone = $_POST['phone'];


  if (isset($_POST['opwd'])) {
    if ($row['u_pwd'] == $_POST['opwd']) {
      $new_pwd = $_POST['npwd'];
      $confirm_pwd = $_POST['cpwd'];
      if ($new_pwd == $confirm_pwd) {
        $change_pwd = "UPDATE `users` SET u_pwd = '$new_pwd' WHERE u_id = '$u_id'";
        $data = mysqli_query($conn, $change_pwd);
      } else {
        $err = "Confirm Password Is Not Matched With New Password!!";
      }
    } else {
      $err = "Current Password Is Not Matched!!";
    }
  }

  $s1 = "UPDATE users SET u_fname = '$fname', u_lname = '$lname', u_email = '$email',u_dob = '$dob',u_country = '$country',u_phone = '$phone' WHERE u_id = $u_id";
  $updated = mysqli_query($conn, $s1);
  if ($updated) {
    $succ = "Saved !!";
    header('location:profile.php');
  } else {
    $err = "Not Saved !!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="CSS/fonts.css.css">
  <link rel="stylesheet" href="CSS/bootstrap.css">
  <link rel="stylesheet" href="CSS/profile_css.css">
  <title>packages</title>
</head>

<body>
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
  <?php include 'Components/navbar.php' ?>
  <?php include 'modules/profile_display.php'; ?>
  <?php include 'Components/footer.php'; ?>

  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
  <script src="admin/vendor/js/swal.js"></script>
</body>

</html>