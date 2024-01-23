<?php
session_start();
include('admin/vendor/inc/config.php');

$aid = $_SESSION['u_id'];
if (!isset($aid)) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Cruise</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700,800%7COswald:300,400,500%7CAlegreya+Sans+SC:300,400,700%7COld+Standard+TT:400,700">
  <link rel="stylesheet" href="CSS/bootstrap.css">
  <link rel="stylesheet" href="CSS/fonts.css.css">
  <link rel="stylesheet" href="CSS/style.css" id="main-styles-link">

  <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
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
  <div class="page">
    <!-- Page Header-->
    <header class="section page-header">
      <!-- RD Navbar-->
      <?php include 'Components/navbar.php' ?>
    </header>
    <section class="section jumbotron-modern bg-gray-700 bg-image" style="background-image: url(images/bg-image-2.jpeg);">
      <div class="jumbotron-modern-inner">
        <div class="container">
          <div class="jumbotron-modern-content">
            <h1 class="text-extra-large-title wow-outer font-weight-bold"><span class="wow slideInUp">Cruises</span></h1>
            <h4 class="text-normal font-weight-light wow-outer"><span class="wow slideInDown">for those who are hard to surprise</span></h4>
            <div class="jumbotron-bg-text">welcome </div>
            <div class="rd-form form-lg form-layout-1 rd-mailform">
              <div class="form-wrap form-wrap-select wow fadeInLeftSmall" data-wow-delay=".3s">
                <select class="form-input select" name="find-job-location" data-minimum-results-for-search="Infinity">
                  <option value="1">Type of cruise</option>
                  <option value="2">Classic Cruise</option>
                  <option value="3">Family Cruise</option>
                  <option value="4">Adventure Cruise</option>
                </select>
              </div>
              <div class="form-wrap form-wrap-select wow fadeInLeftSmall" data-wow-delay=".3s">
                <select class="form-input select" name="find-job-location" data-minimum-results-for-search="Infinity">
                  <option value="1">Price</option>
                  <option value="2">$1,000</option>
                  <option value="3">$1,500</option>
                  <option value="4">$2,000</option>
                </select>
              </div>
              <div class="form-wrap form-wrap-button">
                <a href="cruises.php">
                  <button class="button button-lg button-primary button-winona wow fadeInLeftSmall" type="submit" data-wow-delay=".4s">Search</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Popular Cruises-->
    <section class="section section-lg text-center">
      <div class="container">
        <h2 class="wow-outer font-weight-bold text-title-block"><span class="wow slideInUp">Popular Cruises</span></h2>
        <div class="row row-50">
          <div class="col-sm-6 col-lg-4 wow-outer">
            <!-- Post Classic-->
            <article class="post-classic wow slideInLeft"><a class="post-classic-media" href="cruises.php"><img src="images/popular-cruises-1-370x264.jpeg" alt="" width="370" height="264" /></a>
              <ul class="post-classic-meta">
                <li><a class="button-winona" href="#">From $480</a></li>
                <li>
                  <time datetime="2018">7 days</time>
                </li>
              </ul>
              <h5 class="post-classic-title text-gray-800"><a href="cruises.php">Greece, Italy & Croatia Cruise (7 Nights)</a></h5>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4 wow-outer">
            <!-- Post Classic-->
            <article class="post-classic wow slideInLeft" data-wow-delay=".05s"><a class="post-classic-media" href="cruises.php"><img src="images/popular-cruises-2-370x264.jpeg" alt="" width="370" height="264" /></a>
              <ul class="post-classic-meta">
                <li><a class="button-winona" href="#">From $330</a></li>
                <li>
                  <time datetime="2018">6 days</time>
                </li>
              </ul>
              <h5 class="post-classic-title text-gray-800"><a href="cruises.php">The Fjords and Glaciers Cruise through Norway and Scandinavia</a></h5>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4 wow-outer">
            <!-- Post Classic-->
            <article class="post-classic wow slideInLeft" data-wow-delay=".1s"><a class="post-classic-media" href="cruises.php"><img src="images/popular-cruises-3-370x264.jpeg" alt="" width="370" height="264" /></a>
              <ul class="post-classic-meta">
                <li><a class="button-winona" href="#">From $470</a></li>
                <li>
                  <time datetime="2018">15 days</time>
                </li>
              </ul>
              <h5 class="post-classic-title text-gray-800"><a href="cruises.php">15-Night Cruise: Norway, Sweden, Denmark & Finland</a></h5>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4 wow-outer">
            <!-- Post Classic-->
            <article class="post-classic wow slideInLeft"><a class="post-classic-media" href="cruises.php"><img src="images/popular-cruises-4-370x264.jpeg" alt="" width="370" height="264" /></a>
              <ul class="post-classic-meta">
                <li><a class="button-winona" href="#">From $450</a></li>
                <li>
                  <time datetime="2018">8 days</time>
                </li>
              </ul>
              <h5 class="post-classic-title text-gray-800"><a href="cruises.php">Cruise from South to North of Norway</a></h5>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4 wow-outer">
            <!-- Post Classic-->
            <article class="post-classic wow slideInLeft" data-wow-delay=".05s"><a class="post-classic-media" href="cruises.php"><img src="images/popular-cruises-5-370x264.jpeg" alt="" width="370" height="264" /></a>
              <ul class="post-classic-meta">
                <li><a class="button-winona" href="#">From $740</a></li>
                <li class="text-gray-700">
                  <time datetime="2018">7 days</time>
                </li>
              </ul>
              <h5 class="post-classic-title text-gray-800"><a href="cruises.php">7-day Western Mediterranean Cruise From Barcelona</a></h5>
            </article>
          </div>
          <div class="col-sm-6 col-lg-4 wow-outer">
            <!-- Post Classic-->
            <article class="post-classic wow slideInLeft" data-wow-delay=".1s"><a class="post-classic-media" href="cruises.php"><img src="images/popular-cruises-6-370x264.jpeg" alt="" width="370" height="264" /></a>
              <ul class="post-classic-meta">
                <li><a class="button-winona" href="#">From $580</a></li>
                <li>
                  <time datetime="2018">5 days</time>
                </li>
              </ul>
              <h5 class="post-classic-title text-gray-800"><a href="cruises.php">5-Night Europe Coastal Cruise (6 Countries)</a></h5>
            </article>
          </div>
        </div>
      </div>
    </section>
    <!-- What Awaits You-->
    <section class="section section-md bg-image bg-image-1" style="background-image: url(images/awaits-you-1-1920x456.jpeg);">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-sm-9 col-md-7 col-lg-6">
            <div class="wow-outer">
              <div class="wow slideInUp">
                <h2 class="wow-outer text-white text-title-block-white"><span class="wow slideInUp">What Awaits You</span></h2>
              </div>
            </div>
            <div class="wow-outer offset-top-4">
              <div class="wow slideInDown">
                <p class="text-white"> Our cruise company offers great experiences to every client. Watch our presentation to find out more about our cruises.</p><a class="button button-icon button-icon-left button-md button-primary button-winona button-secondary" href="https://youtu.be/19EendeMyi4" data-lightgallery="item">Play</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About our Company-->
    <section class="section section-sm bg-gray-100 bg-image bg-image-3 left-pattern" style="background-image: url(images/dots-bg-30x4.png);">
      <div class="container">
        <div class="row row-50 justify-content-center justify-content-lg-between flex-lg-row-reverse">
          <div class="col-md-10 col-lg-6 col-xl-5">
            <h2 class="wow-outer font-weight-bold text-gray-800"><span class="wow slideInUp">About our Company</span></h2>
            <p class="wow-outer"><span class="wow slideInDown" data-wow-delay=".05s">Cruise is the world’s first inspirational cruise search & booking service that focuses on what’s really important: your Interests and your Budget!</span></p>
            <p class="wow-outer"><span class="wow slideInDown" data-wow-delay=".1s">Our company offers an innovative and useful online cruise booking experience, so you can find your perfect destination in just a couple of clicks!</span></p>
            <div class="row justify-content-left wow slideInDown">
              <div class="col-md-4"><img class="quote-light-image" src="images/logo-painting-136x61.png" alt="" width="136" height="61" />
              </div>
              <div class="col-md-8">
                <h5 class="text-gray-800 font-weight-medium">Oliver Morgan</h5>
                <h6 class="font-weight-light">Founder, Cruise</h6>
              </div>
            </div>
          </div>
          <div class="col-md-10 col-lg-6 wow-outer"><img class="img-responsive wow slideInLeft" src="images/about-our-company-560x480.png" alt="" width="560" height="480" />
          </div>
        </div>
      </div>
    </section>
    <!-- Light 4 Columns Layout-->
    <section class="section section-lg text-center">
      <div class="container">
        <div class="row row-30 row-xxl-70 offset-top-2">
          <div class="col-sm-6 col-md-4 col-lg-3 wow-outer">
            <!-- Box Light-->
            <article class="box-light wow slideInLeft">
              <img src="images/sun.png" height="40px" width="40px">
              <h4 class="text-gray-800 box-light-title">Friendly Managers</h4>
              <p>We are a team of friendly managers who are always ready to help you choose a cruise of your dream.</p>
            </article>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 wow-outer">
            <!-- Box Light-->
            <article class="box-light wow slideInLeft" data-wow-delay=".05s">
              <img src="images/cruise.png" height="40px" width="40px">
              <h4 class="text-gray-800 box-light-title">Flexible Prices</h4>
              <p>Cruise has a flexible pricing policy, which applies to all our offers. No matter what cruise it is, it won’t be overpriced.</p>
            </article>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 wow-outer">
            <!-- Box Light-->
            <article class="box-light wow slideInLeft" data-wow-delay=".1s">
              <img src="images/map.png" height="40px" width="40px">
              <h4 class="text-gray-800 box-light-title">Lots of Cruises</h4>
              <p>Since our establishment, we have been offering a wide range of cruises to all our customers worldwide.</p>
            </article>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 wow-outer">
            <!-- Box Light-->
            <article class="box-light wow slideInLeft" data-wow-delay=".15s">
              <img src="images/right-click.png" height="40px" width="40px">
              <h4 class="text-gray-800 box-light-title">Online Booking</h4>
              <p>Booking a cruise online has never been so easy! Just a couple of clicks to find what you need and you’re all set!</p>
            </article>
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Blog Posts-->
    <section class="section section-lg text-center">
      <div class="container">
        <h2 class="wow-outer font-weight-bold text-title-block"><span class="wow slideInUp">Latest Blog Posts</span></h2>
        <div class="row row-50">
          <div class="col-md-6 wow-outer">
            <!-- Post Modern-->
            <article class="post-modern wow slideInLeft"><a class="post-modern-media" href="#"><img src="images/grid-blog-1-570x352.jpeg" alt="" width="570" height="352" /></a>
              <h4 class="post-modern-title"><a href="cruises.php">Top Ten Cruise Destinations</a></h4>
              <ul class="post-modern-meta">
                <li class="text-color-3">by Mike Barnes</li>
                <li>
                  <time datetime="2018">Apr 25, 2018 at 3:13 pm</time>
                </li>
                <li><a class="button-winona text-gray-800" href="#">News</a></li>
              </ul>
              <p>Travelers may argue over which city provides the most beautiful arrival by ship, but few would leave Rio de Janeiro far from the top of the list. Cruise ships sail into Guanabara Bay past...</p>
            </article>
          </div>
          <div class="col-md-6 wow-outer">
            <!-- Post Modern-->
            <article class="post-modern wow slideInLeft"><a class="post-modern-media" href="#"><img src="images/grid-blog-2-570x352.jpeg" alt="" width="570" height="352" /></a>
              <h4 class="post-modern-title"><a href="cruises.php">5 Adventure Cruises You Cannot Miss</a></h4>
              <ul class="post-modern-meta">
                <li class="text-color-3">by Mike Barnes</li>
                <li>
                  <time datetime="2018">Apr 25, 2018 at 3:13 pm</time>
                </li>
                <li><a class="button-winona text-gray-800" href="#">News</a></li>
              </ul>
              <p>For many cruise lovers, setting sail is half the fun. The other half is packing as much full-scale adventure into a cruise as possible. Top cruise companies are ready to oblige, with adventure-cruise...</p>
            </article>
          </div>
        </div>
      </div>
    </section>
    <!-- Newsletter-->
    <section class="section section-lg bg-image bg-image-light" style="background-image: url(images/bg-image-1.jpeg);">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6">
            <h2 class="wow-outer text-title-block-white"><span class="wow slideInUp">Newsletter</span></h2>
            <p class="text-white text-left wow-outer"><span class="wow slideInLeft">Keep up with our always upcoming news and updates. Enter your e-mail and subscribe to our newsletter.</span></p>
            <!-- RD Mailform-->
            <form class="rd-form rd-mailform form-inline wow fadeIn" data-wow-delay=".2s" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
              <div class="form-wrap">
                <input class="form-input" id="subscribe-form-3-email" type="email" name="email" data-constraints="@Email @Required">
                <label class="form-label" for="subscribe-form-3-email">Your e-mail</label>
              </div>
              <div class="form-button">
                <input class="button button-primary button-winona button-secondary" type="submit">Subscribe</input>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Page Footer-->
    <?php include 'Components/footer.php' ?>
  </div>
  <div class="preloader">
    <div class="preloader-logo"><img src="images/logo-default-135x43.png" alt="" width="135" height="43" srcset="images/logo-default-135x43.png 2x" />
    </div>
    <div class="preloader-body">
      <div id="loadingProgressG">
        <div class="loadingProgressG" id="loadingProgressG_1"></div>
      </div>
    </div>
  </div>
  <!-- Javascript-->
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
  <script src="admin/vendor/js/swal.js"></script>

</body>

</html>