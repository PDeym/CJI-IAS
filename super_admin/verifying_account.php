<?php include '../auth/auth.php'; ?>
<?php include '_css.php'; ?>
  <body>
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
                      Request Account
                    </h3><br/>
                    <div class="table-responsive">
                      <?php 

                      include '../auth/connection.php';

                        if (isset($_POST['btn_save'])) {

                          $_SESSION['success'] = "Successfully Assign to"." ". $_POST['group_id'];

                          $group_id = $_POST['group_id'];
                          $id = $_POST['id'];

                          $query = mysqli_query($conn, "UPDATE credentials SET group_id = '$group_id' WHERE id = '$id' ");

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
                        <table id="request" class="table table-striped table-bordered table-hover" style="width:100%">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Username</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <?php 

                          include '../auth/connection.php';

                          $query = mysqli_query($conn, "SELECT * FROM credentials WHERE group_id = '' ORDER BY id DESC");
                          $i = 1;
                          while ($row = mysqli_fetch_array($query)) {
                          ?>
                            <tbody>
                              <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>"><i class="mdi mdi-eye"></i></button></td>
                              </tr>
                            </tbody>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal<?php echo $row['id']; ?>" role="dialog">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">REQUEST ACCOUNT</h3>
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
                                              <label>ASSIGN TO: <em class="text-danger">*required</em></label>
                                              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                              <select class="form-control" name="group_id" required>
                                                <option selected="true" disabled>SELECT TO ASSIGN</option>
                                                <option value="Warehouse_RVF">Warehouse RVF</option>
                                                <option value="Warehouse_RMA">Warehouse RMA</option>
                                                <option value="Administrator_DLA">Admin DLA</option>
                                                <option value="Administrator_BJH">Admin BJH</option>
                                                <option value="Finance_JAM">Finance JAM</option>
                                                <option value="Finance_AMH">Finance AMH</option>
                                                <option value="Purchasing_CVM">Purchasing CVM</option>
                                              </select>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#request').DataTable();
  } );
</script>
<script type="text/javascript">
  $('#myModal').modal(options)
</script>