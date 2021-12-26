<?php
	$error = '';
	if(isset($_GET['error'])){
		$error = $_GET['error'];
	} 
?>
<?php
	$success = '';
	if(isset($_GET['success'])){
		$error = $_GET['success'];
	} 
?>
<span style="color: red;">
	<?php echo $error; ?>
</span>
	<span style="color: red;">
	<?php echo $success; ?>
</span>