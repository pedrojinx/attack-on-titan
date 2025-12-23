
<?php 
#select blogs
$stmt = $db->prepare("SELECT * FROM blogs");
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Blog Section -->
  <div class="container mt-4" id="blog">
    <h3 class="fw-semibold mb-5">Blogs / Attack On Titan</h3>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
         <?php foreach($blogs as $blog):?>
         <div class="col">
        <div class="shadow-lg h-100">
          <a href="index.php?page=blogs-detail&blog_id=<?php echo $blog->id ?>" class="nav-link">
            <img src="assets/blogs-image/<?php echo $blog->photo ?>" alt=""
                class="w-100 object-fit-cover mb-3"
                style="height: 250px; object-position: 100% 30%;">
            <h3 class="mb-3 fw-bold px-2">
           <?php echo $blog->title ?>
            </h3>
          </a>
          <div class="border border-secondary-subtle mx-2 w-25"></div>
          <h4 class="my-4 px-2 text-secondary fw-semibold pb-3">
          <?php echo substr( $blog->content, 0, 70) ?>...
          </h4>
        </div>
      </div>

         <?php endforeach; ?>
      <!-- <div class="col">
        <div class="shadow-lg h-100">
          <a href="#" class="nav-link">
            <img src="photos/Mikasa Final Ending Scene 5.jpg" alt=""
                class="w-100 object-fit-cover mb-3"
                style="height: 250px; object-position: 100% 30%;">
            <h3 class="mb-3 fw-bold px-2">
              How Attack on Titan Uses Fear to Tell a Deeper Story
            </h3>
          </a>
          <div class="border border-secondary-subtle mx-2 w-25"></div>
          <h4 class="my-4 px-2 text-secondary fw-semibold pb-3">
            Fear is present in almost every part of Attack on Titan...
          </h4>
        </div>
      </div>

      <div class="col">
        <div class="shadow-lg h-100">
          <a href="#" class="nav-link">
            <img src="photos/eren _ Mikasa .jpg" alt=""
                class="w-100 object-fit-cover mb-3"
                style="height: 250px;">
            <h3 class="mb-3 fw-bold px-2">
              The Meaning of Freedom in Attack on Titan
            </h3>
          </a>
          <div class="border border-secondary-subtle mx-2 w-25"></div>
          <h4 class="my-4 px-2 text-secondary fw-semibold pb-3">
            Freedom is one of the most important ideas in Attack on Titan, but...
          </h4>
        </div>
      </div>

      <div class="col">
        <div class="shadow-lg h-100">
          <a href="#" class="nav-link">
            <img src="photos/childhood.jpg" alt=""
                class="w-100 object-fit-cover mb-3"
                style="height: 250px; object-position: 100% 30%;">
            <h3 class="mb-3 fw-bold px-2">
              Why the World of Attack on Titan Feels So Real
            </h3>
          </a>
          <div class="border border-secondary-subtle mx-2 w-25"></div>
          <h4 class="my-4 px-2 text-secondary fw-semibold pb-3">
            Despite being set in a fictional world, Attack on Titan feels grounded...
          </h4>
        </div>
      </div> -->

    </div>
  </div>