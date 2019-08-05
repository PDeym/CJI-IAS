<?php 
	
	include '../auth/connection.php';

	if (isset($_POST["requestor"])) {
		$requestor = $_POST['requestor'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$location = $_POST['location'];
		$status = $_POST['status'];
		$transaction_no = $_POST['transaction_no'];
		$material_requested1 = $_POST['material_requested1'];
		$quantity1 = $_POST['quantity1'];
		$query = '';
		for($count = 0; $count < count($requestor); $count++)
		{
			$requestor_clean = mysqli_real_escape_string($conn, $requestor[$count]);
			$date_clean = mysqli_real_escape_string($conn, $date[$count]);
			$time_clean = mysqli_real_escape_string($conn, $time[$count]);
			$location_clean = mysqli_real_escape_string($conn, $location[$count]);
			$status_clean = mysqli_real_escape_string($conn, $status[$count]);
			$transaction_no_clean = mysqli_real_escape_string($conn, $transaction_no[$count]);
			$material_requested1_clean = mysqli_real_escape_string($conn, $material_requested1[$count]);
			$quantity1_clean = mysqli_real_escape_string($conn, $quantity1[$count]);
			if ( $requestor_clean != '' && $date_clean != '' && $time_clean != '' && $location_clean != '' && $status_clean != '' && $transaction_no_clean != '' && $material_requested1_clean != '' && $quantity1_clean != '') 
			{
				$query .='
				INSERT INTO request_material(requestor, date, time, location, status, transaction_no, material_requested1, quantity1)
				VALUES("'.$requestor_clean.'","'.$date_clean.'","'.$time_clean.'","'.$location_clean.'","'.$status_clean.'","'.$transaction_no_clean.'","'.$material_requested1_clean.'","'.$quantity1_clean.'");
				';

			}
		}
		if ($query != '') 
		{
			if (mysqli_multi_query($conn, $query)) 
			{
				echo 'Item Data Inserted';
			}
			else
			{
				echo 'Error';
			}
		}
		else
		{
			echo 'All fields are Required!';
		}
	}
?>