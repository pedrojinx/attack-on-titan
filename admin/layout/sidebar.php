     <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #6B4F34;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                 <img src="../photos/logo2.png" alt="" class="w-100">
                </div>
                <div class="sidebar-brand-text mx-3">AOT - STORE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li 
          <?php
             if(!isset($_GET['page'])):
                
           ?>
           class="nav-item active"
           <?php
             else:
            ?>
            class="nav-item"
          <?php
             endif;
             ?>
            >
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Category -->
            <li 
              <?php
              if(isset($_GET['page'])){
                if($_GET['page'] === "categories" || $_GET['page'] === "categories-create" || $_GET['page'] === "categories-edit") {
                    echo "class='nav-item active'";
                }else {
                    echo "class='nav-item'";
                }
              }else {
                echo "class='nav-item'";
              }
                 ?>
            >
                <a class="nav-link" href="index.php?page=categories">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Category</span></a>
            </li>

            <!-- Nav Item - Character -->
            <li  
              <?php
              if(isset($_GET['page'])) {
                if($_GET['page'] === "characters" || $_GET['page'] === "characters-create" || $_GET['page'] ==="characters-edit")  {
                    echo "class = 'nav-item active'";
                }else {
                    echo "class ='nav-item'";
                }
              }else {
                echo "class='nav-item'";
              }
              ?>
            >
                <a class="nav-link" href="index.php?page=characters">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Characters</span></a>
            </li>
            <!-- Nav Item - Members -->
            <li 
             <?php
                if(isset($_GET['page'])) {
                    if( $_GET['page'] === "characters-members" ) {
                        echo "class='nav-item active'";
                    }else {
                     echo "class='nav-item'";
                    }
                }else {
                    echo "class='nav-item'";
                }
             ?>
            >
                <a class="nav-link" href="index.php?page=characters-members">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>Characters Members</span></a>
            </li>
            <!-- Nav Item - Users -->
            <li 
            <?php 
            if(isset($_GET['page'])) {
                if($_GET['page'] === "users" || $_GET['page'] === "users-create" || $_GET['page'] === "users-edit") {
                    echo "class='nav-item active'";
                } else {
                echo "class='nav-item'";
            }
            }else {
                   echo "class='nav-item'";
            }
            ?>
            >
                <a class="nav-link" href="index.php?page=users">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>
            <!-- Nav Item - Products -->
            <li 
            <?php 
            if(isset($_GET['page'])) {
             if($_GET['page'] === "products" || $_GET['page'] === "products-create" || $_GET['page'] === "products-edit") {
                echo "class='nav-item active'";
             }else {
                echo "class='nav-item'";
             }
            }else {
                echo "class='nav-item'";
            }
            ?>
            >
                <a class="nav-link" href="index.php?page=products">
                    <i class="fas fa-fw fa-chess"></i>
                    <span>Products</span></a>
            </li>
               <!-- Nav Item - Blogs -->
            <li 
            <?php 
            if(isset($_GET['page'])) {
             if($_GET['page'] === "blogs" || $_GET['page'] === "blogs-create" || $_GET['page'] === "blogs-edit"){
              echo "class='nav-item active'";
             }else {
                echo "class='nav-item'";
             }
            }else {
                echo "class='nav-item'";
            }
            ?>
            >
                <a class="nav-link" href="index.php?page=blogs">
                    <i class="fas fa-fw fa-check"></i>
                    <span>Blogs</span></a>
            </li>

      

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>