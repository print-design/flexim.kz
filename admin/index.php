<?php
include '../include/topscripts.php';

if(!IsInRole(ROLE_NAMES[ROLE_ADMIN])) {
    header('Location: '.APPLICATION.'/admin/login.php');
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
        <?php
        include './_header.php';
        include '../include/pager_top.php';
        ?>
        <div class="container-fluid">
            <?php
            if(!empty($error_message)) {
               echo "<div class='alert alert-danger'>$error_message</div>";
            }
            ?>
            <h1>Обратная связь</h1>
            <?php
            $sql = "select count(id) from feedback";
            $fetcher = new Fetcher($sql);
            if($row = $fetcher->Fetch()) {
                $pager_total_count = $row[0];
            }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Время</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>E-Mail</th>
                        <th>Вопрос/обращение</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select datetime, name, phone, email, body from feedback order by id desc limit $pager_skip, $pager_take";
                    $fetcher = new Fetcher($sql);
                    while($row = $fetcher->Fetch()):
                    ?>
                    <tr>
                        <td><?=$row['datetime'] ?></td>
                        <td><?=$row['name'] ?></td>
                        <td><?=$row['phone'] ?></td>
                        <td><a href="mailto:<?=$row['email'] ?>"><?=$row['email'] ?></a></td>
                        <td><?= htmlentities($row['body']) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php
            include '../include/pager_bottom.php';
            ?>
        </div>
    </body>
</html>