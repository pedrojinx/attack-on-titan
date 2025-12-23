<?php

#select categories
$stmt = $db->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_OBJ);
// print_r($categories[1]->name);

#delete categories
if(isset($_POST['categoryDeleteBtn'])) {
$categoryId = $_POST['category_id'];
$stmt = $db->prepare("DELETE FROM categories WHERE id=$categoryId");
$result = $stmt->execute();

if($result) {
   echo "<script>sweeetAlert(' deleted a category', 'categories')</script>";
}

}
?>
           <div class="container-fluid">
                    <div class="row">
                   <div class="col-md-12">
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                        <a href="index.php?page=categories-create" class="btn btn-primary btn-sm "> <i class="fas fa-plus"></i> Add New</a>
                    </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action </th>
                                
                            </tr>
                        </thead>
                         <tbody>
                    <?php
                        foreach($categories as $category):
                        ?>
                            <tr>
                            <td><? echo $category->id ?></td>
                            <td><?php echo $category->name ?></td>
                            <td>
                                <form action="" method="post">
                                <a href="index.php?page=categories-edit&category_id=<?php echo $category->id ?>" class="btn btn-sm btn-info">  <i class="fas fa-fw fa-edit"></i></a>
                                <button name="categoryDeleteBtn"  onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                 <input type="hidden" name="category_id" value="<?php echo $category->id ?>">
                                </form>
                            </td>
                            </tr>
                        <?php
                    endforeach;
                        ?>         
                        </tbody>
                     
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

                         </div>
                         </div>