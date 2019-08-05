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
                    Transmittal Request
                  </h3><br/>
                  <?php 

                  include '../auth/connection.php';

                  if (isset($_POST['btn_request'])) {

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
                    $quantity1 = isset($_POST['quantity1']) ? $_POST['quantity1'] : '0';
                    $quantity2 = isset($_POST['quantity2']) ? $_POST['quantity2'] : '0';
                    $quantity3 = isset($_POST['quantity3']) ? $_POST['quantity3'] : '0';
                    $quantity4 = isset($_POST['quantity4']) ? $_POST['quantity4'] : '0';
                    $quantity5 = isset($_POST['quantity5']) ? $_POST['quantity5'] : '0';
                    $quantity6 = isset($_POST['quantity6']) ? $_POST['quantity6'] : '0';
                    $quantity7 = isset($_POST['quantity7']) ? $_POST['quantity7'] : '0';
                    $quantity8 = isset($_POST['quantity8']) ? $_POST['quantity8'] : '0';
                    $quantity9 = isset($_POST['quantity9']) ? $_POST['quantity9'] : '0';
                    $quantity10 = isset($_POST['quantity10']) ? $_POST['quantity10'] : '0';
                    $status = $_POST['status'];
                    $availability_status = $_POST['availability_status'];
                    $project_no = $_POST['project_no'];
                    $price1 = isset($_POST['price1']) ? $_POST['price1'] : '0';
                    $price2 = isset($_POST['price2']) ? $_POST['price2'] : '0';
                    $price3 = isset($_POST['price3']) ? $_POST['price3'] : '0';
                    $price4 = isset($_POST['price4']) ? $_POST['price4'] : '0';
                    $price5 = isset($_POST['price5']) ? $_POST['price5'] : '0';
                    $price6 = isset($_POST['price6']) ? $_POST['price6'] : '0';
                    $price7 = isset($_POST['price7']) ? $_POST['price7'] : '0';
                    $price8 = isset($_POST['price8']) ? $_POST['price8'] : '0';
                    $price9 = isset($_POST['price9']) ? $_POST['price9'] : '0';
                    $price10 = isset($_POST['price10']) ? $_POST['price10'] : '0';

                    $cash_request = ($quantity1 * $price1) + ($quantity2 * $price2) + ($quantity3 * $price3) + ($quantity4 * $price4) + ($quantity5 * $price5) + ($quantity6 * $price6) + ($quantity7 * $price7) + ($quantity8 * $price8) + ($quantity9 * $price9) + ($quantity10 * $price10);

                    $purchaser = $_POST['purchaser'];
                    $location = $_POST['location'];
                    $id = $_POST['id'];

                    $_SESSION['success'] = "CASH REQUEST POSTED! The total price of your cash request is ₱".$cash_request;
                    $query = mysqli_query($conn, "UPDATE request_material SET requestor = '$requestor', dateTime = '$dateTime', status = '$status', purchaser = '$purchaser', cash_request = '$cash_request', location = '$location' WHERE id = '$id' ");
                    
                    $query_history = mysqli_query($conn, "INSERT INTO transaction_history (requestor, dateTime, transaction_no, material_requested1, material_requested2, material_requested3, material_requested4, material_requested5, material_requested6, material_requested7, material_requested8, material_requested9, material_requested10, quantity1, quantity2, quantity3, quantity4, quantity5, quantity6, quantity7, quantity8, quantity9, quantity10, status, availability_status, project_no, location) VALUES ('$requestor', '$dateTime', '$transaction_no', '$material_requested1', '$material_requested2', '$material_requested3', '$material_requested4', '$material_requested5', '$material_requested6', '$material_requested7', '$material_requested8', '$material_requested9', '$material_requested10', '$quantity1', '$quantity2', '$quantity3', '$quantity4', '$quantity5', '$quantity6', '$quantity7', '$quantity8', '$quantity9', '$quantity10', '$status', '$availability_status', '$project_no', '$location') ");
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
                            <th>ITEM DESCRIPTION</th>
                            <th>DATE & TIME</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <?php 

                          include '../auth/connection.php';

                          $query = mysqli_query($conn, "SELECT * FROM request_material WHERE status = 'Transmittal to Finance' ORDER BY id DESC");
                          $i = 1;
                          while ($row = mysqli_fetch_array($query)) {
                          ?>
                          <tbody>
                            <tr>
                              <td><?php echo $row['transaction_no']; ?></td>
                              <td>
                                <?php if($row['check_status1'] == "for purchase") { ?>
                                  <?php echo $row['quantity1']; ?>
                                  <?php echo $row['material_requested1']; ?><br/>
                                <?php } ?>
                                <?php if($row['check_status2'] == "for purchase") { ?>
                                  <?php echo $row['quantity2']; ?>
                                  <?php echo $row['material_requested2']; ?><br/>
                                <?php } ?>
                                <?php if($row['check_status3'] == "for purchase") { ?>
                                  <?php echo $row['quantity3']; ?>
                                  <?php echo $row['material_requested3']; ?><br/>
                                <?php } ?>
                                <?php if($row['check_status4'] == "for purchase") { ?>
                                  <?php echo $row['quantity4']; ?>
                                  <?php echo $row['material_requested4']; ?><br/>
                                <?php } ?>
                                <?php if($row['check_status5'] == "for purchase") { ?>
                                  <?php echo $row['quantity5']; ?>
                                  <?php echo $row['material_requested5']; ?><br/>
                                <?php } ?>
                                <?php if($row['check_status6'] == "for purchase") { ?>
                                  <?php echo $row['quantity6']; ?>
                                  <?php echo $row['material_requested6']; ?><br/>
                                <?php } ?>
                                <?php if($row['check_status7'] == "for purchase") { ?>
                                  <?php echo $row['quantity7']; ?>
                                  <?php echo $row['material_requested7']; ?><br/>
                                <?php } ?>
                                <?php if($row['check_status8'] == "for purchase") { ?>
                                  <?php echo $row['quantity8']; ?>
                                  <?php echo $row['material_requested8']; ?><br/>
                                <?php } ?>
                                <?php if($row['check_status9'] == "for purchase") { ?>
                                  <?php echo $row['quantity9']; ?>
                                  <?php echo $row['material_requested9']; ?><br/>
                                <?php } ?>
                                <?php if($row['check_status10'] == "for purchase") { ?>
                                  <?php echo $row['quantity10']; ?>
                                  <?php echo $row['material_requested10']; ?><br/>
                                <?php } ?>
                              </td>
                              <td><?php echo $row['dateTime']; ?></td>
                              <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>"><i class="mdi mdi-eye"></i></button>
                              </td>
                            </tr>
                          </tbody>


                          <!-- Modal -->
                          <div class="modal fade" id="myModal<?php echo $row['id']; ?>" role="dialog">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">
                                    Material Requested by: <b><?php echo $row['location']; ?> / <?php echo $row['requestor']; ?></b>
                                  </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Purchaser</label>
                                        <input type="text" class="form-control" name="purchaser" placeholder="Input Purchaser" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <input type="hidden" class="form-control" name="id" readonly value="<?php echo $row['id']; ?>">
                                    <input type="hidden" class="form-control" name="requestor" readonly value="<?php echo $_SESSION['user']['name']; ?>">
                                    <input type="hidden" class="form-control" name="status" readonly value="Cash Request Posted">
                                    <input type="hidden" class="form-control" name="availability_status" readonly value="<?php echo $row['availability_status']; ?>">
                                    <input type="hidden" class="form-control" name="location" readonly value="<?php echo $_SESSION['user']['group_str']; ?>">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>Project No.</label>
                                        <input type="text" class="form-control" name="project_no" readonly value="<?php echo $row['project_no']; ?>">
                                        <input type="hidden" class="form-control" name="transaction_no" readonly value="<?php echo $row['transaction_no']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" class="form-control" name="date" id="frmDate" value="" readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>Time</label>
                                        <input type="text" class="form-control" name="time" id="frmTime" value="" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <input type="checkbox" class="read-more-state" id="post-2"> LOAD MORE<br/><br/>
                                      <div class="form-group read-more-wrap">
                                        <div class="row">
                                          <div class="col-md-5">
                                            <div class="form-group">
                                              <label>Item Description</label>
                                              <?php if($row['check_status1'] == "for purchase") { ?>
                                              <input type="text" class="form-control" name="material_requested1" readonly value="<?php echo $row['material_requested1']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status2'] == "for purchase") { ?>
                                              <input type="text" class="form-control" name="material_requested2" readonly value="<?php echo $row['material_requested2']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status3'] == "for purchase") { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="material_requested3" value="<?php echo $row['material_requested3']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status4'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="material_requested4" value="<?php echo $row['material_requested4']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status5'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="material_requested5" value="<?php echo $row['material_requested5']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status6'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="material_requested6" value="<?php echo $row['material_requested6']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status7'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="material_requested7" value="<?php echo $row['material_requested7']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status8'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="material_requested8" value="<?php echo $row['material_requested8']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status9'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="material_requested9" value="<?php echo $row['material_requested9']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status10'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="material_requested10" value="<?php echo $row['material_requested10']; ?>">
                                              <?php } ?>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label>Quantity</label>
                                              <?php if($row['check_status1'] == 'for purchase') { ?>
                                              <input type="text" class="form-control" name="quantity1" readonly value="<?php echo $row['quantity1']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status2'] == 'for purchase') { ?>
                                              <input type="text" class="form-control" name="quantity2" readonly value="<?php echo $row['quantity2']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status3'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="quantity3" value="<?php echo $row['quantity3']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status4'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="quantity4" value="<?php echo $row['quantity4']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status5'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="quantity5" value="<?php echo $row['quantity5']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status6'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="quantity6" value="<?php echo $row['quantity6']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status7'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="quantity7" value="<?php echo $row['quantity7']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status8'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="quantity8" value="<?php echo $row['quantity8']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status9'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="quantity9" value="<?php echo $row['quantity9']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status10'] == 'for purchase') { ?>
                                              <input type="text" id="bg" class="form-control read-more-target" name="quantity10" value="<?php echo $row['quantity10']; ?>">
                                              <?php } ?>
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="form-group">
                                              <label>Price:</label>
                                              <?php if($row['check_status1'] == 'for purchase') { ?>
                                              <input type="text" id="qty1" name="price1" class="form-control" value="<?php echo $row['price1']; ?>" readonly>
                                              <?php } ?>
                                              <?php if($row['check_status2'] == 'for purchase') { ?>
                                              <input type="text" id="qty2" name="price2" class="form-control read-more-target" value="<?php echo $row['price2']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status3'] == 'for purchase') { ?>
                                              <input type="text" id="qty3" name="price3" class="form-control read-more-target" value="<?php echo $row['price3']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status4'] == 'for purchase') { ?>
                                              <input type="text" id="qty4" name="price4" class="form-control read-more-target" value="<?php echo $row['price4']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status5'] == 'for purchase') { ?>
                                              <input type="text" id="qty5" name="price5" class="form-control read-more-target" value="<?php echo $row['price5']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status6'] == 'for purchase') { ?>
                                              <input type="text" id="qty6" name="price6" class="form-control read-more-target" value="<?php echo $row['price6']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status7'] == 'for purchase') { ?>
                                              <input type="text" id="qty7" name="price7" class="form-control read-more-target" value="<?php echo $row['price7']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status8'] == 'for purchase') { ?>
                                              <input type="text" id="qty8" name="price8" class="form-control read-more-target" value="<?php echo $row['price8']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status9'] == 'for purchase') { ?>
                                              <input type="text" id="qty9" name="price9" class="form-control read-more-target" value="<?php echo $row['price9']; ?>">
                                              <?php } ?>
                                              <?php if($row['check_status10'] == 'for purchase') { ?>
                                              <input type="text" id="qty10" name="price10" class="form-control read-more-target" value="<?php echo $row['price10']; ?>">
                                              <?php } ?>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="btn_request" value="CASH REQUEST POSTED" class="btn btn-primary">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
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
  $('#myModal').modal(options)
</script>
<script type="text/javascript">
  function calc() {
        let qty1 = Number(document.querySelector("#qty1").value);
        let qty2 = Number(document.querySelector("#qty2").value);
        let qty3 = Number(document.querySelector("#qty3").value);
        let qty4 = Number(document.querySelector("#qty4").value);
        let qty5 = Number(document.querySelector("#qty5").value);
        let qty6 = Number(document.querySelector("#qty6").value);
        let qty7 = Number(document.querySelector("#qty7").value);
        let qty8 = Number(document.querySelector("#qty8").value);
        let qty9 = Number(document.querySelector("#qty9").value);
        let qty10 = Number(document.querySelector("#qty10").value);
        let sum = qty1 + qty2 + qty3 + qty4 + qty5 + qty6 + qty7 + qty8 + qty9 + qty10;
        document.getElementById("sum").value = sum.toFixed(2);
    }
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