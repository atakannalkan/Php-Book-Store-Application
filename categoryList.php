<?php
    require "libs/variables.php";
    require "libs/functions.php";

    $categoryId = isset($_GET["id"]) ? $_GET["id"] : null;
    $resultBook = getAllBooksByCategory($categoryId);

    if (isset($_GET["url"])) {
        $resultBook = getAllBooksBySearch($_GET["url"]);
    }

    if(isset($_POST["sort"])) {
        $ascOrDesc = isset($_POST["ascOrDesc"]) ? true : false;
        $resultBook = sortByBook($_POST["bySort"], $ascOrDesc);
    }
?>

<?php include "./partials/_header.php" ?>
<?php include "./partials/_navbar.php" ?>


<div class="container">
    <div class="row justify-content-center mt-5">

        <form method="GET" class="d-flex col-12 col-lg-9">
            <input type="search" name="url" class="form-control searchInput" placeholder="İstediğiniz bir ürünü arayın">
            <button type="submit" class="btn btn-primary btn-lg searchButton"> <i class="bi bi-search"></i> </button>
        </form>


        <div class="row mt-5">
            <div class="col-md-3">
                <div class="list-group mb-5">
                    <a href="categoryList.php" class="list-group-item <?php echo $categoryId == null ? "bg-secondary text-white" : ""; ?>">Tüm Kategoriler</a>

                    <?php $resultCategory = getAllCategories(); while($row = mysqli_fetch_assoc($resultCategory)): ?>
                        <a href="categoryList.php?id=<?php echo $row["id"]; ?>" class="list-group-item <?php echo $row["id"] == $categoryId ? "active" : ""; ?> "><?php echo $row["name"]; ?></a>
                    <?php endwhile; ?>
                </div>
                <hr>

                <h3 class="mt-4 mb-4 text-center">Bilgilere Göre Sırala</h3>

                <form method="POST">
                    <select class="form-select" aria-label="Default select example" name="bySort" style="cursor: pointer;">
                        <option value="title">Başlık</option>
                        <option value="authorName">Yazar İsmi</option>
                        <option value="pageCount">Sayfa Sayısı</option>
                        <option value="price">Fiyat</option>
                        <option value="createdDate">Eklenme Tarihi</option>
                    </select>

                    <div class="form-check mt-3">
                        <label for="ascOrDesc">Büyükten Küçüğe</label>
                        <input type="checkbox" name="ascOrDesc" class="form-check-input" id="ascOrDesc">
                    </div>

                    <div class="d-grid mt-5">
                        <button type="submit" name="sort" class="btn btn-primary">Gönder <i class="fas fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>

            <div class="col-md-9 border">
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($resultBook)): ?>
                        <div class="card-group col-6 col-sm-4 col-md-3">
                            
                            <div class="card productCard mb-3">
                                <a href="bookDetails.php?id=<?php echo $row["id"]; ?>">    
                                    <img src="wwwroot/img/book/<?php echo $row["imageUrl"]; ?>" class="img-fluid">
                                </a>
                                
                                <div class="card-body" style="position: relative;">
                                    <a href="bookDetails.php?id=<?php echo $row["id"]; ?>" class="cardLinkButton" style="color: black;">
                                        <h5 class="card-title mb-3"><?php echo $row["title"]; ?></h5>
                                        <p class="mb-4"><?php echo $row["authorName"]; ?></p>
                                        <h4 class="mb-1" style="position: absolute; bottom: 0; left: 50%; transform: translate(-50%);"><?php echo $row["price"]; ?> ₺</h4>
                                    </a>
                                </div>

                                <div class="card-footer">
                                    <div class="d-grid">
                                        <a href="bookDetails.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-sm btnAddCart">İncele <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include "./partials/_footer.php" ?>