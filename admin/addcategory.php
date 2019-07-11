<?php 
   //session start for user
      session_start();
      if (!isset($_SESSION['logged_user_id'])) { 
      header('location: index.php');
   }
      require '../db.php';
      //stored data in the category
      if (isset($_POST['submit'])) {
         $stmt = $pdo->prepare("INSERT INTO category (title, categoryId)
            VALUES(:title, :categoryId)");
      
      $criteria = [
         'title' => $_POST['title'],
         'categoryId' => $_POST['categoryId'],
      ];
      $stmt->execute($criteria);
      }
      ?>
<!-- Category form -->
<link rel="stylesheet" type="text/css" href="main.css">
<div class="container-fluid">
   <div class="row">
      <?php require 'sider.php'; ?>
      <div class="col-md-9 bg-secondary" >
         <form method="POST" action="" class="form py-5">
            <h2 class="py-4"><big>Create new category ?</big></h2>
            <label><b>Title:</b></label><br>
            <input type="text" name="title" placeholder="categories" required><br>
            <label><b>category-Id:</b></label><br>
            <input type="text" name="categoryId" placeholder="category id" required><br>
            <button class="btn btn-info text-center my-3 px-5 font-weight-bold " name="submit">Submit Category</button>
         </form>
      </div>
   </div>
</div>
<?php require 'footer.php'; ?>