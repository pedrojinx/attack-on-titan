<?php
   
   #get products
   $stmt = $db->prepare("SELECT * FROM products");
   $stmt->execute();
   $products = $stmt->fetchAll(PDO::FETCH_OBJ);

   #delete products
   if(isset($_POST['productDeleteBtn'])) {
    $productId = $_POST['product_id'];

    $stmt = $db->prepare("DELETE FROM products WHERE id=$productId");
    $stmt->execute();
    echo "<script>location.href='index.php?page=products'</script>";
   }

?>
           <div class="container-fluid">
                    <div class="row">
                   <div class="col-md-12">
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Product Lists</h6>
                        <a href="index.php?page=products-create" class="btn btn-primary btn-sm "> <i class="fas fa-plus"></i> Add New</a>
                    </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th>Action </th>
                                
                            </tr>
                        </thead>
                         <tbody>
                    <?php foreach($products as $product): ?>
                       <tr>
                        <td><?php echo $product->id ?></td>
                        <td>
                            <img src="../assets/products-image/<?php echo $product->image ?>" alt="" style="width: 150px">
                        </td>
                        <td><?php echo $product->name ?></td>
                        <td><?php echo $product->price ?></td>
                        <td><?php echo $product->created_at ?></td>
                        <td>
                            <form action="#" method="post">
                                <a href="index.php?page=products-edit&product_id=<?php echo $product->id ?>" class="btn btn-sm btn-info">  <i class="fas fa-fw fa-edit"></i></a>
                                <button name="productDeleteBtn"  onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                <input type="hidden" name="product_id" value="<?php echo $product->id ?>">
                            </form>
                        </td>
                       </tr>

                       <?php endforeach; ?>
                        </tbody>
                     
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

                         </div>
                         </div>