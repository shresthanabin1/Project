<?php session_start();
if (!isset($_SESSION['logged_user_id'])) { 
header('location: index.php'); 
}?>
<!-- update form for product -->
<div class="modal fade" id="update_product" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Update Product</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body" >
            <div class="form-group">
               <label>Lot Number</label>
               <input type="text" id="lotnumber" class="form-control">
            </div>
            <div class="form-group">
               <label>Name</label>
               <input type="text" id="names" class="form-control">
            </div>
            <div class="form-group">
               <label>Artist</label>
               <input type="email" id="seller" class="form-control">
            </div>
            <div class="form-group">
               <label>Description</label>
               <input type="text" id="description" class="form-control">
            </div>
            <div class="form-group">
               <label>Price</label>
               <input type="text" id="price" class="form-control">
            </div>
            <div class="form-group">
               <label>Production Date</label>
               <input type="date" id="productiondate" class="form-control">
            </div>
            <div class="form-group">
               <label>Auction Date</label>
               <input type="date" id="auctiondate" class="form-control">
            </div>
            
            <div class="form-group">
               <label>types</label>
               <input type="text" id="types" class="form-control">
            </div>
            <div class="form-group">
               <label>Drawing</label>
               <input type="text" id="drawing" class="form-control">
            </div>
            <div class="form-group">
               <label>Item</label>
               <input type="text" id="item" class="form-control">
            </div>
            <div class="form-group">
               <label>Dimension</label>
               <input type="text" id="dimension" class="form-control">
            </div>
            <div class="form-group">
               <label>Mateial</label>
               <input type="text" id="material" class="form-control">
            </div>
            <div class="form-group">
               <label>Weight</label>
               <input type="text" id="weight" class="form-control">
            </div>
            <div class="form-group">
               <label>Used</label>
               <input type="text" id="used" class="form-control">
            </div>
            <div class="form-group">
               <label>Image Type</label>
               <input type="text" id="imagetype" class="form-control">
            </div>
            <div class="form-group">
               <label>Feature</label>
               <input type="text" id="feature" class="form-control">
            </div>
            <div class="form-group">
               <label>Location</label>
               <input type="text" id="locations" class="form-control">
            </div>
          <input type="hidden" id="productId" class="form-control">

         </div>
         <div class="modal-footer">
            <a href="#" id="saves" name="save" class="btn btn-primary">Update</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>




