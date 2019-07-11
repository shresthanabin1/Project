<?php 
   session_start();
   if (!isset($_SESSION['logged_user_id'])) { 
   $id = $_SESSION['logged_user_id'];
   header('location: index.php');
   }
   //upload image in the database
   $connect = mysqli_connect('localhost','student','','software3');
   $msg = "";
   if (isset($_POST['upload'])) {
   	$target = "image/".basename($_FILES['images']['name']);
   	$images = $_FILES['images']['name'];
   	$username =$_POST['username'];
   	$photoId =$_POST['photoId'];
   
   	$sql = "INSERT INTO image (username, images, photoId)
   		VALUES('$username', '$images', '$photoId')";
   	mysqli_query($connect,$sql);
   
   	if (move_uploaded_file($_FILES['images']['tmp_name'], $target)) {
   		$msg ="image uploaded successfully";
   	} else{
   		$msg = "Not inserted";
   	}
   }
   ?>
<link rel="stylesheet" type="text/css" href="main.css">
<div class="container-fluid">
   <div class="row">
      <?php require 'sider.php'; ?>
      <div class="col-md-9 bg-secondary" >
         <form method="POST" action="" class="form py-5" enctype="multipart/form-data">
            <h2 class="py-4"><big>Adding New Images </big></h2>
            <label><b>Title:</b></label><br>
            <input type="text" name="username" placeholder="Image name" required><br>
            <label><b>Image Id:</b></label><br>
            <input type="text" name="photoId" placeholder="image id" required><br>
            <label><b>Image:</b></label><br>
            <input type="file" name="images"><br>
            <input type="submit" name="upload" class="btn btn-info text-center my-3 px-5 font-weight-bold" value="Submit">
         </form>
         Displaying the data in the database
         <div class="table-responsive">
            <table class="table table-border table-striped table-hover">
               <thead>
                  <th>Image Id</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Delete</th>
               </thead>
               <tbody>
                  <?php 
                     $qry = "SELECT * FROM image";
                     $displayquery = mysqli_query($connect, $qry);
                     // $row =mysqli_num_rows($displayquery);
                     
                     while ($result = mysqli_fetch_array($displayquery)) {
                     ?>	
                  <tr>
                     <td><?php echo $result['photoId']; ?></td>
                     <td><?php echo $result['username']; ?></td>
                     <td><?php echo '<img src="image/'. $result['images'].'"height="100px" width="130px";'?></td>
                     <td><a href="imagedelete.php?del=<?php echo $result['id']; ?>">Delete</a></td>
                  </tr>
                  <?php		
                     }
                     ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<?php require 'footer.php'; ?>