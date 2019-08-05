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
                      Approval Request
                    </h3><br/>
                    <div class="table-responsive">
                      <?php 

                      include '../auth/connection.php';

                        if (isset($_POST['btn_save'])) {

                          $_SESSION['success'] = $_POST['status'];

                          $requestor = $_POST['requestor'];
                          $dateTime = $_POST['dateTime'];
                          $transaction_no = $_POST['transaction_no'];
                          $availability_status = $_POST['availability_status'];
                          $status = $_POST['status'];
                          $project_no = $_POST['project_no'];
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
                          $quantity1 = isset($_POST['quantity1']) ? $_POST['quantity1'] : '';
                          $quantity2 = isset($_POST['quantity2']) ? $_POST['quantity2'] : '';
                          $quantity3 = isset($_POST['quantity3']) ? $_POST['quantity3'] : '';
                          $quantity4 = isset($_POST['quantity4']) ? $_POST['quantity4'] : '';
                          $quantity5 = isset($_POST['quantity5']) ? $_POST['quantity5'] : '';
                          $quantity6 = isset($_POST['quantity6']) ? $_POST['quantity6'] : '';
                          $quantity7 = isset($_POST['quantity7']) ? $_POST['quantity7'] : '';
                          $quantity8 = isset($_POST['quantity8']) ? $_POST['quantity8'] : '';
                          $quantity9 = isset($_POST['quantity9']) ? $_POST['quantity9'] : '';
                          $quantity10 = isset($_POST['quantity10']) ? $_POST['quantity10'] : '';
                          $price1 = isset($_POST['price1']) ? $_POST['price1'] : '';
                          $price2 = isset($_POST['price2']) ? $_POST['price2'] : '';
                          $price3 = isset($_POST['price3']) ? $_POST['price3'] : '';
                          $price4 = isset($_POST['price4']) ? $_POST['price4'] : '';
                          $price5 = isset($_POST['price5']) ? $_POST['price5'] : '';
                          $price6 = isset($_POST['price6']) ? $_POST['price6'] : '';
                          $price7 = isset($_POST['price7']) ? $_POST['price7'] : '';
                          $price8 = isset($_POST['price8']) ? $_POST['price8'] : '';
                          $price9 = isset($_POST['price9']) ? $_POST['price9'] : '';
                          $price10 = isset($_POST['price10']) ? $_POST['price10'] : '';
                          $location = $_POST['location'];
                          $id = $_POST['id'];

                          $query = mysqli_query($conn, "UPDATE request_material SET requestor = '$requestor', status = '$status', location = '$location' WHERE id = '$id' ");

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
                      <form method="POST" action="">
                        <table id="check" class="table table-striped table-bordered table-hover" style="width:100%">
                          <thead>
                            <tr>
                              <th>TRANSACTION NO.</th>
                              <th>ITEM DESCRIPTION</th>
                              <th>DATE</th>
                              <th></th>
                            </tr>
                          </thead>
                          <?php 

                            include '../auth/connection.php';

                            $query = "SELECT * FROM request_material WHERE status = 'Purchase Order Approved (1)' ORDER BY id DESC";
                            $sql = mysqli_query($conn, $query);
                            $i = 1;
                            while ($row = mysqli_fetch_array($sql)) {
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
                                  <td><button class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>"><i class="mdi mdi-eye"></i></button>
                                  </td>
                                </tr>
                              </tbody>

                              <!-- Modal -->
                              <div class="modal fade" id="myModal<?php echo $row['id']; ?>" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h3 class="modal-title" id="exampleModalLabel">MATERIAL REQUEST</h3>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
                                            <input type="hidden" name="location" class="form-control" value="<?php echo $_SESSION['user']['group_str']; ?>" readonly>
                                            <input type="hidden" name="requestor" class="form-control" value="<?php echo $_SESSION['user']['name']; ?>" readonly>
                                            <input type="hidden" name="transaction_no" class="form-control" value="<?php echo $row['transaction_no']; ?>" readonly>
                                            <input type="hidden" name="availability_status" class="form-control" value="<?php echo $row['availability_status']; ?>" readonly>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label>APPROVAL REQUEST <em class="text-danger">*required</em></label><br/>
                                                <input type="radio" name="status" value="Purchase Order Approved (2)" required> Purchase Order Approved<br/>
                                                <input type="radio" name="status" value="Purchase Order Disapproved (2)"> Purchase Order Disapproved
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label>Project No.:</label>
                                                <input type="text" name="project_no" class="form-control" value="<?php echo $row['project_no']; ?>" readonly>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label>Transaction No:</label>
                                                <input type="text" name="transaction_no" class="form-control" value="<?php echo $row['transaction_no']; ?>" readonly>
                                              </div>
                                            </div>
                                            <div class="col-md-5">
                                              <div class="form-group">
                                                <label>Date/Time Requested:</label>
                                                <input type="text" name="dateTime" class="form-control" value="<?php echo $row['dateTime']; ?>" readonly>
                                              </div>
                                            </div>
                                          </div>
                                          <input type="checkbox" class="read-more-state" id="post-2"> VIEW MORE ITEM<br/><br/>
                                          <div class="form-group read-more-wrap">
                                            <div class="row">
                                              <div class="col-md-6">
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
                                                  <div class="form-group read-more-target">
                                                    <h2 style="margin-left: 80px; margin-top: 10px;">TOTAL PRICE REQUEST</h2>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-md-6">
                                                <label>Quantity</label>
                                                <div class="form-group read-more-target">
                                                  <?php if($row['check_status1'] == 'for purchase') { ?>
                                                  <input type="text" class="form-control" name="quantity1" id="quantity1" readonly value="<?php echo $row['quantity1']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status2'] == 'for purchase') { ?>
                                                  <input type="text" class="form-control" name="quantity2" id="quantity2" readonly value="<?php echo $row['quantity2']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status3'] == 'for purchase') { ?>
                                                  <input type="text" class="form-control" name="quantity3" readonly id="quantity3" value="<?php echo $row['quantity3']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status4'] == 'for purchase') { ?>
                                                  <input type="text" class="form-control" name="quantity4" readonly id="quantity4" value="<?php echo $row['quantity4']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status5'] == 'for purchase') { ?>
                                                  <input type="text" class="form-control" name="quantity5" readonly id="quantity5" value="<?php echo $row['quantity5']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status6'] == 'for purchase') { ?>
                                                  <input type="text" class="form-control" name="quantity6" readonly id="quantity6" value="<?php echo $row['quantity6']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status7'] == 'for purchase') { ?>
                                                  <input type="text" class="form-control" name="quantity7" readonly id="quantity7" value="<?php echo $row['quantity7']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status8'] == 'for purchase') { ?>
                                                  <input type="text" class="form-control" name="quantity8" readonly id="quantity8" value="<?php echo $row['quantity8']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status9'] == 'for purchase') { ?>
                                                  <input type="text" class="form-control" name="quantity9" readonly id="quantity9" value="<?php echo $row['quantity9']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status10'] == 'for purchase') { ?>
                                                  <input type="text" class="form-control" name="quantity10" readonly id="quantity10" value="<?php echo $row['quantity10']; ?>">
                                                  <?php } ?>
                                                  <div class="form-group read-more-target">
                                                  <?php if($row['check_status1'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="prc" id="price1" value="<?php echo $row['price1']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status2'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="prc" id="price2" value="<?php echo $row['price2']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status3'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="prc" id="price3" value="<?php echo $row['price3']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status4'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="prc" id="price4" value="<?php echo $row['price4']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status5'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="prc" id="price5" value="<?php echo $row['price5']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status6'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="prc" id="price6" value="<?php echo $row['price6']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status7'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="prc" id="price7" value="<?php echo $row['price7']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status8'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="prc" id="price8" value="<?php echo $row['price8']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status9'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="prc" id="price9" value="<?php echo $row['price9']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status10'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="prc" id="price10" value="<?php echo $row['price10']; ?>">
                                                  <?php } ?>
                                                  <?php if($row['check_status1'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="output" value="<?php echo $row['quantity1'] * $row['price1'] ?> ">
                                                  <?php } ?>
                                                  <?php if($row['check_status2'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="output" value="<?php echo $row['quantity2'] * $row['price2'] ?> ">
                                                  <?php } ?>
                                                  <?php if($row['check_status3'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="output" value="<?php echo $row['quantity3'] * $row['price3'] ?> ">
                                                  <?php } ?>
                                                  <?php if($row['check_status4'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="output" value="<?php echo $row['quantity4'] * $row['price4'] ?> ">
                                                  <?php } ?>
                                                  <?php if($row['check_status5'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="output" value="<?php echo $row['quantity5'] * $row['price5'] ?> ">
                                                  <?php } ?>
                                                  <?php if($row['check_status6'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="output" value="<?php echo $row['quantity6'] * $row['price6'] ?> ">
                                                  <?php } ?>
                                                  <?php if($row['check_status7'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="output" value="<?php echo $row['quantity7'] * $row['price7'] ?> ">
                                                  <?php } ?>
                                                  <?php if($row['check_status8'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="output" value="<?php echo $row['quantity8'] * $row['price8'] ?> ">
                                                  <?php } ?>
                                                  <?php if($row['check_status9'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="output" value="<?php echo $row['quantity9'] * $row['price9'] ?> ">
                                                  <?php } ?>
                                                  <?php if($row['check_status10'] == 'for purchase') { ?>
                                                    <input type="hidden" class="form-control" name="output" value="<?php echo $row['quantity10'] * $row['price10'] ?> ">
                                                  <?php } ?>
                                                  <br/>
                                                  <input type="text" class="form-control" name="totalAmount" readonly>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <input type="submit" class="btn btn-primary" name="btn_save" value="SAVE REQUEST">
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
<script>
  $(document).ready(function(e){
    $("input").change(function(){
      var total = 0;
      $("input[name=output]").each(function() {
        total = total + parseInt($(this).val());
      })
      $("input[name=totalAmount]").val(total);
    });
  });
</script>
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