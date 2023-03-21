<?php
    require "libs/variables.php";

    unset($_SESSION["username"]);
    unset($_SESSION["admin"]);
    header("Location: login.php");
?>