<?php require_once 'connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'carousel.php'; ?>

<div class="container py-3">
   <div class="row">
      <div class="col-md-6">
         <h2 class="py-2 pl-2"><b>Auction List</b></h2>
         <p>Visit our auction details for getting more information.</p>
      </div>
      <div class="col-md-6">
         <form method="POST" action="search.php" class="position-relative text-right">
            <input type="text" class="search1" name="search" placeholder="Search">
            <button type="submit" name="submit-search" class="btn btn-outline-info search"><i class="fas fa-search"></i></button>
         </form>
      </div>
   </div>
   <?php 
      $stmt= "SELECT * FROM product";
      $result =$db->query($stmt);
    ?>
   <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) {?>
      <div class="col-md-4">
         <h4><?php echo $row['names']; ?></h4>
            <a href="#" class="top-part"><?php echo "<img src='admin/image/product/".$row['images']."' >"; ?></a>
            <div class="row pt-3">
            <div class="col-md-5">
               <p class="font-weight-bold">Price: $<?php echo $row["price"]; ?></p>

            </div>
            <div class="col-md-7">
               <p class="font-weight-bold">Auction Date: <?php echo $row["auctiondate"]; ?></p>
            </div>
         </div>
         <p style="height: 50px"><?php echo substr($row["description"],0,80).' . . . . .'; ?></p>
         <div class="text-center">
               <?php echo '<a class="btn btn-sm btn-success mb-3" href="moredetails.php?more='.$row['id'].'">More Details</a>'; ?>
            </div> 
         </div>
      <?php } ?>
   </div>
</div>
<?php require 'footer.php'; ?>