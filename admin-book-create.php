<?php
    require "libs/variables.php";
    require "libs/functions.php";
    if (isAdmin() == false) {
        header("Location: index.php");
    }
    

    if (isset($_POST["admin-book-create"])) {
        $title = $_POST["title"];
        $authorName = $_POST["authorName"];
        $pageCount = $_POST["pageCount"];
        $language = $_POST["language"];
        $price = $_POST["price"];
        $barcode = $_POST["barcode"];
        $isApproved = isset($_POST["isApproved"]) ? 1 : 0;


        // Add Image
        $fileTmpPath = $_FILES["imageUpload"]["tmp_name"];
        $fileName = $_FILES["imageUpload"]["name"];
        $fileSize = $_FILES["imageUpload"]["size"];

        $uploadLocation = "./wwwroot/img/book/";
        $dest_path = $uploadLocation.$fileName;
        

        if (imageUpload($fileTmpPath, $fileName, $fileSize, $uploadLocation, $dest_path)) {
            adminBookCreate($title, $authorName, $pageCount, $language, $price, $barcode, $fileName, $isApproved);
        }
                
    }
?>

<?php include "./partials/_header.php" ?>
<?php include "./partials/_navbar.php" ?>


<div class="container mt-5">
    <h2>Admin Kitap Ekle</h2>
    <hr>

    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="row">
                    <label for="title" class="col-sm-2 d-flex align-items-center">Kitap İsmi</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <label for="authorName" class="col-sm-2 d-flex align-items-center">Kitap Yazarı</label>
                    <div class="col-sm-10">
                        <input type="text" name="authorName" class="form-control" id="authorName" required>
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="pageCount" class="col-sm-2 d-flex align-items-center">Sayfa Sayısı</label>
                    <div class="col-sm-10">
                        <input type="number" name="pageCount" class="form-control" id="pageCount" min="0" required>
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="language" class="col-sm-2 d-flex align-items-center">Dili</label>
                    <div class="col-sm-10">
                        <input type="text" name="language" class="form-control" id="language" required>
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="price" class="col-sm-2 d-flex align-items-center">Fiyatı</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" class="form-control" id="price" min="0" required>
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="barcode" class="col-sm-2 d-flex align-items-center">Barkod</label>
                    <div class="col-sm-10">
                        <input type="text" name="barcode" class="form-control" id="barcode" min="0" required>
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="imageUpload" class="col-sm-2 d-flex align-items-center">Resim</label>
                    <div class="col-sm-10">
                        <input type="file" name="imageUpload" class="form-control" id="imageUpload" required>
                    </div>
                </div>

                <div class="mt-5 offset-sm-2">                    
                    <a href="admin-books.php" class="btn btn-secondary me-2"><i class="fas fa-arrow-circle-left"></i> Geriye Dön</a>
                    <button type="submit" name="admin-book-create" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Ekle</button>
                </div>
                
            </div>

            <div class="col-md-4 border mt-5 mt-md-0">
                <h2 class="text-center mt-2 mb-3">Seçenekler</h2>
                
                <div class="form-check">
                    <label for="isApproved">Onaylı</label>
                    <input type="checkbox" name="isApproved" class="form-check-input" id="isApproved">
                </div>
                <hr>
            </div>
        </div>
    </form>

</div>


<?php include "./partials/_footer.php" ?>