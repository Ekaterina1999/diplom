$(function(){
    $('#l_city').change(function(){
        var val = $(this).val(); //значение option
        $.ajax({
            type:'post',
            url:'test3.php',//обработчик php
            data:'city_zab='+val,//передаем значение option. на сервере будет доступно $_POST['value'}
            success:function(result){// получаем ответ с сервера
                $('#res').html(result);//выводим на стнанице
            }

        })
        console.log($(this).val());
    })
})