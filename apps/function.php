<?php 


	// Data recovery
	function old($name){
		if ( isset($_POST[$name]) ) {
			echo $_POST[$name];
		}

	}

	// create function with database validation
	function fileUpload($file, $location, $extension){

		$photo_name = $file['name'];
		$photo_tmp_name = $file['tmp_name'];

		// file extension
		$array_name = explode(".", $photo_name);
		$extension_low = strtolower(end($array_name));

		// unique file name
		$unique_name = md5(time().rand()). '.' .$extension_low;

		if ( in_array($extension_low, $extension) ) {
		 	// upload photo function
		 	move_uploaded_file($photo_tmp_name, $location.$unique_name);
		 	$status = 'YES'; 
		 } else {
		 	$status = 'NO';
		 }

		 return [
		 	'file_name' => $unique_name,
		 	'status' => $status,
		 ];
		  

	}



 ?>