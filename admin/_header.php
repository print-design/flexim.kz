<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="<?=APPLICATION ?>/admin/">Обратная связь</a>
        </li>
    </ul>
    <form method="post" class="form-inline ml-auto">
        <label class="text-light"><?= filter_input(INPUT_COOKIE, LAST_NAME).' '.filter_input(INPUT_COOKIE, FIRST_NAME) ?></label>
        &nbsp;&nbsp;
        <button type="submit" class="btn btn-outline-light" name="logout_submit">Выход&nbsp;<i class="fas fa-sign-out-alt"></i></button>
    </form>
</nav>