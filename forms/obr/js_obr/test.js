
function tab_obj_obr(){
    $('#add_obj_obr').click(function(){
        var val = $(this).children(l_obj).value(); //???????? option
        $.ajax({
            type:'post',
            url:'obr_view_obj.php',//?????????? php
            data:'l_obj='+val,

            success:function(result){// ???????? ????? ? ???????
                $('#tab_add_obr').html(result);//??????? ?? ????????
            }

        })
        console.log($(this).val());
        alert($_SESSION['obj_l']);
    })
}