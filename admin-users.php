<?php
    require "libs/variables.php";
    require "libs/functions.php";
    if (isAdmin() == false) {
        header("Location: index.php");
    }
?>

<?php include "./partials/_header.php" ?>
<?php include "./partials/_message.php" ?>
<?php include "./partials/_navbar.php" ?>


<div class="container my-5">
    <h2>Kullanıcı Listesi</h2>
    <hr>
    <div class="mb-4">
        <a href="admin-panel.php" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-left"></i> Geriye Git</a> <span class="separator mx-1">||</span>
        <a href="admin-user-create.php" class="btn btn-primary btn-sm"> <i class="fas fa-plus-circle"></i> Kullanıcı Ekle</a>
    </div>

    <table class="table table-bordered table-hover mt-5">
        <thead class="table-secondary">
            <tr>
                <th>Id</th>
                <th>İsim</th>
                <th>Soyisim</th>
                <th>Kullanıcı Adı</th>
                <th>Email</th>
                <th>Şifre</th>
                <th>Eklenme Tarihi</th>
                <th style="width: 165px;">İşlemler</th>
            </tr>
        </thead>

        <tbody>
            <?php $result = getAllUsers(); while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["surname"] ?></td>
                <td><?php echo $row["username"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["password"] ?></td>
                <td><?php echo $row["createdDate"] ?></td>
                <td>
                    <a href="admin-user-edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Güncelle</a>
                    <button data-target="userHardDelete.php?id=<?php echo $row["id"]?>" class="btn btn-danger btn-sm d-inline userHardDeleteModalBtn" data-bs-toggle="modal" data-bs-target="#userHardDeleteModal"><i class="far fa-trash-alt"></i> Sil</button>

                    
                    <div class="modal fade" id="userHardDeleteModal" data-bs-backdrop="static" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header bg-danger text-white">
                                    <h4 class="modal-title">Kullanıcı Silinsin mi ?</h4>
                                    <button type="button" class="btn-close btn-close-white text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body text-center">
                                    <i class="bi bi-x-octagon-fill text-danger" style="font-size: 35px;"></i>
                                    
                                    <p class="mt-2"> <strong>Dikkat !</strong> Bu kullanıcıyı kalıcı olarak silmek istediğinize emin misiniz ?</p>
                                    <p> <strong>Uyarı !</strong> Bu kullanıcı veritabanından kalıcı olarak silinecek ve bir daha geri getirilemeyecektir. bunu onaylıyormusunuz ?</p>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-arrow-circle-left"></i> Cancel</button>
                                    <a href="" class="btn btn-danger userHardDeleteButton"><i class="far fa-trash-alt"></i> Delete</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </td>
            </tr>

            <?php endwhile; ?>
        </tbody>
    </table>
</div>


<?php include "./partials/_footer.php" ?>


