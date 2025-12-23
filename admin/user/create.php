<?php

$nameErr = "";
$emailErr = "";
$passwordErr = "";
if(isset($_POST['userCreateBtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $created_at = date("d-m-y H:i:s");

    if($name == "") {
        $nameErr = "The name field is required!";
    }elseif($email == "") {
       $emailErr = "The eamil field is required!";
    }elseif($password == "") {
    $passwordErr = "The password field is required!";
    }else {
        $password = md5($password);
        $stmt = $db->prepare("
        INSERT INTO users
         (name, email, password, role, created_at) VALUES(:name,:email,:password, :role, :created_at)
        ");
        $result = $stmt->execute([
            ':name'=> $name,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role,
            ':created_at' => $created_at
        ]);

        if($result){
            echo "<script>sweeetAlert(' created a user', 'users')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Create</title>
</head>
<body>
 <div class="container-fluid">
       <div class="row">
    <div class="col-md-12">
    <div class="card shadow mb-4">
            <div class="card-header py-3"> 
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Users Creation Form</h6>
                <a href="index.php?page=users" class="btn btn-info btn-sm "><i class="fa fa-chevron-left" aria-hidden="true"></i>
                Back</a>
            </div>
            </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-2">
                            <label for="" class="fw-bold">Name</label>
                            <input type="text" name="name" class="form-control">
                            <span class="text-danger"><?php echo $nameErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Email</label>
                            <input type="text" name="email" class="form-control">
                            <span class="text-danger"><?php echo $emailErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold mb-md-3">Password</label>
                                <input type="checkbox" id="checkBox">
                            <input type="text" name="password" class="form-control" id="checkInput">
                            <span class="text-danger"><?php echo $passwordErr ?></span>
                        
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Role</label>
                          <select name="role" class="form-control">
                            <option value="">Select of your Role</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                          </select>
                        </div>
                        <button type="submit" name="userCreateBtn" class="btn btn-info btn-sm">Submit</button>
                    </form>
                </div>
            </div>
    </div>
 </div>

</div>
</body>
</html>

<script>
    const checkBox = document.getElementById("checkBox");
    const checkInput = document.getElementById("checkInput"); 

   checkInput.style.display = "none";
   checkBox.addEventListener("click", ()=> {
    if(checkBox.checked) {
         checkInput.style.display = "block";
    }else {
         checkInput.style.display = "none";
    }
  })
  
</script>