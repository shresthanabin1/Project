
<!DOCTYPE html>
<html lang="en">
<head>
   <title>message</title>
   <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
   <div class="container-fluid">
   <div class="row">
      <?php require 'sider.php'; ?>
      <div class="col-md-9 bg-secondary" >
         <h2 class="py-4 text-center"><big>Create Message</big></h2>
         <form action="" class="forme">
            <div class="bg-dark text-white font-weight-bold py-2 pl-3">New Message</div><br>
            <input type="text" id="name"  placeholder="Name" class="pl-2"><br>
            <hr>
            <input type="email" id="email" placeholder="To" class="pl-2"><br>
            <hr>
            <input type="text" id="subject" placeholder="Subject" class="pl-2" >
            <hr>
            <textarea type="text" id="body"  rows="10" ></textarea><br><br>
            <button class="btn btn-primary px-4" type="submit" onclick="sendEmail()">Send</button>
         </form>
      </div>
   </div>
</div>


<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/popper.min.js"></script>

<script type="text/javascript">
   function sendEmail() {
      var name = $("#name");
      var email = $("#email");
      var subject = $("#subject");
      var body = $("#body");

      if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {

         $.ajax({
            url: 'sendEmail.php',
            method: 'POST',
            dataType: 'json',
            data: {
               name: name.val(),
               email: email.val(),
               subject: subject.val(),
               body: body.val()
            }, 
            success: function(response){
               console.log(response);
            }
         }) ; 

      }
   }

   function isNotEmpty(caller){
      if (caller.val() == "") {
         caller.css('border', '1px solid red');
         return false;
      } else
         caller.css('border','');
      return true;
   }
</script>
</body>
</html>