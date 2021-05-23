$(function(){
    $('#sel').change(function(){
        var val = $(this).val(); //значение option
        $.ajax({
            type:'post',
            url:'query_form\query_in.php',//обработчик php
            data:'value='+val,//передаем значение option. на сервере будет доступно $_POST['value'}
            success:function list_city(result){// получаем ответ с сервера
                $('#res').html(result);//выводим на стнанице
            }

        })
        console.log($(this).val());
    })

})