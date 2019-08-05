<?php 

include 'connection.php';
$errors = array();
session_start();

if (isset($_POST['btn_register'])) {

$_SESSION['success'] = "Successfully Registered!";
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

$check_duplicate_department = "SELECT username FROM credentials WHERE username = '$username' ";
$result = mysqli_query($conn, $check_duplicate_department);

$count = mysqli_num_rows($result);

if ($count > 0) {
	echo "<h5 class = 'alert alert-danger'><center>The Username ".$username." is already registered.</center></h5>";
	return false;
}

if (count($errors) == 0) {
    $password = md5($password);
    $sql = "INSERT INTO credentials (name, username, password, confirmpassword)
    VALUES ( '$name', '$username', '$password', '$confirmpassword')";
    $query = mysqli_query($conn, $sql);
	$_SESSION['name'] = $name;
	header('location: success_registration.php'); //redirect to homepage
	
}

  if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
    $msg = "Image Uploaded Successfully!";
  }else{
    $err_msg = "There was a problem uploading image!";
  }
mysqli_close($conn);
}
//login from login page
if (isset($_POST['btn_login'])){
	login();
}

function login() {

include 'connection.php';
$_SESSION['error'] = "Incorrect username or password!";
$username=$_POST['username'];
$password=$_POST['password'];

    // attempt login if no errors on form
		$password = md5($password);

		$query = "SELECT * FROM credentials WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($conn, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['group_id'] == 'Super Admin') {
				$_SESSION['user'] = $logged_in_user;
				header('location: ../super_admin/');		  
			}elseif ($logged_in_user['group_id'] == 'Supervisor') {
				$_SESSION['user'] = $logged_in_user;
				header('location: ../supervisor/');	
			}elseif ($logged_in_user['group_id'] == 'Warehouse_RVF') {
				$_SESSION['user'] = $logged_in_user;
				header('location: ../warehouse_rvf/');	
			}elseif ($logged_in_user['group_id'] == 'Warehouse_RMA') {
				$_SESSION['user'] = $logged_in_user;
				header('location: ../warehouse_rma/');	
			}elseif ($logged_in_user['group_id'] == 'Administrator_DLA') {
				$_SESSION['user'] = $logged_in_user;
				header('location: ../administrator_dla/');	
			}elseif ($logged_in_user['group_id'] == 'Administrator_BJH') {
				$_SESSION['user'] = $logged_in_user;
				header('location: ../administrator_bjh/');	
			}elseif ($logged_in_user['group_id'] == 'Finance_JAM') {
				$_SESSION['user'] = $logged_in_user;
				header('location: ../finance_jam/');	
			}elseif ($logged_in_user['group_id'] == 'Finance_AMH') {
				$_SESSION['user'] = $logged_in_user;
				header('location: ../finance_amh/');	
			}elseif ($logged_in_user['group_id'] == 'Purchasing_CVM') {
				$_SESSION['user'] = $logged_in_user;
				header('location: ../purchasing_cvm/');	
			}
		}	
}

?>