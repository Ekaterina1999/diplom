

function predpis_v() {
   // var v_div=document.getElementById("viol_predpis").style.display;
    var act=document.getElementById("choice_list");
    if (act.value==0){document.getElementById("viol_predpis").style.display="none";}
    else{document.getElementById("viol_predpis").style.display="block";}
    $.ajax({
        type: 'post',
        url: "forms/predpis/viol_act.php",
        data:{act:act.value},
        success: function (res) {

               $('#viol_predpis').html(res);

        }

    });

}

function del_el_tav_v(el) {
    var root = el.parent();
         root.parent().remove();
        var pp=document.getElementsByClassName("pp_viol");

        for (var i=0; i<pp.length; i++)
         {

             pp[i].textContent = (i+1);

         }

}
function add_predbis_base() {
    var act=document.getElementById("choice_list");
    if (act.value==0){alert("Не выбран акт");}else {
        var viol_end_date = document.getElementsByClassName("viol_end_date");
        var v_d1 = [];
        var v_d = [];
        var date_p= document.getElementsByName('date_p').value;
        var d_null = 0;
        for (var i = 0; i < viol_end_date.length; i++) {

            if (viol_end_date[i].value !== "") {

                v_d.push(viol_end_date[i].getAttribute("id").substring(7));
                v_d1.push(viol_end_date[i].value);

            }
            else {
                d_null = 1;
                break;
            }

        }     // alert(v_d+' '+v_d1);
        if (d_null == 1) {
            alert("Не заполнена дата срока исполнения");

        } else {   var u_id=document.getElementById('user_create').value;
            $.ajax({
                type: 'post',
                url: "forms/predpis/add_predpis.php",
                data:{u_id:u_id, v_d:v_d,v_d1:v_d1, id_act:act.value, date_p:date_p},
                success: function (res) {
                    if (res!==""){
                        alert("Данные успешно добавленый. Номер вашего предписания:"+res);
                    }
                    else{
                        alert("Данные не добавлены, проверте все ли поля заполнены.");
                    }

                }

            });

        }
    }

}

function addTab_predpis_old() {
    var u_id=document.getElementById('user_create').value;
    var rad=document.getElementsByName('l_obj');
    for (var i=0;i<rad.length; i++) {
        if (rad[i].checked) {
            var l_obj=rad[i].value;
        }
    }



    $.ajax({
        type: 'post',
        url: "forms/predpis_old/add_temp_predpis_old.php",
        data: {

            u_id:u_id,
            obj:l_obj,
            city:$('#l_city').val(),
            street:$('#l_street').val(),
            house:$('#house').val(),
            korpus:$('#korpus').val(),
            flat:$('#flat').val(),
            id_v:$('#v').val()

        },
        success: function (result3) {


            $('#t_o_o').html(result3);

        }

    });
}


function checkPredpisOLD(idcheck, nameCheck) {

    var viol_end_date = document.getElementsByClassName("viol_end_date");
    var v_d1 = [];
    var v_d = [];
    var data_val=[];
    var d_null = 0;
    for (var i = 0; i < viol_end_date.length; i++) {



            v_d.push(viol_end_date[i].getAttribute("data-fl_param"));
            v_d1.push(viol_end_date[i].value);



    }



    var idc='#'+nameCheck;
    switch   (nameCheck.substring(0,3))
    {
        case ("iot"):
            var valU=1;
            break;

        case ("iat"):
            var valU=2;
            break;
        case ("ivt"):
            var valU=3;
            break;
        case ("idb"):
            var valU=4;
            break;
    }
    if(jQuery(idc).prop('checked')){

        var valCh='1';
    }
    else {
        var valCh='0';
    }


    $.ajax({
        type: 'post',
        url: "forms/predpis_old/show_temp_predpis_old.php",
        data:{
            valU:valU,
            valCh:valCh,
            v_d:v_d,v_d1:v_d1,
            idcheck:idcheck
        }
    });


    addTab_predpis_old();




}

function add_predbis_old_base() {
var in_obj_tab=document.getElementsByName('in_obj_tab');
var in_adress_tab=document.getElementsByName('in_adress_tab');
var count_check=0;
    for (var i = 0; i < in_obj_tab.length; i++) {
    if (in_obj_tab[i].checked){count_check++;}}
    var count_check1=0;
    for (var i = 0; i < in_adress_tab.length; i++) {
        if (in_adress_tab[i].checked){count_check1++;}}

    if (count_check>1){alert("В предписании не может  быть болше одного объекта");}else{
        if (count_check1>1){alert("В предписании не может  быть болше одного адреса");}else{
    var u_id=document.getElementById('user_create').value;
var num_predpis_old=document.getElementById('num_predpis_old').value;
var year_predpis_old=document.getElementById('year_predpis_old').value;
var date_p=document.getElementById('date_p').value;

    $.ajax({
        type: 'post',
        url: "forms/predpis_old/add_predpis.php",
        data: {u_id:u_id, num_predpis_old:num_predpis_old,
            year_predpis_old:year_predpis_old, date_p:date_p},
        success: function (res) {
            var data_l = res;


            if (data_l == "") {
                alert("Указанны не все данные");

            } else {
                alert("Данные успешно внесены в базу. Присвоен номер распоряжения:" + data_l);
            }
$('#t_o_o').html(res);
        }

    });}}
}


function rec_date_p(event) {
if (event.keyCode=="13"){

    var viol_end_date = document.getElementsByClassName("viol_end_date");
    var v_d1 = [];
    var v_d = [];

    for (var i = 0; i < viol_end_date.length; i++) {

      v_d.push(viol_end_date[i].getAttribute("data-fl_param"));
      v_d1.push(viol_end_date[i].value);
    }

    $.ajax({
        type: 'post',
        url: "forms/predpis_old/show_temp_predpis_old.php",
        data:{
                v_d:v_d,v_d1:v_d1

        }
    });

}
}