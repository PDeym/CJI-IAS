<?php include '_css.php'; ?>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Powered by Corinthdev. All rights reserved 2019.</p>
          </div>
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="images/logo.jpg" alt="logo">
              </div>
              <h4>Already have an account? <a href="index.php">Login</a></h4>
              <h6 class="font-weight-light">Create your credentials!</h6>
              <?php include 'login_function.php'; ?>
              <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger">
                  <p>
                    <center>  
                      <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']);
                      ?>
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                     </center>
                  </p>
                </div>
              <?php endif ?>
              <form class="pt-3" method="POST" action="index.php">
                <div class="form-group">
                  <label for="exampleInputEmail">Full Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="name" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Full Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="username" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Confirm Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="confirmpassword" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Confirm Password" required>
                  </div>
                </div>
                <div class="my-3">
                  <input type="submit" name="btn_register" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn" value="REGISTER">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php include '_js.php';  ?>
</body>
