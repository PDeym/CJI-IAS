<?php include '../auth/auth.php'; ?>
<?php include '_css.php'; ?>
  <body>
    <div class="container-scroller">
    <?php include '_horizontal-navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="container">
            <div class="row mt-4">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="text-dark font-weight-bold mb-2">
                      <a href="request_history.php" style="text-decoration: none;">Back</a>
                    </h3>
                    <?php 

                    include '../auth/connection.php';
                    if (isset($_GET['transaction_no'])) {
                    $transaction_no = $_GET['transaction_no'];
                    $query = mysqli_query($conn, "SELECT * FROM transaction_history WHERE transaction_no = '$transaction_no' ORDER BY id ASC LIMIT 1");
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <h3 class="text-dark font-weight-bold mb-2">Transaction No. | <?php echo $row['transaction_no']; ?>
                    </h3>
                    <h3 class="text-dark font-weight-bold mb-2">Project No. | <?php echo $row['project_no']; ?>
                    </h3>
                    <?php }}?>
                    <div class="table-responsive">
                      <form method="POST" action="">
                        <table id="request" class="table table-striped table-bordered table-hover" style="width:100%">
                          <thead>
                            <tr>
                              <th>LOCATION</th>
                              <th>STATUS DESCRIPTION</th>
                              <th>BY</th>
                              <th>DATE & TIME</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 

                            include '../auth/connection.php';
                            if (isset($_GET['transaction_no'])) {
                            $transaction_no = $_GET['transaction_no'];
                            $query = mysqli_query($conn, "SELECT * FROM transaction_history WHERE transaction_no = '$transaction_no' ORDER BY id ASC");
                            $i = 1;
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                  <td><?php echo $row['location']; ?></td>
                                  <td><label class="badge badge-danger"><?php echo $row['status']; ?></label></td>
                                  <td><?php echo $row['requestor']; ?></td>
                                  <td><?php echo $row['dateTime']; ?></td>
                                </tr>
                            <?php }}?>
                          </tbody>
                        </table>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php include '_footer.php'; ?>
      </div>
      <!-- main-panel ends -->
    </div>
    </div>
    <?php include '_js.php'; ?>
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
    $('#request').DataTable();
  } );
</script>