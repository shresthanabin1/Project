<?php require_once 'connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'carousel.php'; ?>

<section class="footer1">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 contactinfo">
        <h1 class="contact"><b>Contacts</b></h1>
        <div class="contans">
        <div class="address position-relative">
          <p class="text-uppercase"><b>Address</b></p>
          <span class="text-warning"><i class="fas fa-map-marker-alt"></i></span>
          <P class="text-secondary pb-3">Northampton Lincon street, UK</P>
        </div>
        <div class="phone position-relative">
          <p class="text-uppercase"><b>Phone</b></p>
          <span class="text-warning"><i class="fas fa-phone fa-rotate-90"></i></span>
          <p class="text-warning pb-3">800-123-4567</p>
        </div>
        <div class="emails position-relative">
          <p class="text-uppercase"><b>E-mail</b></p>
          <span class="text-warning"><i class="fas fa-at"></i></span>
          <a class="text-secondary text-decoration-none" href="northampton.ac.uk">northampton.ac.uk</a>
        </div>
        </div>
      </div>

      <div class="col-md-6 maps">
        <iframe class="maps" src="https://maps.google.com/maps?q=university%20of%20northampton&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>

<?php require 'footer.php'; ?>