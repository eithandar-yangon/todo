<?php 
require 'config.php';

$pdostatement=$pdo->prepare('DELETE FROM todo WHERE id='.$_GET['id']);
$result = $pdostatement->execute();

header('location:index.php');


 ?>