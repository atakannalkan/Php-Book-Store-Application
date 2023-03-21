<?php
    require "libs/variables.php";
    require "libs/functions.php";

    if (isset($_POST["register"])) {
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        userRegister($name, $surname, $username, $email, $password);
    }
?>

<?php include "./partials/_header.php" ?>
<?php include "./partials/_navbar.php" ?>

<div class="container mt-5">

    <h2>Kayıt Ol</h2>
    <hr>

    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-7 order-2 order-md-1">
            <form method="POST">
                <div class="row">
                    <label for="name" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">İsim</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                </div>            
                <div class="row mt-3 mt-md-4">
                    <label for="surname" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Soyisim</label>
                    <div class="col-sm-10">
                        <input type="text" name="surname" class="form-control" id="surname" required>
                    </div>
                </div>
                <div class="row mt-3 mt-md-4">
                    <label for="username" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Kullanıcı Adı</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                </div>
                <div class="row mt-3 mt-md-4">
                    <label for="email" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email" required>
                    </div>
                </div>
                <div class="row mt-3 mt-md-4 mb-5">
                    <label for="password" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Şifre</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                </div>

                <div class="mt-5 mb-5 offset-md-2">
                    <button type="submit" name="register" class="btn btn-primary"><i class="fas fa-user-plus"></i> Kayıt Ol</button> <span class="mx-2">||</span>
                    <span>Hesabınız Var mı ? <a href="login.php"><i class="far fa-sign-in"></i> Giriş Yap</a></span>
                </div>
            </form>
        </div>
        
        <div class="col-10 col-md-5 mb-5 mb-md-0 order-1 order-md-2">
            <img src="wwwroot/img/account/register.svg" class="w-100" alt="">
        </div>
    </div>
</div>



<?php include "./partials/_footer.php" ?>