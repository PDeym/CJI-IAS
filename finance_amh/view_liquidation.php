<style type="text/css">
.read-more-target {
  opacity: 0;
  max-height: 0;
  font-size: 0;
  transition: .25s ease;

}

.read-more-state:checked ~ .read-more-wrap .read-more-target {
  opacity: 1;
  max-height: 999em;
}

#total_request {
  background-color: #e9ecef;
}

#text_total {
  margin-top: 7%;
  margin-left: 10%;
}

#selection {
  height: 48px;
}

input#bg, #qty3, #qty4, #qty5, #qty6, #qty7, #qty8, #qty9, #qty10 {
  background-color: #e9ecef;
}
</style>
<?php include '../auth/auth.php'; ?>
<?php include '_css.php'; ?>
<body onload="startTime();">
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
                    Cash Voucher <em class="text-danger">(Reminder: this cash voucher form is sample only, it depends to your cash voucher form used.)</em>
                  </h3><br/>
                  <?php 

                  include '../auth/connection.php';

                  if (isset($_POST['btn_request'])) {
                    
                    $_SESSION['success'] = "CASH VOUCHER SAVED!";
                    $dateTime = $_POST['date'] . " " .$_POST['time'];
                    $transaction_no = $_POST['transaction_no'];
                    $cash_amount = $_POST['cash_amount'];
                    $paid_to = $_POST['paid_to'];
                    $for_account = $_POST['for_account'];
                    $account = $_POST['account'];
                    $received_by = $_POST['received_by'];
                    $paid_by = $_POST['paid_by'];
                    $id = $_POST['id'];
                    
                    $query_history = mysqli_query($conn, "INSERT INTO cash_voucher (dateTime, transaction_no, cash_amount, paid_to, for_account, account, received_by, paid_by) VALUES ('$dateTime', '$transaction_no', '$cash_amount', '$paid_to', '$for_account', '$account', '$received_by', '$paid_by') ");
                  }
                  mysqli_close($conn);
                  ?>
                  <?php if (isset($_SESSION['success'])) : ?>
                    <div class="success" >
                      <h3 class="alert alert-warning">
                        <center>  
                          <?php 
                            echo $_SESSION['success']; 
                            unset($_SESSION['success']);
                          ?>
                         </center>
                      </h3>
                    </div>
                  <?php endif ?>
                  <div class="table-responsive">
                    <form method="POST" action="">
                      <div class="row">
                        <div class="col-md-12">
                          <?php 
                          include '../auth/connection.php';
                          $transaction_no = $_GET['transaction_no'];
                          if (isset($_GET['transaction_no'])) {
                          $query = mysqli_query($conn, "SELECT * FROM liquidation WHERE transaction_no = '$transaction_no' ");
                          $i = 1;
                          while ($row = mysqli_fetch_array($query)) {
                          ?>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-6">
                                  <label>Date</label>
                                  <input type="text" class="form-control" id="frmDate" name="date" readonly>
                                </div>
                                <div class="col-md-6">
                                  <label>Time</label>
                                  <input type="text" class="form-control" id="frmTime" name="time" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label>Transaction No.</label>
                              <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>"readonly>
                              <input type="text" class="form-control" name="transaction_no" value="<?php echo $row['transaction_no']; ?>"readonly>
                            </div>
                            <div class="col-md-3">
                              <label>Amount</label>
                              <input type="text" class="form-control" name="cash_amount" value="<?php echo $row['cash_request']; ?>"readonly>
                            </div>
                          </div>
                          <br/>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Paid to:</label>
                                <input type="text" name="paid_to" class="form-control" value="<?php echo $row['location']; ?> <?php echo $row['requestor']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>For:</label>
                                <input type="text" name="for_account" class="form-control" value="<?php echo $row['requestor']; ?>" readonly>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Account:</label>
                                <input type="text" name="account" class="form-control" value="<?php echo $row['sales_receipt']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Received by:</label>
                                <input type="text" name="received_by" class="form-control" value="<?php echo $_SESSION['user']['group_str']; ?>" readonly>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Paid by:</label>
                                <input type="text" name="paid_by" class="form-control" value="<?php echo $_SESSION['user']['group_str']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <input type="submit" name="btn_request" class="form-control btn btn-success btn-lg" value="SAVE VOUCHER">
                            </div>
                          </div>
                          <br/>
                          
                          <?php }} ?>
                        </div>
                      </div>
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
    $('#check').DataTable();
  } );
</script>
<script type="text/javascript">
  $('#myModal').modal(options)
</script>
<script type="text/javascript">
  function getDate(){
   var todaydate = new Date();
   var day = todaydate.getDate();
   var month = todaydate.getMonth() + 1;
   var year = todaydate.getFullYear();
   var datestring = month + "/" + day + "/" + year;
   document.getElementById("frmDate").value = datestring;
  } 
  getDate(); 
</script>
<script type="text/javascript">
  function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);

  var s = "AM";
  if (h >= 12) {
    s = "PM";
    h = h - 12;
  }
  if (h == 0) {
   h = 12;
  }
  document.getElementById('frmTime').value =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
  }

  function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
  }
</script>