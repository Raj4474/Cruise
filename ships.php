<?php
session_start();
include('admin/vendor/inc/config.php');

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
        .container {
            position: relative;
            text-align: center;
            color: white;
        }

        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <?php include 'Components/navbar.php' ?>
    <?php include 'modules/ships_display.php'; ?>
    <?php include 'Components/footer.php'; ?>

    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>