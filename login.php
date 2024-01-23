<?php
include 'admin/vendor/inc/config.php';
session_start();

// if (isset($_SESSION['a_id'])) {
//     header("location:home.php");
// }

if (isset($_POST['loginbtn'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $query = "SELECT * FROM `users` WHERE u_email = '$email' AND u_pwd = '$pwd'";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);

    $total = mysqli_num_rows($data);

    if ($total > 0) {
        $_SESSION['u_id'] = $result['u_id'];
        header('location:home.php');
    } else {
        $error = 'incorrect username or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Login</title>
    <style>
        .bg-image {
            background-repeat: no-repeat;
            background-image: url('images/M38_Desktop_ExplorerDetail.jpg');
            height: 1200px;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .card {
            margin-top: -1100px;
            background: hsla(0, 0%, 100%, 0.5);
            backdrop-filter: blur(4px);
        }

        .cardbgdiv {
            padding-left: 30%;
            padding-right: 30%;
        }

        .mainlogin {
            height: 1rem;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!--Trigger Sweet Alert-->
    <?php if (isset($error)) { ?>
        <!--This code for injecting an alert-->
        <script>
            setTimeout(function() {
                    swal("Failed!", "<?php echo $error; ?>!", "error");
                },
                100);
        </script>

    <?php } ?>
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="mainlogin">
            <div class="p-5 bg-image"></div>
            <!-- Background image -->

            <div class="cardbgdiv">
                <div class="card mx-4 mx-md-5 shadow-5-strong">
                    <div class="card-body py-5 px-md-5">

                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-10">
                                <h2 class="fw-bold mb-5">LOGIN</h2>
                                <form method="POST">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="form3Example3" class="form-control" placeholder="Email address" />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" name="pwd" id="form3Example4" class="form-control" placeholder="Password" />
                                    </div>

                                    <!-- Checkbox -->
                                    <div class="form-check d-flex mb-4">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                        <label class="form-check-label" for="form2Example33">
                                            Remember Password
                                        </label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" name="loginbtn" class="btn btn-primary btn-block mb-4 container-fluid">
                                        LOGIN
                                    </button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>Or <br><br>Sign Up With:</p>
                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-google"></i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-twitter"></i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-github"></i>
                                        </button>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-0">Don't have an account? <a href="sign_up.php" class="text-dark link fw-bold">Sign Up</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    <script src="admin/vendor/js/swal.js"></script>
</body>

</html>