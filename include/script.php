<script src="<?=APPLICATION ?>/js/jquery-3.5.1.min.js"></script>
<script src="<?=APPLICATION ?>/js/bootstrap.min.js"></script>
<script src="<?=APPLICATION ?>/js/jquery.maskedinput.js"></script>

<script>
    // Запрет на изменение размеров всех многострочных текстовых полей вручную
    $('textarea').css('resize', 'none');
    
    // Валидация
    $('input').keypress(function(){
        $(this).removeClass('is-invalid');
    });
    
    $('select').change(function(){
        $(this).removeClass('is-invalid');
    });
    
    $.mask.definitions['~'] = "[+-]";
    $("#phone").mask("+7 (999) 999-99-99");
    
    // При щелчке в поле телефона, устанавливаем курсор в самое начало ввода телефонного номера.
    $("#phone").click(function(){
        var maskposition = $(this).val().indexOf("_");
        if(Number.isInteger(maskposition)) {
            $(this).prop("selectionStart", maskposition);
            $(this).prop("selectionEnd", maskposition);
        }
    });
</script>