<?php session_start();
if (!isset($_SESSION['logged_user_id'])) { 
header('location: index.php'); 
}?>
<link rel="stylesheet" type="text/css" href="main.css">
<div class="container-fluid">
	<?php 
		require '../db.php';
		$stmt = $pdo->prepare("SELECT * FROM requestuser ORDER BY id");
		$stmt->execute();
	 ?>
   <div class="row">
      <?php require 'sider.php'; ?>
      <div class="col-md-9 bg-secondary" >
      	<h2><u>Requested User List</u></h2>
         <table class="table table-striped table-dark table-auto">
            <thead>
               <tr>
                  <th scope="col">Firstname</th>
                  <th scope="col">Surname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Address</th>
                  <th scope="col">Phone no</th>
                  <th scope="col">Bank Account</th>
                  <th scope="col">Code</th>
                  <th scope="col">Delete</th>
               </tr>
            </thead>
            <tbody>
            	<?php foreach ($stmt as $row) { ?>
               <tr>
                  <td><?php echo $row["firstname"]; ?></td>
                  <td><?php echo $row["surname"]; ?></td>
                  <td><?php echo $row["email"]; ?></td>
                  <td><?php echo $row["address"]; ?></td>
                  <td><?php echo $row["phone"]; ?></td>
                  <td><?php echo $row["account"]; ?></td>
                  <td><?php echo $row["code"]; ?></td>
                  <td><a href="requestdelete.php?del=<?php echo $row['id']; ?>">Delete</a></td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php require 'footer.php'; ?>