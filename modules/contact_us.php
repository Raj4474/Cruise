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
<section class="section bg-gray-100">w
  <div class="range justify-content-xl-between">
    <div class="cell-xl-6 align-self-center container">
      <div class="row">
        <div class="col-lg-9 cell-inner">
          <div class="section-lg">
            <h3 class="wow-outer"><span class="wow slideInDown" style="visibility: visible; animation-name: slideInDown;">Contact Us</span></h3>
            <!-- RD Mailform-->
            <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" novalidate="novalidate">
              <div class="row row-10">
                <div class="col-md-6 wow-outer">
                  <div class="form-wrap wow fadeSlideInUp" style="visibility: visible; animation-name: fadeSlideInUp;">
                    <label class="form-label-outside" for="contact-first-name">First Name</label>
                    <input class="form-input form-control-has-validation form-control-last-child" id="contact-first-name" type="text" name="name" data-constraints="@Required" fdprocessedid="uzdqff"><span class="form-validation"></span>
                  </div>
                </div>
                <div class="col-md-6 wow-outer">
                  <div class="form-wrap wow fadeSlideInUp" style="visibility: visible; animation-name: fadeSlideInUp;">
                    <label class="form-label-outside" for="contact-last-name">Last Name</label>
                    <input class="form-input form-control-has-validation form-control-last-child" id="contact-last-name" type="text" name="name" data-constraints="@Required" fdprocessedid="m59eod"><span class="form-validation"></span>
                  </div>
                </div>
                <div class="col-md-6 wow-outer">
                  <div class="form-wrap wow fadeSlideInUp" style="visibility: visible; animation-name: fadeSlideInUp;">
                    <label class="form-label-outside" for="contact-email">E-mail</label>
                    <input class="form-input form-control-has-validation form-control-last-child" id="contact-email" type="email" name="email" data-constraints="@Email @Required" fdprocessedid="0pbew"><span class="form-validation"></span>
                  </div>
                </div>
                <div class="col-md-6 wow-outer">
                  <div class="form-wrap wow fadeSlideInUp" style="visibility: visible; animation-name: fadeSlideInUp;">
                    <label class="form-label-outside" for="contact-phone">Phone</label>
                    <input class="form-input form-control-has-validation form-control-last-child" id="contact-phone" type="text" name="phone" data-constraints="@PhoneNumber" fdprocessedid="udoct"><span class="form-validation"></span>
                  </div>
                </div>
                <div class="col-12 wow-outer">
                  <div class="form-wrap wow fadeSlideInUp" style="visibility: visible; animation-name: fadeSlideInUp;">
                    <label class="form-label-outside" for="contact-message">Your Message</label>
                    <textarea class="form-input form-control-has-validation form-control-last-child" id="contact-message" name="msg" data-constraints="@Required"></textarea><span class="form-validation"></span>
                  </div>
                </div>
              </div>
              <div class="group group-middle">
                <div class="wow-outer">
                  <input name="msgbtn" class="button button-primary button-winona wow slideInRight" type="submit" style="visibility: visible; animation-name: slideInRight; justify-content: center;" fdprocessedid="50mtj4">
                  <!-- <?= $succ ?>
                  <?= $err ?> -->
                    <!-- <div class="content-original">Send Message</div>
                    <div class="content-dubbed">Send Message</div> -->
                  </input>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="cell-xl-5 height-fill wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
      <section class="section">
        <div class="">
          <img src="images/travel_1.jpg" height="80%" width="80%" alt="" style="border-radius: 3%; margin-top:15%">
        </div>
      </section>
    </div>
  </div>
</section>
<section class="section section-sm">
  <div class="container">
    <div class="layout-bordered">
      <div class="layout-bordered-item wow-outer">
        <div class="layout-bordered-item-inner wow slideInUp" style="visibility: visible; animation-name: slideInUp;">
          <div class="icon icon-lg text-primary"><img src="images/call_icon.png" height="30px" width="30px"></div>
          <ul class="list-0">
            <li><a class="link-default" href="tel:#">1-800-1234-678</a></li>
            <li><a class="link-default" href="tel:#">1-800-9876-098</a></li>
          </ul>
        </div>
      </div>
      <div class="layout-bordered-item wow-outer">
        <div class="layout-bordered-item-inner wow slideInUp" style="visibility: visible; animation-name: slideInUp;">
          <div class="icon icon-lg text-primary"><img src="images/locate_icon.png" height="40px" width="40px"></div>
          <a class="link-default" href="mailto:#">info@demolink.org</a>
        </div>
      </div>
      <div class="layout-bordered-item wow-outer">
        <div class="layout-bordered-item-inner wow slideInUp" style="visibility: visible; animation-name: slideInUp;">
          <div class="icon icon-lg text-primary"><img src="images/email_icon.png" height="30px" width="30px"></div><a class="link-default" href="#">2130 Fulton Street San Diego, CA 94117-1080 USA</a>
        </div>
      </div>
    </div>
  </div>
</section>