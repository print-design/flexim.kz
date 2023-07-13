<?php
include '../include/topscripts.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include '../include/head.php';
        ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?=APPLICATION ?>/admin/">Обратная связь</a>
                </li>
            </ul>
            <form method="post" class="form-inline ml-auto">
                <label class="text-light">ВРЕМЕННО</label>
                &nbsp;&nbsp;
                <button type="submit" class="btn btn-outline-light" name="logout_submit">Выход&nbsp;<i class="fas fa-sign-out-alt"></i></button>
            </form>
        </nav>
        <div class="container-fluid">
            <?php
            if(!empty($error_message)) {
               echo "<div class='alert alert-danger'>$error_message</div>";
            }
            ?>
            <h1>Обратная связь</h1>
        </div>
    </body>
</html>