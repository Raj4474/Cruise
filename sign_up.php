
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

        .eye {
            width: 35px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<?php
session_start();
if (isset($_SESSION['u_id'])) {
  header("location:home.php");
}
include 'admin/vendor/inc/config.php';
if (isset($_POST['add_user'])) {

    $u_fname = $_POST['u_fname'];
    $u_lname = $_POST['u_lname'];
    $u_phone = $_POST['u_phone'];
    $u_email = $_POST['u_email'];
    $u_pwd = $_POST['u_pwd'];
    $u_dob = $_POST['u_dob'];
    $u_country = $_POST['u_country'];

    if (strlen($u_pwd) < 8) {
        if (strlen($u_pwd) < 8) {
            $err = "Password Must Be 8 Character !!";
        }
    } else {

        $query = "insert into users (u_fname, u_lname, u_phone, u_dob, u_country, u_email, u_pwd) values('$u_fname',  '$u_lname', '$u_phone', '$u_dob', '$u_country', '$u_email', '$u_pwd')";
        $stmt = mysqli_query($conn, $query);
        if ($stmt) {
            $succ = "Sign Up Successfully !!";
            header("location:login.php");
        } else {
            $err = "Please Try Again Later";
        }
    }
}
?>
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
                    swal("Failed!", "<?php echo $err; ?>!", "error");
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
                                <h2 class="fw-bold mb-5">SIGN UP</h2>
                                <form method="post">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" name="u_fname" id="form3Example1" class="form-control" placeholder="First name" required="required" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" name="u_lname" id="form3Example2" class="form-control" placeholder="Last name" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BOD select -->
                                    <div class="form-outline">
                                        <input type="date" name="u_dob" class="form-control mb-4" id="exampleDatepicker1" placeholder="Date Of Birth" required="required" />
                                    </div>

                                    <!-- Country Select -->
                                    <select class="form-select mb-4" name="u_country" aria-label="Default select example" required="required">
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

                                    <!-- Phone input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" name="u_phone" id="phone" maxlength="10" minlength="10" class="form-control" placeholder="Phone Number" required="required" />
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" name="u_email" id="email" class="form-control" placeholder="Email address" required="required" />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4 d-flex col-12 input_pwd gap-2">
                                        <input type="password" name="u_pwd" id="pwd" class="form-control " placeholder="Create New Password" required="required" />
                                        <img src="images/eye-icons/hide.png" id="eye" class="eye ml-2">
                                    </div>


                                    <!-- Checkbox -->
                                    <!-- <div class="form-check d-flex mb-4 gap-0">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                        <label class="form-check-label" for="form2Example33">
                                            I would like to receive special offers, travel tips, and insider information by email.
                                        </label>
                                    </div> -->

                                    <div class="form-check mb-2">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label fs-6" for="flexCheckChecked">
                                            I would like to receive special offers, travel tips, and insider information by email.
                                        </label>
                                    </div>

                                    <!-- <p class="fs-6 mb-2">To create an account, you must agree to the following terms:</p> -->

                                    <div class="form-check mb-4">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckChecked1" required="required">
                                        <label class="form-check-label fs-6" for="flexCheckChecked1">
                                            I have read and agree to the
                                            <a href="#">Terms of Use</a>
                                            And
                                            <a href="#">Privacy Policy.</a>
                                        </label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" name="add_user" class="btn btn-primary btn-block mb-4 container-fluid">
                                        SIGN UP
                                    </button>
                                    <div class="mt-4">
                                        <p class="mb-0">Already have an account? <a href="login.php" class="text-dark link fw-bold">Login Now</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let eye = document.getElementById("eye");
        let pwd = document.getElementById("pwd");
        eye.onclick = function() {
            if (pwd.type == "password") {
                pwd.type = "text";
                eye.src = "images/eye-icons/visible.png";
            } else {
                pwd.type = "password";
                eye.src = "images/eye-icons/hide.png";
            }
        }
    </script>
    <script src="admin/vendor/js/swal.js"></script>
</body>

</html>