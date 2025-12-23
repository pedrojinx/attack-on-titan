
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attack On Titan</title>
      <!-- bootstrap cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Bootstrap Icon Cdn-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">  
     <!-- Internal Css --> 
    <link rel="stylesheet" href="assets/admin/css/aot-store.css">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="assets/admin/vendor/css/all.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/css/bootstrap.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
  function sweetAlert(message,page){
  Swal.fire({
  title: "Successfully",
  text: "You have successfully " + message,
  icon: "success"
}).then(function(){
  location.href = 'index.php?page' + page;
})
  }
 </script>
 
</head>