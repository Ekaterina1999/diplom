function plaseRasp() {
    var basis_rasp=$('#find_basis_rasp').val();
    var null_procuror= document.getElementById('add_approval_rasp');
null_procuror.checked=false;
    document.getElementById('val_approval').checked=true;
    document.getElementById('num_approval').value="";
    switch   (basis_rasp)
    {
        case ("1"):
            $('#name_choice').html("Выберите обращение");
            document.getElementById('procuror').style.display="block";
            document.getElementById('add_approval_rasp').cheked=false;
            treb_procuror();
            raspFormCreate_obr(basis_rasp);

            $('#rasp_place').html("");
            break;
        case("3"):
            $('#name_choice').html("Выберите предписание");
            document.getElementById('procuror').style.display="none";

            raspFormCreate_obr(basis_rasp);
            $('#rasp_place').html("");
            load_choice(5);
            break;


        case ("2"):
        case ("4"):
            document.getElementById('procuror').style.display="none";
            document.getElementById("choice").style.display = "none";

            load_data();
            break;
        case ("5"):
            document.getElementById('procuror').style.display="block";
            document.getElementById("choice").style.display = "none";
            document.getElementById('add_approval_rasp').cheked=false;
            treb_procuror();
            load_data();

            break;
    }

}

function load_data() {
    var basis_rasp=$('#find_basis_rasp').val();
    var id_com=$('#choice_list').val();
    switch   (basis_rasp) {
        case ("1"):
        case("3"):

            var data_val={basis_rasp:basis_rasp, id_com:id_com};
            break;
        case ("2"):
        case ("4"):
        case ("5"):

            var data_val={basis_rasp:basis_rasp, fun:'temp_rasp()'};

            break;
    }

    $.ajax({
        type: 'post',
        url: "forms/rasp/query_form/query_in.php",
        data:data_val,
        success: function (result3) {



            $('#rasp_place').html(result3);
            switch   (basis_rasp) {

                case ("2"):
                case ("4"):
                case ("5"):
                    temp_rasp();
                    break;
            }

        }




    });



}
function raspFormCreate_obr(d) {

    $("#choice").css("display","block");
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
    load_choice(1);

}


function load_choice(choice) {
    var basis=$('#find_basis_rasp').val();
    var val=$('#period').val();
 var user_val=$('#user_choice').val();
    switch   (choice)
    {
        case (1):
        case (3):
        case (5):
            var data_val={val:val, choice:choice, user_val:user_val, basis:basis};

            break;

        case (2):
        case (4):
        case (6):
            var data_val={val:val, choice:choice};
            break;

    }



    $.ajax({
        type: 'post',
        url: "forms/load_data.php",
        data:data_val,
        success: function (res) {
            var data_l=res;

            switch   (choice)
            {
                case (1):
                case (4):
               // case (5):
                    $('#choice_list').html(data_l);
                    break;
                case (5):
                case (6):
                    $('#choice_list').html(data_l);


                    break;

                case (3):
                    $('#choice_list').html(data_l);
                    address_rasp1();
                    break;

                case (2):
                    $('#user_choice').html(data_l);
                    break;

            }
            //alert(data_l);
        }

    });
}

function choice_list_create() {
    var basis_rasp=$('#find_basis_rasp').val();
    switch   (basis_rasp)
    {
        case ("1"):
            var choice=1;
            load_choice(choice);
            break;

        case ("3"):

            var choice=5;
            load_choice(choice);
            break;

    }

}



function get_cookie ( cookie_name )
{
    var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );

    if ( results )
        return ( unescape ( results[2] ) );
    else
        return null;
}

function period_fun(){
            var
                data_start = document.getElementById('date_start').value;

            $.ajax({
                type: 'post',
                url: "forms/period.php",
                data: {
                    data_start: data_start
                },
                success: function (res) {
                    if (res==""){$('#date_end_period').html('Выбран выходной ');}else{
                    $('#date_end_period').html('Проверку окончить не позднее ' + res);
                    $('#date_end_period').value = res;}
                }

            });


}



