<?php require 'connect.php'; ?>
<?php require "header.php"; ?>
<?php require 'carousel.php'; ?>
<section class="writer">
	<div class="container text-lg-left text-md-right">
		<div class="row">
			<div class="col-md-4 mb-3">
				<div class="pager position-relative pl-5 pr-3">
					<a href="painting.php" class="icon-part">
						<img src="image/painting.png" alt="rent" class="img-fluid">
					</a>
					<h6 class="text-uppercase">Painting</h6>
					<p class="text-secondary">Canvas provides support for Native HTML5 Videos that can be added to a Full Width Background.</p>
				</div>
			</div>

			<div class="col-md-4 mb-3">
				<div class="pager position-relative pl-5 pr-3">
					<a href="carving.php" class="icon-part">
						<img src="image/carving.png" alt="rent" class="img-fluid">
					</a>
					<h6 class="text-uppercase">Carving</h6>
					<p class="text-secondary">Display your Content attractively using Parallax Sections that have unlimited customizable areas.</p>
				</div>
			</div>

			<div class="col-md-4 mb-3">
				<div class="pager position-relative pl-5 pr-3">
					<a href="drawing.php" class="icon-part">
						<img src="image/drawing.png" alt="rent" class="img-fluid">
					</a>
					<h6 class="text-uppercase">Drawing</h6>
					<p class="text-secondary">You have complete easy control on each & every element that provides endless customization possibilities.</p>
				</div>
			</div>

			<div class="col-md-4 py-3">
				<div class="pager position-relative pl-5 pr-3">
					<a href="photography.php" class="icon-part">
						<img src="image/photography.png" alt="rent" class="img-fluid">
					</a>
					<h6 class="text-uppercase">Photographic</h6>
					<p class="text-secondary">Canvas provides support for Native HTML5 Videos that can be added to a Full Width Background.</p>
				</div>
			</div>

			<div class="col-md-4 py-3">
				<div class="pager position-relative pl-5 pr-3">
					<a href="sculpture.php"  class="icon-part">
						<img src="image/sculpture.png" alt="rent" class="img-fluid">
					</a>
					<h6 class="text-uppercase">Sculptures</h6>
					<p class="text-secondary">Display your Content attractively using Parallax Sections that have unlimited customizable areas.</p>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="owl py-3">
	<div class="container ">
		<div class="row">
			<div class="col-md-6 col-md-center">
				<h3 class="text-uppercase">Featured Properties</h3>
			</div>
			<div class="col-md-6 text-lg-right text-md-center">
				<form action="search.php" method="POST" class="position-relative text-right">
            <input type="text" class="search1" name="search" placeholder="Search">
            <button type="submit" name="submit-search" class="btn btn-outline-info search"><i class="fas fa-search"></i></button>
         </form>
			</div>
		</div>
	</div>
	<div class="container py-3">
		<?php 
		require 'db.php';
	      $stmt=$pdo->prepare("SELECT * FROM product");
	      $stmt->execute();
    	?>
		<div class="scrollbox owl-carousel owl-theme text-left">
			<?php foreach ($stmt as $row) { ?>
			<div class="item  bg-light d-block rounded-lg">
				<h4><?php echo $row['names']; ?></h4>
				<?php echo "<img src='admin/image/product/".$row['images']."'>"; ?>
				<div class="row pt-3">
		            <div class="col-md-5">
		               <p class="font-weight-bold">Price: $<?php echo $row["price"]; ?></p>
		            </div>
		            <div class="col-md-7">
		               <p class="font-weight-bold">Auction Date: <?php echo $row["auctiondate"]; ?></p>
		            </div>
         		</div>
	             <p style=""><?php echo substr($row["description"],0,80).' . . . . .'; ?></p>
	             <div class="text-center">
	             <?php echo '<a class="btn btn-sm btn-success mb-3" href="moredetails.php?more='.$row['id'].'">More Details</a>'; ?>
	             </div>
	             </div>
			<?php } ?>
		</div>
	</div>
</section>


