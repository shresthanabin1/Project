<?php 
   session_start();
   if (!isset($_SESSION['logged_user_id'])) { 
   header('location: index.php');
   }
   
   require '../db.php';
   if (isset($_GET['del'])) {
         $id = $_GET['del'];
         $stmt = $pdo->prepare("DELETE FROM event WHERE id = '$id'");
         $result = $stmt->execute(['$id']);
         header('location:addevent.php');
      } 
   
   require '../db.php';
   //
   extract($_POST);
   if (isset($_POST['lotnumber']) && isset($_POST['eventday']) && isset($_POST['eventtime']) && isset($_POST['address'])) {
      
      $stmt = $pdo->prepare("INSERT INTO event (lotnumber,eventday,eventtime,address)
         VALUES(:lotnumber, :eventday, :eventtime, :address)");
   
   
      $criteria=[
         'lotnumber' => $_POST['lotnumber'],
         'eventday' => $_POST['eventday'],
         'eventtime' => $_POST['eventtime'],
         'address' => $_POST['address']
      ];
   
      $result = $stmt->execute($criteria);
   }
   ?>
<link rel="stylesheet" type="text/css" href="main.css">
<div class="container-fluid">
   <div class="row">
      <?php require 'sider.php'; ?>
      <div class="col-md-9 bg-secondary" >
         <form method="POST" action="" class="form py-5">
            <h2 class="py-4"><big>Add Events</big></h2>
            <p class="pr-4">In this section you can add event which is very <br> helpful for the user to know when the event is started.</p>
            <label><b>Lot Number:</b></label>
            <select class="px-2 mx-2" class="form-control" name="lotnumber">
               <?php 
                  require '../db.php';
                  $stmt = $pdo->prepare("SELECT * FROM product");
                  $stmt->execute();
                  foreach ($stmt as $row) { ?>
               <option selected hidden value="">None</option>
               <option value="<?php echo $row['lotnumber']; ?>"><?php echo $row['lotnumber']; ?></option>
               <?php } ?>
            </select>
            <br>
            <label><b>Event Day:</b></label><br>
            <input type="date" name="eventday" placeholder="surname"><br>
            <label><b>Event Time:</b></label><br>
            <input type="time" name="eventtime" placeholder="address"><br>
            <label><b>Location:</b></label><br>
            <input type="text" name="address" placeholder="location"><br>
            <button class="btn btn-info text-center my-3 px-5 font-weight-bold" name="save" >Sign Up</button>
         </form>
         <div class="table-responsive">
            <table class="table table-border table-striped table-hover">
               <thead>
                  <th>Lot Number</th>
                  <th>Event Date</th>
                  <th>Event Time</th>
                  <th>Event Location</th>
               </thead>
               <tbody>
                  <?php 
                     $connect = mysqli_connect('localhost','student','','software3');
                     $qry = "SELECT * FROM event";
                     $displayquery = mysqli_query($connect, $qry);
                     while ($result = mysqli_fetch_array($displayquery)) {
                     ?> 
                  <tr>
                     <td><?php echo $result['lotnumber']; ?></td>
                     <td><?php echo $result['eventday']; ?></td>
                     <td><?php echo $result['eventtime']; ?></td>
                     <td><?php echo $result['address']; ?></td>
                     <td><a href="addevent.php?del=<?php echo $result['id']; ?>">Delete</a></td>
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