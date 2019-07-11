
<section class="lower-footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-4">
        <img src="image/logo.png" alt="#" class="img-fluid">
        <p>We believe in <strong>Simple, Creative & Flexible</strong> Design of each auction product of our company. We believe that you are believe with us for supporting in this time.</p>
        <hr>
        <p>Copyright &copy; 2019 Canvas: Fortheby's</p>
      </div>

      <div class="col-lg-4">
      
      </div>

      <div class="col-lg-4 mb-4">
        <h5 class="text-uppercase text-white">Connect Socially</h5>
        <div class="icons py-3">
          <a href="https://facebook.com" target="_blank" target="_blank" class="facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com" target="_blank" class="twitter" title="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="https://instagram.com" target="_blank" class="instagram" title="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="https://skype.com" target="_blank" class="skype" title="Skype"><i class="fab fa-skype"></i></a>
        </div>
        <input type="email" name="email" placeholder="Enter your Email" class="mt-4 mb-2"><br>
        <button class="btn btn-dark text-uppercase text-center">Subscribe</button>
      </div>
    </div>
  </div>  
 </section>



  <a href="#top" class="top-arrow"><i class="fas fa-angle-double-up"></i></a>


<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>

<script>
	$(window).scroll(
    function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 200) {
        $(".second_top_part").addClass("darkHeader");
    } else {
        $(".second_top_part").removeClass("darkHeader");
    }
});
</script>

<script type="text/javascript">
	// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

</script>

<script type="text/javascript">
 $("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});




$(document).ready(function() {
              $('.scrollbox').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 8000,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: false,
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 3,
                    nav: false,
                    loop: true,
                    margin: 20
                  }
                }
              });
            });

  function detailsmodal(id){
  var data ={"id" : id};
  jQuery.ajax({
    url : <?=BASEURL;?>+'detailsmodal.php',
    method : "post",
    data : data,
    success: function(data){
      jQuery('body').append(data);
      jQuery("#details-modal").modal('toggle');
    }
  });
}

</script>

<script type="text/javascript">
  $(function(){
    $(document).on("submit", "#Loginform", function(event){
      event.preventDefault();
      $.ajax({
        type:"POST",
        url: "userlogin.php",
        data: $(this).serialize(),
        success: function(response){
          if( response == "success"){
            $("#response").html("<div class='alert alert-success' style='display:none'>Login Success</div>");
            $("#response .alert").slideDown("slow");
            window.location.href = "index.php";
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
</body>
</html>