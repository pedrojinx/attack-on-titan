<?php 
session_start();
require_once("layout/header.php");

 require_once("layout/navbar.php");
 require_once('config/db.php');


 $charaId = $_GET['character_id'];
 #select characer
 $stmt = $db->prepare("SELECT * FROM characters WHERE id=$charaId");
 $stmt->execute();
 $character = $stmt->fetchObject();
 

?>

<body>
         <div class="container pt-5 mb-3">
          <h1 class="fw-semibold mb-3 my-3">Character Details</h1>
      <div class="row">
          <div class="col-md-6">
            <img src="assets/characters-image/<?php echo $character->photo ?>" alt="" class="w-100 h-100 object-fit-cover">
        </div>
        <div class="col-md-6">
            <div class="my-4">
                 <h4><strong>Name: </strong><?php echo $character->character_name ?></h4>
                 <h4><strong>Age:</strong> <?php echo $character->age ?></h4>
                 <h4><strong>Birthday: </strong><?php echo $character->birthday ?> <sup>th</sup></h4>
                 <h4><strong>Status:</strong> <?php echo $character->status ?></h4>
                 <h4><strong>Gender:</strong> <?php echo $character->gender ?></h4>
                 <h4><strong>Height:</strong> <?php echo $character->height_cm ?> cm<sup>2</sup></h4>
                 <h4><strong>Weight:</strong> <?php echo $character->weight_kg ?>g </h4>    
                 <h4><strong>Rank:</strong> <?php echo $character->rank ?></h4>
                 <h4><strong>Personality:</strong> <?php echo $character->personality ?></h4>
                 <h4><strong>Quotes:</strong> <?php echo $character->quote ?></h4>
            </div>
        </div>
      </div>
      </div>
</body>
</html>

<?php

require_once("layout/footer.php");
?>