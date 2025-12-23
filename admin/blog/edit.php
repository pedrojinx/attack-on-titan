<?php

$blogId = $_GET['blog_id'];
#select blogs
$stmtBlog = $db->prepare("SELECT * FROM blogs");
$stmtBlog->execute();
$blog =$stmtBlog->fetchObject();

$titleErr = "";
$contentErr = "";
if(isset($_POST['blogUpdateBtn'])) {
    $title =$_POST['title'];
    $content = $_POST['content'];
    $create_at = date("d-m-y H:i:s");
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $photoName = $_FILES['photo']['name'];
    $photoType = $_FILES['photo']['type'];

  if($photoName == "") {
      $stmt = $db->prepare("UPDATE blogs SET title=:title, content=:content, created_at=:created_at WHERE id=$blogId");
  }elseif($title == "") {
    $titleErr = "The title field is required!";
  }elseif($content == "") {
    $contentErr = "The content field is required!";
  }else {
     unlink("../assets/blogs-image/$photoName");
      if(in_array($photoType, ['image/jpg', 'image/png','image/jpeg', 'image/webp'])){
      move_uploaded_file($photoTmpName, "../assets/blogs-image/$photoName");
      }

      $stmt = $db->prepare("UPDATE blogs SET photo=:photo, title=:title, content=:content, created_at=:created_at WHERE id=$blogId");
      $result = $stmt->execute([
        ':photo' => $photoName,
        ':title' => $title,
        ':content' => $content,
        ':created_at' => $create_at
      ]);

      if($result) {
        echo "<script>sweeetAlert(' upadated a blog', 'blogs')</script>";
      }
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Create</title>
</head>
<body>
 <div class="container-fluid">
       <div class="row">
    <div class="col-md-12">
    <div class="card shadow mb-4">
            <div class="card-header py-3"> 
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Blog Edit Form</h6>
                <a href="index.php?page=blogs" class="btn btn-info btn-sm "><i class="fa fa-chevron-left" aria-hidden="true"></i>
                Back</a>
            </div>
            </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="" class="fw-bold">Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $blog->title ?>">
                            <span class="text-danger"><?php echo $titleErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Content</label>
                            <textarea name="content" class="form-control"><?php echo $blog->content ?></textarea>
                            <span class="text-danger"><?php echo $contentErr ?></span>
                        </div>
                        <button type="submit" name="blogUpdateBtn" class="btn btn-info btn-sm">Update</button>
                    </form>
                </div>
            </div>
    </div>
 </div>

</div>
</body>
</html>