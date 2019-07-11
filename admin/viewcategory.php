<?php session_start();
if (!isset($_SESSION['logged_user_id'])) { 
header('location: index.php'); 
}?>
<link rel="stylesheet" type="text/css" href="main.css">
<div class="container-fluid">
	<?php 
		require '../db.php';
		$stmt = $pdo->prepare("SELECT * FROM category ORDER BY id");
		$stmt->execute();
	 ?>
   <div class="row">
      <?php require 'sider.php'; ?>
      <div class="col-md-9 bg-secondary" >
      	<h2><u>Categories List</u></h2>
         <table class="table table-striped table-dark table-auto text-center">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category name</th>
                  <th scope="col">Category Id</th>
                  <th scope="col">Delete</th>
                  
               </tr>
            </thead>
            <tbody>
            	<?php foreach ($stmt as $row) { ?>
               <tr>
                  <td><?php echo $row["id"]; ?></td>
                  <td><?php echo $row["title"]; ?></td>
                  <td><?php echo $row["categoryId"]; ?></td>
                  <td><a href="categorydelete.php?del=<?php echo $row['id']; ?>">Delete</a></td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php require 'footer.php'; ?>