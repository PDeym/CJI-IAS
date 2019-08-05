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
              <?php include 'login_function.php'; ?>
              <h4>Hi <?php echo $_SESSION['name']; ?>!</h4>
              <h6 class="font-weight-light">Happy to see you again! Your account is verifying by Super Admin.</h6>
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
                  <?php if (isset($_SESSION['success'])) : ?>
                    <div class="error success" >
                      <h5>
                        <?php 
                          echo $_SESSION['success']; 
                          unset($_SESSION['success']);
                        ?>
                      </h5>
                    </div>
                  <?php endif ?>
                  <!-- logged in user information -->
                  <?php  if (isset($_SESSION['name'])) : ?>
                    <h3 class="alert alert-info">Name:&nbsp <?php echo $_SESSION['name']; ?></h3>
                  <?php endif ?>
                  <a href="index.php">LOGIN ACCOUNT</a>
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
