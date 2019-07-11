<?php 
	session_start();

	include  "db.php";
	
	if (isset($_POST["email"])) {
		$email = $_POST["email"];
	}

	if (isset($_POST["password"])) {
		$password = $_POST["password"];
	}

	$query = "SELECT * FROM user WHERE email = '".$email."'";
	$result = $pdo->query($query);
	$total_rows = $result->rowCount();

	if ($total_rows > 0) {
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			if ($row['password'] == password_verify($password,$row['password'])) {
				$_SESSION['logged_id'] = $row['id'];
				echo "success";
			} else {
				echo "error";
			}
		}
	} else {
		echo "nouser";
	}


 ?>