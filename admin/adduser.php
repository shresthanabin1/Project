
<?php 
session_start();
if (!isset($_SESSION['logged_user_id'])) { 
header('location: index.php');
}
	require '../db.php';
	if (isset($_POST['submit'])) {
		$stmt = $pdo->prepare("INSERT INTO user (title,firstname,surname,email,address,phone,account,code,agree,password)
			VALUES(:title, :firstname, :surname, :email, :address, :phone, :account, :code, :agree, :password)");


		$criteria=[
			'title' => $_POST['title'],
			'firstname' => $_POST['firstname'],
			'surname' => $_POST['surname'],
			'email' => $_POST['email'],
			'address' => $_POST['address'],
			'phone' => $_POST['phone'],
			'account' => $_POST['account'],
			'code' => $_POST['code'],
			'agree' => $_POST['agree'],
			'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
		];

		$stmt->execute($criteria);
	}
 ?>


<link rel="stylesheet" type="text/css" href="main.css">
<div class="container-fluid">
   <div class="row">
      <?php require 'sider.php'; ?>
      <div class="col-md-9 bg-secondary" >
	         <form method="POST" action="" class="form py-5">
	         	<h2 class="py-4"><big>Create a new account ?</big></h2>
	         	<label><b>Title:</b></label><br>
	            <input type="text" name="title" placeholder="title" required><br>
	         	<label><b>Firstname:</b></label><br>
	            <input type="text" name="firstname" placeholder="firstname" required><br>
	            <label><b>Surname:</b></label><br>
	            <input type="text" name="surname" placeholder="surname" required><br>
	            <label><b>Address:</b></label><br>
	            <input type="text" name="address" placeholder="address" required><br>
	            <label><b>Phone No:</b></label><br>
	            <input type="text" name="phone" placeholder="Phone Number (+1-555-2221)" required><br>
	            <label><b>Email Address:</b></label><br>
	            <input type="email" name="email" placeholder="email" required><br>
	            <label><b>Do you agree to the terms?</b></label><br>
	            <input type="radio" class="rado" name="agree" value="Yes" required>Yes<br>
	            <input type="radio" class="rado" name="agree" value="No" required>No<br>
	            <label><b>Bank Account No:</b></label><br>
	            <input type="text" name="account" placeholder="Bank account number" required><br>
	            <label><b>Bank Sort Code:</b></label><br>
	            <input type="text" name="code" placeholder="Bank sort code" required><br>
	            <label><b>Password:</b></label><br>
	            <input type="password" name="password" placeholder="password" required><br>
	            <button class="btn btn-info text-center my-3 px-5 font-weight-bold" name="submit">Sign Up</button>
	         </form>
      </div>
   </div>
</div>
<?php require 'footer.php'; ?>