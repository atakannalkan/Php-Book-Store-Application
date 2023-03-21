<?php
    require "libs/variables.php";
    require "libs/functions.php";
    if (isAdmin() == false) {
        header("Location: index.php");
    }

    $id = $_GET["id"];
    $result = getUserById($id);
    $selectedUser = mysqli_fetch_assoc($result);
    

    if (isset($_POST["admin-user-edit"])) {
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        adminUserEdit($id, $name, $surname, $username, $email, $password, $role);
    }
?>

<?php include "./partials/_header.php" ?>
<?php include "./partials/_navbar.php" ?>


<div class="container mt-5">
    <h2>Admin Kullanıcı Güncelle</h2>
    <hr>

    <form method="POST">
        <div class="row">
            <div class="col-md-8 mt-4">
            <div class="row">
                    <label for="name" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">İsim</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" required value="<?php echo $selectedUser["name"]; ?>">
                    </div>
                </div>            
                <div class="row mt-3 mt-md-4">
                    <label for="surname" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Soyisim</label>
                    <div class="col-sm-10">
                        <input type="text" name="surname" class="form-control" id="surname" required value="<?php echo $selectedUser["surname"]; ?>">
                    </div>
                </div>
                <div class="row mt-3 mt-md-4">
                    <label for="username" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Kullanıcı Adı</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="username" required value="<?php echo $selectedUser["username"]; ?>">
                    </div>
                </div>
                <div class="row mt-3 mt-md-4">
                    <label for="email" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email" required value="<?php echo $selectedUser["email"]; ?>">
                    </div>
                </div>
                <div class="row mt-3 mt-md-4">
                    <label for="password" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Şifre</label>
                    <div class="col-sm-10">
                        <input type="text" name="password" class="form-control" id="password" required value="<?php echo $selectedUser["password"]; ?>">
                    </div>
                </div>
                <div class="row mt-4 mt-md-5">
                    <label for="role" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Role</label>
                    <div class="col-sm-10">
                        <input type="text" name="role" class="form-control" id="role" required value="<?php echo $selectedUser["role"]; ?>">
                    </div>
                </div>
                <div class="row mt-3 mt-md-4 mb-5">
                    <label for="createdDate" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Eklenme Tarihi</label>
                    <div class="col-sm-10">
                        <input type="createdDate" class="form-control" id="createdDate" disabled value="<?php echo $selectedUser["createdDate"]; ?>">
                    </div>
                </div>

                <div class="mt-5 offset-sm-2">
                    <a href="admin-users.php" class="btn btn-secondary me-2"><i class="fas fa-arrow-circle-left"></i> Geriye Dön</a>
                    <button type="submit" name="admin-user-edit" class="btn btn-primary"><i class="fas fa-edit"></i> Güncelle</button>
                </div>
                
            </div>

            <div class="col-md-4 border mt-5 mt-md-0">
                <h2 class="text-center mt-2 mb-3">Seçenekler</h2>
                <hr>
            </div>
        </div>
    </form>

</div>


<?php include "./partials/_footer.php" ?>