<link rel="stylesheet" type="text/css" href="main.css">
<div class="container-fluid">
   <div class="row">
      <?php require 'sider.php'; ?>
      <div class="col-md-9 bg-secondary" >
      	<h2><u>Product List</u></h2>
         <div style="overflow-x:auto;">
         <table class="table table-striped table-dark table-auto text-center">
            <thead>
              <col width="500">
               <tr>
                  <th scope="col">Lot Ref</th>
                  <th scope="col">Lot No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Seller</th>
                  <th scope="cols">Description</th>
                  <th scope="col">price</th>
                  <th scope="col">Production Date</th>
                  <th scope="col">Auction Date</th> 
                  <th scope="col">Types</th>
                  <th scope="col">Drawing</th>
                  <th scope="col">Item</th>
                  <th scope="col">Dimension</th>
                  <th scope="col">Material</th>
                  <th scope="col">Weight</th>
                  <th scope="col">Used</th>
                  <th scope="col">Image Type</th>
                  <th scope="col">Feature</th>
                  <th scope="col">Location</th>
                  <th scope="col">Delete</th>
                  <th scope="col">Update</th>
                  
               </tr>
            </thead>
            <tbody>
            	<?php 
               require '../db.php';
               $stmt = $pdo->prepare("SELECT * FROM product");
               $stmt->execute();
               foreach ($stmt as $row) { ?>
               <tr id="<?php echo $row['id']; ?>">
                <td data-target="id"><?php echo $row["id"]; ?></td>
                  <td data-target="lotnumber"><?php echo $row["lotnumber"]; ?></td>
                  <td data-target="names"><?php echo $row["names"]; ?></td>
                  <td data-target="seller"><?php echo $row["seller"]; ?></td>
                  <td width="70%" data-target="description" ><?php echo $row['description']; ?></td>
                  <td data-target="price"><?php echo $row['price']; ?></td>
                  <td data-target="productiondate"><?php echo $row['productiondate']; ?></td>
                  <td data-target="auctiondate"><?php echo $row['auctiondate']; ?></td>
                  <td data-target="types"><?php echo $row['types']; ?></td>
                  <td data-target="drawing"><?php echo $row['drawing']; ?></td>
                  <td data-target="item"><?php echo $row['item']; ?></td>
                  <td data-target="dimension"><?php echo $row['dimension']; ?></td>
                  <td data-target="material"><?php echo $row['material']; ?></td>
                  <td data-target="weight"><?php echo $row['weight']; ?></td>
                  <td data-target="used"><?php echo $row['used']; ?></td>
                  <td data-target="imagetype"><?php echo $row['imagetype']; ?></td>
                  <td data-target="feature"><?php echo $row['feature']; ?></td>
                  <td data-target="locations"><?php echo $row['locations']; ?></td>
                  <td><a href="productdelete.php?del=<?php echo $row['id']; ?>">Delete</a></td>
                  <td><a href="#" data-role="updates" data-id="<?php echo $row['id']; ?>">Update</a></td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
         </div>
      </div>
   </div>
</div>
<?php require 'footer.php'; ?>

<script type="text/javascript">
    // Display product table and databse
    $(document).ready(function(){
      $(document).on('click', 'a[data-role=updates]',function(){
        var id = $(this).data('id');
        var lotnumber = $('#'+id).children('td[data-target=lotnumber]').text();
        var names = $('#'+id).children('td[data-target=names]').text();
        var seller = $('#'+id).children('td[data-target=seller]').text();
        var description = $('#'+id).children('td[data-target=description]').text();
        var price = $('#'+id).children('td[data-target=price]').text();
        var productiondate = $('#'+id).children('td[data-target=productiondate]').text();
        var auctiondate = $('#'+id).children('td[data-target=auctiondate]').text();
        var types = $('#'+id).children('td[data-target=types]').text();
        var drawing = $('#'+id).children('td[data-target=drawing]').text();
        var item = $('#'+id).children('td[data-target=item]').text();
        var dimension = $('#'+id).children('td[data-target=dimension]').text();
        var material = $('#'+id).children('td[data-target=material]').text();
        var weight = $('#'+id).children('td[data-target=weight]').text();
        var used = $('#'+id).children('td[data-target=used]').text();
        var imagetype = $('#'+id).children('td[data-target=imagetype]').text();
        var feature = $('#'+id).children('td[data-target=feature]').text();
        var locations = $('#'+id).children('td[data-target=locations]').text();

        $('#lotnumber').val(lotnumber);
        $('#names').val(names);
        $('#seller').val(seller);
        $('#description').val(description);
        $('#price').val(price);
        $('#productiondate').val(productiondate);
        $('#auctiondate').val(auctiondate);
        $('#types').val(types);
        $('#drawing').val(drawing);
        $('#item').val(item);
        $('#dimension').val(dimension);
        $('#material').val(material);
        $('#weight').val(weight);
        $('#used').val(used);
        $('#imagetype').val(imagetype);
        $('#feature').val(feature);
        $('#locations').val(locations);
        $('#productId').val(id);
        $('#update_product').modal('toggle');
      });

      // create event to get data from field and update in database
    $('#saves').click(function(){
      var id = $('#productId').val();
      var lotnumber = $('#lotnumber').val();
      var names = $('#names').val();
      var seller = $('#seller').val();
      var description = $('#description').val();
      var price = $('#price').val();
      var productiondate = $('#productiondate').val();
      var auctiondate = $('#auctiondate').val();
      var types = $('#types').val();
      var drawing = $('#drawing').val();
      var item = $('#item').val();
      var dimension = $('#dimension').val();
      var material = $('#material').val();
      var weight = $('#weight').val();
      var used = $('#used').val();
      var imagetype = $('#imagetype').val();
      var feature = $('#feature').val();
      var locations = $('#locations').val();

      $.ajax({
        url : 'connect.php',
        method : 'post',
        data : {lotnumber : lotnumber , names : names , seller : seller , description : description , price : price , productiondate : productiondate , auctiondate : auctiondate , types : types , drawing : drawing , item : item , dimension : dimension , material : material , weight : weight , used : used , imagetype : imagetype , feature : feature , locations : locations , id : id},
        success : function(response){
          $('#'+id).children('td[data-target=lotnumber]').text(lotnumber);
          $('#'+id).children('td[data-target=names]').text(names);
          $('#'+id).children('td[data-target=seller]').text(seller);
          $('#'+id).children('td[data-target=description]').text(description);
          $('#'+id).children('td[data-target=price]').text(price);
          $('#'+id).children('td[data-target=productiondate]').text(productiondate);
          $('#'+id).children('td[data-target=auctiondate]').text(auctiondate);
          $('#'+id).children('td[data-target=types]').text(types);
          $('#'+id).children('td[data-target=drawing]').text(drawing);
          $('#'+id).children('td[data-target=item]').text(item);
          $('#'+id).children('td[data-target=dimension]').text(dimension);
          $('#'+id).children('td[data-target=material]').text(material);
          $('#'+id).children('td[data-target=weight]').text(weight);
          $('#'+id).children('td[data-target=used]').text(used);
          $('#'+id).children('td[data-target=imagetype]').text(imagetype);
          $('#'+id).children('td[data-target=feature]').text(feature);
          $('#'+id).children('td[data-target=locations]').text(locations);
          $('#update_product').modal('toggle'); 
        }
      });
    });
    });
  </script>