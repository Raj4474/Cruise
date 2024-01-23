<?php
session_start();
if (isset($_SESSION['u_id'])) {
  header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cruise</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="assets/css/index.css"> -->
  <link rel="stylesheet" href="x.css">
  <style>
    html {
      background: url(images/login_bg.png) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    footer {
      background-color: blue;
      position: fixed;
      bottom: 0;
      width: 100%;
      /* height: 100px; */
      opacity: 75%;
    }
  </style>
</head>

<body>
  <header>
    <div class="navdiv border border-primary">
      <nav class="navbar navbar-expand-lg navbar-dark bg-info text-dark py-0">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
              <img class="logo" src="images/logo-default-135x43.png" height="50" alt="MDB Logo" loading="lazy" />
              <small class="fs-4 fw-bold text-primary"></small>
            </a>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <div class="me-auto"></div>
              <div class="d-flex fs-5" role="search">
                <a class="nav-link me-2" href="sign_up.php"><b>Registration</b></a>
                <a class="nav-link me-2" href="login.php"><b>Login</b></a>
              </div>
            </div>
          </div>
        </div>
    </div>
  </header>

  <section>
    <div class="maindiv">
      <div class="banner">
      </div>
    </div>
  </section>
  <footer class="bg-light text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">Raj Hirpara</a>
    </div>
    <!-- Copyright -->
  </footer>
</body>

</html>