<?php
#select blogs
$stmt = $db->prepare("SELECT * FROM blogs");
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_OBJ);

#delete blogs
if(isset($_POST['blogDeleteBtn'])) {
    $blogId = $_POST['blog_id'];
    $blogStmt = $db->prepare("DELETE FROM blogs WHERE id=$blogId");
    $result =  $blogStmt->execute();
    

    if($result) {
        echo "<script>location.href='index.php?page=blogs'</script>";
    }
}

?>
           <div class="container-fluid">
                    <div class="row">
                   <div class="col-md-12">
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Blog Lists</h6>
                        <a href="index.php?page=blogs-create" class="btn btn-primary btn-sm "> <i class="fas fa-plus"></i> Add New</a>
                    </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Action </th>
                                
                            </tr>
                        </thead>
                         <tbody>  
                         <?php foreach($blogs as $blog): ?>
                             <tr>
                            <td><?php echo $blog->id ?></td>    
                            <td>
                                <img src="../assets/blogs-image/<?php echo $blog->photo ?>" alt="" style="width: 150px">
                            </td>    
                            <td><?php echo $blog->title ?></td>    
                            <td><?php echo substr($blog->content, 0, 156) ?>...</td>    
                            <td><?php echo $blog->created_at ?></td>    
                            <td>
                           <form action="#" method="post">
                             <a href="index.php?page=blogs-edit&blog_id=<?php echo $blog->id ?>" class="btn btn-sm btn-info mb-2">  <i class="fas fa-fw fa-edit"></i></a>
                            <button name="blogDeleteBtn"  onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                            <input type="hidden" name="blog_id" value="<?php echo $blog->id ?>">
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