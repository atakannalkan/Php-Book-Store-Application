<nav class="navbar navbar-expand-md bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php"><i class="far fa-shopping-cart"></i> Kitap Satış Uygulaması</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item"> <a href="categoryList.php" class="nav-link active me-2">Bütün Kitaplar</a> </li>
        <?php if(isAdmin()): ?>
          <li class="nav-item"> <a href="admin-panel.php" class="btn btn-primary adminPanelButton ps-1 ps-sm-2"> <i class="far fa-user-crown"></i> Admin Panel</a> </li>
        <?php endif; ?>
      </ul>

        <div class="navbar-nav ms-auto">

          <?php if (isset($_SESSION["username"])) : ?>            
            <div class="dropdown">
              <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                <i class="far fa-user"></i> Hoş Geldin, <?php echo $_SESSION["username"] ?>
              </button>
              <ul class="dropdown-menu">
                <li><a href="myAccount.php" class="dropdown-item"><i class="fas fa-user"></i> Hesabım</a></li>
                <div class="dropdown-divider"></div>
                <li><a href="logout.php" class="dropdown-item bg-danger text-white"><i class="far fa-sign-out-alt"></i> Çıkış Yap</a></li>
              </ul>
            </div>
            
          <?php else: ?>
            <li class="nav-item ps-2"> <a href="login.php" class="text-white nav-link active"><i class="far fa-sign-in-alt"></i> Giriş Yap</a> </li>
            <li class="nav-item ps-2"> <a href="register.php" class="text-white nav-link active"><i class="far fa-user-plus"></i> Kayıt Ol</a> </li>

          <?php endif; ?>

        </div>
    </div>
  </div>
</nav>