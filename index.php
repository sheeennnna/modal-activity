<?php
include("sql_connect.php");
?>
<html>
<head>
	<title>Dog Breed List</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>

	<style>
		.mod_pic{
			width: 500px;
		}
	</style>
</head>
<body>
<?php include("navbar.php"); ?>
<h2 class='text-center'>Dog Breed List</h2>
<div class='row'>
<div class='col-sm-10 col-sm-offset-1'>
	<table class='table table-bordered'>
		<th>ID</th>
		<th>Name</th>
		<th>Price</th>
		<th>Option</th>
		<?php
			$result = mysqli_query($mysqli, "SELECT * FROM products");
			$names = array();
			$price = array();
			$pictures = array();

			if($result) {
				$index = 0;
				while ($row = mysqli_fetch_array($result)) {
					$names[] = $row[1];
					$price[] = $row[2];
					$pictures[] = $row[4];

					echo "<tr>";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>";
					echo "<button class='btn btn-sm btn-primary' alt='".$index++."'>
							<span class='glyphicon glyphicon-eye-open'></span>
							</button>";
					echo "<button class='btn btn-sm btn-warning'>
							<span class='glyphicon glyphicon-pencil'></span>
							</button>";
					echo "<button class='btn btn-sm btn-danger'>
							<span class='glyphicon glyphicon-remove'></span>
							</button>";
					echo "</td>";
					echo "</tr>";
				}
			}
		?>	
	</table>
</div>
</div>
<div class='modal fade myModal' tab-index='-1' role='dialog' aria-labelledby='myModal'>
		<div class='modal-dialog modal-md' role='document'>
			<div class='modal-content'>
				<p><strong>Name:</strong><span class='mod_name'></span></p>
				<p><strong>Price:</strong><span class='mod_price'></span></p>
				<div class='text-center'><img src="" class='mod_pic'></div>
			</div>
		</div>
	</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
var names = [<?php echo "'".join("','", $names)."'";?>];
var prices = [<?php echo "'".join("','",$price)."'";?>];
var images = [<?php echo "'".join("','",$pictures)."'";?>];


$(document).ready(function(){//validation
	$(".check").on("click", function(){
		return confirm("Are you sure?");
	});

	$(".btn-primary").on("click", function(){
		var i = $(this).attr("alt");
		var productName = names[i];
		var productPrice = prices[i];
		var productPic = images[i];

		$(".mod_name").text(" "+productName);
		$(".mod_price").text(" P"+productPrice);
		$(".mod_pic").attr("src","images/"+productPic);
		$(".modal").modal("show");
	});
});
</script>