<?php
    require "libs/functions.php";
    require "libs/variables.php";

    $id = $_GET["id"];
    $result = getCategoryById($id);
    $selectedBook = mysqli_fetch_assoc($result);

    hardDeleteCategory($selectedBook["id"]);
?>