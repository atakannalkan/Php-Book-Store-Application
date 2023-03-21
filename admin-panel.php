<?php
    require "libs/variables.php";
    require "libs/functions.php";
    if (isAdmin() == false) {
        header("Location: index.php");
    }
?>

<?php include "./partials/_header.php" ?>
<?php include "./partials/_navbar.php" ?>

<div class="bg-secondary text-white" style="padding: 12px 0;">
    <div class="container">
        <h4 class="mb-0">
            <i class="fa fa-caret-right"></i>
            Yönetim Paneli
        </h4>        
    </div>    
</div>

<div class="container mt-5">
    <h2>Yönetim Paneli</h2>
    <hr>
    
    <div class="row mt-5">
    <div class="col-4">
            <div class="card position-relative mt-4">
                <div class="position-absolute top-0 start-50 translate-middle border rounded-circle">
                    <img src="wwwroot/img/icon/books.png" style="width: 55px;" alt="">
                </div>

                <div class="card-body text-center mt-4">
                    <h4 class="card-title">Kitaplar</h4>
                    <h4><?php echo getBooksCount(); ?></h4>
                </div>

                <div class="card-footer text-center">
                    <a href="admin-books.php" class="btn btn-primary">Daha Fazla <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card position-relative mt-4">
                <div class="position-absolute top-0 start-50 translate-middle border rounded-circle">
                    <img src="wwwroot/img/icon/categories.png" style="width: 55px;" alt="">
                </div>

                <div class="card-body text-center mt-4">
                    <h4 class="card-title">Kategoriler</h4>
                    <h4><?php echo getCategoriesCount(); ?></h4>
                </div>

                <div class="card-footer text-center">
                    <a href="admin-categories.php" class="btn btn-primary">Daha Fazla <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card position-relative mt-4">
                <div class="position-absolute top-0 start-50 translate-middle border rounded-circle">
                    <img src="wwwroot/img/icon/users.png" style="width: 55px;" alt="">
                </div>

                <div class="card-body text-center mt-4">
                    <h4 class="card-title">Kullanıcılar</h4>
                    <h4><?php echo getUsersCount(); ?></h4>
                </div>

                <div class="card-footer text-center">
                    <a href="admin-users.php" class="btn btn-primary">Daha Fazla <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    
</div>


<?php include "./partials/_footer.php" ?>


