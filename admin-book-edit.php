<?php
    require "libs/variables.php";
    require "libs/functions.php";
    if (isAdmin() == false) {
        header("Location: index.php");
    }

    // ** GET
    $id = $_GET["id"];
    $result = getBookById($id);
    $selectedBook = mysqli_fetch_assoc($result);


    // ** POST
    if (isset($_POST["admin-book-edit"])) {
        $title = $_POST["title"];
        $authorName = $_POST["authorName"];
        $pageCount = $_POST["pageCount"];
        $language = $_POST["language"];
        $price = $_POST["price"];
        $barcode = $_POST["barcode"];
        $imageUrl = $_POST["imageUrl"];
        $isApproved = isset($_POST["isApproved"]) ? 1 : 0;
        if (isset($_POST["addCategoryIds"])) { // Çünkü tanımlanmadıysa hata veriyor !
            $addCategoryIds = $_POST["addCategoryIds"];

            adminBookEdit($id, $title, $authorName, $pageCount, $language, $price, $barcode, $imageUrl, $isApproved);

            clearBookCategories($id);
            addBookToCategories($id, $addCategoryIds);

        } else {
            pageAlertMessage("En az 1 kategori seçmelisiniz !", "danger");
        }        
        
    }
?>

<?php include "./partials/_header.php" ?>
<?php include "./partials/_navbar.php" ?>


<div class="container mt-5">
    <h2>Admin Kitap Güncelle</h2>
    <hr>

    <form method="POST">
        <div class="row">

            <div class="col-md-8 mt-4">
                <div class="row">
                    <label for="title" class="col-sm-2 d-flex align-items-center">Kitap İsmi</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" required value="<?php echo $selectedBook["title"] ?>">
                    </div>
                </div>
                
                <div class="row mt-4">
                    <label for="authorName" class="col-sm-2 d-flex align-items-center">Kitap Yazarı</label>
                    <div class="col-sm-10">
                        <input type="text" name="authorName" class="form-control" id="authorName" required value="<?php echo $selectedBook["authorName"] ?>">
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="pageCount" class="col-sm-2 d-flex align-items-center">Sayfa Sayısı</label>
                    <div class="col-sm-10">
                        <input type="number" name="pageCount" class="form-control" id="pageCount" min="0" required value="<?php echo $selectedBook["pageCount"] ?>">
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="language" class="col-sm-2 d-flex align-items-center">Dili</label>
                    <div class="col-sm-10">
                        <input type="text" name="language" class="form-control" id="language" required value="<?php echo $selectedBook["language"] ?>">
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="price" class="col-sm-2 d-flex align-items-center">Fiyatı</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" name="price" class="form-control" id="price" min="0" required value="<?php echo $selectedBook["price"] ?>">
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="barcode" class="col-sm-2 d-flex align-items-center">Barkod</label>
                    <div class="col-sm-10">
                        <input type="text" step="0.01" name="barcode" class="form-control" id="barcode" min="0" required value="<?php echo $selectedBook["barcode"] ?>">
                    </div>
                </div>

                <div class="row mt-4">
                    <label for="imageUrl" class="col-sm-2 d-flex align-items-center">Resim</label>
                    <div class="col-sm-10">
                        <input type="text" name="imageUrl" class="form-control" id="imageUrl" required value="<?php echo $selectedBook["imageUrl"] ?>">
                    </div>
                </div>

                <div class="mt-5 offset-sm-2">                    
                    <a href="admin-books.php" class="btn btn-secondary me-2"><i class="fas fa-arrow-circle-left"></i> Geriye Dön</a>
                    <button type="submit" name="admin-book-edit" class="btn btn-primary"><i class="fas fa-edit"></i> Güncelle</button>
                </div>
                
            </div>

            <div class="col-md-4 border mt-5 mt-md-0">
                <h2 class="text-center mt-2 mb-3">Seçenekler</h2>
                
                <div class="form-check">
                    <label for="isApproved">Onaylı</label>
                    <input type="checkbox" name="isApproved" class="form-check-input" id="isApproved" <?php echo $selectedBook["isApproved"] ? "checked" : ""; ?>>
                </div>
                <hr>

                <h2 class="text-center mt-2 mb-3">Kategoriler</h2>

                <?php $result = getAllCategories(); while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="form-check">
                        <label for="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></label>
                        <input type="checkbox" name="addCategoryIds[]" value="<?php echo $row["id"]; ?>" class="form-check-input" id="<?php echo $row["id"]; ?>" <?php echo getCategoryByBook($id, $row["id"]) ? "checked": ""; ?> >
                    </div>
                <?php endwhile; ?>
                <hr>
                <div class="d-flex justify-content-center">

                    <img src="wwwroot/img/book/<?php echo $selectedBook["imageUrl"] ?>" class="w-75">

                </div>

                

            </div>
        </div>
    </form>

</div>


<?php include "./partials/_footer.php" ?>