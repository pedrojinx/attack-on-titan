<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$blogId = $_GET['blog_id'];
#select blogs
$stmt = $db->prepare("SELECT * FROM blogs WHERE id=$blogId");
$stmt->execute();
$blog = $stmt->fetchObject();


#create comments
if(isset($_POST['createCommentsBtn'])) {
    $text = $_POST['text'];
    $userId = $_SESSION['user']->id;
    $created_at = date("Y-m-d H:i:s");
    $stmt = $db->prepare("INSERT INTO comments (text,blog_id,user_id,created_at) VALUES (:text,:blog_id,:user_id,:created_at)");
    $result = $stmt->execute([
      ':text' => $text,
      ':blog_id' => $blogId,
      ':user_id' => $userId,
      ':created_at' => $created_at
    ]);

    if($result){
      echo "<script>location.href='sweetAlert(' created a comment!', blogs-detail.php?page?blog_id=" . $blogId ." )')'</script>";

}
}
#select comments
$comStmt = $db->prepare("SELECT comments.text,comments.created_at,users.name FROM comments INNER JOIN users ON comments.user_id = users.id WHERE blog_id=$blogId");
$comStmt->execute();
$comments = $comStmt->fetchAll(PDO::FETCH_OBJ);

require_once("layout/header.php");
require_once("layout/navbar.php");
?>
<!-- Blog Details -->
      <div class="container mt-5 pt-5">
         <h1 class="my-3">Blog Details / Attack On Titan</h1>
        <div class="row">
            <div class="col-md-12">
            <div class="mb-5">
            <img src="assets/blogs-image/<?php echo $blog->photo ?>" alt="" class="w-100 object-fit-cover mb-3" style="height: 500px; object-position: 100% 37%">
            <h3 class="mb-3 fw-bold px-2"><?php echo $blog->title ?> </h3>
            <div class="border border-secondary-subtle mx-2 mb-3" style="width: 100px;"></div>
            <h5 class="px-2 mb-3"> <strong>POSTED ON :</strong> <span class="fw-semibold text-danger fw-semibold"><?php echo $blog->created_at ?></span></h5>
          <h4 class="my-4 px-2 text-secondary fw-semibold">
           <?php echo $blog->content ?>
        </h4>
      </div>
       <!-- Leave a message -->
        <?php if(isset($_SESSION['user'])): ?>
        <div class="mb-5">
            <h4 class="mb-3">Leave a comment</h4>
            <div class="row">
           <form action="" method="post">
             <div class="col-sm-12 col-md-8">
            <textarea name="text" rows="5" class="form-control"></textarea>
            </div>
            <div class="my-3">
            <button type="submit" name="createCommentsBtn" class="btn btn-primary">Sumit</button>
           </div>
           </form>
         </div>
    
        </div>
        <?php else: ?>
            <a href="signIn.php" class="btn btn-primary text-white">Sign In to comment</a>
      <?php endif; ?>
       <!-- User Comments -->
            <div class="mt-3">
                <h5 class="fw-bold mb-5">User's Comments</h5>
                <div class="row">
              <?php foreach($comments as $comment): ?>
               <div class="col-sm-12 col-md-8">
                <div class="card card-body mb-3">
                      <p class="fw-bold text-danger"><?php echo $comment->name ?></p>
                      <p class="fw-semibold"><?php echo $comment->text ?></p>
                      <p class="ms-auto mb-2"><?php echo $comment->created_at ?></p>
                </div>
                </div>
                <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
      </div>
</body>
</html>