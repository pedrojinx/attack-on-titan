<?php 
session_start();
require_once("layout/header.php");
require_once("config/db.php");
require_once("layout/navbar.php");
#sign In
 if(isset($_POST['signInBtn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $db->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
    $stmt->execute([
     ':email' => $email,
     ':password' => $password
    ]);
    $user = $stmt->fetchObject();
  
 if($user){
  $_SESSION['user'] = $user;
  if($user->role === "Admin") {
   echo "<script>location.href='admin/index.php'</script>";
  }else {
   echo "<script>sweetAlert(' user signed in', 'home-page')</script>";
  }
 }else {
     ?>
 <script>
    Swal.fire({
   title: "Incorrect",
   text: "Sign In Fail! Try again! ",
   icon: "error"
 }).then(function(){
   location.href = 'index.php';
 })
     </script>
  <?php
 }
 }


?>
<!DOCTYPE html> 
<html lang="en"> 
 <meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title>Sign In</title> 
</head>
   <body>
<div id="signIn"> 
    <div class="main-image">
        <img src="photos/animation_movie_the_last_attack.png-1600x2273.webp" alt="">
        </div>
        <div class="form"> 
            <h4 class="text-white text-center">Attack On Titan Sign In</h4>
            <div class="line">
         </div> 
        <form action="" method="post">
        <div class="mb-3">
            <label for="">Email</label> 
            <input type="text" name="email" placeholder="Add your Email" required> 
        </div>
        <div class="mb-3">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Add your Password" required>
            </div> 
        <div class="mb-3"> 
        <button type="submit" name="signInBtn">Submit</button>
        </div>
      <a href="signUp.php" class="text-white">no account yet? Register here.</a> 
        </form>
       </div>
</div>
</body> 
</html>

 <?php 
 require_once("layout/footer.php");
?>