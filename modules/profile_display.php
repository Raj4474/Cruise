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
<div class="container light-style flex-grow-1 container-p-y">
  <h4 class="font-weight-bold py-3 mb-4">
    Account settings
  </h4>

  <div class="card overflow-hidden">
    <div class="row no-gutters row-bordered row-border-light">
      <div class="col-md-3 pt-0">
        <div class="list-group list-group-flush account-settings-links">
          <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
          <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
          <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
          <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a>
          <a class="m-5 btn btn-outline-primary" href="logout.php" onclick="return confirm('Are You Sure You Want Log Out This Web Site ?')">LogOut</a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="tab-content">
          <div class="tab-pane fade active show" id="account-general">

            <div class="card-body media align-items-center">
              <img src="<?= $row['u_img'] ?>" alt="Image Not Uploaded!!" class="d-block ui-w-80">
              <div class="media-body ml-4">
                <form method="post" enctype="multipart/form-data">
                  <label class="btn btn-outline-primary">
                    Upload new photo
                    <input type="file" class="account-settings-fileinput" name="profile_pic">
                  </label> &nbsp;
                  <input type="submit" class="btn btn-default md-btn-flat" name="pic_upload" value="Upload" />

                  <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                </form>
              </div>
            </div>
            <hr class="border-light m-0">

            <form method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">First Name</label>
                  <input type="text" name="fname" class="form-control mb-1" value="<?= $row['u_fname']; ?>">
                </div>
                <div class="form-group">
                  <label class="form-label">Last Name</label>
                  <input type="text" name="lname" class="form-control" value="<?= $row['u_lname']; ?>">
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail</label>
                  <input type="text" name="email" class="form-control mb-1" value="<?= $row['u_email']; ?>">
                  <div class="alert alert-warning mt-3 p-0">
                    Your email is not confirmed. Please check your inbox.<br>
                    <a href="javascript:void(0)">Resend confirmation</a>
                  </div>
                </div>
              </div>

          </div>
          <div class="tab-pane fade" id="account-change-password">
            <div class="card-body pb-2">

              <div class="form-group">
                <label class="form-label">Current password</label>
                <input type="password" class="form-control" name="opwd">
              </div>

              <div class="form-group">
                <label class="form-label">New password</label>
                <input type="password" class="form-control" name="npwd">
              </div>

              <div class="form-group">
                <label class="form-label">Repeat new password</label>
                <input type="password" class="form-control" name="cpwd">
              </div>

            </div>
          </div>
          <div class="tab-pane fade" id="account-info">
            <div class="card-body pb-2">

              <div class="form-group">
                <label class="form-label">Birthday</label>
                <input type="date" name="dob" class="form-control" value="<?= $row['u_dob']; ?>">
              </div>
              <div class="form-group">
                <label class="form-label">Country</label>
                <select class="custom-select" name="country">
                  <option>Country/Region of residence</option>
                  <option value="United States of America" <?php if ($row['u_country'] == 'United States of America') {
                                                              echo "selected";
                                                            } ?>>United States of America</option>
                  <option value="United Kingdom" <?php if ($row['u_country'] == 'United Kingdom') {
                                                    echo "selected";
                                                  } ?>>United Kingdom</option>
                  <option value="China" <?php if ($row['u_country'] == 'China') {
                                          echo "selected";
                                        } ?>>China</option>
                  <option value="Australia" <?php if ($row['u_country'] == 'Australia') {
                                              echo "selected";
                                            } ?>>Australia</option>
                  <option value="Canada" <?php if ($row['u_country'] == 'Canada') {
                                            echo "selected";
                                          } ?>>Canada</option>
                  <option value="Dubai" <?php if ($row['u_country'] == 'Dubai') {
                                          echo "selected";
                                        } ?>>Dubai</option>
                  <option value="Italy" <?php if ($row['u_country'] == 'Italy') {
                                          echo "selected";
                                        } ?>>Italy</option>
                  <option value="India" <?php if ($row['u_country'] == 'India') {
                                          echo "selected";
                                        } ?>>India</option>
                  <option value="Iraq" <?php if ($row['u_country'] == 'Iraq') {
                                          echo "selected";
                                        } ?>>Iraq</option>
                  <option value="Malaysia" <?php if ($row['u_country'] == 'Malaysia') {
                                              echo "selected";
                                            } ?>>Malaysia</option>
                  <option value="Maldives" <?php if ($row['u_country'] == 'Maldives') {
                                              echo "selected";
                                            } ?>>Maldives</option>
                  <option value="Peru" <?php if ($row['u_country'] == 'Peru') {
                                          echo "selected";
                                        } ?>>Peru</option>
                  <option value="Russia" <?php if ($row['u_country'] == 'Russia') {
                                            echo "selected";
                                          } ?>>Russia</option>
                  <option value="South Korea" <?php if ($row['u_country'] == 'South Korea') {
                                                echo "selected";
                                              } ?>>South Korea</option>
                  <option value="Sri Lanka" <?php if ($row['u_country'] == 'Sri Lanka') {
                                              echo "selected";
                                            } ?>>Sri Lanka</option>
                  <option value="Sweden" <?php if ($row['u_country'] == 'Sweden') {
                                            echo "selected";
                                          } ?>>Sweden</option>
                  <option value="Switzerland" <?php if ($row['u_country'] == 'Switzerland') {
                                                echo "selected";
                                              } ?>>Switzerland</option>
                  <option value="United Arab Emirates" <?php if ($row['u_country'] == 'United Arab Emirates') {
                                                          echo "selected";
                                                        } ?>>United Arab Emirates</option>
                </select>
              </div>


            </div>
            <hr class="border-light m-0">
            <div class="card-body pb-2">

              <h6 class="mb-4">Contacts</h6>
              <div class="form-group">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?= $row['u_phone']; ?>">
              </div>

            </div>
          </div>

          <div class="tab-pane fade" id="account-notifications">
            <div class="card-body pb-2">

              <h6 class="mb-4">Activity</h6>

              <div class="form-group">
                <label class="switcher">
                  <input type="checkbox" class="switcher-input" checked="">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no"></span>
                  </span>
                  <span class="switcher-label">Email me when someone comments on my article</span>
                </label>
              </div>
              <div class="form-group">
                <label class="switcher">
                  <input type="checkbox" class="switcher-input" checked="">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no"></span>
                  </span>
                  <span class="switcher-label">Email me when someone answers on my forum thread</span>
                </label>
              </div>
              <div class="form-group">
                <label class="switcher">
                  <input type="checkbox" class="switcher-input">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no"></span>
                  </span>
                  <span class="switcher-label">Email me when someone follows me</span>
                </label>
              </div>
            </div>
            <hr class="border-light m-0">
            <div class="card-body pb-2">

              <h6 class="mb-4">Application</h6>

              <div class="form-group">
                <label class="switcher">
                  <input type="checkbox" class="switcher-input" checked="">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no"></span>
                  </span>
                  <span class="switcher-label">News and announcements</span>
                </label>
              </div>
              <div class="form-group">
                <label class="switcher">
                  <input type="checkbox" class="switcher-input">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no"></span>
                  </span>
                  <span class="switcher-label">Weekly product updates</span>
                </label>
              </div>
              <div class="form-group">
                <label class="switcher">
                  <input type="checkbox" class="switcher-input" checked="">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no"></span>
                  </span>
                  <span class="switcher-label">Weekly blog digest</span>
                </label>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="text-right mt-3">
    <input type="submit" class="btn btn-primary" name="updatebtn" value="Save changes" />&nbsp;
    <button type="button" class="btn btn-default">Cancel</button>
  </div>
  </form>
</div>