<?php require_once 'apps/db.php' ?>
<?php require_once 'apps/function.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Market place</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body class="bg-secondary">


	<?php 

		// Get data from url
		$id = $_GET['id'];




		if ( isset($_POST['update']) ) {
			// create product variable
			$product_name = $_POST['product_name'];
			$product_discription = $_POST['product_discription'];
			$brand = $_POST['brand'];
			$tag = $_POST['tag'];
			$regular_price = $_POST['regular_price'];
			$sell_price = $_POST['sell_price'];
			$category = $_POST['category'];

			// photo reveive
			$new_photo = $_FILES['new_photo']['name'];
			$old_photo = $_POST['old_photo'];

			if ( empty($new_photo) ) {
				$photo_name = $old_photo;
			} else {
				// update photo
				$data = fileUpload($_FILES['new_photo'], 'photos/', ['jpg','jpeg','png','gif']);
				$photo_name = $data['file_name'];
			}
			


			if ( empty($product_name) || empty($product_discription) || empty($brand) || empty($tag) || empty($regular_price) || empty($sell_price) || empty($category) ) {
				$mess = "<h3 class='alert alert-danger small w-50'>All fields are required !<button class='close' data-dismiss='alert'>&times;</button></h3>";
			}else {
				// updata data
				$sql = "UPDATE product_info SET product_name='$product_name', photo='$photo_name', regular_price='$regular_price', sell_price='$sell_price', product_discription='$product_discription', category='$category', brand='$brand', tag='$tag' WHERE id='$id' ";
				$connection -> query($sql);

				$mess = "<h3 class='alert alert-danger small w-50'>Data upload successfully !<button class='close' data-dismiss='alert'>&times;</button></h3>";
			}


		}

		// old data
		$sql = "SELECT * FROM product_info WHERE id='$id'";
		$data = $connection -> query($sql);

		$s_p_data = $data -> fetch_assoc();



	 ?>
	
	<div class="container mt-lg-5">
		<a class="btn btn-dark text-light btn-sm" href="product-table.php">Product Table</a>

		<form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="myform" class="form-group">
			<div class="jumbotron bg-secondary shadow">
				<h3 class="mb-3 font-weight-bold">Edit Single Product</h3>
				<?php 

					if ( isset($mess) ) {
						echo $mess;
					}

				 ?>
				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Product Name</div>
							</div>
							<input name="product_name" class="form-control" style="background-color: #6C757D" value="<?php echo $s_p_data['product_name'] ?>" type="text">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Photo</div>
							</div>
							<img style="width: 60px; height: 60px;" src="photos/<?php echo $s_p_data['photo'] ?>" alt="">
							<!-- old photo receive -->
							<input name="old_photo" class="form-control" style="background-color: #6C757D; height: 60px;" value="<?php echo $s_p_data['photo'] ?>" type="hidden">
							<!-- new photo receive -->
							<input name="new_photo" class="form-control" style="background-color: #6C757D; height: 60px;" type="file">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Brand</div>
							</div>
							<input name="brand" class="form-control" style="background-color: #6C757D" value="<?php echo $s_p_data['brand'] ?>" type="text">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Tag</div>
							</div>
							<input name="tag" class="form-control" style="background-color: #6C757D" value="<?php echo $s_p_data['tag'] ?>" type="text">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Regular Price</div>
							</div>
							<input name="regular_price" class="form-control" style="background-color: #6C757D" value="<?php echo $s_p_data['regular_price'] ?>" type="number">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Sell Price</div>
							</div>
							<input name="sell_price" class="form-control" style="background-color: #6C757D" value="<?php echo $s_p_data['sell_price'] ?>" type="number">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Category</div>
							</div>
							<select name="category" class="bg-secondary text-white border-white" id="">
								<option  selected="selected" ><?php echo $s_p_data['category'] ?></option>
								<option value="High Quality">High Quality</option>
								<option value="Medium Quality">Medium Quality</option>
								<option value="Low Quality">Low Quality</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Product Discription</div>
							</div>
							<!-- <input name="product_discription" class="form-control" style="background-color: #6C757D" type="textarea"> -->
							<textarea name="product_discription" id="" class="border-white" style="background-color: #6C757D" value="" class="p-1" cols="30" rows="1"><?php echo $s_p_data['product_discription'] ?></textarea>
						</div>
					</div>
					<div class="form-group col-md-6">
						<!-- <button name="upload" class="bg-dark" style="padding: 6px; color: #fff;">Upload</button> -->
						<input name="update" class="btn btn-dark text-light" type="submit" value="Update">
					</div>
				</div>
			</div>
		</form>
	</div>



<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
	
	$('input').click(function(){
		$(this).css('background-color','#939393FF').css('color','#000000');
	});

	$('textarea').click(function(){
		$(this).css('background-color','#939393FF').css('color','#000000');
	});


</script>
</body>
</html>