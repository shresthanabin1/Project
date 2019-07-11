<?php 
	require '../db.php';

		if (isset($_GET['del'])) {
			$id = $_GET['del'];
			$stmt = $pdo->prepare("DELETE FROM image WHERE id = '$id'");
			$result = $stmt->execute(['$id']);
			header('location:addimage.php');
		} 

 ?>