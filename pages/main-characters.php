  <!-- Character Section -->
    <div class="container mt-4" id="character">
    <div class="mb-5">
     <h3 class="fw-semibold">Fictional Characters / Attack on Titan</h3>
    </div>
    <div class="row g-3 mb-5">
      <?php
      foreach($characters as $character):
      ?>
  <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 text-center border-5 border-info-subtle">
          <img src="assets/characters-image/<?php echo $character->photo ?>" class="card-img-top" alt="levi">
          <div class="card-body bg-info-subtle">
            <h5 class="fw-semibold">
                 <a href="index.php?page=character-details&character_id=<?php echo $character->id ?>" class="nav-link"><?php echo $character->character_name ?></a>
            </h5>
          </div>
        </div>
      </div>
      <?php 
      endforeach;
      ?>

      <!-- <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 text-center border-5 border-info-subtle">
          <img src="photos/ErenIcon.jpg" class="card-img-top" alt="eren">
          <div class="card-body bg-info-subtle">
            <h5 class="fw-semibold">
              <a href="#" class="nav-link">Eren Yeager</a>
            </h5>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 text-center border-5 border-info-subtle">
          <img src="photos/Mikasa Ackerman Icon.jpg" class="card-img-top" alt="mikasa">
          <div class="card-body bg-info-subtle">
            <h5 class="fw-semibold">
              <a href="#" class="nav-link">Mikasa Ackerman</a>
            </h5>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 text-center border-5 border-info-subtle">
          <img src="photos/ArminIcon.jpg" class="card-img-top" alt="armin">
          <div class="card-body bg-info-subtle">
            <h5 class="fw-semibold">
              <a href="#" class="nav-link">Armin Arlert</a>
            </h5>
          </div>
        </div>
      </div> -->

    </div>
   </div>