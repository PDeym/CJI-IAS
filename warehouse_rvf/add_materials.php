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
                      ADD MATERIALS
                    </h3><br/>
                    <?php 

                    include '../auth/connection.php';

                    if (isset($_POST['btn_submit'])) {
                      
                      $_SESSION['success'] = "Successfully add" ." ". $_POST['material']." ". "in inventory";
                      $dateTime = $_POST['date'] . " " .$_POST['time'];
                      $material = $_POST['material'];
                      $quantity = $_POST['quantity'];
                      $item_class = $_POST['item_class'];
                      
                      $query = mysqli_query($conn, "INSERT INTO inventory_materials (dateTime, material, quantity, item_class) VALUES ('$dateTime', '$material', '$quantity', '$item_class')" );
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
                            <div class="form-group read-more-wrap">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label><b>Material</b></label>
                                        <input type="text" class="form-control" name="material" >
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label><b>Quantity</b></label>
                                        <input type="text" class="form-control" name="quantity" >
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label><b>Item Class</b></label>
                                        <select class="form-control" name="item_class">
                                          <option selected="true" disabled="true">Choose Stock Code</option>
                                          <option value="01001 - Electrical Items">01001 - Electrical Items</option>
                                          <option value="02001 - Welding Items">02001 - Welding Items</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label><b>Date</b></label>
                                        <input type="text" class="form-control" name="date" id="frmDate" readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Time</b></label>
                                        <input type="text" class="form-control" name="time" id="frmTime" readonly>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="submit" class="btn btn-primary" name="btn_submit" value="SUBMIT TO INVENTORY"/>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <h3 class="text-dark font-weight-bold mb-2">
                              INVENTORY
                            </h3><br/>
                            <table id="check" class="table table-striped table-bordered table-hover" style="width:100%">
                              <thead>
                                <tr>
                                  <th>DATE & TIME</th>
                                  <th>AVAILABLE QUANTITY & MATERIALS</th>
                                  <th>ACTION</th>
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
                                    <td>
                                      <button type="button" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>" class="btn btn-primary">
                                      <i class="mdi mdi-pencil"></i></button>
                                    </td>
                                  </tr>

                                  <!-- Modal -->
                                  <div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">UPDATE INVENTORY</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>DATE & TIME UPDATE</label>
                                                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
                                                    <input type="text" name="dateTime" class="form-control" value="<?php echo $row['dateTime']; ?>" readonly>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <h5><center>QUANTITY</center></h5>
                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <h5><center>MATERIAL</center></h5>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <input type="text" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>">
                                                      </div>
                                                      <div class="col-md-6">
                                                        <input type="text" name="material" class="form-control" value="<?php echo $row['material']; ?>" readonly>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="submit" class="btn btn-primary" name="btn_save" value="SAVE CHANGES">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
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