
function act_choice() {
    var selectPeriod=document.getElementById("period");
    for (selectPeriod, j = selectPeriod.options.length; j >= 0; j--)
        selectPeriod.options.remove (j);
    selectPeriod.options[selectPeriod.options.length]= new Option('Текущий день', '0');
    selectPeriod.options[selectPeriod.options.length]= new Option('Текущая неделя','1');
    selectPeriod.options[selectPeriod.options.length]= new Option('Текущий месяц','2');
    selectPeriod.options[selectPeriod.options.length]= new Option('Текущий год','3');
    selectPeriod.options[selectPeriod.options.length]= new Option('Все время','4');

    var selectPeriod=document.getElementById("user_choice");
    for (selectPeriod, j = selectPeriod.options.length; j >= 0; j--)
    {  selectPeriod.options.remove (j);}
    var x = get_cookie ( "userid" );

    selectPeriod.options[selectPeriod.options.length]= new Option('Текущий пользователь', x);
    selectPeriod.options[selectPeriod.options.length]= new Option('Все', 0);
    load_choice(2);
    load_choice(4);

}

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

