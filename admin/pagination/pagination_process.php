<?php
	$pages = 1;
	if (isset($_GET['pages'])) {
		$pages = $_GET['pages'];
	}

	$array_number_of_rows = mysqli_query($connect,$sql_number_of_rows);
	$result_number_of_rows = mysqli_fetch_array($array_number_of_rows);
	$number_of_rows = $result_number_of_rows['count(*)'];

	$number_of_rows_on_pages = 3;
	$number_of_pages = ceil($number_of_rows/$number_of_rows_on_pages);
	$offset = $number_of_rows_on_pages * ($pages- 1);	
?> 