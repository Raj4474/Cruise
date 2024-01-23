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
<header class="section page-header">
  <!-- RD Navbar-->
  <div class="rd-navbar-wrap">
    <nav class="rd-navbar rd-navbar-thin" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-fixed" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
      <div class="rd-navbar-main-outer">
        <div class="rd-navbar-main">
          <!-- RD Navbar Panel-->
          <div class="rd-navbar-panel">
            <!-- RD Navbar Toggle-->
            <button class="rd-navbar-toggle" data-rd-navbar-toggle="#rd-navbar-nav-wrap-NaN"><span></span></button>
            <!-- RD Navbar Brand--><a class="rd-navbar-brand" href="home.php"><img src="images/logo-default-135x43.png" alt="" width="135" height="43" srcset="images/logo-default-135x43.png 2x" /></a>
            <div class="rd-navbar-block">
              <ul class="list-inline-bordered">
                <li>
                  <!-- <button class="rd-navbar-popup-toggle text-uppercase font-weight-light" data-rd-navbar-toggle="#rd-navbar-login-NaN"><span class="hidden-info font-weight-light"> Book now</span></button> -->
                  <div class="rd-navbar-popup" id="rd-navbar-login-NaN">
                    <a href="cruises.php">
                      <h4>Book now</h4>
                    </a>
                  </div>
                </li>
                <li><a class="link-title" href="tel:#"><span class="text-subtitle hidden-info font-weight-light"> +1-800-1234-567</span></a></li>
              </ul>
              <button class="rd-navbar-search-toggle" data-rd-navbar-toggle="#rd-navbar-search-NaN"><img src="images/search_icon.png" height="30px" width="30px"></button>
            </div>
          </div>
          <!-- RD Navbar Search-->
          <div class="rd-navbar-search" id="rd-navbar-search-NaN">
            <form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live-NaN" method="GET">
              <div class="form-wrap">
                <img src="images/search_icon.png" height="0px" width="30px">
                <label class="form-label" for="rd-navbar-search-form-input-NaN">Search...</label>
                <input class="form-input rd-navbar-search-form-input" id="rd-navbar-search-form-input-NaN" type="text" name="s" autocomplete="off">
                <div class="rd-search-results-live" id="rd-search-results-live-NaN"></div>
              </div>
              <button class="rd-search-form-submit fa-search" type="submit"></button>
            </form>
          </div>
          <div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap-NaN">
            <!-- RD Navbar Brand--><a class="rd-navbar-brand" href="index.html"><img src="images/logo-default-135x43.png" alt="" width="135" height="43" srcset="images/logo-default-135x43.png 2x" /></a>
            <!-- RD Navbar Nav-->
            <ul class="rd-navbar-nav">
              <li class="rd-nav-item active"><a class="rd-nav-link" href="home.php">Home</a></li>
              <li class="rd-nav-item"><a class="rd-nav-link" href="AboutUs.php">About Us</a></li>
              <li class="rd-nav-item"><a class="rd-nav-link" href="cruises.php">Cruises</a></li>
              <li class="rd-nav-item"><a class="rd-nav-link" href="ships.php">Ships</a></li>
              <li class="rd-nav-item"><a class="rd-nav-link" href="contacts.php">Contacts</a>
              <li class="rd-nav-item"><a class="rd-nav-link" href="profile.php">Profile</a></li>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>