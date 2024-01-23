<?php include 'admin/vendor/inc/config.php';
session_start();

$aid = $_SESSION['u_id'];
if (!isset($aid)) {
    header('location:login.php');
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
    <title>About us</title>
    <style>
        button.btn.btn-primary {
            width: 130px;
        }
    </style>
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
    <?php include 'modules/cruise_display.php'; ?>
    <?php include 'Components/footer.php'; ?>

    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="admin/vendor/js/swal.js"></script>

</body>

</html>