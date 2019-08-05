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
                      Released Item
                    </h3><br/>
                    <div class="table-responsive">
                      <form method="POST" action="">
                        <table id="request" class="table table-striped table-bordered table-hover" style="width:100%">
                          <thead>
                            <tr>
                              <th>TRANSACTION NO.</th>
                              <th>ITEM DESCRIPTION & QUANTITY</th>
                              <th>DATE</th>
                            </tr>
                          </thead>
                          <?php 

                          include '../auth/connection.php';

                          $query = mysqli_query($conn, "SELECT * FROM transaction_history WHERE status = 'Material Request Posted' ORDER BY id DESC");
                          $i = 1;
                          while ($row = mysqli_fetch_array($query)) {
                          ?>
                            <tbody>
                              <tr>
                                <td><?php echo $row['transaction_no']; ?></td>
                                <td>
                                  <?php echo $row['quantity1']; ?>
                                  <?php echo $row['material_requested1']; ?> <br/>
                                  <?php echo $row['quantity2']; ?>
                                  <?php echo $row['material_requested2']; ?> <br/>
                                  <?php echo $row['quantity3']; ?>
                                  <?php echo $row['material_requested3']; ?> <br/>
                                  <?php echo $row['quantity4']; ?>
                                  <?php echo $row['material_requested4']; ?> <br/>
                                  <?php echo $row['quantity5']; ?>
                                  <?php echo $row['material_requested5']; ?> <br/>
                                  <?php echo $row['quantity6']; ?>
                                  <?php echo $row['material_requested6']; ?> <br/>
                                  <?php echo $row['quantity7']; ?>
                                  <?php echo $row['material_requested7']; ?> <br/>
                                  <?php echo $row['quantity8']; ?>
                                  <?php echo $row['material_requested8']; ?> <br/>
                                  <?php echo $row['quantity9']; ?>
                                  <?php echo $row['material_requested9']; ?> <br/>
                                  <?php echo $row['quantity10']; ?>
                                  <?php echo $row['material_requested10']; ?> 
                                </td>
                                <td><?php echo $row['dateTime']; ?></td>
                              </tr>
                            </tbody>
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