<?php
   $categoryId = $_GET['category_id'];
   #get categories 
   $stmt = $db->prepare("SELECT * FROM categories WHERE id=$categoryId");
   $stmt->execute();
   $category = $stmt->fetchObject();

$nameErr = ""; 
if(isset($_POST['categoryUpdateBtn'])) {
   $name = $_POST['name'];
   if($name  === "") {
    $nameErr = "the name field is required!";
   }else {
    $stmt = $db->prepare("UPDATE categories SET name='$name' WHERE id=$categoryId");
    $stmt->execute();
  echo "<script>sweeetAlert(' upadated a category', 'categories')</script>";
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Edit</title>
</head>
<body>
 <div class="container-fluid">
       <div class="row">
    <div class="col-md-12">
    <div class="card shadow mb-4">
            <div class="card-header py-3"> 
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Category Edit Form</h6>
                <a href="index.php?page=categories" class="btn btn-info btn-sm "><i class="fa fa-chevron-left" aria-hidden="true"></i>
                Back</a>
            </div>
            </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-2">
                            <label for="" class="fw-bold">Name</label>
                            <input type="text"  name="name" value="<?php echo $category->name ?>" class="form-control">
                            <span class="text-danger"><?php echo $nameErr ?></span>
                        </div>
                        <button name="categoryUpdateBtn" class="btn btn-sm btn-info">Update</button>
                    </form>
                </div>
            </div>
    </div>
 </div>

</div>
</body>
</html>