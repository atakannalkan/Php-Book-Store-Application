<?php
    require "libs/functions.php";
    require "libs/variables.php";

    $id = $_GET["id"];
    $result = getBookById($id);
    $selectedBook = mysqli_fetch_assoc($result);

    hardDeleteBook($selectedBook["id"]);
?>