
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php $this->load->view('include/head') ?>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="horizontal-layout horizontal-menu dark-layout 2-columns navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">

  <!-- BEGIN: Header-->
  <?php $this->load->view('include/header') ?>
  <!-- END: Header-->

  <?php foreach ($data_user as $data_user) {}?>

  <!-- BEGIN: Main Menu-->
  <div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal sticky-nav navbar-dark navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo base_url() ?>html/ltr/horizontal-menu-template-dark/index.html">
            <div class="brand-logo"></div>
            <h2 class="brand-text mb-0">IZZI PARKING</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
          </ul>
        </div>
        <!-- Horizontal menu content-->
        <?php $this->load->view('include/menu') ?>
      </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Ecommerce Starts -->
          <section id="page-account-settings">
            <div class="row">
              <!-- left menu section -->
              <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                  <li class="nav-item">
                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                      <i class="feather icon-globe mr-50 font-medium-3"></i>
                      General
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                      <i class="feather icon-lock mr-50 font-medium-3"></i>
                      Change Password
                    </a>
                  </li>
                  
                
                  <li class="nav-item">
                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                      <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                      Notifications
                    </a>
                  </li>
                </ul>
              </div>
              <!-- right content section -->
              <div class="col-md-9">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                          <div class="media">
                            <a href="javascript: void(0);">
                              <img src="<?php echo $data_user['foto_profil']; ?>" class="rounded mr-75" alt="profile image" height="64" width="64">
                            </a>
                            <div class="media-body mt-75">
                              <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer waves-effect waves-light" for="account-upload">Upload new photo</label>
                                <input type="file" id="account-upload" hidden="">
                                <button class="btn btn-sm btn-outline-warning ml-50 waves-effect waves-light">Reset</button>
                              </div>
                              <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                size of
                              800kB</small></p>
                            </div>
                          </div>
                          <hr>
                          <form novalidate="">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label for="account-username">Username</label>
                                    <input type="text" class="form-control" id="account-username" placeholder="Username" value="<?php echo $data_user['username']; ?>" required="" data-validation-required-message="This username field is required">
                                  </div>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label for="account-name">Name</label>
                                    <input type="text" class="form-control" id="account-name" placeholder="Name" value="<?php echo $data_user['nama']; ?>" required="" data-validation-required-message="This name field is required">
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light">Save
                                changes</button>
                                <button type="reset" class="btn btn-outline-warning waves-effect waves-light">Cancel</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                          <form novalidate="">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label for="account-old-password">Old Password</label>
                                    <input type="password" class="form-control" id="account-old-password" required="" placeholder="Old Password" data-validation-required-message="This old password field is required">
                                  </div>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label for="account-new-password">New Password</label>
                                    <input type="password" name="password" id="account-new-password" class="form-control" placeholder="New Password" required="" data-validation-required-message="The password field is required" minlength="6">
                                  </div>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label for="account-retype-new-password">Retype New
                                    Password</label>
                                    <input type="password" name="con-password" class="form-control" required="" id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                  </div>
                                </div>
                              </div>
                              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light">Save
                                changes</button>
                                <button type="reset" class="btn btn-outline-warning waves-effect waves-light">Cancel</button>
                              </div>
                            </div>
                          </form>
                        </div>
                          <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                            <div class="row">
                              <h6 class="m-1">Activity</h6>
                              <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" checked="" id="accountSwitch1">
                                  <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                  <span class="switch-label w-100">Email me when someone comments
                                    onmy
                                  article</span>
                                </div>
                              </div>
                              <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" checked="" id="accountSwitch2">
                                  <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                  <span class="switch-label w-100">Email me when someone answers on
                                    my
                                  form</span>
                                </div>
                              </div>
                              <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                                  <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                                  <span class="switch-label w-100">Email me hen someone follows
                                  me</span>
                                </div>
                              </div>
                              <h6 class="m-1">Application</h6>
                              <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" checked="" id="accountSwitch4">
                                  <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                                  <span class="switch-label w-100">News and announcements</span>
                                </div>
                              </div>
                              <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                                  <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                                  <span class="switch-label w-100">Weekly product updates</span>
                                </div>
                              </div>
                              <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" checked="" id="accountSwitch6">
                                  <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                                  <span class="switch-label w-100">Weekly blog digest</span>
                                </div>
                              </div>
                              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light">Save
                                changes</button>
                                <button type="reset" class="btn btn-outline-warning waves-effect waves-light">Cancel</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

          </div>
        </div>
      </div>
      <!-- END: Content-->


      <!-- Buynow Button-->
      
      <div class="sidenav-overlay"></div>
      <div class="drag-target"></div>

      
      <?php $this->load->view('include/script') ?>

    </body>
    <!-- END: Body-->
    </html>