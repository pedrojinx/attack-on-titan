<?php

#select characters
$stmt = $db->prepare("SELECT * FROM characters");
$stmt->execute();
$characters = $stmt->fetchAll(PDO::FETCH_OBJ);

#delete characters

if(isset($_POST['characterDeleteBtn'])) {
$charaId = $_POST['character_id'];
$stmt = $db->prepare("DELETE FROM characters WHERE id=$charaId");
$result = $stmt->execute();

if($result) {
   echo "<script>sweeetAlert(' deleted a characters', 'characters')</script>";
}
}
?>
           <div class="container-fluid">
                    <div class="row">
                   <div class="col-md-12">
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Character Detail Lists</h6>
                        <a href="index.php?page=characters-create" class="btn btn-primary btn-sm "> <i class="fas fa-plus"></i> Add New</a>
                    </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Birthday</th>
                                <th>Status</th>
                                <th>Gender</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Rank</th>
                                <th>Personality</th>
                                 <th>Quotes</th>
                                 <th>Create At</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php foreach($characters as $character): ?>
                            <tr>
                                <td><?php echo $character->id ?></td>
                                <td>
                                    <img src="../assets/characters-image/<?php echo $character->photo ?>" alt="" style="width: 150px">
                                </td>
                                <td><?php echo $character->character_name ?></td>
                                <td><?php echo $character->age ?></td>
                                <td><?php echo $character->birthday ?> <strong>th</strong></td>
                                <td><?php echo $character->status ?></td>
                                <td><?php echo $character->gender ?></td>
                                <td><?php echo $character->height_cm ?>cm<sup>2</sup></td>
                                <td><?php echo $character->weight_kg ?>kg</td>
                                <td><?php echo $character->rank?></td>
                                <td><?php echo substr($character->personality , 0,80)?>...</td>
                                <td><?php echo substr( $character->quote , 0, 60)?>...</td>
                                <td><?php echo $character->created_at ?></td>
                                <td>
                                <form action="#" method="post">
                                <a href="index.php?page=characters-edit&character_id=<?php echo $character->id ?>" class="btn btn-sm btn-info mb-2"> <i class="fas fa-fw fa-edit"></i></a>
                                <button name="characterDeleteBtn"  onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                <input type="hidden" name="character_id" value="<?php echo $character->id ?>">
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