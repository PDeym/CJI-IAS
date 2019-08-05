
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
              <a class="navbar-brand brand-logo" href="index.php">
                <img src="images/logo.jpg" alt="logo" style="height: 70px;" />
              </a>
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="index.php">
                <h1 style="margin-left: 35px;">CJI - IAS</h1>
                <h4>Inventory Accounting System</h4>
              </a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <a href="index.php" class="btn btn-warning"><i class="mdi mdi-refresh"></i> REFRESH</a>
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name"><?php echo $_SESSION['user']['name']; ?></span>
                    <span class="online-status"></span>
                    <img src="images/faces/face28.png" alt="profile"/>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item" href="account_settings.php">
                        <i class="mdi mdi-settings text-primary"></i>
                        Account Settings
                      </a>
                      <a class="dropdown-item" href="../auth/logout.php">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
                  </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                  <a href="check_availability.php" class="nav-link">
                    <i class="mdi mdi-check menu-icon"></i>
                    <span class="menu-title">Check Cash Request</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                <a href="cash_voucher.php" class="nav-link">
                  <i class="mdi mdi-cash menu-icon"></i>
                  <span class="menu-title">Cash Voucher</span>
                  <i class="menu-arrow"></i>
                </a>
              </li>
              <li class="nav-item">
                  <a href="request_history.php" class="nav-link">
                    <i class="mdi mdi-rotate-3d menu-icon"></i>
                    <span class="menu-title">Transaction History</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
            </ul>
        </div>
      </nav>
    </div>