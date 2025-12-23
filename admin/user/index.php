<?php
#select users
$stmt = $db->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_OBJ);

#delete users
if(isset($_POST['userDeleteBtn'])) {
    $userId = $_POST['user_id'];

    $stmt = $db->prepare("DELETE FROM users WHERE id=$userId");
      $user =  $stmt->execute();
    if($user){
        echo "<script>location.href='index.php?page=users'</script>";
    }
}

?>
           <div class="container-fluid">
                    <div class="row">
                   <div class="col-md-12">
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">User Lists</h6>
                        <a href="index.php?page=users-create" class="btn btn-primary btn-sm "> <i class="fas fa-plus"></i> Add New</a>
                    </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                         <tbody>  
                         <?php foreach($users as $user): ?>
                            <tr>
                           <td><?php echo $user->id ?></td>
                           <td><?php echo $user->name?></td>
                           <td><?php echo $user->email ?></td>
                           <td><?php echo $user->role ?></td>
                           <td><?php echo $user->created_at ?></td>
                           <td>
                           <form action="#" method="post">
                               <a href="index.php?page=users-edit&user_id=<?php echo $user->id ?>" class="btn btn-sm btn-info">  <i class="fas fa-fw fa-edit"></i></a>
                                <button name="userDeleteBtn"  onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                <input type="hidden" name="user_id" value="<?php echo $user->id ?>">
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