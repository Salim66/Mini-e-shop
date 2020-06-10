<?php 


	require_once 'apps/db.php';
	require_once 'apps/function.php';

	// Get url
	$id = $_GET['id'];


	// query delete data
	$sql = "DELETE FROM product_info WHERE id='$id'";
	$connection -> query($sql);

	header("location:product-table.php");




