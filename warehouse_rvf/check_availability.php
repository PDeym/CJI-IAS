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
                    <h3 class="text-dark font-weight-bold mb-2">
                      Check Item Availability
                    </h3><br/>
                    <?php 

                    include '../auth/connection.php';

                    if (isset($_POST['btn_submit'])) {
                      
                      $_SESSION['success'] = $_POST['status'];
                      $requestor = $_POST['requestor'];
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
                      $availability_status = $_POST['availability_status'];
                      $location = $_POST['location'];
                      $id = $_POST['id'];

                      $query = mysqli_query($conn, "UPDATE request_material SET requestor = '$requestor', dateTime = '$dateTime', status = '$status', availability_status = '$availability_status', location = '$location' WHERE id = '$id' ");
                      
                      $query_transaction = mysqli_query($conn, "INSERT INTO transaction_history (requestor, dateTime, transaction_no, material_requested1, material_requested2, material_requested3, material_requested4, material_requested5, material_requested6, material_requested7, material_requested8, material_requested9, material_requested10, quantity1, quantity2, quantity3, quantity4, quantity5, quantity6, quantity7, quantity8, quantity9, quantity10, status, availability_status, location) VALUES ('$requestor', '$dateTime', '$transaction_no', '$material_requested1', '$material_requested2', '$material_requested3', '$material_requested4', '$material_requested5', '$material_requested6', '$material_requested7', '$material_requested8', '$material_requested9', '$material_requested10', '$quantity1', '$quantity2', '$quantity3', '$quantity4', '$quantity5', '$quantity6', '$quantity7', '$quantity8', '$quantity9', '$quantity10', '$status', '$availability_status','$location')");
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
                        <table id="check" class="table table-striped table-bordered table-hover" style="width:100%">
                          <thead>
                            <tr>
                              <th>TRANSACTION NO.</th>
                              <th>DATE & TIME</th>
                              <th>STATUS</th>
                              <th>ACTION</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 

                            include '../auth/connection.php';

                            $query = mysqli_query($conn, "SELECT * FROM request_material WHERE availability_status = '' ORDER BY id DESC");
                            $i = 1;
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                  <td><?php echo $row['transaction_no']; ?></td>
                                  <td><?php echo $row['dateTime']; ?></td>
                                  <td><label class="badge badge-warning"><?php echo $row['status']; ?></label></td>
                                  <td>
                                    <a href="view_item.php?transaction_no=<?php echo $row['transaction_no']; ?>" class="btn btn-success"><i class="mdi mdi-eye"></i></a>
                                    <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>" onclick="return confirm('Are you sure this Item is available? You are now proceeding to Prepare for the Material.')"><i class="mdi mdi-check-circle"></i></button>
                                    <a href="purchase_order.php?id=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure this Item is not available? You are now proceeding to Canvassing & Material Quotation.')"><i class="mdi mdi-close-circle"></i></a>
                                  </td> -->
                                </tr>

                              <!-- Modal -->
                              <div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Approved Material Request</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly>
                                        <input type="hidden" class="form-control" name="location" value="<?php echo $_SESSION['user']['group_str']; ?>" readonly>
                                        <input type="hidden" class="form-control" name="status" value="Material Request Approved" readonly>
                                        <input type="hidden" class="form-control" name="availability_status" value="Yes" readonly>
                                        <input type="hidden" class="form-control" name="requestor" value="<?php echo $_SESSION['user']['name']; ?>" readonly>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label><b>Date & Time</b></label>
                                            <input type="text" class="form-control" name="" value="<?php echo $row['dateTime']; ?>" readonly>
                                            <input type="hidden" class="form-control" name="date" id="frmDate" readonly>
                                            <input type="hidden" class="form-control" name="time" id="frmTime" readonly>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label><b>Transaction #</b></label>
                                              <input type="text" class="form-control" name="transaction_no" value="<?php echo $row['transaction_no']; ?>" readonly>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <input type="checkbox" class="read-more-state" id="post-2"> VIEW MORE ITEM<br/><br/>
                                          <div class="form-group read-more-wrap">
                                            <div class="row">
                                              <div class="col-md-6">
                                                <label><b>Material Requested</b></label>
                                                <input type="text" class="form-control" name="material_requested1" value="<?php echo $row['material_requested1']; ?>" readonly>
                                                <input type="text" class="form-control" name="material_requested2" value="<?php echo $row['material_requested2']; ?>" readonly>
                                                <input type="text" id="bg" class="form-control read-more-target" name="material_requested3" value="<?php echo $row['material_requested3']; ?>">
                                                <input type="text" id="bg" class="form-control read-more-target" name="material_requested4" value="<?php echo $row['material_requested4']; ?>">
                                                <input type="text" id="bg" class="form-control read-more-target" name="material_requested5" value="<?php echo $row['material_requested5']; ?>">
                                                <input type="text" id="bg" class="form-control read-more-target" name="material_requested6" value="<?php echo $row['material_requested6']; ?>">
                                                <input type="text" id="bg" class="form-control read-more-target" name="material_requested7" value="<?php echo $row['material_requested7']; ?>">
                                                <input type="text" id="bg" class="form-control read-more-target" name="material_requested8" value="<?php echo $row['material_requested8']; ?>">
                                                <input type="text" id="bg" class="form-control read-more-target" name="material_requested9" value="<?php echo $row['material_requested9']; ?>">
                                                <input type="text" id="bg" class="form-control read-more-target" name="material_requested10" value="<?php echo $row['material_requested10']; ?>">
                                              </div>
                                              <div class="col-md-6">
                                                <label><b>Quantity</b></label>
                                                <input type="number" class="form-control" name="quantity1" value="<?php echo $row['quantity1']; ?>" readonly>
                                                <input type="number" class="form-control" name="quantity2" value="<?php echo $row['quantity2']; ?>" readonly>
                                                <input type="number" id="bg" class="form-control read-more-target" name="quantity3" value="<?php echo $row['quantity3']; ?>">
                                                <input type="number" id="bg" class="form-control read-more-target" name="quantity4" value="<?php echo $row['quantity4']; ?>">
                                                <input type="number" id="bg" class="form-control read-more-target" name="quantity5" value="<?php echo $row['quantity5']; ?>">
                                                <input type="number" id="bg" class="form-control read-more-target" name="quantity6" value="<?php echo $row['quantity6']; ?>">
                                                <input type="number" id="bg" class="form-control read-more-target" name="quantity7" value="<?php echo $row['quantity7']; ?>">
                                                <input type="number" id="bg" class="form-control read-more-target" name="quantity8" value="<?php echo $row['quantity8']; ?>">
                                                <input type="number" id="bg" class="form-control read-more-target" name="quantity9" value="<?php echo $row['quantity9']; ?>">
                                                <input type="number" id="bg" class="form-control read-more-target" name="quantity10" value="<?php echo $row['quantity10']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <input type="submit" class="btn btn-primary" name="btn_submit" value="PREPARED ITEM"/>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            <?php } ?>
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
    $('#check').DataTable();
  } );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#checkItem').DataTable();
  } );
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