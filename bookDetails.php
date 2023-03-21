<?php
    require "libs/variables.php";
    require "libs/functions.php";

    $bookId = $_GET["id"];
    $result = getBookById($bookId);
    $selectedBook = mysqli_fetch_assoc($result);
?>

<?php include "./partials/_header.php" ?>
<?php include "./partials/_navbar.php" ?>


<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-4 border rounded-3">
            <img src="wwwroot/img/book/<?php echo $selectedBook["imageUrl"]; ?>" class="w-100">
        </div>

        <div class="col-md-8 ps-4">
            <h2><?php echo $selectedBook["title"]; ?></h2>
            <hr class="my-4">
            <div>
                <strong>Kategoriler: </strong>
                <?php $result = getAllCategories(); while($row = mysqli_fetch_assoc($result)): ?>
                    <a href="categoryList.php?id=<?php echo $row["id"]; ?>" class="text-decoration-underline"><?php echo $row["name"]; ?></a> |
                <?php endwhile; ?>

                <h4 class="ms-1 mt-4 mb-5"><?php echo $selectedBook["price"]; ?> <i class="fas fa-lira-sign" style="font-size: 17px;"></i></h4>

                <h5 class="mb-3">Yazar: <strong class="ms-1"><?php echo $selectedBook["authorName"]; ?> </strong></h5>
                <h5 class="mb-3">Sayfa Sayısı: <strong class="ms-1"><?php echo $selectedBook["pageCount"]; ?> </strong></h5>
                <h5 class="mb-3">Dili: <strong class="ms-1"><?php echo $selectedBook["language"]; ?> </strong></h5>
                <h5 class="mb-3">Satışa Çıkış Tarihi: <strong class="ms-1"><?php echo $selectedBook["createdDate"]; ?> </strong></h5>

                <div class="input-group mb-3 mt-5" style="width: 220px;">
                    <input type="number" name="quantity" class="form-control d-inline" value="1" min="1">
                    <button type="submit" class="btn btn-primary d-inline"><i class="fas fa-cart-plus"></i> Sepete Ekle</button>                
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "./partials/_footer.php" ?>