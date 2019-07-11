<?php require "header.php" ?>
 
<div class="container-fluid bg-light">
	<div class="row text-center ">
		<div class="col-md-3"></div>
		<div class="col-md-6 my-5">
			<form id="loginform" class="form border py-3">
					<h3 class="login font-weight-bold">Login Form</h3>
					<hr>
					<div class="form-group">
						<input type="email" name="email" placeholder="email"><br>
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="password"><br>
					</div>
					<div class="form-group">
						<input type="submit" class=" btn btn-info" name="submit" value="Submit">
					</div>
					<div class="form-group">
						<div id="response"></div>
					</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

<?php require "footer.php" ?>
<script type="text/javascript">
	$(function(){
		$(document).on("submit", "#loginform", function(event){
			event.preventDefault();
			$.ajax({
				type:"POST",
				url: "login.php",
				data: $(this).serialize(),
				success: function(response){
					if( response == "success"){
						$("#response").html("<div class='alert alert-success' style='display:none'>Login Success</div>");
						$("#response .alert").slideDown("slow");
						window.location.href = "admin.php";
					}
					if( response == "error"){
						$("#response").html("<div class='alert alert-warning' style='display:none'>password incorrect</div>");
						$("#response .alert").slideDown("slow");
					}
					if( response == "nouser"){
						$("#response").html("<div class='alert alert-warning' style='display:none'>Email is not registered</div>");
						$("#response .alert").slideDown("slow");
					}
				}
			});
		});
	});

</script>
