<?php
session_start();
include('admin/vendor/inc/config.php');

$aid = $_SESSION['u_id'];
if (!isset($aid)) {
    header('location:login.php');
}
if (isset($_POST['msgbtn'])) {
    $msg = $_POST['msg'];
    $uid = $_SESSION['u_id'];

    $ret = "insert into message (msg,u_id) values ('$msg',$uid)";
    $sended = mysqli_query($conn, $ret);
    $succ = "not success";
    if ($sended) {
        $succ = "Message Sended!!";
    } else {
        $err = "Please Try Again !!";
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
    <link rel="stylesheet" href="CSs/bootstrap.css">
    <title>Contact Us</title>
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
    <?php include 'modules/contact_us.php' ?>
    <?php include 'Components/footer.php' ?>

    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="admin/vendor/js/swal.js"></script>
</body>

</html>