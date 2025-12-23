<?php

 $productId = $_GET['product_id'];

 #get products
$stmt = $db->prepare("SELECT * FROM products WHERE id=$productId");
$stmt->execute();
$product = $stmt->fetchObject();

#edit products
$nameErr = "";
$priceErr = "";
$sizeErr = "";
if(isset($_POST['productUpdateBtn'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $created_at = date('d-m-y H:i:s');

    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];

     if($name == "") {
        $nameErr = "The name field is required!";
     }elseif($price == "") {
        $priceErr = "The price field is required!";
     }elseif($size == "") {
        $sizeErr = "The price field is required!";
     }else {
        if($imageName == "") {
            $stmt = $db->prepare("UPDATE products SET name='$name', price=$price, size='$size', created_at='$created_at' WHERE id=$productId");
        }
        #delete old image
        unlink("../assets/products-image/$product->image");
        if(in_array($imageType, ['image/jpg', 'image/png', 'image/jpeg', 'image/webp'])) {
     move_uploaded_file($imageTmpName, "../assets/products-image/$imageName");
        }
        // sql execute
     $stmt = $db->prepare("UPDATE products SET image=:image, name=:name, price=:price, size=:size, created_at=:created_at WHERE id=$productId");
     $result = $stmt->execute([
        ':image' => $imageName,
        ':name' => $name,
        ':price' => $price,
        ':size' => $size,
        ':created_at' => $created_at
     ]);
      if($result) {
        echo "<script>sweeetAlert(' upadated a product', 'products')</script>";
      }
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
                <h6 class="m-0 font-weight-bold text-primary">Products Edit Form</h6>
                <a href="index.php?page=products" class="btn btn-info btn-sm "><i class="fa fa-chevron-left" aria-hidden="true"></i>
                Back</a>
            </div>
            </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="" class="fw-bold">Image</label>
                          <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Name</label>
                            <input type="text" name="name" value="<?php echo $product->name ?>" class="form-control">
                            <span class="text-danger"><?php echo $nameErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Price</label>
                            <input type="text" name="price" value="<?php echo $product->price ?>" class="form-control">
                            <span class="text-danger"><?php echo $priceErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Size</label>
                            <select name="size" class="form-control">
                                <option value="">Select of your Size</option>
                                <option value="small">Small</option>
                                <option value="medium" >Medium</option>
                                <option value="large">Large</option>
                            </select>
                            <span class="text-danger"><?php echo $sizeErr ?></span>
                        </div>
                        <button type="submit" name="productUpdateBtn" class="btn btn-info btn-sm">Update</button>
                    </form>
                </div>
            </div>
    </div>
 </div>

</div>
</body>
</html>