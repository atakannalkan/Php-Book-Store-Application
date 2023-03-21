<?php
    require "libs/variables.php";
    require "libs/functions.php";
    if (isAdmin() == false) {
        header("Location: index.php");
    }

    if (isset($_POST["admin-category-create"])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        
        adminCategoryCreate($name, $description);
    }
?>

<?php include "./partials/_header.php" ?>
<?php include "./partials/_navbar.php" ?>


<div class="container mt-5">
    <h2>Admin Kategori Ekle</h2>
    <hr>

    <form method="POST">
        <div class="row">

            <div class="col-md-8 mt-4">
                <div class="row">
                    <label for="name" class="col-sm-2 d-flex align-items-center">Kategori İsmi</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <label for="description" class="col-sm-2 d-flex align-items-center">Açıklama</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" id="description" required>
                    </div>
                </div>

                <div class="mt-5 offset-sm-2">                    
                    <a href="admin-categories.php" class="btn btn-secondary me-2"><i class="fas fa-arrow-circle-left"></i> Geriye Dön</a>
                    <button type="submit" name="admin-category-create" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Ekle</button>
                </div>
                
            </div>

            <div class="col-md-4 border mt-5 mt-md-0">
                <h2 class="text-center mt-2">Seçenekler</h2>
                <hr>
            </div>
        </div>
    </form>

</div>


<?php include "./partials/_footer.php" ?>