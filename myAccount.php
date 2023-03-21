<?php
    require "libs/variables.php";
    require "libs/functions.php";

    $username = $_SESSION["username"];
    $result = getUserByUsername($username);
    $selectedUser = mysqli_fetch_assoc($result);

?>

<?php include "./partials/_header.php" ?>
<?php include "./partials/_navbar.php" ?>


<section class="mt-5">
  <div class="container py-5">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="wwwroot/img/account/account-details.jpg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h4 class="my-3"><?php echo $selectedUser["name"]." ".$selectedUser["surname"]?></h4>
            <h5 class="mb-4">Role: <?php echo isAdmin() == true ? "<span class='text-success'>Yönetici <i class='fas fa-users-crown'></i></span>" : "Kullanıcı"; ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
              <h5 class="mb-0">İsim</h5>
              </div>
              <div class="col-sm-9 text-center">
                <p class="mb-0"><?php echo $selectedUser["name"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h5 class="mb-0">Soyisim</h5>
              </div>
              <div class="col-sm-9 text-center">
                <p class="mb-0"><?php echo $selectedUser["surname"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h5 class="mb-0">Kullanıcı Adı</h5>
              </div>
              <div class="col-sm-9 text-center">
                <p class="mb-0"><?php echo $selectedUser["username"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h5 class="mb-0">Email</h5>
              </div>
              <div class="col-sm-9 text-center">
                <p class="mb-0"><?php echo $selectedUser["email"]; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h5 class="mb-0">Üye Olma Tarihi</h5>
              </div>
              <div class="col-sm-9 text-center">
                <p class="mb-0"><?php echo $selectedUser["createdDate"]; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php include "./partials/_footer.php" ?>