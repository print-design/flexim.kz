<?php
include '../include/topscripts.php';

if(IsInRole(ROLE_NAMES[ROLE_ADMIN])) {
    header('Location: '.APPLICATION.'/admin/');
}
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
                <li><a class="nav-link" href="<?=APPLICATION ?>/">На главную</a></li>
            </ul>
        </nav>
        <div class="container-fluid">
            <?php
            if(!empty($error_message)) {
               echo "<div class='alert alert-danger'>$error_message</div>";
            }
            ?>
            <div style="height: 12rem;" class="d-none d-md-block"></div>
            <div class="row mt-5">
                <div class="d-none d-md-block col-md-4 col-lg-5"></div>
                <div class="col-12 col-md-4 col-lg-2">
                    <form method="post">
                        <div class="form-group">
                            <label for="login_username">Логин</label>
                            <input type="text" name="login_username" class="form-control" required="required" />
                            <div class="invalid-feedback">Логин обязательно</div>
                        </div>
                        <div class="form-group">
                            <label for="login_password">Пароль</label>
                            <input type="password" name="login_password" class="form-control" required="required" />
                            <div class="invalid-feedback">Неверный пароль</div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login_submit" class="btn btn-dark">Вход&nbsp;<i class="fas fa-sign-in-alt"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <?php
    include '../include/script.php';
    ?>
    <script>
        $('input[name=login_username]').focus();
    </script>
</html>