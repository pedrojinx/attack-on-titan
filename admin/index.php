<?php  
ob_start();
session_start();
if(!isset($_SESSION['user'])) {
 header("location:../index.php");
}else {
    if($_SESSION['user']->role !== "Admin"){
        header("location:../index.php");
    }
}
require_once("layout/header.php");

function getRowCount($table) {
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) as count FROM $table");
    $stmt->execute();
    $data = $stmt->fetchObject();
    return $data;  
}
$category = getRowCount('categories');
$blog = getRowCount('blogs');
$character = getRowCount('characters');
$product = getRowCount('products');
$user = getRowCount('users');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
   <?php require_once("layout/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
             <?php require_once("layout/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

             
                <?php 
                //  Entry Point 
                  if($_SERVER['QUERY_STRING']): 
                    switch($_REQUEST['page']) {
                    #category
                    case 'categories':
                    require_once("category/index.php");
                    break;
                    case 'categories-create':
                    require_once("category/create.php");
                    break;
                    case 'categories-edit':
                    require_once("category/edit.php");
                    break;
                    #product
                    case 'products':
                    require_once("product/index.php");
                    break;
                    case 'products-create':
                    require_once("product/create.php");
                    break;
                    case 'products-edit':
                    require_once("product/edit.php");
                    break;
                    case 'product-orders':
                    require_once("product/order.php");
                    break;
                    #character
                    case 'characters':
                    require_once("character/index.php");
                    break;
                    case 'characters-create':
                    require_once("character/create.php");
                    break;
                    case 'characters-edit':
                    require_once("character/edit.php");
                    break;
                    case 'characters-members':
                    require_once("character/members.php");
                    break;
                    #blog
                    case 'blogs':
                    require_once('blog/index.php');
                    break;
                    case 'blogs-create':
                    require_once('blog/create.php');
                    break;
                    case 'blogs-edit':
                    require_once('blog/edit.php');
                    break;
                     #user
                    case 'users':
                    require_once("user/index.php");
                    break;
                    case 'users-create':
                    require_once("user/create.php");
                    break;
                    case 'users-edit':
                    require_once("user/edit.php");
                    break;
 
                  }
                 

                else:
              ?>

         
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!--Category Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Category</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $category->count ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Products Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Products</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $product->count ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chess fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Characters (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Characters
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $character->count ?></div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Blogs Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                               Blog</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $blog->count ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-check fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Users Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user->count ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endif;
                  ?>
            
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
          <?php require_once("layout/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
<?php
require_once("layout/footer.php");
?>