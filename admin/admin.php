<?php
session_start();
if (!isset($_SESSION['logged_user_id'])) { 
header('location: index.php');
}
?>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="main.css">
<div class="container-fluid">
	<div class="row">
		<?php require 'sider.php'; ?>
		<div class="col-md-9 bg-secondary" id="">
			<h3 class="py-4 px-4">Welcome To Fotheby's International Auction House</h3>
			<h4 class="px-4">Fotheby’s Auction House</h4>
			<p class="px-4">Fotheby’s is an international auction house specialising in the sale of fine art. In the current buoyant art market Fotheby’s wishes to computerise its inventory to provide a fast and effective search mechanism for its many clients.</p>
			<p class="px-4">Fotheby’s is an international auction house specialising in the sale of fine art. In the current buoyant art market Fotheby’s wishes to computerise its inventory to provide a fast and effective search mechanism for its many clients.</p>
			<p class="px-4">Fotheby’s is an international auction house specialising in the sale of fine art. In the current buoyant art market Fotheby’s wishes to computerise its inventory to provide a fast and effective search mechanism for its many clients.</p>
		</div>
	</div>
</div>



<?php require 'footer.php'; ?>