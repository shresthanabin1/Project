<?php require "header.php" ?>
<?php require '../db.php'; ?>
<?php 
	
session_start();
if (!isset($_SESSION['logged_user_id'])) { 
header('location: index.php');
}

	if (isset($_POST['save'])) {
			
		$stmt = $pdo-prepare('INSERT INTO adminregister')	

		$criteria=[
			'username'=>$_POST['username'],
			'email'=>$_POST['email'],
			'phone'=>$_POST['phone'],
			'address'=>$_POST['address'],
			'description'=>$_POST['description'],
			'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT)
		];
		unset($_POST['save']);
		$register->save($criteria);
	}
 ?>

<div class="container-fluid bg-light">
	<div class="row text-center ">
		<div class="col-md-3"></div>
		<div class="col-md-6 my-5">
			<div class="main-login register_container">
				<div class="form border py-3" method="POST" action="" id="register-form">
					<h3 class="login font-weight-bold">Admin Registration Form</h3>
					<hr>
					<input type="text" name="username" placeholder="Username" ><br><br>
					<input type="email" name="email" placeholder="Email" ><br><br>
					<input type="text" name="phone" placeholder="Phone" ><br><br>
					<input type="text" name="address" placeholder="Address" ><br><br>
					<textarea class="description-control" name="description" placeholder="Description" cols="40" rows="4"></textarea><br><br>
					<input type="password" name="password" placeholder="password" ><br><br>
					<input type="password" name="cpassword" placeholder="Confirm password" ><br><br>
					<input type="submit" name="save" >

				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

<?php require "footer.php" ?>