<?php 

    require "libs/functions.php";
    require "libs/variables.php";

    $id = $_GET["id"];
    $result = getUserById($id);
    $selectedUser = mysqli_fetch_assoc($result);

    hardDeleteUser($selectedUser["id"]);

    alertMessage("'".$selectedUser["username"]."' Kullanıcı Adlı Kayıt Başarıyla Silindi !", "warning");
?>