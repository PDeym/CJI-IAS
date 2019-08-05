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
                    <h3 class="text-dark font-weight-bold mb-2">Hi <?php echo $_SESSION['user']['name']; ?>, welcome back!</h3><br/>
  									<div class="row">
  										<div class="col-lg-12">
                        <?php 
                        include '../auth/connection.php';
                        if (isset($_POST['btn_change'])) {

                          $_SESSION['success'] = "SUCCESSFULLY UPDATE YOUR ACCOUNT!" . " <a href='../auth/logout.php'>LOGOUT</a> ";
                          $name = $_POST['name'];
                          $username = $_POST['username'];
                          $password = $_POST['password'];
                          $confirmpassword = $_POST['confirmpassword'];

                          $password = md5($password);
                          $query = mysqli_query($conn, "UPDATE credentials SET name = '$name', username = '$username', password = '$password', confirmpassword = '$confirmpassword' WHERE group_id = 'Finance_AMH' ");
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


                          <h5>
                            <p class="alert alert-danger"><em><b>Notice:</b> You are using default account. You're require to change your default <b>Username & Password</b> for the <b>very first time!</b></em></p>
                          </h5>

                          <form action="" method="POST">
                            <?php 

                            include '../auth/connection.php';

                            $query = "SELECT * FROM credentials WHERE group_id = 'Finance_AMH' ";
                            $sql = mysqli_query($conn, $query);
                            $i = 1;
                            while ($row = mysqli_fetch_array($sql)) {
                              $name = $row['name'];
                              $username = $row['username'];
                              ?>
                            <div class="form-group">
                              <label><b>Name (optional)</b></label>
                              <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                            </div>
                            <div class="form-group">
                              <label><b>Username</b></label>
                              <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
                            </div>
                            <div class="form-group">
                              <label><b>Password</b></label>
                              <input type="password" name="password" class="form-control" placeholder="Input New Password" required="true" id="pass1" onkeyup="checkPass(); return false;">
                            </div>
                            <div class="form-group">
                              <label><b>Confirm Password</b></label>
                              <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm New Password" required="true" id="pass2" onkeyup="checkPass(); return false;">
                            </div>
                            <center><div id="error-nwl"></div></center>
                            <input type="submit" name="btn_change" class="btn btn-primary" value="SAVE CHANGE">
                          </form>
                        <?php } ?>
  										</div>
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
  function checkPass()
  {
      var pass1 = document.getElementById('pass1');
      var pass2 = document.getElementById('pass2');
      var message = document.getElementById('error-nwl');
      var goodColor = "#66cc66";
      var badColor = "#ff6666";
      
      if(pass1.value.length > 5)
      {
          pass1.style.backgroundColor = goodColor;
          message.style.color = goodColor;
          message.innerHTML = "character number ok!"
      }
      else
      {
          pass1.style.backgroundColor = badColor;
          message.style.color = badColor;
          message.innerHTML = "Enter atleast 6 characters"
          return;
      }
    
      if(pass1.value == pass2.value)
      {
          pass2.style.backgroundColor = goodColor;
          message.style.color = goodColor;
          message.innerHTML = "Password match!"
      }
      else
      {
          pass2.style.backgroundColor = badColor;
          message.style.color = badColor;
          message.innerHTML = "Password doesn't match!"
      }
  }  
</script>
<script type="text/javascript">
  $('#exampleModal').modal(options)
</script>