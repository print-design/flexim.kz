<?php
include 'include/topscripts.php';

// Валидация формы
$form_valid = true;
$error_message = '';
$ok_message = '';

$name_valid = '';
$phone_valid = '';
$email_valid = '';
$body_valid = '';

// Обработка отправки формы
if(null !== filter_input(INPUT_POST, 'feedback_submit')) {
    $name = filter_input(INPUT_POST, 'name');
    if(empty($name)) {
        $name_valid = ISINVALID;
        $form_valid = false;
    }
    
    $phone = filter_input(INPUT_POST, 'phone');
    if(empty($phone)) {
        $phone_valid = ISINVALID;
        $form_valid = false;
    }
    
    $email = filter_input(INPUT_POST, 'email');
    if(empty($phone) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_valid = ISINVALID;
        $form_valid = false;
    }
    
    $body = filter_input(INPUT_POST, 'body');
    if(empty($body)) {
        $body_valid = ISINVALID;
        $form_valid = false;
    }
    
    if($form_valid) {
        $body = addslashes($body);
        
        $sql = "insert into feedback (name, phone, email, body) values ('$name', '$phone', '$email', '$body')";
        $executer = new Executer($sql);
        $error_message = $executer->error;
        
        if(empty($error_message)) {
            $ok_message = "Ваше сообщение отправлено";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'include/head.php';
        ?>
    </head>
    <body>
        <?php
        include 'include/header.php';
        ?>
        <div class="container">
            <?php
            if(!empty($error_message)) {
               echo "<div class='alert alert-danger'>$error_message</div>";
            }
            
            if(!empty($ok_message)) {
                echo "<div class='alert alert-info'>$ok_message</div>";
            }
            ?>
            <h1>Обратная связь</h1>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Представьтесь<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control<?=$name_valid ?>" value="<?= $form_valid ? '' : filter_input(INPUT_POST, 'name') ?>" required="required" />
                            <div class="invalid-feedback">Имя обязательно</div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон<span class="text-danger">*</span></label>
                            <input type="tel" name="phone" id="phone" class="form-control<?=$phone_valid ?>" value="<?= $form_valid ? '' : filter_input(INPUT_POST, 'phone') ?>" required="required" />
                            <div class="invalid-feedback">Телефон обязательно</div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control<?=$email_valid ?>" value="<?= $form_valid ? '' : filter_input(INPUT_POST, 'email') ?>" required="required" />
                            <div class="invalid-feedback">Неправильный формат E-Mail</div>
                        </div>
                        <div class="form-group">
                            <label for="body">Вопрос/обращение<span class="text-danger">*</span></label>
                            <textarea rows="5" name="body" class="form-control<?=$body_valid ?>" required="required"><?= $form_valid ? '' : htmlentities(filter_input(INPUT_POST, 'body')) ?></textarea>
                            <div class="invalid-feedback">Вопрос/обращение обязательно</div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="feedback_submit" class="btn btn-outline-dark">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include 'include/footer.php';
        ?>
    </body>
    <?php
    include 'include/script.php';
    ?>
</html>