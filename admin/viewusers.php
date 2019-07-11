<?php session_start();
if (!isset($_SESSION['logged_user_id'])) { 
header('location: index.php'); 
}?>
<!-- update form for user table -->
<div class="modal fade" id="user_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
           <label>Title</label>
           <input type="text" id="title" class="form-control">
        </div>
        <div class="form-group">
           <label>Firstname</label>
           <input type="text" id="firstname" class="form-control">
        </div>
        <div class="form-group">
           <label>Surname</label>
           <input type="text" id="surname" class="form-control">
        </div>
        <div class="form-group">
           <label>Email Address</label>
           <input type="email"  id="email" class="form-control">
        </div>
        <div class="form-group">
           <label>Address</label>
           <input type="text" id="address" class="form-control">
        </div>
        <div class="form-group">
           <label>Phone No</label>
           <input type="text"  id="phone" class="form-control">
        </div>
        <div class="form-group">
           <label>Bank Account</label>
           <input type="text"  id="account" class="form-control">
        </div>
        <div class="form-group">
           <label>Bank Sort Code</label>
           <input type="text"  id="code" class="form-control">
        </div>
        <input type="hidden" id="user_id" class="form-control">
      </div>
            <!-- Modal footer -->
      <div class="modal-footer">
          <a href="#" id="submit" class="btn btn-primary">Update</a>
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
      	<h2><u>User List</u></h2>
         <table class="table table-striped table-dark table-auto">
            <thead>
               <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Firstname</th>
                  <th scope="col">Surname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Address</th>
                  <th scope="col">Phone no</th>
                  <th scope="col">Bank Account</th>
                  <th scope="col">Code</th>
                  <th scope="col">Delete</th>
                  <th scope="col">Edit</th>
               </tr>
            </thead>
            <tbody>
            	<?php 
              require '../db.php';
              $stmt = $pdo->prepare("SELECT * FROM user");
              $stmt->execute();
              foreach ($stmt as $row) { ?>
               <tr id ="<?php echo $row['id']; ?>">
                  <td data-target="title"><?php echo $row["title"]; ?></td>
                  <td data-target="firstname"><?php echo $row["firstname"]; ?></td>
                  <td data-target="surname"><?php echo $row["surname"]; ?></td>
                  <td data-target="email"><?php echo $row["email"]; ?></td>
                  <td data-target="address"><?php echo $row["address"]; ?></td>
                  <td data-target="phone"><?php echo $row["phone"]; ?></td>
                  <td data-target="account"><?php echo $row["account"]; ?></td>
                  <td data-target="code"><?php echo $row["code"]; ?></td>
                  <td><a href="userdelete.php?del=<?php echo $row['id']; ?>">Delete</a></td>
                  <td><a href="#" data-role="updated" data-id="<?php echo $row['id']; ?>">Edit</a></td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>


<?php require 'footer.php'; ?>

<script type="text/javascript">
    // update user table and database
    $(document).ready(function(){
      $(document).on('click', 'a[data-role=updated]',function(){
        var id = $(this).data('id');
        var title = $('#'+id).children('td[data-target=title]').text();
        var firstname = $('#'+id).children('td[data-target=firstname]').text();
        var surname = $('#'+id).children('td[data-target=surname]').text();
        var email = $('#'+id).children('td[data-target=email]').text();
        var address = $('#'+id).children('td[data-target=address]').text();
        var phone = $('#'+id).children('td[data-target=phone]').text();
        var account = $('#'+id).children('td[data-target=account]').text();
        var code = $('#'+id).children('td[data-target=code]').text();

        $('#title').val(title);
        $('#firstname').val(firstname);
        $('#surname').val(surname);
        $('#email').val(email);
        $('#address').val(address);
        $('#phone').val(phone);
        $('#account').val(account);
        $('#code').val(code);
        $('#user_id').val(id);
        $('#user_modal').modal('toggle');
      });

      // create event to get data from field and update in database
    $('#submit').click(function(){
      var id = $('#user_id').val();
      var title = $('#title').val();
      var firstname = $('#firstname').val();
      var surname = $('#surname').val();
      var email = $('#email').val();
      var address = $('#address').val();
      var phone = $('#phone').val();
      var account = $('#account').val();
      var code = $('#code').val();

      $.ajax({
        url : 'connect.php',
        method : 'post',
        data : {title : title , firstname : firstname , surname : surname , email : email , address : address , phone : phone , account : account , code : code , id : id},
        success : function(response){
          $('#'+id).children('td[data-target=title]').text(title);
          $('#'+id).children('td[data-target=firstname]').text(firstname);
          $('#'+id).children('td[data-target=surname]').text(surname);
          $('#'+id).children('td[data-target=email]').text(email);
          $('#'+id).children('td[data-target=address]').text(address);
          $('#'+id).children('td[data-target=phone]').text(phone);
          $('#'+id).children('td[data-target=account]').text(account);
          $('#'+id).children('td[data-target=code]').text(code);
          $('#user_modal').modal('toggle'); 

        }
      });
    });
    });
</script>