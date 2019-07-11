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