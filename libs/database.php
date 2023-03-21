<?php

    $connection = mysqli_connect("localhost", "root", "", "bookapp");

    if (mysqli_connect_errno() > 0) {
        die("ERROR!: "+mysqli_connect_errno());
    }

?>