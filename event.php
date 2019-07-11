
<?php require_once 'connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'carousel.php'; ?>
<?php 
if (!isset($_SESSION['logged_id'])) {
   header('location:index.php');
} ?>
<div class="container py-3">
   <h2 class="py-2"><b>Auction Event List</b></h2>
   <p>Visit our auction details for getting more information.</p>
   <?php 
      $stmt= "SELECT * FROM event";
      $result =$db->query($stmt);
    ?>
   <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) {?>
      <div class="col-md-3 border bg-info py-3 pl-4">
         <p class="font-weight-bold">Lot Number: <?php echo $row["lotnumber"]; ?></p>
         <p class="font-weight-bold">Event Date: <?php echo $row["eventday"]; ?></p>
         <p class="font-weight-bold">Event Time: <?php echo $row["eventtime"]; ?></p>
         <p class="font-weight-bold">Event Location: <?php echo $row["address"]; ?></p>
      </div>
      <?php } ?>
   </div>
</div>
<?php require 'footer.php'; ?>