<?php 
session_start();
if (!isset($_SESSION['logged_user_id'])) { 
header('location: index.php');
}
	$connect = mysqli_connect('localhost','student','','software3');
	$msg = "";
	if (isset($_POST['submit'])) {
		$target = "image/product/".basename($_FILES['images']['name']);
		$images = $_FILES['images']['name'];
		$lotnumber =$_POST['lotnumber'];
		$names =$_POST['names'];
		$seller =$_POST['seller'];
		$description =$_POST['description'];
		$price =$_POST['price'];
		$productiondate =$_POST['productiondate'];
		$auctiondate =$_POST['auctiondate'];
		$categoryId =$_POST['categoryId'];
		$types =$_POST['types'];
		$drawing =$_POST['drawing'];
		$item =$_POST['item'];
		$dimension =$_POST['dimension'];
		$material =$_POST['material'];
		$weight =$_POST['weight'];
		$used =$_POST['used'];
		$imagetype =$_POST['imagetype'];
		$feature =$_POST['feature'];
		$locations =$_POST['locations'];


		$sql = "INSERT INTO product (lotnumber, names, seller, description, price, productiondate, auctiondate, categoryId, types, drawing, item, dimension, material, weight, used, imagetype, feature, locations, images) VALUES ( '$lotnumber', '$names', '$seller', '$description', '$price', '$productiondate', '$auctiondate', '$categoryId', '$types', '$drawing', '$item', '$dimension', '$material', '$weight', '$used', '$imagetype', '$feature', '$locations', '$images')";

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
	         	<h2 class="py-4"><big>Add Product Item ?</big></h2>
	         	<label><b>Lot No:</b></label><br>
	            <input type="text" name="lotnumber" placeholder="lot no" required><br>
	            <label><b>Name:</b></label><br>
	            <input type="text" name="names" placeholder="name" required><br>
	            <label><b>Artist:</b></label><br>
	            <input type="text" name="seller" placeholder="artist" required><br>
	            <label><b>Description:</b></label><br>
	           	<textarea class="resize" name="description" placeholder="Full description of your item" required></textarea><br>
	           	<label><b>Price:</b></label><br>
	            <input type="text" name="price" placeholder="price" required><br>
	            <label><b>Production Date:</b></label><br>
	            <input type="date" name="productiondate" required><br>
	            <label><b>Auction Date:</b></label><br>
	            <input type="date" name="auctiondate" required><br><br>
	            <label><b>Category</b></label>
               <select class="px-2 mx-2" class="form-control" name="categoryId">
                  <?php 
                  require '../db.php';
                  $stmt = $pdo->prepare("SELECT * FROM category");
                  $stmt->execute();
               foreach ($stmt as $row) { ?>
               		<option selected hidden value="">None</option>
                  <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                   <?php } ?>
               </select><br>
	            <label><b>General Pieces:</b></label><br>
	            <input type="text" name="types" placeholder="general pieces"><br>
	            <label><b>Drawing medium:</b></label><br>
	            <input type="text" name="drawing" placeholder="drawing"><br>
	            <label><b>Types of Item:</b></label><br>
	            <input type="text" name="item" placeholder="item"><br>
	            <label><b>Dimension:</b></label><br>
	            <input type="text" name="dimension" placeholder="dimension"><br>
	            <label><b>Material Used:</b></label><br>
	            <input type="text" name="material" placeholder="material used"><br>
	            <label><b>Weight:</b></label><br>
	            <input type="text" name="weight" placeholder="weight"><br>
	            <label><b>Medium Used:</b></label><br>
	            <input type="text" name="used" placeholder="medium used"><br>
	            <label><b>Image Type:</b></label><br>
	            <input type="text" name="imagetype" placeholder="image type"><br>
	            <label><b>Feature:</b></label> <p class="font-weight-lighter font-italic">Hints: painting=1, carving=2, sculpture=3, drawing=4, photographic=5</p>
	            <input type="text" name="feature" placeholder="feature"><br>
	            <label><b>Location:</b></label><br>
	            <input type="text" name="locations" placeholder="location"><br>
	            <label><b>Image:</b></label><br>
	            <input type="file" name="images"><br>
	            <button class="btn btn-info text-center my-3 px-5 font-weight-bold" name="submit">Submit Product</button>
	         </form>
      </div>
   </div>
</div>
<?php require 'footer.php'; ?>