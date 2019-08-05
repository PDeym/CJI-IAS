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

input#bg, #price2, #price3, #price4, #price5, #price6, #price7, #price8, #price9, #price10 {
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
                    <h3 class="text-success font-weight-bold mb-2">
                      Item to Released (From Available Item)
                    </h3><br/>
                    <div class="table-responsive">
                      <?php 

                      include '../auth/connection.php';
                        $sql = mysqli_query($conn, "SELECT * FROM inventory_materials");
                        $i = 1;
                        while ($row_invent = mysqli_fetch_array($sql)) {

                        if (isset($_POST['btn_release'])) {

                          $_SESSION['success'] = "Successfully Released Item and update Inventory!";

                          $dateTime = $_POST['date'] ." ". $_POST['time'];
                          $check_status = $_POST['check_status'];
                          $quantity1 = isset($_POST['quantity1']) ? $_POST['quantity1'] : $row_invent['quantity1'];
                          $quantity2 = isset($_POST['quantity2']) ? $_POST['quantity2'] : $row_invent['quantity2'];
                          $quantity3 = isset($_POST['quantity3']) ? $_POST['quantity3'] : $row_invent['quantity3'];
                          $quantity4 = isset($_POST['quantity4']) ? $_POST['quantity4'] : $row_invent['quantity4'];
                          $quantity5 = isset($_POST['quantity5']) ? $_POST['quantity5'] : $row_invent['quantity5'];
                          $quantity6 = isset($_POST['quantity6']) ? $_POST['quantity6'] : $row_invent['quantity6'];
                          $quantity7 = isset($_POST['quantity7']) ? $_POST['quantity7'] : $row_invent['quantity7'];
                          $quantity8 = isset($_POST['quantity8']) ? $_POST['quantity8'] : $row_invent['quantity8'];
                          $quantity9 = isset($_POST['quantity9']) ? $_POST['quantity9'] : $row_invent['quantity9'];
                          $quantity10 = isset($_POST['quantity10']) ? $_POST['quantity10'] : $row_invent['quantity10'];
                          $id = $_POST['id'];

                          $query = mysqli_query($conn, "UPDATE request_material SET  dateTime = '$dateTime', check_status = '$check_status' WHERE id = '$id' ");

                          $query_inventory = mysqli_query($conn, "UPDATE inventory_materials SET  dateTime = '$dateTime', quantity1 = '$quantity1', quantity2 = '$quantity2', quantity3 = '$quantity3', quantity4 = '$quantity4', quantity5 = '$quantity5', quantity6 = '$quantity6', quantity7 = '$quantity7', quantity8 = '$quantity8', quantity9 = '$quantity9', quantity10 = '$quantity10' WHERE id = '$id' ");
                        }
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
                        <?php 

                          include '../auth/connection.php';

                          $query = "SELECT * FROM request_material WHERE check_status = 'For Released'ORDER BY id DESC";
                          $sql = mysqli_query($conn, $query);
                          $i = 1;
                          while ($row = mysqli_fetch_array($sql)) {
                          ?>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Transaction Number</label>
                                    <input type="hidden" name="check_status" class="form-control" value="Released" readonly>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
                                    <input type="text" name="transaction_no" class="form-control" value="<?php echo $row['transaction_no']; ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Date </label>
                                        <input type="text" name="date" class="form-control" id="frmDate" readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Time </label>
                                        <input type="text" name="time" class="form-control" id="frmTime" readonly>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Material Requested</label>
                                    <?php if($row['check_status1'] == "for release") { ?>
                                      <input type="text" name="material1" class="form-control" value="<?php echo $row['material_requested1']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status2'] == "for release") { ?>
                                      <input type="text" name="material2" class="form-control" value="<?php echo $row['material_requested2']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status3'] == "for release") { ?>
                                      <input type="text" name="material3" class="form-control" value="<?php echo $row['material_requested3']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status4'] == "for release") { ?>
                                      <input type="text" name="material4" class="form-control" value="<?php echo $row['material_requested4']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status5'] == "for release") { ?>
                                      <input type="text" name="material5" class="form-control" value="<?php echo $row['material_requested5']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status6'] == "for release") { ?>
                                      <input type="text" name="material6" class="form-control" value="<?php echo $row['material_requested6']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status7'] == "for release") { ?>
                                      <input type="text" name="material7" class="form-control" value="<?php echo $row['material_requested7']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status8'] == "for release") { ?>
                                      <input type="text" name="material8" class="form-control" value="<?php echo $row['material_requested8']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status9'] == "for release") { ?>
                                      <input type="text" name="material9" class="form-control" value="<?php echo $row['material_requested9']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status10'] == "for release") { ?>
                                      <input type="text" name="material10" class="form-control" value="<?php echo $row['material_requested10']; ?>" readonly>
                                    <?php }?>
                                  </div>
                                </div> 
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Quantity</label>
                                    <?php if($row['check_status1'] == "for release") { ?>
                                      <input type="text" name="" class="form-control" value="<?php echo $row['quantity1']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status2'] == "for release") { ?>
                                      <input type="text" name="" class="form-control" value="<?php echo $row['quantity2']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status3'] == "for release") { ?>
                                      <input type="text" name="" class="form-control" value="<?php echo $row['quantity3']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status4'] == "for release") { ?>
                                      <input type="text" name="" class="form-control" value="<?php echo $row['quantity4']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status5'] == "for release") { ?>
                                      <input type="text" name="" class="form-control" value="<?php echo $row['quantity5']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status6'] == "for release") { ?>
                                      <input type="text" name="" class="form-control" value="<?php echo $row['quantity6']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status7'] == "for release") { ?>
                                      <input type="text" name="" class="form-control" value="<?php echo $row['quantity7']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status8'] == "for release") { ?>
                                      <input type="text" name="" class="form-control" value="<?php echo $row['quantity8']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status9'] == "for release") { ?>
                                      <input type="text" name="" class="form-control" value="<?php echo $row['quantity9']; ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status10'] == "for release") { ?>
                                      <input type="text" name="" class="form-control" value="<?php echo $row['quantity10']; ?>" readonly>
                                    <?php }?>
                                  </div>
                                </div> 
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Available Quantity</label>
                                    <?php if($row['check_status1'] == "for release") { ?>
                                      <input type="text" name="check_quantity1" class="form-control" value="<?php echo $row['check_quantity1'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status2'] == "for release") { ?>
                                      <input type="text" name="check_quantity2" class="form-control" value="<?php echo $row['check_quantity2'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status3'] == "for release") { ?>
                                      <input type="text" name="check_quantity3" class="form-control" value="<?php echo $row['check_quantity3'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status4'] == "for release") { ?>
                                      <input type="text" name="check_quantity4" class="form-control" value="<?php echo $row['check_quantity4'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status5'] == "for release") { ?>
                                      <input type="text" name="check_quantity5" class="form-control" value="<?php echo $row['check_quantity5'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status6'] == "for release") { ?>
                                      <input type="text" name="check_quantity6" class="form-control" value="<?php echo $row['check_quantity6'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status7'] == "for release") { ?>
                                      <input type="text" name="check_quantity7" class="form-control" value="<?php echo $row['check_quantity7'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status8'] == "for release") { ?>
                                      <input type="text" name="check_quantity8" class="form-control" value="<?php echo $row['check_quantity8'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status9'] == "for release") { ?>
                                      <input type="text" name="check_quantity9" class="form-control" value="<?php echo $row['check_quantity9'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status10'] == "for release") { ?>
                                      <input type="text" name="check_quantity10" class="form-control" value="<?php echo $row['check_quantity10'] ?>" readonly>
                                    <?php }?>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Total Inventory Quantity</label>
                                    <?php if($row['check_status1'] == "for release") { ?>
                                      <input type="text" name="quantity1" class="form-control" value="<?php echo $row['check_quantity1'] - $row['quantity1'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status2'] == "for release") { ?>
                                      <input type="text" name="quantity2" class="form-control" value="<?php echo $row['check_quantity2'] - $row['quantity2'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status3'] == "for release") { ?>
                                      <input type="text" name="quantity3" class="form-control" value="<?php echo $row['check_quantity3'] - $row['quantity3'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status4'] == "for release") { ?>
                                      <input type="text" name="quantity4" class="form-control" value="<?php echo $row['check_quantity4'] - $row['quantity4'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status5'] == "for release") { ?>
                                      <input type="text" name="quantity5" class="form-control" value="<?php echo $row['check_quantity5'] - $row['quantity5'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status6'] == "for release") { ?>
                                      <input type="text" name="quantity6" class="form-control" value="<?php echo $row['check_quantity6'] - $row['quantity6'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status7'] == "for release") { ?>
                                      <input type="text" name="quantity7" class="form-control" value="<?php echo $row['check_quantity7'] - $row['quantity7'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status8'] == "for release") { ?>
                                      <input type="text" name="quantity8" class="form-control" value="<?php echo $row['check_quantity8'] - $row['quantity8'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status9'] == "for release") { ?>
                                      <input type="text" name="quantity9" class="form-control" value="<?php echo $row['check_quantity9'] - $row['quantity9'] ?>" readonly>
                                    <?php }?>
                                    <?php if($row['check_status10'] == "for release") { ?>
                                      <input type="text" name="quantity10" class="form-control" value="<?php echo $row['check_quantity10'] - $row['quantity10'] ?>" readonly>
                                    <?php }?>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                               <div class="col-md-12">
                                 <input type="submit" name="btn_release" class="form-control btn btn-success btn-lg" value="RELEASED ITEM">
                               </div> 
                              </div>
                            </div>
                          </div>
                        <?php } ?>
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
    $('#checkRelease').DataTable();
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