 <section id="products">
        <div class="container mt-5">
        <div class="mb-5">
           <h3 class="fw-semibold">New Products / Attack On Titan</h3>
        </div>
           <div class="row gy-3">
            <?php foreach($products as $product): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-lg d-flex flex-column">
              <a href="index.php?page=products-detail&product_id=<?php echo $product->id ?>" class="nav-link text-center p-2">
                <img src="assets/products-image/<?php echo $product->image ?>" alt="<?php echo $product->name ?>" class="card-img-top rounded mb-2">
              </a>
              <div class="card-body d-flex flex-column justify-content-between p-2">
                <div class="text-center mb-2">
                  <h5 class="mb-2"><?php echo $product->name ?></h5>
                  <h6 class="mb-2 fs-5"><strong>$42.95</strong></h6>
                  <span style="color: #6B4F34;"><i class="bi bi-star-fill"></i></span>
                  <span style="color: #6B4F34;"><i class="bi bi-star-fill"></i></span>
                  <span style="color: #6B4F34;"><i class="bi bi-star-fill"></i></span>
                  <span style="color: #6B4F34;"><i class="bi bi-star-half"></i></span>
                </div>
              </div>
            </div>
          </div>

                <?php endforeach; ?>
            <!-- <div class="col-6 col-md-4 col-lg-3">
            <div class="card card-body p-0 mb-4 shadow-lg">
              <div class="mb-2 hoodie">
               <a href="#" class="nav-link">
                 <img src="photos/attack-on-titan-jean-kirstein-hoodie-black-s-910-700x700.png" alt="" class="img-fluid rounded-sm mb-3">
               </a>
                 <h5 class="header-text"><a href="#" class="nav-link text-center mb-3">Jean Kristen Hoddie</a></h5>
                 <h5 class="text-center mb-3"><strong>$42.95</strong></h5>
                     <div class="d-flex flex-column flex-md-row gap-2 gap-md-3 align-items-center justify-content-md-center mx-sm-2">
                  <div class="mb-3">
                  <select name="" class="form-control w-100 border border-success">
                    <option value="" class="fw-bold">Select Size</option>
                    <option value="Small">Small</option>
                     <option value="Medium">Medium</option>
                     <option value="Large">Large</option>
                  </select>
                 </div>
                 <div class="mb-3">
                   <a href="#" class="btn btn-outline-danger btn-sm d-block mx-auto" style="width: 100px;">Add To Cart</a>
                </div>
                 </div>
              </div>
            </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
            <div class="card card-body p-0 mb-4 shadow-lg">
              <div class="mb-2 hoodie">
               <a href="#" class="nav-link">
                 <img src="photos/levi-ackerman-poster-hoodie-navy-blue-s-399-700x700.jpg" alt="" class="img-fluid rounded-sm mb-3">
               </a>
                 <h5 class="header-text"><a href="#" class="nav-link text-center mb-3">Levi AOT Hoodie</a></h5>
                 <h5 class="text-center mb-3"><strong>$44.97</strong></h5>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-3 justify-content-md-center align-items-center mx-sm-2">
                  <div class="mb-3">
                  <select name="" class="form-control w-100 border border-success">
                    <option value="" class="fw-bold">Select Size</option>
                    <option value="Small">Small</option>
                     <option value="Medium">Medium</option>
                     <option value="Large">Large</option>
                  </select>
                 </div>
                 <div class="mb-3">
                   <a href="#" class="btn btn-outline-danger btn-sm d-block mx-auto" style="width: 100px;">Add To Cart</a>
                </div>
                 </div>
              </div>
            </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
            <div class="card card-body p-0 mb-4 shadow-lg">
              <div class="mb-2 hoodie">
                <a href="#" class="nav-link">
                  <img src="photos/levi-aot-hoodie-black-s-694-700x700.png" alt="" class="img-fluid rounded-sm mb-3">
                </a>
                 <h5 class="header-text"><a href="#" class="nav-link text-center mb-3">Levi AOT Hoodie</a></h5>
                 <h5 class="text-center mb-3"><strong>$42.95</strong></h5>
                 <div class="d-flex flex-column flex-md-row gap-2 gap-md-3 justify-content-md-center align-items-center mx-sm-2">
                  <div class="mb-3">
                  <select name="" class="form-control w-100 border border-success">
                    <option value="" class="fw-bold">Select Size</option>
                    <option value="Small">Small</option>
                     <option value="Medium">Medium</option>
                     <option value="Large">Large</option>
                  </select>
                 </div>
                 <div class="mb-3">
                   <a href="#" class="btn btn-outline-danger btn-sm d-block mx-auto" style="width: 100px;">Add To Cart</a>
                </div>
                 </div>
              </div>
            </div>
            </div> -->
      
       </div>
        </div>
       </section>