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
	<div class="container mt-lg-5">
		<a class="btn btn-dark text-white btn-sm" href="index.php">Add New Product</a>
		<div class="jumbotron bg-secondary shadow">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<input name="search" id='search' class="p-1" style="background-color: #6C757D; color: #fff;" type="text" placeholder="Product Name/Brand/Tag">
				<input name="submit" class="btn btn-dark text-light" type="submit" value="Search">
			</form>
			<table class="table text-light table-striped table-hover">
				<thead class="bg-dark text-primary">
					<tr>
						<td>SL</td>
						<td>Product_name</td>
						<td>Resular_Price</td>
						<td>Sell_Price</td>
						<td>Category</td>
						<td>Brand</td>
						<td>Tag</td>
						<td>Photo</td>
						<td colspan="3" class="text-center">Action</td>
					</tr>
				</thead>
				<tbody>
					<?php 

						if ( isset($_POST['submit']) ) {
							$search = $_POST['search'];

							$sql = "SELECT * FROM product_info WHERE product_name='$search' || brand='$search' || tag='$search' || product_name LIKE '%$search%'";
							$data = $connection -> query($sql);

							$rowcount = mysqli_num_rows($data); 

							if ($rowcount <= 0) {
								echo "<span class='bg-danger text-light p-1'>No Result found !<span>";
							}else {
								if ( isset($search) ) :
								$id = 1;
								while($fdata = $data -> fetch_assoc()):
							
						
						

						
						
						
						
					 ?>
					<tr>
						<td><?php echo $id; $id++; ?></td>
						<td><?php echo $fdata['product_name'] ?></td>
						<td><?php echo $fdata['regular_price'] ?></td>
						<td><?php echo $fdata['sell_price'] ?></td>
						<td><?php echo $fdata['category'] ?></td>
						<td><?php echo $fdata['brand'] ?></td>
						<td><?php echo $fdata['tag'] ?></td>
						<td><img style="width: 50px; height: 50px;" src="photos/<?php echo $fdata['photo'] ?>" alt=""></td>
						<td>
							<a class="btn btn-info btn-sm mx-auto" href="view.php?id=<?php echo $fdata['id'] ?>">View</a>
							<a class="btn btn-warning btn-sm mx-auto" href="edit.php?id=<?php echo $fdata['id'] ?>">Edit</a>
							<a id="delete" class="btn btn-danger btn-sm mx-auto" href="delete.php?id=<?php echo $fdata['id'] ?>">Delete</a>
						</td>
											
					</tr>
					<?php endwhile; endif; } } ?>
				</tbody>
			</table>
		</div>
	</div>
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script>
		
		$('a#delete').click(function(){

			let val = confirm("Are you sure ?");

			if (val == true) {
				return true;
			} else {
				return false;
			}

		});

		$('input#search').click(function(){
			$(this).css('background-color','#939393FF').css('color','#070707FF');
		});

	</script>
</body>
</html>