function treb_procuror() {
    var procuror=document.getElementById('add_approval_rasp');
    if(procuror.checked){document.getElementById('div_procuror').style.display="block";}
    else{document.getElementById('div_procuror').style.display="none";}
    document.getElementById('val_approval').cheked=true;
    procuror_approval();
}

 function create_rasp() {
     var u_id=document.getElementById('user_create').value;
     var procuror=document.getElementById('add_approval_rasp');
     var val_procuror=document.getElementById('val_approval');
     if(procuror.checked){  var procuror_v=1;
     var num_approval=document.getElementById('num_approval').value;
         if(val_procuror.checked){var v_procuror_v=1; var otkaz="";}
         else{var v_procuror_v=0;
         var otkaz=document.getElementById('otkaz').value;}
     }else{var procuror_v=0; var v_procuror_v=0;}

if(procuror_v==0){var add1=1;}else if (num_approval==""){
         var add1=0;}
     else{var add1=1;}


     if(v_procuror_v==1){var add1=1;}else if (otkaz==""){
         var add1=0;}
     else{var add1=1;}
         if(add1==0){alert("Не указан данные согласования!");}else {
             var date_rasp = document.getElementById('date_rasp').value;
             var date_start = document.getElementById('date_start').value;
             if (document.getElementById('date_stop') !== null) {

                 var date_stop = document.getElementById('date_stop').value;

             }
             var basis_rasp = $('#find_basis_rasp').val();
             switch (basis_rasp) {
                 case ("1"):


                     var id_obr = document.getElementById('choice_list').value;
                     var adr_mas = new Array();
                     var viol_mas = [];

                     var radio_obj = $("input[name=obj_rasp]");
                     var obj_id = radio_obj.filter(":checked").val();
                     var name_el = 'adr' + obj_id;
                     var adr = document.getElementsByName(name_el);
                     var j = 0;
                     for (var i = 0; i < adr.length; i++) {
                         if (adr[i].checked) {
                             adr_mas[j] = adr[i].value;
                             var name_el2 = 'viol_ch_' + obj_id + '_' + adr_mas[j];

                             var viol_ch = document.getElementsByName(name_el2);
                             var y = 0;
                             var viol_mas2 = [];
                             for (var k = 0; k < viol_ch.length; k++) {
                                 if (viol_ch[k].checked) {
                                     var text2 = " - " + viol_ch[k].value;

                                     viol_mas2[y] = viol_ch[k].value;
                                     y++;

                                 }
                             }
                             viol_mas[j] = viol_mas2;
                             j++;
                             var text1 = text1 + " " + adr[i].value;
                         }
                     }

                     /*if ((date_rasp=="")or(date_start=="")or(date_stop=="")or(basis_rasp=="")or(obj_id=="") or (adr_mas=="")
                                 or(viol_mas=="") or (id_obr==""))   {}*/
                     var data_val = {u_id:u_id, num_approval:num_approval,otkaz:otkaz, procuror_v:procuror_v,v_procuror_v:v_procuror_v,
                         date_rasp: date_rasp, data_start: date_start, date_stop: date_stop,
                         basis_rasp: basis_rasp, obj_id: obj_id, adr_mas: adr_mas, viol_mas: viol_mas, id_obr: id_obr
                     };
                     /* alert(' date_rasp:'+date_rasp+', data_start:'+date_start+', date_stop:'
                          +date_stop+',  basis_rasp:'+basis_rasp+', obj_id:'+obj_id
                          +', adr_mas:'+adr_mas+', viol_mas:'+viol_mas);*/
                     break;
                 case ("3"):

                     var id_predpis = document.getElementById('choice_list').value;
                     var adr = document.getElementsByClassName('adr_class');
                     var adr_id = adr[0].getAttribute('id').substring(4);

                     var obj = document.getElementsByClassName("obj_class");
                     var obj_id = obj[0].getAttribute("id").substring(4);


                     var viol_ch = document.getElementsByClassName("viol_ch_class");
                     var y = 0;
                     var viol_mas = [];
                     for (var k = 0; k < viol_ch.length; k++) {
                         if (viol_ch[k].checked) {


                             viol_mas[y] = viol_ch[k].getAttribute("id").substring(8);
                             //alert(viol_mas[y]);
                             y++;

                         }
                     }


                     var data_val = {u_id:u_id,
                         date_rasp: date_rasp,
                         data_start: date_start,
                         date_stop: date_stop,
                         basis_rasp: basis_rasp,
                         obj_id: obj_id,
                         adr_id: adr_id,
                         viol_mas: viol_mas,
                         id_predpis: id_predpis
                     };

                     break;

                 case ("2"):
                 case ("4"):
                 case ("5"):


                     var data_val = {u_id:u_id,
                         date_rasp: date_rasp, data_start: date_start, date_stop: date_stop,
                         basis_rasp: basis_rasp
                     };
                     // alert(' date_rasp:'+date_rasp+', data_start:'+date_start+', date_stop:'
                     //    +date_stop+',  basis_rasp:'+basis_rasp);
                     break;
                 case ("5"):


                     var data_val = {u_id:u_id, num_approval:num_approval,otkaz:otkaz, procuror_v:procuror_v,v_procuror_v:v_procuror_v,
                         date_rasp: date_rasp, data_start: date_start, date_stop: date_stop,
                         basis_rasp: basis_rasp
                     };
                     // alert(' date_rasp:'+date_rasp+', data_start:'+date_start+', date_stop:'
                     //    +date_stop+',  basis_rasp:'+basis_rasp);
                     break;


             }


             $.ajax({
                 type: 'post',
                 url: "forms/rasp/add_rasp.php",
                 data: data_val,
                 success: function (res) {
                     var data_l = res;

                     /* switch   (basis_rasp)
                      {
                          case (1):
                            //  $('#choice_list').html(data_l);
                              alert(data_l);
                              break;

                          case (2):
                              $('#user_choice').html(data_l);
                              break;

                      }*/
                     if (data_l == "") {
                         alert("Указанны не все данные");

                     } else {
                         alert("Данные успешно внесены в базу. Присвоен номер распоряжения:" + data_l);
                         document.getElementById("add_rasp_div").style.display="none";
                         var uved = confirm("Создать уведомление?");
                         if( uved == true ){
                             $.ajax({
                                 type: 'post',
                                 url: "forms/U_pred/U_pred.php",
                                 success:function(result1){
                                     $('#l_menu').html(result1);
                                 }
                             });
                             document.getElementsByName('rasp_id_u').value= data_l;                           document.getElementsByName('rasp_id_u').value=

                                 f_U_pred_create();
                     }
                         else{}
                     }
                      //$('#test11').html(data_l);
                   ///  $('#test11').style.display='block';
                 }

             });
         }
 }
 
 function procuror_approval() {
     var procuror=document.getElementById('val_approval');
     if(procuror.checked){document.getElementById('div_p_a').style.display="none";}
     else{document.getElementById('div_p_a').style.display="block";}
     document.getElementById('otkaz').value=null;
     document.getElementById('otkaz_id').value=null;
 }
 function obj_rasp_click() {
     var obj_rasp = $("input[name=obj_rasp]");


         for (var i=0;i<obj_rasp.length; i++) {
           var name_ch="adr"+obj_rasp[i].value;



///                  $(':checkbox[name='+name_ch+']').attr('checked', false);

            for (var j=0;j<document.getElementsByName(name_ch).length; j++) {
            if (document.getElementsByName(name_ch)[j].checked==true){
                 document.getElementsByName(name_ch)[j].checked=false;}

                var name_ch2 = "viol_ch_" + obj_rasp[i].value + "_" +document.getElementsByName(name_ch)[j].value;
                for (var m=0;m<document.getElementsByName(name_ch2).length; m++) {
                    if (document.getElementsByName(name_ch2)[m].checked==true){
                        document.getElementsByName(name_ch2)[m].checked=false;}

                }


            }


         }

     for (var k=0;k<document.getElementsByName('adr'+obj_rasp.filter(":checked").val()).length; k++) {

             document.getElementsByName('adr'+obj_rasp.filter(":checked").val())[k].checked=true;

         var name_ch3 = "viol_ch_" + obj_rasp.filter(":checked").val() + "_" +document.getElementsByName('adr'+obj_rasp.filter(":checked").val())[k].value;
         for (var l=0;l<document.getElementsByName(name_ch3).length; l++) {

                 document.getElementsByName(name_ch3)[l].checked=true;}

         }
 }

