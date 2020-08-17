<?php 
	require 'config.php';

	if($_POST){
		$title = $_POST['title'];
		$desc = $_POST['description'];
		$id = $_POST['id'];

		$pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id= $id");
		$result= $pdostatement->execute();

		if($result){
			echo "<script>alert ('Updated todo');window.location.href = 'index.php'</script>";
		}
	}else{
		$pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
		$pdostatement->execute();
		$result = $pdostatement->fetchAll();

	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Todo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="card">
		<div class="card-body">
			<h2>Edit Todo</h2>
			<form action="" method="post">
				<input type="hidden" value="<?php echo $result[0]['id'] ?>" name="id">
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" class="form-control" name="title" value="<?php echo $result[0]['title']?>" required="required">
				</div>
				<div class="form-group">
					<label for="">Description</label>
					<textarea name="description" id="" cols="30" rows="10" class="form-control"><?php echo $result[0]['description'] ?></textarea>
				</div>
				<div class="form-group">
					<input type="submit" value="Update" class="btn btn-primary">
					<a href="index.php" type="button" class="btn btn-warning">Back</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>