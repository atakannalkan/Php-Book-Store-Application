<?php if (isset($_SESSION["message"])): ?>

    <div class="alert alert-<?php echo $_SESSION["type"] ?> mb-0 text-center">

        <h5>
            <?php
                echo $_SESSION["message"];

                unset($_SESSION["message"]);
                unset($_SESSION["type"]);
            ?>
        </h5>
    </div>


<?php endif; ?>