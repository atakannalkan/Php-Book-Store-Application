<?php
    require "libs/variables.php";
    require "libs/functions.php";

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        userLogin($username, $password);
    }
?>


<?php include "./partials/_header.php" ?>
<?php include "./partials/_message.php" ?>
<?php include "./partials/_navbar.php" ?>

<div class="container mt-5">

    <h2>Giriş Yap</h2>
    <hr>

    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-7 order-2 order-md-1">
            <form method="POST">
                <div class="row">
                    <label for="username" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Kullanıcı Adı</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="password" class="col-sm-2 d-flex align-items-center mb-1 mb-md-0">Şifre</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                </div>

                <div class="mt-5 offset-md-2">
                    <button type="submit" name="login" class="btn btn-primary"> <i class="fas fa-sign-in-alt"></i> Giriş Yap</button> <span class="mx-2">||</span>
                    <span>Üye Değil misiniz ? <a href="register.php"><i class="far fa-user-plus"></i> Kayıt Ol</a></span>
                </div>
            </form>
        </div>
        
        <div class="col-10 col-md-5 mb-5 mb-md-0 order-1 order-md-2">
            <img src="wwwroot/img/account/login.svg" class="w-100" alt="">
        </div>
    </div>
</div>

    
<?php include "./partials/_footer.php" ?>