<section class="properties">
<div class="container pb-5 pt-3">
	<div class="row">
		<div class="col-lg-7">
			<?php 
				require 'db.php';
				$stmt =$pdo->prepare("SELECT * FROM image WHERE photoId =1");
				$stmt->execute();
				foreach ($stmt as $row) {
				?>
			<a href="#" class="background"><?php echo "<img src='image/".$row['images']."' >"; ?></a>
			<?php	} ?>
		</div>
		<div class="col-lg-5">
			<?php 
				require 'db.php';
				$stmt =$pdo->prepare("SELECT * FROM image WHERE photoId =2");
				$stmt->execute();
				foreach ($stmt as $row) {
				?>
			<a href="#" class="background1"><?php echo "<img src='image/".$row['images']."' >"; ?></a>
			<?php	} ?>
		</div>
		<div class="col-lg-4">
			<?php 
				require 'db.php';
				$stmt =$pdo->prepare("SELECT * FROM image WHERE photoId =3");
				$stmt->execute();
				foreach ($stmt as $row) {
				?>
			<a href="#" class="background2"><?php echo "<img src='image/".$row['images']."' >"; ?></a>
			<?php	} ?>
		</div>
		<div class="col-lg-4">
			<?php 
				require 'db.php';
				$stmt =$pdo->prepare("SELECT * FROM image WHERE photoId =4");
				$stmt->execute();
				foreach ($stmt as $row) {
				?>
			<a href="#" class="background2"><?php echo "<img src='image/".$row['images']."' >"; ?></a>
			<?php	} ?>
		</div>
		<div class="col-lg-4">
			<?php 
				require 'db.php';
				$stmt =$pdo->prepare("SELECT * FROM image WHERE photoId =5");
				$stmt->execute();
				foreach ($stmt as $row) {
				?>
			<a href="#" class="background2"><?php echo "<img src='image/".$row['images']."' >"; ?></a>
			<?php	} ?>
		</div>
	</div>
</div>
</section>

<!-- user requested form -->
<section class="form" id="about">
	<div class="container-fluid info text-center ">
		<?php 
	require 'db.php';
	if (isset($_POST['submit'])) {
		$stmt = $pdo->prepare("INSERT INTO requestuser (firstname,surname,email,address,phone,account,code)
			VALUES(:firstname, :surname, :email, :address, :phone, :account, :code)");


		$criteria=[
			'firstname' => $_POST['firstname'],
			'surname' => $_POST['surname'],
			'email' => $_POST['email'],
			'address' => $_POST['address'],
			'phone' => $_POST['phone'],
			'account' => $_POST['account'],
			'code' => $_POST['code']
			
		];

		$stmt->execute($criteria);
	}
 ?>

		<div class="row">
			<div class="col-lg-8 text-left">
				<h3 class="py-4 abouts font-weight-bolder">About Us:</h3>
				<p class="descrip">
					Fotheby’s is an international auction house specialising in the sale of fine art. In the current buoyant art market Fotheby’s wishes to computerise its inventory to provide a fast and effective search mechanism for its many clients.

					Fotheby’s currently employ a clerical inventory system for all auction-related records. They also produce a printed catalogue of items for sale at each auction, which is distributed to its clients in advance of the sale or on the day of the auction. 
				</p>
				<p class="descrip">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			
			<div class="col-lg-4 info-part">
				<h4 class="text-white pb-3">Reserved your seat here?</h4>
				<form class="forms" method="POST" action="">
					<input type="text" name="firstname" placeholder="firstname" required><br>
					<input type="text" name="surname" placeholder="surname" required><br>
					<input type="text" name="address" placeholder="address" required><br>
					<input type="text" name="phone" placeholder="Phone Number (+1-555-2221)" required><br>
					<input type="email" name="email" placeholder="Email Address" required><br>
					<input type="text" name="account" placeholder="Bank account number" required><br>
					<input type="text" name="code" placeholder="Bank sort code" required><br>
					<button class="btn btn-light text-uppercase" name="submit">Send Information</button>
				</form>
			</div>
		</div>
	</div>
</section>


<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profile" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profile">User Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="profiles px-3">
          <?php 
          if (isset($_SESSION['logged_id'])) {
            $id = $_SESSION['logged_id'];
            $stmt = $pdo->prepare("SELECT * FROM user WHERE id = '$id'");
            $stmt->execute();
          }

          foreach ($stmt as $row) {?>
          <h5 ><b><?php echo $row['firstname']; ?> <?php echo $row['surname']; ?> </b></h5>
          <h5 ><b><?php echo $row['email']; ?></b></h5>
          <h5 ><b><?php echo $row['phone']; ?></b></h5>
          <h5 ><b><?php echo $row['address']; ?></b></h5>
          <h5 ><b><?php echo $row['account']; ?></b></h5>
          <h5 ><b><?php echo $row['code']; ?></b></h5>

          <?php } ?>
        </div>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php require "footer.php"; ?>

