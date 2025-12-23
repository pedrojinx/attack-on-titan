<?php

#select characters

$stmt = $db->prepare("SELECT id, photo, character_name, created_at FROM characters");
$stmt->execute();
$characters = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
           <div class="container-fluid">
                    <div class="row">
                   <div class="col-md-12">
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Character Members Lists</h6>
                    </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Create At</th>
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
                                <td><?php echo $character->created_at ?></td>
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