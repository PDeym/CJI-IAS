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

.input {
  border: 2px solid #bdbdbd;
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
                      Material Request Form
                    </h3><br/>
                    <?php 

                    include '../auth/connection.php';

                    if (isset($_POST['btn_submit'])) {
                      
                      $_SESSION['success'] = "SUCCESSFULLY REQUEST MATERIAL!";
                      $requestor = $_POST['requestor'];
                      $location = $_POST['location'];
                      $dateTime = $_POST['date'] . " " .$_POST['time'];
                      $transaction_no = $_POST['transaction_no'];
                      $material_requested1 = $_POST['material_requested1'];
                      $material_requested2 = $_POST['material_requested2'];
                      $material_requested3 = $_POST['material_requested3'];
                      $material_requested4 = $_POST['material_requested4'];
                      $material_requested5 = $_POST['material_requested5'];
                      $material_requested6 = $_POST['material_requested6'];
                      $material_requested7 = $_POST['material_requested7'];
                      $material_requested8 = $_POST['material_requested8'];
                      $material_requested9 = $_POST['material_requested9'];
                      $material_requested10 = $_POST['material_requested10'];
                      $quantity1 = $_POST['quantity1'];
                      $quantity2 = $_POST['quantity2'];
                      $quantity3 = $_POST['quantity3'];
                      $quantity4 = $_POST['quantity4'];
                      $quantity5 = $_POST['quantity5'];
                      $quantity6 = $_POST['quantity6'];
                      $quantity7 = $_POST['quantity7'];
                      $quantity8 = $_POST['quantity8'];
                      $quantity9 = $_POST['quantity9'];
                      $quantity10 = $_POST['quantity10'];
                      $status = $_POST['status'];

                      $query = mysqli_query($conn, "INSERT INTO request_material (requestor, location, dateTime, transaction_no, material_requested1, quantity1, material_requested2, quantity2, material_requested3, quantity3, material_requested4, quantity4, material_requested5, quantity5, material_requested6, quantity6, material_requested7, quantity7, material_requested8, quantity8, material_requested9, quantity9, material_requested10, quantity10, status) VALUES ('$requestor', '$location', '$dateTime', '$transaction_no', '$material_requested1', '$quantity1', '$material_requested2', '$quantity2', '$material_requested3', '$quantity3', '$material_requested4', '$quantity4', '$material_requested5', '$quantity5', '$material_requested6', '$quantity6', '$material_requested7', '$quantity7', '$material_requested8', '$quantity8', '$material_requested9', '$quantity9', '$material_requested10', '$quantity10', '$status')");
                      
                      $query_transaction = mysqli_query($conn, "INSERT INTO transaction_history (requestor, location, dateTime, transaction_no, material_requested1, quantity1, material_requested2, quantity2, material_requested3, quantity3, material_requested4, quantity4, material_requested5, quantity5, material_requested6, quantity6, material_requested7, quantity7, material_requested8, quantity8, material_requested9, quantity9, material_requested10, quantity10, status) VALUES ('$requestor', '$location', '$dateTime', '$transaction_no', '$material_requested1', '$quantity1', '$material_requested2', '$quantity2', '$material_requested3', '$quantity3', '$material_requested4', '$quantity4', '$material_requested5', '$quantity5', '$material_requested6', '$quantity6', '$material_requested7', '$quantity7', '$material_requested8', '$quantity8', '$material_requested9', '$quantity9', '$material_requested10', '$quantity10', '$status')");
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
                    <form action="" method="POST">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label><b>Requestor</b></label>
                            <input type="hidden" class="form-control" name="status" value="Material Request Posted" readonly>
                            <input type="hidden" class="form-control" name="location" value="<?php echo $_SESSION['user']['group_id']; ?>" readonly>
                            <input type="text" class="form-control" name="requestor" value="<?php echo $_SESSION['user']['name']; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label><b>Date</b></label>
                                <input type="text" class="form-control" name="date" id="frmDate" value="" readonly>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label><b>Time</b></label>
                                <input type="text" class="form-control" name="time" id="frmTime" value="" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label><b>Transaction #</b></label>
                            <?php 
                              $a = rand(100, 400); 
                              $b = rand(300, 700);
                              ?>
                              <input type="text" class="form-control" name="transaction_no" value="<?php echo $a.$b ?>" readonly>
                            <?php ?>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label><b>Material Requested</b></label><br/>
                          <input type="checkbox" class="read-more-state" id="post-2"> ADD MORE REQUEST<br/><br/>
                          <div class="form-group read-more-wrap">
                            <div class="row">
                              <div class="col-md-4">
                                <input type="text" class="form-control" name="material_requested1" placeholder="Input Material" required>
                              </div>
                              <div class="col-md-2">
                                <input type="number" class="form-control" name="quantity1" placeholder="Input Quantity" required>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control" name="material_requested2" placeholder="Input Material">
                              </div>
                              <div class="col-md-2">
                                <input type="number" class="form-control" name="quantity2" placeholder="Input Quantity">
                              </div>
                            </div><br/>
                            <div class="row">
                              <div class="col-md-4">
                                <input type="text" class="form-control" name="material_requested3" placeholder="Input Material">
                              </div>
                              <div class="col-md-2">
                                <input type="number" class="form-control" name="quantity3" placeholder="Input Quantity">
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control" name="material_requested4" placeholder="Input Material">
                              </div>
                              <div class="col-md-2">
                                <input type="number" class="form-control" name="quantity4" placeholder="Input Quantity">
                              </div>
                            </div><br/>
                            <div class="row">
                              <div class="col-md-4">
                                <input type="text" class="form-control read-more-target" name="material_requested5" placeholder="Input Material">
                              </div>
                              <div class="col-md-2">
                                <input type="number" class="form-control read-more-target" name="quantity5" placeholder="Input Quantity">
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control read-more-target" name="material_requested6" placeholder="Input Material">
                              </div>
                              <div class="col-md-2">
                                <input type="number" class="form-control read-more-target" name="quantity6" placeholder="Input Quantity">
                              </div>
                            </div><br/>
                            <div class="row">
                              <div class="col-md-4">
                                <input type="text" class="form-control read-more-target" name="material_requested7" placeholder="Input Material">
                              </div>
                              <div class="col-md-2">
                                <input type="number" class="form-control read-more-target" name="quantity7" placeholder="Input Quantity">
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control read-more-target" name="material_requested8" placeholder="Input Material">
                              </div>
                              <div class="col-md-2">
                                <input type="number" class="form-control read-more-target" name="quantity8" placeholder="Input Quantity">
                              </div>
                            </div><br/>
                            <div class="row">
                              <div class="col-md-4">
                                <input type="text" class="form-control read-more-target" name="material_requested9" placeholder="Input Material">
                              </div>
                              <div class="col-md-2">
                                <input type="number" class="form-control read-more-target" name="quantity9" placeholder="Input Quantity">
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control read-more-target" name="material_requested10" placeholder="Input Material">
                              </div>
                              <div class="col-md-2">
                                <input type="number" class="form-control read-more-target" name="quantity10" placeholder="Input Quantity">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="submit" id="btn_submit" data-target="#mymodal" data-toggle="modal" class="form-control btn btn-warning btn-lg" name="btn_submit" value="REQUEST MATERIAL">
                          </div>
                        </div>
                      </div>
                    </form>
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
  $('#mymodal').modal(options)
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