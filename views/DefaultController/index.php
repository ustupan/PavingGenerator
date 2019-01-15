<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>
<?php include(dirname(__DIR__) . '/navbar.html'); ?>
<?php include(dirname(__DIR__) . '/paving.html'); ?>

<div class="container">

        <?php
        if(isset($_SESSION) && !empty($_SESSION)) {
            print_r($_SESSION);
        }
        ?>
    </div>
</div>

</body>
</html>