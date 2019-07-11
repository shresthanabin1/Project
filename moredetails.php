
<?php require 'header.php'; ?>
<?php require 'carousel.php'; ?>

<?php 
   require_once 'connect.php';
   $id = $_GET['more'];
   $id = (int)$id;
   $con = "SELECT * FROM product WHERE id ='$id'";
   $result = $db->query($con);
   $product = mysqli_fetch_assoc($result);
 ?>

 <div class="container-fluid py-5 bg-light">
    <div class="row">
       <div class="col-md-6">
          <img src="<?php echo 'admin/image/product/'.$product['images'];?>" alt="img" class="img-fluid details-image">
       </div>
             <div class="col-md-6">
                <h4 class="font-weight-bolder pb-3"><?php echo $product['names']; ?></h4>
                     <div class="row">
                        <div class="col-md-6">
                           <p><b>Lot No:</b> <?= $product['lotnumber'];?></p>
                        </div>
                        <div class="col-md-6">
                           <p><b>Location:</b><?= $product['locations'];?></p>
                        </div>
                     </div>
                        <div class="row">
                        <div class="col-md-6">
                           <p class="mb-1"><b>Price:</b> £<?= $product['price'];?></p>
                        </div>
                        <div class="col-md-6">
                           <p class="artist"><b>Artist:</b> <?= $product['seller'];?></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <p class="mb-1"><b>P-Date:</b> <?= $product['productiondate'];?></p>
                        </div>
                        <div class="col-md-6">
                           <p class="mb-1"><b>A-Date:</b> <?= $product['auctiondate'];?></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <p>
                              <?php 
                                 if (!empty($product['types'])) {
                                    echo '<b>Medium:</b> '.$product['types'];
                                 }?><br><?php
                                 if (!empty($product['used'])) {
                                     echo '<b>Medium:</b> '.$product['used'];
                                 }?><br><?php
                                  if (!empty($product['imagetype'])) {
                                    echo '<b>Image:</b> '.$product['imagetype'];
                                 }
                              ?>
                           </p>
                        </div>
                        <div class="col-md-6">
                           <p>
                              <?php 
                                 if (!empty($product['weight'])) {
                                    echo '<b>Weight:</b> '.$product['weight'].' Kg';
                                 } ?><br><?php if (!empty($product['item'])) {
                                  echo '<b>Item:</b> '.$product['item'];
                                 } ?><br><?php if (!empty($product['material'])) {
                                    echo '<b>Material:</b> '.$product['material'];
                                 }
                              ?>
                           </p>
                        </div>
                     </div>
                     <p><b>Dimension: </b><?php echo $product['dimension']; ?> m</p>
                     <h5 class="desc">Details</h5>
                     <p><?= $product['description'];?></p>
                  
                     
                  </div>
    </div>
 </div>

<?php require 'footer.php'; ?>