function adr_rasp_click(adr,val) {
    var obj_rasp = $("input[name=obj_rasp]").filter(":checked").val();
    if (obj_rasp==adr) {
        var adr_rasp = $("input[name=adr" + adr + "]");


        var name_ch = "viol_ch_" + adr + "_" + val;

        for (var j = 0; j < document.getElementsByName(name_ch).length; j++) {
           if (document.getElementById('adr'+adr+'_'+val).checked == true) {
                document.getElementsByName(name_ch)[j].checked = true;
         } else {
               document.getElementsByName(name_ch)[j].checked = false;
           }
        }

    }
    else{alert("В данный момент выбран другой объект");
        for (var i=0;i<adr; i++) {
            var name_ch1="adr"+adr;

            for (var k=0;k<document.getElementsByName(name_ch1).length; k++) {
                if (document.getElementsByName(name_ch1)[k].checked==true){
                    document.getElementsByName(name_ch1)[k].checked=false;}}


        }

    }




}

function temp_rasp(){
    var basis_rasp=$('#find_basis_rasp').val();
    var rad=document.getElementsByName('l_obj');
    for (var i=0;i<rad.length; i++) {
        if (rad[i].checked) {
            var l_obj=rad[i].value;
        }
    }



    $.ajax({
        type: 'post',
        url: "forms/rasp/temp_rasp.php",
        data: {

            basis_rasp:basis_rasp,
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
function add_obr_in_rasp(el,id_rasp,val,butt_id) {
    $.ajax({
        type: 'post',
        url: "forms/rasp/query_form/add_obr_in_rasp.php",
        data: {
                el:el,
                id_rasp:id_rasp,
                val:val, butt_id:butt_id
        },
        success: function (result) {
            /* switch (el) {
                 case ('obr'):

                     break;
                 case ('adr'):
                     $('#open_obj_114').html(result3);
                     break;

             }*/
            switch(result) {
                case ("0"):
                            switch (el) {
                                case ('obj'):
                                     alert('В распоряжении уже есть объект проверки');
                                  break;
                                 case ('adr'):
                                    alert('В распоряжении уже есть этот адрес');
                                 break;
                                }
                break;
                case ("1"):
                    alert('Объект успешно добавлен');
                    show_view('rasp', id_rasp);
                 break;
                default:
                $('#view_rasp_r').html(result);
                $('#view_rasp_r').css('display', 'block');
                alert(result);
                break;
            }
        }
    });

}


