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
                    Cash Voucher
                  </h3><br/>
                  <?php 

                  include '../auth/connection.php';

                  if (isset($_POST['btn_request'])) {
                    
                    $_SESSION['success'] = $_POST['status'];
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
                    $status = $_POST['status'];
                    $availability_status = $_POST['availability_status'];
                    $project_no = $_POST['project_no'];
                    $purchaser = $_POST['purchaser'];
                    $cash_request = $_POST['cash_request'];
                    $location = $_POST['location'];
                    $id = $_POST['id'];

                    $query = mysqli_query($conn, "UPDATE request_material SET requestor = '$requestor', dateTime = '$dateTime', status = '$status', purchaser = '$purchaser', cash_request = '$cash_request' WHERE id = '$id' ");
                    
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
                      <div class="row">
                        <div class="col-md-12">
                          <table id="check" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                              <tr>
                                <th>TRANSACTION NO.</th>
                                <th>DATE & TIME</th>
                                <th>ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 

                              include '../auth/connection.php';

                              $query = mysqli_query($conn, "SELECT * FROM liquidation ORDER BY id DESC");
                              $i = 1;
                              while ($row = mysqli_fetch_array($query)) {
                              ?>
                                <tr>
                                  <td><?php echo $row['transaction_no']; ?></td>
                                  <td><?php echo $row['dateTime']; ?></td>
                                  <td>
                                    <a href="view_liquidation.php?transaction_no=<?php echo $row['transaction_no']; ?>" class="btn btn-success"><i class="mdi mdi-eye"></i></a>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
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