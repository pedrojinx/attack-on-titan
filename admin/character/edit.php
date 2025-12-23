<?php
$charaId = $_GET['character_id'];

#select characters
$stmt = $db->prepare("SELECT * FROM characters WHERE id=$charaId");
$stmt->execute();
$character = $stmt->fetchObject();



// $photoErr = "";
$photoErr = "";
$nameErr = "";
$ageErr  = "";
$birthdayErr  = "";
$statusErr  = "";
$genderErr = "";
$heightErr  = "";
$weightErr  = "";
$rankErr = "";
$personalityErr  = "";
$quotesErr  = "";

#update character
if(isset($_POST['characterUpdateBtn'])) {
 $character_name = $_POST['name'];
 $age = $_POST['age'];
 $birthday = $_POST['birthday'];
 $status = $_POST['status'];
 $gender = $_POST['gender'];
 $height_cm = $_POST['height'];
 $weight_kg = $_POST['weight'];
 $rank = $_POST['rank'];
 $personality = $_POST['personality'];
 $quote = $_POST['quotes'];
 $created_at = date("d-m-y H:i:s");
 $photoTmpName = $_FILES['photo']['tmp_name'];
 $photoName = $_FILES['photo']['name'];
 $photoType = $_FILES['photo']['type'];


 
    if($character_name == "") {
      $nameErr = 'The name field is required!';
    }elseif($age == "") {
      $ageErr = 'The age field is required!';
    }elseif($birthday == "") {
       $birthdayErr = 'The birthday field is required!';
    }elseif($status =="") {
      $statusErr = 'The status field is requited!';
    }elseif($gender == "") {
     $genderErr = 'The gender field is required!';
    }elseif($height_cm == "") {
     $heightErr = 'The height field is required!';
    }elseif($weight_kg == "") {
    $weightErr = 'The weight field is required!';
    }elseif($rank == "") {
    $rankErr = 'The rank field is required!';
    }elseif($personality == "") {
    $personalityErr = 'The personality field is required!';
    }elseif($quote == "") {
    $quotesErr = 'The quotes field is required!';
    }else {
      if($photoName == "") {
        $stmt = $db->prepare("
        UPDATE characters SET 
        character_name = :name,
        age = :age,
        birthday = :birthday,
        status = :status,
        gender = :gender,
        height_cm = :height_cm,
        weight_kg = :weight_kg,
        rank = :rank,
        personality = :personality,
        quote = :quote,
        created_at = :created_at
        WHERE id= :id

");

      }
      unlink("../assets/characters-image/$photoName");
   if(in_array($photoType, ['image/jpg', 'image/png', 'image/jpeg', 'image/webp'])) {
   move_uploaded_file($photoTmpName, "../assets/characters-image/$photoName");
   }
   $stmt = $db->prepare("
    UPDATE characters SET 
        photo = :photo,
        character_name = :name,
        age = :age,
        birthday = :birthday,
        status = :status,
        gender = :gender,
        height_cm = :height_cm,
        weight_kg = :weight_kg,
        rank = :rank,
        personality = :personality,
        quote = :quote,
        created_at = :created_at
        WHERE id= :id

");

$result = $stmt->execute([
    ':photo' => $photoName,
    ':name' => $character_name,
    ':age' => $age,
    ':birthday' => $birthday,
    ':status' => $status,
    ':gender' => $gender,
    ':height_cm' => $height_cm,
    ':weight_kg' => $weight_kg,
    ':rank' => $rank,
    ':personality' => $personality,
    ':quote' => $quote,
    ':created_at' => $created_at,
    ':id' => $charaId

]);
   
if($result) {
  echo "<script>sweeetAlert(' upadated a character', 'characters')</script>";
}
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Edit</title>
</head>
<body>
 <div class="container-fluid">
       <div class="row">
    <div class="col-md-12">
    <div class="card shadow mb-4">
            <div class="card-header py-3"> 
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Character Edit Form</h6>
                <a href="index.php?page=characters" class="btn btn-info btn-sm "><i class="fa fa-chevron-left" aria-hidden="true"></i>
                Back</a>
            </div>
            </div>
              <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="" class="fw-bold">Photo</label>
                            <input type="file" name="photo" class="form-control">
                            <span class="text-danger"><?php echo $photoErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Name</label>
                            <input type="text" name="name" class="form-control"  value="<?php echo $character->character_name ?> ">
                            <span class="text-danger"><?php echo $nameErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Age</label>
                            <input type="text" name="age" class="form-control"  value="<?php echo $character->age ?>">
                            <span class="text-danger"><?php echo $ageErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Birthday</label>
                            <input type="date" name="birthday" class="form-control">
                            <span class="text-danger"><?php echo $birthdayErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Status</label>
                           <select name="status" class="form-control" >
                            <option value="">Select Status</option>
                            <option value="Alive">Alive</option>
                            <option value="Deceased">Deceased</option>
                            <option value="Unknown">Unknown</option>
                           </select>
                           <span class="text-danger"><?php echo $statusErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Gender</label>
                           <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                           </select>
                           <span class="text-danger"><?php echo $genderErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Height</label>
                            <input type="text" name="height" class="form-control"  value="<?php echo $character->height_cm ?>">
                            <span class="text-danger"><?php echo $heightErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Weight</label>
                            <input type="text" name="weight" class="form-control"  value="<?php echo $character->weight_kg ?>">
                            <span class="text-danger"><?php echo $weightErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Rank</label>
                            <input type="text" name="rank" class="form-control"  value="<?php echo $character->rank ?>">
                            <span class="text-danger"><?php echo $rankErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Personality</label>
                           <textarea name="personality" class="form-control"><?php echo $character->personality ?></textarea>
                          <span class="text-danger"><?php echo $personalityErr ?></span>
                        </div>
                        <div class="mb-2">
                            <label for="" class="fw-bold">Quotes</label>
                           <input type="text" name="quotes" class="form-control"  value="<?php echo $character->quote ?>">
                           <span class="text-danger"><?php echo $quotesErr ?></span>
                        </div>
                        <button type="submit" name="characterUpdateBtn" class="btn btn-info btn-sm">Submit</button>
                    </form>
                </div>
            </div>
    </div>
 </div>

</div>
</body>
</html>