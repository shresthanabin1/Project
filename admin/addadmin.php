<?php 
   session_start();
   if (!isset($_SESSION['logged_user_id'])) { 
   header('location: index.php');
   }
   
   require '../db.php';
   //Data stored in the database
   extract($_POST);
   if (isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['gender'])) {
      
      $stmt = $pdo->prepare("INSERT INTO adminregister (firstname,surname,email,address,phone,gender,password)
         VALUES(:firstname, :surname, :email, :address, :phone, :gender, :password)");
   
   
      $criteria=[
         'firstname' => $_POST['firstname'],
         'surname' => $_POST['surname'],
         'email' => $_POST['email'],
         'address' => $_POST['address'],
         'phone' => $_POST['phone'],
         'gender' => $_POST['gender'],
         'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
      ];
   
      $result = $stmt->execute($criteria);
   }
   ?>
<!-- creating admin form -->
<link rel="stylesheet" type="text/css" href="main.css">
<div class="container-fluid">
   <div class="row">
      <?php require 'sider.php'; ?>
      <div class="col-md-9 bg-secondary" >
         <form method="POST" action="" class="form py-5">
            <h2 class="py-4"><big>Create a new account ?</big></h2>
            <label><b>Firstname:</b></label><br>
            <input type="text" name="firstname" placeholder="firstname" required><br>
            <label><b>Surname:</b></label><br>
            <input type="text" name="surname" placeholder="surname" required><br>
            <label><b>Email Address:</b></label><br>
            <input type="email" name="email" placeholder="email" required><br>
            <label><b>Address:</b></label><br>
            <input type="text" name="address" placeholder="address" required><br>
            <label><b>Phone No:</b></label><br>
            <input type="text" name="phone" placeholder="phone number" required><br>
            <label><b>Gender:</b></label><br>
            <input type="radio" class="rado" name="gender" value="male" required>Male<br>
            <input type="radio" class="rado" name="gender" value="female" required>Female<br>
            <label><b>Password:</b></label><br>
            <input type="password" name="password" placeholder="password" required><br>
            <button class="btn btn-info text-center my-3 px-5 font-weight-bold" name="save" >Sign Up</button>
         </form>
      </div>
   </div>
</div>
<?php require 'footer.php'; ?>