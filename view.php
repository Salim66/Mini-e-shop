<?php include_once 'apps/db.php' ?>
<?php include_once 'apps/function.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Market Place</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body class="bg-secondary">
	<?php 
		// Get data from url
		$id = $_GET['id'];

		// query id base data from database
		$sql = "SELECT * FROM product_info WHERE id='$id'";
		$data = $connection -> query($sql);

		$fdata = $data -> fetch_assoc();

	 ?>
	<div class="container mt-lg-5" style="width: 450px;">
		<a class="btn btn-dark text-white btn-sm" href="product-table.php">Back</a>
		<div class="jumbotron bg-secondary shadow">
			<img style="width: 150px;" class="mx-auto d-block img-thumbnail" src="photos/<?php echo $fdata['photo'] ?>" alt=""><br>
			<!-- <hr class="bg-light"> -->
			<table class="table">
				<tbody class="text-light">
					<tr>
						<td>Porduct_Name</td>
						<td><?php echo $fdata['product_name'] ?></td>
					</tr>
					<tr>
						<td>Category</td>
						<td><?php echo $fdata['category'] ?></td>
					</tr>
					<tr>
						<td>Brand</td>
						<td><?php echo $fdata['brand'] ?></td>
					</tr>
					<tr>
						<td>Tag</td>
						<td><?php echo $fdata['tag'] ?></td>
					</tr>
					<tr>
						<td>Regular_Price</td>
						<td><?php echo $fdata['regular_price'] ?></td>
					</tr>
					<tr>
						<td>Sell_Price</td>
						<td><?php echo $fdata['sell_price'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>