<?php
session_start();
require_once("layout/header.php");

require_once('config/db.php');

// $charaId = $_GET['character_id'];
#select products

$stmt = $db->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_OBJ);

#select characters
$stmt = $db->prepare("SELECT id,photo, character_name FROM characters");
$stmt->execute();
$characters = $stmt->fetchAll(PDO::FETCH_OBJ);


$page = $_GET['page'] ?? 'home';

    switch ($page) {
    case 'home-page':
        require_once 'index.php';
        break;
    case 'characters':
        require_once 'pages/main-characters.php';
        break;
    case 'character-details':
        require_once 'pages/character-details.php';
    exit;
    case 'blogs-detail':
      require_once 'pages/blog-details.php';
    exit;
    case 'products-detail':
     require_once 'pages/product-details.php';
   exit;

}

#quizs
 $_SESSION['current_question'] = 0;
 $_SESSION['score'] = 0;

 header("location.index.php");
 

?>
<body>
  
      <!-- Navigation -->
    <?php 
    
    require_once("layout/navbar.php");
    
    ?>
     <!-- Header Section -->
      <section>
        <div id="header">
            <img src="photos/animation_tv_sf_img-scaled-1600x2259.webp" alt="">
        </div>
      </section>
    <!-- Products Section -->
      <?php require_once("pages/main-products.php") ?>

   <!-- Characters Section -->
    <?php require_once('pages/main-characters.php') ?>

    <!-- Blog Section -->
     <?php require_once("pages/main-blog.php") ?>
    <!-- Contact -->
      <div class="container mt-5" id="contact">
      <div class="row">
        <div class="col-md-6">
        <h1 class="mb-3">Contact Us</h1>
        <h5 class="fw-semibold mb-3"><i class="bi bi-envelope-heart text-danger fs-4"></i> attackontitan@gmail.com</h5>
        <p class="mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea facilis velit quas natus molestias, alias, sequi excepturi laboriosam facere, non aperiam? Reiciendis illum voluptatem corporis! Corporis voluptatibus incidunt ullam voluptatum in tempore, eum quos possimus, dolores, nobis deserunt est vitae?</p>
        <button class="btn btn-info rounded-5 text-white mb-3">Get Start</button>
      </div>
      <div class="col-md-6">
        <img src="photos/about_img.webp" alt="" class="w-100 h-50 object-fit-cover">
      </div>
      </div>
      </div>

      <!-- Go To Top -->
    <div class="position-fixed bottom-0 end-0 fs-1 text-info-subtle rounded-3 mx-2"><a href="#" ><i class="bi bi-arrow-up-circle"></i></a></div>
        </main>
 
 <?php 
 require_once("layout/footer.php");
?>