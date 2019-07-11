<?php 
   require_once 'connect.php';
   $id = $_POST['id'];
   $id = (int)$id;
   $con = "SELECT * FROM product WHERE id ='$id'";
   $result = $db->query($con);
   $product = mysqli_fetch_assoc($result);
 ?>

<!-- Details box for item -->
<?php ob_start(); ?>
<div class="modal fade details" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-centre"><?= $product['names'];?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
       <div class="modal-body">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="center-block">
                        <img src="<?php echo 'admin/image/product/'.$product['images'];?>" alt="img" class="img-fluid details-image">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-6">
                           <p><b>Lot No:</b> <?= $product['lotnumber'];?></p>
                        </div>
                        <div class="col-md-6">
                           <p><b>Location:</b> <?= $product['locations'];?></p>
                        </div>
                     </div>
                        <div class="row">
                        <div class="col-md-5">
                           <p class="mb-1"><b>Price:</b> £<?= $product['price'];?></p>
                        </div>
                        <div class="col-md-7 position-relative">
                           <p class="mb-1 artist"><b>Artist:</b> <?= $product['seller'];?></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <p class="mb-1"><b>P-Date:</b> <?= $product['productiondate'];?></p>
                        </div>
                        <div class="col-md-6 text-left">
                           <p class="mb-1"><b>A-Date:</b> <?= $product['auctiondate'];?></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-7">
                           <p>
                              <?php 
                                 if (!empty($product['types'])) {
                                    echo '<b>Medium:</b> '.$product['types'];
                                 }
                                 if (!empty($product['used'])) {
                                     echo '<b>Medium:</b> '.$product['used'];
                                 } if (!empty($product['imagetype'])) {
                                    echo '<b>Image:</b> '.$product['imagetype'];
                                 }
                              ?>
                           </p>
                        </div>
                        <div class="col-md-5">
                           <p>
                              <?php 
                                 if (!empty($product['weight'])) {
                                    echo '<b>Weight:</b> '.$product['weight'].'<b>Kg</b>';
                                 } if (!empty($product['item'])) {
                                  echo '<b>Item:</b> '.$product['item'];
                                 } if (!empty($product['material'])) {
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
         </div>
         <div class="modal-footer">
            <button class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<?php echo ob_get_clean(); ?>