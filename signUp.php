<?php
require_once("layout/header.php");
#connect database
require_once('config/db.php');


#sign up & registration
if(isset($_POST['signUpBtn'])) {
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];

 if($name != "" && $email != "" && $password != "") {
        $password = md5($password);
        $stmt = $db->prepare(" INSERT INTO users (name,email,password,role) VALUES('$name', '$email', '$password', 'user') ");
        $result =  $stmt->execute();
       
        if ($result) {
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: 'Successfully',
                        text: 'You have successfully signed up!!',
                        icon: 'success'
                    });
                });
            </script>
            ";
            
}
 } 
}
?>
<!DOCTYPE html> 
<html lang="en"> 
 <meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title>Sign Up</title> 
<!-- Internal Css --> 
 <link rel="stylesheet" href="assets/admin/css/aot-store.css">
 <!-- Bootstrap Css -->
<link rel="stylesheet" href="assets/admin/vendor/css/all.min.css">
 <link rel="stylesheet" href="assets/admin/vendor/css/bootstrap.min.css"> 
  <!-- sweetalert -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
   <body>
<div id="signIn"> 
    <div class="main-image">
        <img src="photos/animation_movie_the_last_attack.png-1600x2273.webp" alt="">
        </div>
        <div class="form"> 
            <h4 class="text-white text-center">Attack On Titan Register</h4>
            <div class="line">
         </div> 
        <form action="" method="post">
        <div class="mb-3">
            <label for="">Name</label> 
            <input type="text" name="name" placeholder="Add your Name"> 
        </div>
        <div class="mb-3">
            <label for="">Email</label> 
            <input type="text" name="email" placeholder="Add your Email"> 
        </div>
        <div class="mb-3">
            <label for="">Password</label>
            <input type="text" name="password" placeholder="Add your Password">
            </div> 
            <div class="mb-3"> 
            <button type="submit" name="signUpBtn">Submit</button>
            </div>
             <a href="signIn.php" class="text-white">you already have an account? Sign In here.</a> 
    </form>
     </div>

</div>


</body> 
</html>

 <?php 
 require_once("layout/footer.php");
?>