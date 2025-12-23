<?php
if(isset($_POST['categoryCreateBtn'])) {
 $name = $_POST['name'];
 $stmt = $db->prepare("INSERT INTO categories (name) VALUES ('$name')");
 $stmt->execute();
 echo "<script>sweeetAlert(' created a category', 'categories')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Create</title>
</head>
<body>
 <div class="container-fluid">
       <div class="row">
    <div class="col-md-12">
    <div class="card shadow mb-4">
            <div class="card-header py-3"> 
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Category Creation Form</h6>
                <a href="index.php?page=categories" class="btn btn-info btn-sm "><i class="fa fa-chevron-left" aria-hidden="true"></i>
                Back</a>
            </div>
            </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-2">
                            <label for="" class="fw-bold">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <button type="submit" name="categoryCreateBtn" class="btn btn-info btn-sm">Submit</button>
                    </form>
                </div>
            </div>
    </div>
 </div>

</div>
</body>
</html>