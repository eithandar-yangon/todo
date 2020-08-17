<?php 
require("config.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<?php 
	$pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
	$pdostatement->execute();
	$result = $pdostatement->fetchAll();


	 ?>
	<div class="card">
		<div class="card-body">
			<h2>Todo Home Page</h2>
			<a href="add.php" class="btn btn-success">Create</a>
			<br><br>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Description</th>
						<th>Created</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 

				if($result){
					$i=1;
					foreach ($result as $value) {
						

				?>
				<tr>
						<td><?php echo $i ?> </td>
						<td><?php echo $value['title'] ?> </td>
						<td><?php echo $value['description'] ?> </td>
						<td><?php echo date('Y-m-d',strtotime($value['created_date'] ))?> </td>
						<td>
							<a href="edit.php?id=<?php echo $value['id'] ?>" type="button" class="btn btn-warning">Edit</a>
							<a href="delete.php?id=<?php echo $value['id'] ?> " type="button" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php		
					$i++;
					}

				}

				 ?>

				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
