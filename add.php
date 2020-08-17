<?php 
	require('config.php');
	if($_POST){
		$title = $_POST['title'];
		$desc = $_POST['description'];

		$sql = 'INSERT INTO todo(title,description) VALUES (:title,:description)';
		$pdostatement = $pdo->prepare($sql);
		$result = $pdostatement->execute(
			array(
				':title'=>$title,
				':description'=>$desc
				)
			);

		if($result){
			echo "<script>alert('New todo is added');window.location.href='index.php'</script>";
		}

	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Todo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="card">
		<div class="card-body">
			<h2>Create New Todo</h2>
			<form action="add.php" method="post">
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" class="form-control" name="title" value="" required="required">
				</div>
				<div class="form-group">
					<label for="">Description</label>
					<textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" value="Submit" class="btn btn-primary">
					<a href="index.php" type="button" class="btn btn-warning">Back</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>