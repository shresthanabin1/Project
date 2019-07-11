
<div class="lower-footer bg-primary border-top">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-white pt-3">
        <p>Copyright &copy; 2018 by W Adventures Nepal. All Rights Reserved.</p>
      </div>

      <div class="col-md-6 text-white pt-3 text-right">
        <p>Powered by: <a href="#" class="text-uppercase text-white">Fotheby's </a></p>
      </div>
 </div>
</div>
</div>

<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/popper.min.js"></script>

<script type="text/javascript">
   function sendEmail() {
      console.log('sending....');
      var name = $("#name");
      var email = $("#email");
      var subject = $("#subject");
      var body = $("#body");

      if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
         console.log('passed condition...');
      }
   }

   function isNotEmpty(caller){
      if (caller.val() == "") {
         caller.css('border', '1px solid red');
      } esle
         caller.css('border','');
      return true;
   }
</script>
</body>
</html>