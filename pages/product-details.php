<?php
require_once("layout/header.php");
require_once("layout/navbar.php");
require_once("config/db.php");

#get product Id
$productId = $_GET['product_id'];

#retrive products
$stmt = $db->prepare("SELECT * FROM products WHERE id=$productId");
$stmt->execute();
$product = $stmt->fetchObject();


if(isset($_POST['addToCartBtn'])){

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
</head>
<body>
    <div class="container my-5 pt-5">
        <h1 class="py-3">Procut Details</h1>
          <div class="my-4">
            <div class="row">
            <div class="col-md-6">
            <div class="mb-3 shadow-sm">
                <img src="assets/products-image/<?php echo $product->image ?>" alt="" class="w-100 object-fit-cover rounded-2" style="height: 500px;">
            </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end mb-3">
               <!-- <a href="index.php?page=home-page" class="btn btn-secondary btn-md text-white fw-semibold "><i class="bi bi-arrow-left"></i>
                Back</a> -->
                </div>
                <div class="mb-4 d-flex justify-content-between">
                <h4 class="fw-semibold bg-primary-subtle p-2 pr-0"><?php echo $product->name ?></h4>
                  <h6 class="fs-5 bg-danger-subtle p-2 p-0 rounded-1"><strong>$ <?php echo $product->price ?></strong></h6>
                </div>
                 <span class="mb-2" style="color: #6B4F34;"><i class="bi bi-star-fill"></i></span>
                  <span class="mb-2" style="color: #6B4F34;"><i class="bi bi-star-fill"></i></span>
                  <span class="mb-2" style="color: #6B4F34;"><i class="bi bi-star-fill"></i></span>
                  <span class="mb-2" style="color: #6B4F34;"><i class="bi bi-star-fill"></i></span>
                   <span class="mb-2" style="color: #6B4F34;"><i class="bi bi-star-half"></i></span>
                <div class="mb-4">
                <h2>Description</h2>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quis temporibus. Ratione hic nihil, facilis eveniet quibusdam sequi labore vero, voluptatum quod, repellat sint corrupti suscipit dolor asperiores aperiam veritatis esse cum maiores? Eaque totam ea, rerum deleniti quam numquam tenetur impedit ratione obcaecati amet sit deserunt quae laboriosam vero ullam reprehenderit blanditiis aspernatur nesciunt suscipit fugiat voluptatum praesentium. Facilis dicta deleniti temporibus amet. Eveniet ullam harum rem, inventore similique sapiente nulla quidem sunt quis officiis dolorum optio quasi asperiores sint blanditiis dignissimos non aperiam maxime adipisci esse ducimus minima a dolores. Tempore amet excepturi temporibus neque molestiae, ipsa perferendis.</p>
                </div>
                <div class="d-flex mb-3">
                 <input type="number" class="form-control mx-2" placeholder="Quantity">
                  <select name="size" class="form-select">
                    <option value="">Select Size</option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                  </select>
                </div> 
                
                 <div class="mb-3">
                    <form action="" method="post">
                         <button name="addToCartBtn" class="btn btn-outline-danger w-100 flex-shrink-0">Add To Cart</button>
                    </form>
                 </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

<?php
require_once("layout/footer.php");
?>