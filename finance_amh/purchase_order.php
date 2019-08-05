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
                      Purchase Order Form 
                    </h3><br/>
                    <?php 

                    include '../auth/connection.php';

                    if (isset($_POST['btn_submit'])) {
                      
                      $_SESSION['success'] = "MATERIAL REQUEST FOR PURCHASE. PLEASE WAIT FOR PURCHASE ORDER POSTED BY RMA WAREHOUSE!";
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
                      $project_no = $_POST['project_no'];
                      $price1 = $_POST['price1'];
                      $price2 = $_POST['price2'];
                      $price3 = $_POST['price3'];
                      $price4 = $_POST['price4'];
                      $price5 = $_POST['price5'];
                      $price6 = $_POST['price6'];
                      $price7 = $_POST['price7'];
                      $price8 = $_POST['price8'];
                      $price9 = $_POST['price9'];
                      $price10 = $_POST['price10'];
                      $location = $_POST['location'];
                      $id = $_POST['id'];

                      $query = mysqli_query($conn, "UPDATE request_material SET requestor = '$requestor', dateTime = '$dateTime', transaction_no = '$transaction_no', material_requested1 = '$material_requested1', material_requested2 = '$material_requested2', material_requested3 = '$material_requested3', material_requested4 = '$material_requested4', material_requested5 = '$material_requested5', material_requested6 = '$material_requested6', material_requested7 = '$material_requested7', material_requested8 = '$material_requested8', material_requested9 = '$material_requested9', material_requested10 = '$material_requested10', quantity1 = '($quantity1)', quantity2 = '($quantity2)', quantity3 = '($quantity3)', quantity4 = '($quantity4)', quantity5 = '($quantity5)', quantity6 = '($quantity6)', quantity7 = '($quantity7)', quantity8 = '($quantity8)', quantity9 = '($quantity9)', quantity10 = '($quantity10)', status = '$status', availability_status = '$availability_status', project_no = '$project_no', price1 = '= $price1', price2 = '= $price2', price3 = '= $price3', price4 = '= $price4', price5 = '= $price5', price6 = '= $price6', price7 = '= $price7', price8 = '= $price8', price9 = '= $price9', price10 = '= $price10', location = '$location' WHERE id = '$id' ");
                      
                      $query_transaction = mysqli_query($conn, "INSERT INTO transaction_history (requestor, dateTime, transaction_no, material_requested1, material_requested2, material_requested3, material_requested4, material_requested5, material_requested6, material_requested7, material_requested8, material_requested9, material_requested10, quantity1, quantity2, quantity3, quantity4, quantity5, quantity6, quantity7, quantity8, quantity9, quantity10, status, availability_status, project_no, price1, price2, price3, price4, price5, price6, price7, price8, price9, price10, location) VALUES ('$requestor', '$dateTime', '$transaction_no', '$material_requested1', '$material_requested2', '$material_requested3', '$material_requested4', '$material_requested5', '$material_requested6', '$material_requested7', '$material_requested8', '$material_requested9', '$material_requested10', '$quantity1', '$quantity2', '$quantity3', '$quantity4', '$quantity5', '$quantity6', '$quantity7', '$quantity8', '$quantity9', '$quantity10', '$status', '$availability_status', '$project_no', '$price1', '$price2', '$price3', '$price4', '$price5', '$price6', '$price7', '$price8', '$price9', '$price10', '$location')");
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
                    <?php 
                      include '../auth/connection.php';

                      if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = mysqli_query($conn, "SELECT * FROM request_material WHERE id = '$id' ");
                        $i = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <form action="" method="POST">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label><b>Project #</b></label>
                                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly>
                                <input type="hidden" class="form-control" name="location" value="<?php echo $_SESSION['user']['group_str']; ?>" readonly>
                                <input type="hidden" class="form-control" name="status" value="Material Request for Purchase" readonly>
                                <input type="hidden" class="form-control" name="availability_status" value="No" readonly>
                                <input type="hidden" class="form-control" name="requestor" value="<?php echo $_SESSION['user']['name']; ?>" readonly>
                                <input type="text" class="form-control" name="project_no">
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
                                  <input type="text" class="form-control" name="transaction_no" value="<?php echo $row['transaction_no']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <input type="checkbox" class="read-more-state" id="post-2"> LOAD MORE REQUEST<br/><br/>
                              <div class="form-group read-more-wrap">
                                <div class="row">
                                  <div class="col-md-4">
                                    <label><b>Material Requested</b></label>
                                    <input type="text" class="form-control" name="material_requested1" value="<?php echo $row['material_requested1']; ?>" readonly>
                                    <input type="text" class="form-control" name="material_requested2" value="<?php echo $row['material_requested2']; ?>" readonly>
                                    <input type="text" class="form-control read-more-target" name="material_requested3" value="<?php echo $row['material_requested3']; ?>">
                                    <input type="text" class="form-control read-more-target" name="material_requested4" value="<?php echo $row['material_requested4']; ?>">
                                    <input type="text" class="form-control read-more-target" name="material_requested5" value="<?php echo $row['material_requested5']; ?>">
                                    <input type="text" class="form-control read-more-target" name="material_requested6" value="<?php echo $row['material_requested6']; ?>">
                                    <input type="text" class="form-control read-more-target" name="material_requested7" value="<?php echo $row['material_requested7']; ?>">
                                    <input type="text" class="form-control read-more-target" name="material_requested8" value="<?php echo $row['material_requested8']; ?>">
                                    <input type="text" class="form-control read-more-target" name="material_requested9" value="<?php echo $row['material_requested9']; ?>">
                                    <input type="text" class="form-control read-more-target" name="material_requested10" value="<?php echo $row['material_requested10']; ?>">
                                  </div>
                                  <div class="col-md-4">
                                    <label><b>Quantity</b></label>
                                    <input type="number" class="form-control" name="quantity1" value="<?php echo $row['quantity1']; ?>" readonly>
                                    <input type="number" class="form-control" name="quantity2" value="<?php echo $row['quantity2']; ?>" readonly>
                                    <input type="number" class="form-control read-more-target" name="quantity3" value="<?php echo $row['quantity3']; ?>">
                                    <input type="number" class="form-control read-more-target" name="quantity4" value="<?php echo $row['quantity4']; ?>">
                                    <input type="number" class="form-control read-more-target" name="quantity5" value="<?php echo $row['quantity5']; ?>">
                                    <input type="number" class="form-control read-more-target" name="quantity6" value="<?php echo $row['quantity6']; ?>">
                                    <input type="number" class="form-control read-more-target" name="quantity7" value="<?php echo $row['quantity7']; ?>">
                                    <input type="number" class="form-control read-more-target" name="quantity8" value="<?php echo $row['quantity8']; ?>">
                                    <input type="number" class="form-control read-more-target" name="quantity9" value="<?php echo $row['quantity9']; ?>">
                                    <input type="number" class="form-control read-more-target" name="quantity10" value="<?php echo $row['quantity10']; ?>">
                                  </div>
                                  <div class="col-md-4">
                                    <label><b>Price</b></label>
                                    <input type="number" class="form-control" name="price1" placeholder="Input Price">
                                    <input type="number" class="form-control" name="price2" placeholder="Input Price">
                                    <input type="number" class="form-control read-more-target" name="price3" placeholder="Input Price">
                                    <input type="number" class="form-control read-more-target" name="price4" placeholder="Input Price">
                                    <input type="number" class="form-control read-more-target" name="price5" placeholder="Input Price">
                                    <input type="number" class="form-control read-more-target" name="price6" placeholder="Input Price">
                                    <input type="number" class="form-control read-more-target" name="price7" placeholder="Input Price">
                                    <input type="number" class="form-control read-more-target" name="price8" placeholder="Input Price">
                                    <input type="number" class="form-control read-more-target" name="price9" placeholder="Input Price">
                                    <input type="number" class="form-control read-more-target" name="price10" placeholder="Input Price">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="submit" class="form-control btn btn-warning btn-lg" name="btn_submit" value="MATERIAL REQUEST FOR PURCHASE">
                              </div>
                            </div>
                          </div>
                        </form>
                    <?php }} ?>
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