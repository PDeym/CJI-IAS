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
input#bg {
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
                    <?php 

                    include '../auth/connection.php';

                    if (isset($_POST['btn_submit'])) {
                      
                      $_SESSION['success'] = "The material not available is proceeding to purchase, and the material available is ready to prepare!";
                      $requestor = $_POST['requestor'];
                      $dateTime = $_POST['date'] . " " .$_POST['time'];
                      $transaction_no = $_POST['transaction_no'];
                      $material_requested1 = isset($_POST['material_requested1']) ? $_POST['material_requested1'] : '';
                      $material_requested2 = isset($_POST['material_requested2']) ? $_POST['material_requested2'] : '';
                      $material_requested3 = isset($_POST['material_requested3']) ? $_POST['material_requested3'] : '';
                      $material_requested4 = isset($_POST['material_requested4']) ? $_POST['material_requested4'] : '';
                      $material_requested5 = isset($_POST['material_requested5']) ? $_POST['material_requested5'] : '';
                      $material_requested6 = isset($_POST['material_requested6']) ? $_POST['material_requested6'] : '';
                      $material_requested7 = isset($_POST['material_requested7']) ? $_POST['material_requested7'] : '';
                      $material_requested8 = isset($_POST['material_requested8']) ? $_POST['material_requested8'] : '';
                      $material_requested9 = isset($_POST['material_requested9']) ? $_POST['material_requested9'] : '';
                      $material_requested10 = isset($_POST['material_requested10']) ? $_POST['material_requested10'] : '';
                      $check_status1 = isset($_POST['check_status1']) ? $_POST['check_status1'] : '';
                      $check_status2 = isset($_POST['check_status2']) ? $_POST['check_status2'] : '';
                      $check_status3 = isset($_POST['check_status3']) ? $_POST['check_status3'] : '';
                      $check_status4 = isset($_POST['check_status4']) ? $_POST['check_status4'] : '';
                      $check_status5 = isset($_POST['check_status5']) ? $_POST['check_status5'] : '';
                      $check_status6 = isset($_POST['check_status6']) ? $_POST['check_status6'] : '';
                      $check_status7 = isset($_POST['check_status7']) ? $_POST['check_status7'] : '';
                      $check_status8 = isset($_POST['check_status8']) ? $_POST['check_status8'] : '';
                      $check_status9 = isset($_POST['check_status9']) ? $_POST['check_status9'] : '';
                      $check_status10 = isset($_POST['check_status10']) ? $_POST['check_status10'] : '';
                      $check_quantity1 = isset($_POST['check_quantity1']) ? $_POST['check_quantity1'] : '';
                      $check_quantity2 = isset($_POST['check_quantity2']) ? $_POST['check_quantity2'] : '';
                      $check_quantity3 = isset($_POST['check_quantity3']) ? $_POST['check_quantity3'] : '';
                      $check_quantity4 = isset($_POST['check_quantity4']) ? $_POST['check_quantity4'] : '';
                      $check_quantity5 = isset($_POST['check_quantity5']) ? $_POST['check_quantity5'] : '';
                      $check_quantity6 = isset($_POST['check_quantity6']) ? $_POST['check_quantity6'] : '';
                      $check_quantity7 = isset($_POST['check_quantity7']) ? $_POST['check_quantity7'] : '';
                      $check_quantity8 = isset($_POST['check_quantity8']) ? $_POST['check_quantity8'] : '';
                      $check_quantity9 = isset($_POST['check_quantity9']) ? $_POST['check_quantity9'] : '';
                      $check_quantity10 = isset($_POST['check_quantity10']) ? $_POST['check_quantity10'] : '';
                      $check_status = $_POST['check_status'];
                      $status = $_POST['status'];
                      $location = $_POST['location'];
                      $availability_status = $_POST['availability_status'];
                      $id = $_POST['id'];

                      $query = mysqli_query($conn, "UPDATE request_material SET requestor = '$requestor', dateTime = '$dateTime', material_requested1 = '$material_requested1', material_requested2 = '$material_requested2', material_requested3 = '$material_requested3', material_requested4 = '$material_requested4', material_requested5 = '$material_requested5', material_requested6 = '$material_requested6', material_requested7 = '$material_requested7', material_requested8 = '$material_requested8', material_requested9 = '$material_requested9', material_requested10 = '$material_requested10', check_status = '$check_status', check_status1 = '$check_status1', check_status2 = '$check_status2', check_status3 = '$check_status3', check_status4 = '$check_status4', check_status5 = '$check_status5', check_status6 = '$check_status6', check_status7 = '$check_status7', check_status8 = '$check_status8', check_status9 = '$check_status9', check_status10 = '$check_status10', check_quantity1 = '$check_quantity1', check_quantity2 = '$check_quantity2', check_quantity3 = '$check_quantity3', check_quantity4 = '$check_quantity4', check_quantity5 = '$check_quantity5', check_quantity6 = '$check_quantity6', check_quantity7 = '$check_quantity7', check_quantity8 = '$check_quantity8', check_quantity9 = '$check_quantity9', check_quantity10 = '$check_quantity10', availability_status = '$availability_status', status = '$status', location = '$location' WHERE id = '$id' ");
                      
                      $query_transaction = mysqli_query($conn, "INSERT INTO transaction_history (requestor, dateTime, transaction_no, material_requested1, material_requested2, material_requested3, material_requested4, material_requested5, material_requested6, material_requested7, material_requested8, material_requested9, material_requested10, availability_status, check_status, status, location) VALUES ('$requestor', '$dateTime', '$transaction_no', '$material_requested1', '$material_requested2', '$material_requested3', '$material_requested4', '$material_requested5', '$material_requested6', '$material_requested7', '$material_requested8', '$material_requested9', '$material_requested10', '$availability_status', '$check_status', '$status', '$location')");
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
                      <h3 class="text-dark font-weight-bold mb-2">
                        Material Requested
                      </h3><br/>
                      <?php 

                        include '../auth/connection.php';

                        if (isset($_GET['transaction_no'])) {
                          $transaction_no = $_GET['transaction_no'];
                          $query = mysqli_query ($conn, "SELECT * FROM request_material WHERE transaction_no = '$transaction_no' ");
                          $i = 1;
                          while ($row = mysqli_fetch_array($query)) {
                          ?>

                        <form method="POST" action="">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Transaction No.</label>
                                <input type="text" name="transaction_no" class="form-control" value="<?php echo $row['transaction_no']; ?>" readonly  >
                                <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly  >
                                <input type="hidden" name="availability_status" class="form-control" value="Yes" readonly  >
                                <input type="hidden" name="requestor" class="form-control" value="<?php echo $_SESSION['user']['name']; ?>" readonly  >
                                <input type="hidden" name="location" class="form-control" value="<?php echo $_SESSION['user']['group_str']; ?>" readonly  >
                                <input type="hidden" name="check_status" class="form-control" value="For Released" readonly  >
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Date & Time Requested</label>
                                <input type="text" name="" class="form-control" value="<?php echo $row['dateTime']; ?>" readonly  >
                                <input type="hidden" class="form-control" name="date" id="frmDate" readonly>
                                <input type="hidden" class="form-control" name="time" id="frmTime" readonly>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="" class="form-control text-danger" value="<?php echo $row['status']; ?>" readonly  >
                                <input type="hidden" name="status" class="form-control text-danger" value="Material Request for Purchase" readonly  >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <label>Item Requested</label>
                              <label style="margin-left: 73px;">Availability Status</label>
                              <div class="form-group">
                                <?php if($row['material_requested1'] != "") { ?>
                                <input type="text" name="material_requested1" style="border: none;" value="<?php echo $row['material_requested1']; ?>" readonly>
                                <select name="check_status1" required="true" id="check_status1">
                                  <option disabled="true" selected="true">Select Availability Status</option>
                                  <option value="for release" class="text-success">for release</option>
                                  <option value="for purchase" class="text-danger">for purchase</option>
                                </select>
                                <input style="border: solid gray 1px; margin-left: 35%; width: 36.7%;" type="text" id="check1" name="check_quantity1" placeholder="Input Available Quantity"><br/><br/>
                                <?php } ?>
                                <?php if($row['material_requested2'] != "") { ?>
                                <input type="text" name="material_requested2" style="border: none;" value="<?php echo $row['material_requested2']; ?>" readonly>
                                <select name="check_status2" required="true" id="check_status2">
                                  <option disabled="true" selected="true">Select Availability Status</option>
                                  <option value="for release" class="text-success">for release</option>
                                  <option value="for purchase" class="text-danger">for purchase</option>
                                </select>
                                <input style="border: solid gray 1px; margin-left: 35%; width: 36.7%;" type="text" id="check2" name="check_quantity2" placeholder="Input Available Quantity"><br/><br/>
                                <?php } ?>
                                <?php if($row['material_requested3'] != "") { ?>
                                <input type="text" name="material_requested3" style="border: none;" value="<?php echo $row['material_requested3']; ?>" readonly>
                                <select name="check_status3" required="true" id="check_status3">
                                  <option disabled="true" selected="true">Select Availability Status</option>
                                  <option value="for release" class="text-success">for release</option>
                                  <option value="for purchase" class="text-danger">for purchase</option>
                                </select>
                                <input style="border: solid gray 1px; margin-left: 35%; width: 36.7%;" type="text" id="check3" name="check_quantity3" placeholder="Input Available Quantity"><br/><br/>
                                <?php } ?>
                                <?php if($row['material_requested4'] != "") { ?>
                                <input type="text" name="material_requested4" style="border: none;" value="<?php echo $row['material_requested4']; ?>" readonly>
                                <select name="check_status4" required="true" id="check_status4">
                                  <option disabled="true" selected="true">Select Availability Status</option>
                                  <option value="for release" class="text-success">for release</option>
                                  <option value="for purchase" class="text-danger">for purchase</option>
                                </select>
                                <input style="border: solid gray 1px; margin-left: 35%; width: 36.7%;" type="text" id="check4" name="check_quantity4" placeholder="Input Available Quantity"><br/><br/>
                                <?php } ?>
                                <?php if($row['material_requested5'] != "") { ?>
                                <input type="text" name="material_requested5" style="border: none;" value="<?php echo $row['material_requested5']; ?>" readonly>
                                <select name="check_status5" required="true" id="check_status5">
                                  <option disabled="true" selected="true">Select Availability Status</option>
                                  <option value="for release" class="text-success">for release</option>
                                  <option value="for purchase" class="text-danger">for purchase</option>
                                </select>
                                <input style="border: solid gray 1px; margin-left: 35%; width: 36.7%;" type="text" id="check5" name="check_quantity5" placeholder="Input Available Quantity"><br/><br/>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label>Item Requested</label>
                              <label style="margin-left: 73px;">Availability Status</label>
                              <div class="form-group">
                                <?php if($row['material_requested6'] != "") { ?>
                                <input type="text" name="material_requested6" style="border: none;" value="<?php echo $row['material_requested6']; ?>" readonly>
                                <select name="check_status6" required="true" id="check_status6">
                                  <option disabled="true" selected="true">Select Availability Status</option>
                                  <option value="for release" class="text-success">for release</option>
                                  <option value="for purchase" class="text-danger">for purchase</option>
                                </select>
                                <input style="border: solid gray 1px; margin-left: 35%; width: 36.7%;" type="text" id="check6" name="check_quantity6" placeholder="Input Available Quantity"><br/><br/>
                                <?php } ?>
                                <?php if($row['material_requested7'] != "") { ?>
                                <input type="text" name="material_requested7" style="border: none;" value="<?php echo $row['material_requested7']; ?>" readonly>
                                <select name="check_status7" required="true" id="check_status7">
                                  <option disabled="true" selected="true">Select Availability Status</option>
                                  <option value="for release" class="text-success">for release</option>
                                  <option value="for purchase" class="text-danger">for purchase</option>
                                </select>
                                <input style="border: solid gray 1px; margin-left: 35%; width: 36.7%;" type="text" id="check7" name="check_quantity7" placeholder="Input Available Quantity"><br/><br/>
                                <?php } ?>
                                <?php if($row['material_requested8'] != "") { ?>
                                <input type="text" name="material_requested8" style="border: none;" value="<?php echo $row['material_requested8']; ?>" readonly>
                                <select name="check_status8" required="true" id="check_status8">
                                  <option disabled="true" selected="true">Select Availability Status</option>
                                  <option value="for release" class="text-success">for release</option>
                                  <option value="for purchase" class="text-danger">for purchase</option>
                                </select>
                                <input style="border: solid gray 1px; margin-left: 35%; width: 36.7%;" type="text" id="check8" name="check_quantity8" placeholder="Input Available Quantity"><br/><br/>
                                <?php } ?>
                                <?php if($row['material_requested9'] != "") { ?>
                                <input type="text" name="material_requested9" style="border: none;" value="<?php echo $row['material_requested9']; ?>" readonly>
                                <select name="check_status9" required="true" id="check_status9">
                                  <option disabled="true" selected="true">Select Availability Status</option>
                                  <option value="for release" class="text-success">for release</option>
                                  <option value="for purchase" class="text-danger">for purchase</option>
                                </select>
                                <input style="border: solid gray 1px; margin-left: 35%; width: 36.7%;" type="text" id="check9" name="check_quantity9" placeholder="Input Available Quantity"><br/><br/> 
                                <?php } ?>
                                <?php if($row['material_requested10'] != "") { ?>
                                <input type="text" name="material_requested10" style="border: none;" value="<?php echo $row['material_requested10']; ?>" readonly>
                                <select name="check_status10" required="true" id="check_status10">
                                  <option disabled="true" selected="true">Select Availability Status</option>
                                  <option value="for release" class="text-success">for release</option>
                                  <option value="for purchase" class="text-danger">for purchase</option>
                                </select>
                                <input style="border: solid gray 1px; margin-left: 35%; width: 36.7%;" type="text" id="check10" name="check_quantity10" placeholder="Input Available Quantity"><br/><br/>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="submit" name="btn_submit" class="btn btn-success btn-lg form-control" value="SUBMIT REQUESTED ITEM">
                              </div>
                            </div>
                          </div>
                        </form>
                      <?php }} ?>

                      <h3 class="text-dark font-weight-bold mb-2">
                        Check Item Inventory
                      </h3><br/>
                        <table id="check" class="table table-striped table-bordered table-hover" style="width:100%">
                          <thead>
                            <tr>
                              <th>DATE & TIME</th>
                              <th>AVAILABLE QUANTITY & MATERIALS</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 

                            include '../auth/connection.php';

                            $query = mysqli_query($conn, "SELECT * FROM inventory_materials");
                            $i = 1;
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                  <td><?php echo $row['dateTime']; ?></td>
                                  <td>
                                    <label class="badge badge-warning"><?php echo $row['quantity']; ?></label>
                                    <?php echo $row['material']; ?><br/>
                                  </td>
                                </tr>
                          <?php } ?>
                          </tbody>
                        </table>
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
    $('#check_status1').on('change.states', function() {
      $("#check1").toggle($(this).val() == 'for release');
    }).trigger('change.states');
  });
  $(document).ready(function() {
    $('#check_status2').on('change.states', function() {
      $("#check2").toggle($(this).val() == 'for release');
    }).trigger('change.states');
  });
  $(document).ready(function() {
    $('#check_status3').on('change.states', function() {
      $("#check3").toggle($(this).val() == 'for release');
    }).trigger('change.states');
  });
  $(document).ready(function() {
    $('#check_status4').on('change.states', function() {
      $("#check4").toggle($(this).val() == 'for release');
    }).trigger('change.states');
  });
  $(document).ready(function() {
    $('#check_status5').on('change.states', function() {
      $("#check5").toggle($(this).val() == 'for release');
    }).trigger('change.states');
  });
  $(document).ready(function() {
    $('#check_status6').on('change.states', function() {
      $("#check6").toggle($(this).val() == 'for release');
    }).trigger('change.states');
  });
  $(document).ready(function() {
    $('#check_status7').on('change.states', function() {
      $("#check7").toggle($(this).val() == 'for release');
    }).trigger('change.states');
  });
  $(document).ready(function() {
    $('#check_status8').on('change.states', function() {
      $("#check8").toggle($(this).val() == 'for release');
    }).trigger('change.states');
  });
  $(document).ready(function() {
    $('#check_status9').on('change.states', function() {
      $("#check9").toggle($(this).val() == 'for release');
    }).trigger('change.states');
  });
  $(document).ready(function() {
    $('#check_status10').on('change.states', function() {
      $("#check10").toggle($(this).val() == 'for release');
    }).trigger('change.states');
  });
</script>
<script type="text/javascript">
  $('#myModal').modal('toggle')
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#check').DataTable();
  } );
</script>