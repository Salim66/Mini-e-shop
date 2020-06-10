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


		if ( isset($_POST['upload']) ) {
			// create product variable
			$product_name = $_POST['product_name'];
			$product_discription = $_POST['product_discription'];
			$brand = $_POST['brand'];
			$tag = $_POST['tag'];
			$regular_price = $_POST['regular_price'];
			$sell_price = $_POST['sell_price'];
			$category = $_POST['category'];

			

			if ( empty($product_name) || empty($product_discription) || empty($brand) || empty($tag) || empty($regular_price) || empty($sell_price) || empty($category) ) {
				$mess = "<h3 class='alert alert-danger small w-50'>All fields are required !<button class='close' data-dismiss='alert'>&times;</button></h3>";
			}elseif ( $regular_price <= $sell_price ) {
				$mess = "<h3 class='alert alert-warning small w-50'>Regular price must be less than sell price !<button class='close' data-dismiss='alert'>&times;</button></h3>";
			} else {
				// upload photo 
				$data = fileUpload($_FILES['photo'], 'photos/', ['jpg','jpeg','png','gif']);
				$photo_name = $data['file_name'];

				// validation photo
				if ( $data['status'] == 'YES' ) {
					$sql = "INSERT INTO product_info(product_name, product_discription, brand, tag, regular_price, sell_price, category, photo) VALUES('$product_name','$product_discription','$brand','$tag','$regular_price','$sell_price','$category','$photo_name')";
					$connection -> query($sql);

					// refresh page
					header('location:index.php');

					$mess = "<h3 class='alert alert-success small w-50'>Data Stable !<button class='close' data-dismiss='alert'>&times;</button></h3>";
				} else {
					$mess = "<h3 class='alert alert-warning small w-50'>Invalid image file !<button class='close' data-dismiss='alert'>&times;</button></h3>";
				}
				

			}
			



		}



	 ?>
	
	<div class="container mt-lg-5">
		<a class="btn btn-dark text-light btn-sm" href="product-table.php">Product Table</a>
		<a class="btn btn-dark text-light btn-sm" href="shop-4col.php">Show Product</a>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="myform" class="form-group">
			<div class="jumbotron bg-secondary shadow">
				<h3 class="mb-3 font-weight-bold">Add New Product</h3>
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
							<input name="product_name" class="form-control" style="background-color: #6C757D" value="<?php echo old('product_name'); ?>" type="text">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Photo</div>
							</div>
							<input name="photo" class="form-control" style="background-color: #6C757D" value="<?php echo old('photo'); ?>" type="file">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Brand</div>
							</div>
							<input name="brand" class="form-control" style="background-color: #6C757D" value="<?php echo old('brand'); ?>" type="text">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Tag</div>
							</div>
							<input name="tag" class="form-control" style="background-color: #6C757D" value="<?php echo old('tag'); ?>" type="text">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Regular Price</div>
							</div>
							<input name="regular_price" class="form-control" style="background-color: #6C757D" value="<?php echo old('regular_price'); ?>" type="number">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Sell Price</div>
							</div>
							<input name="sell_price" class="form-control" style="background-color: #6C757D" value="<?php echo old('sell_price'); ?>" type="number">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">Category</div>
							</div>
							<select name="category" class="bg-secondary text-white border-white" value="" id="">
								<option  selected="selected" ><?php echo old('category') ?></option>
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
							<textarea name="product_discription" class="border-white" id="" style="background-color: #6C757D" value="<?php echo old('product_discription'); ?>" class="p-1" cols="30" rows="1"></textarea>
						</div>
					</div>
					<div class="form-group col-md-6">
						<!-- <button name="upload" class="bg-dark" style="padding: 6px; color: #fff;">Upload</button> -->
						<input name="upload" class="btn btn-dark text-light" type="submit" value="Upload">
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