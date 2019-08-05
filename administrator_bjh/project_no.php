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
                      Add Project No.
                    </h3><br/>
                    <div class="table-responsive">
                      <?php 

                      include '../auth/connection.php';

                        if (isset($_POST['btn_save'])) {

                          $_SESSION['success'] = "Successfully Added Project No.";

                          $project_no = $_POST['project_no'];

                          $query = mysqli_query($conn, "INSERT INTO project_no (project_no) VALUES ('$project_no')");

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
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Add Project No.</label>
                              <input type="text" name="project_no" class="form-control">
                            </div>
                            <div class="form-group">
                              <input type="submit" name="btn_save" class="form-control btn btn-primary" value="SUBMIT">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>List of Project No.</label>
                              <select class="form-control">
                                <?php 
                                include '../auth/connection.php';
                                $query = mysqli_query($conn, "SELECT * FROM project_no WHERE status = '' ORDER by id DESC");
                                $i = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <option><?php echo $row['project_no']; ?></option>
                                <?php } ?>
                                
                              </select>
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