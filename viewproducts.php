<?php
include("sql_connect.php");
if(isset($_GET['pid'])){
	$res=mysqli_query($mysqli, "SELECT * FROM products WHERE productID = ".$_GET['pid']);

	$product = mysqli_fetch_array($res);
}else{
	header("location:index.php");
}
?>
<html>
<head>
	<title>View Dog Breeds</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<style>
		.products{
			width:50%;
		}
	</style>
</head>
<body>
<?php include("navbar.php"); ?>
<h2 class='text-center'>Dog Breed List</h2>
<div class='row'>
<div class='col-sm-10 col-sm-offset-1'>
	<h3 class='text-center'><?php echo $product[1];?></h3>
	<p class='text-center'><small>Price: <?php echo "P".$product[2];?></small></p>
	<p class='text-center'>Description: <?php echo $product[3];?></p>
	<p class='text-center'>
		<img src='images/<?php echo $product[4];?>' class="img-thumbnail products">
	</p>
</div>
</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>