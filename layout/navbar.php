 <?php
//  session_start();

  if(isset($_POST['signOutBtn'])) {
      session_destroy();
      header("location:index.php");
  }
 ?>
 <nav class="navbar navbar-expand-lg position-fixed w-100 top-0 z-2" id="nav">
        <div class="container">
            <a href="index.php" class="navbar-brand">
          <img class="border-rounded" src="photos/attack-on-titan-store-logo-1.png" alt="" style="width:100%; max-width: 120px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  " id="navBar">
              <?php if(!isset($_SESSION['user'])): ?>
                <?php else: ?>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="index.php?page=home-page" class="nav-link active mx-1 fw-semibold px-3" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#products" class="nav-link mx-1 fw-semibold px-3">Products</a>
                    </li>
                    <!-- <li class="nav-item dropdown w-100">
                        <a href="#" class="nav-link dropdown-toggle mx-1 fw-semibold px-3"  data-bs-toggle="dropdown">
                            Shop By Category
                        </a>
                      <ul class="dropdown-menu">
                        <div class="row">
        
                         <div>
                        <h6 class="fw-bold ms-3">Clothing</h6>
                        <li><a href="#" class="dropdown-item">Hoodies</a></li>
                        <li><a href="#" class="dropdown-item">Jackets</a></li>
                        <li><a href="#" class="dropdown-item">T-shirt</a></li>
                        <li><a href="#" class="dropdown-item">Sweat Shirt</a></li>
                        <li><a href="#" class="dropdown-item"></a></li>
                         </div>

                        <div>
                        <h6 class="fw-bold ms-3">Shoes</h6>
                        <li><a href="#" class="dropdown-item">Jordan Sneakers</a></li>
                        <li><a href="#" class="dropdown-item">Air Force Shoes</a></li>
                        </div>
                          </div>
                      
                
                      </ul>
                    </li> -->
                    <li class="nav-item"><a href="#character" class="nav-link mx-1 fw-semibold px-3">Characters</a></li>
                    <li class="nav-item"><a href="#blog" class="nav-link mx-1 fw-semibold px-3">Blog</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link mx-1 fw-semibold px-3">Contact</a></li>
                </ul>
                  <?php endif; ?>
              <ul class="navbar-nav ms-auto">
                <?php if(isset( $_SESSION['user'])): ?>
              <form action="" method="post">
               <div class="d-flex justify-content-md-between">
                 <li class="nav-item mx-3">
                  <span><?php echo $_SESSION['user']->name ?></span>
                </li>
                <li class="nav-item">
                  <button name="signOutBtn" class="dropdown-item" onclick="return confirm('Do you want to Sign Out?')" >
                Sign Out
            </button>
                </li>
               </div>
            </form>
                <?php  else: ?>
                  <li class="nav-item"><a href="signIn.php" class="nav-link mx-1 fw-semibold px-3">Sign In</a></li>
                <li class="nav-item"><a href="signUp.php" class="nav-link mx-1 fw-semibold px-3">Register</a></li>
                <?php endif; ?>
              </ul>
            </div>
        </div>
     </nav> 