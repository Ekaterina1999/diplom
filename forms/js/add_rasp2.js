function plaseRasp() {
    var basis_rasp=$('#find_basis_rasp').val();
    var null_procuror= document.getElementById('add_approval_rasp');
null_procuror.checked=false;
    document.getElementById('val_approval').checked=true;
    document.getElementById('num_approval').value="";
    switch   (basis_rasp)
    {
        case ("1"):
            document.getElementById('procuror').style.display="block";

            raspFormCreate_obr(basis_rasp);
            $('#rasp_place').html("");
            break;
        case("3"):
            document.getElementById('procuror').style.display="none";
            raspFormCreate_obr(basis_rasp);
            $('#rasp_place').html("");
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

            var data_val={basis_rasp:basis_rasp};
            break;
    }

    $.ajax({
        type: 'post',
        url: "forms/rasp/query_form/query_in.php",
        data:data_val,
        success: function (result3) {



            $('#rasp_place').html(result3);


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
            var data_val={val:val, choice:choice, user_val:user_val, basis:basis};
            break;

        case (2):

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
                    $('#choice_list').html(data_l);
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
            break;

        case ("3"):
            var choice=2;
            break;

    }
    load_choice(choice);
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
    document.getElementById('otkaz').value=null;
    document.getElementById('otkaz_id').value=null;
}

 function create_rasp() {

    var date_rasp=document.getElementById('date_rasp').value;
     var date_start=document.getElementById('date_start').value;
     if(document.getElementById('date_stop')!==null) {

         var date_stop = document.getElementById('date_stop').value;

     }
     var basis_rasp=$('#find_basis_rasp').val();
     switch   (basis_rasp)
     {
         case ("1"):


     var id_obr=document.getElementById('choice_list').value;
    var adr_mas=new Array();
    var viol_mas=[];
     viol_mas[0]=[];
    var radio_obj= $("input[name=obj_rasp]");
     var obj_id = radio_obj.filter(":checked").val();
var name_el='adr'+obj_id;
     var adr=document.getElementsByName(name_el);
    var j=0;
     for (var i=0;i<adr.length; i++) {
         if (adr[i].checked) {
           adr_mas[j]=adr[i].value;
             var name_el2='viol_ch_'+obj_id+'_'+adr_mas[j];

             var viol_ch=document.getElementsByName(name_el2);
             var y=0;
             for (var k=0;k<viol_ch.length; k++) {
                 if (viol_ch[k].checked) {
                   viol_mas[j][y]=viol_ch[k].value;
                  y++;
                 var text2=" - "+viol_ch[k].value;
                  }
             }
              j++;       var text1=text1+" "+adr[i].value;
         }
     }

 /*if ((date_rasp=="")or(date_start=="")or(date_stop=="")or(basis_rasp=="")or(obj_id=="") or (adr_mas=="")
             or(viol_mas=="") or (id_obr==""))   {}*/
var data_val={date_rasp:date_rasp, data_start:date_start, date_stop:date_stop,
    basis_rasp:basis_rasp, obj_id:obj_id, adr_mas:adr_mas, viol_mas:viol_mas, id_obr:id_obr};
      /*  alert(' date_rasp:'+date_rasp+', data_start:'+date_start+', date_stop:'
            +date_stop+',  basis_rasp:'+basis_rasp+', obj_id:'+obj_id
            +', adr_mas:'+adr_mas+', viol_mas:'+viol_mas);*/
     break;



 }


     $.ajax({
         type: 'post',
         url: "forms/rasp/add_rasp.php",
         data:data_val,
         success: function (res) {
             var data_l=res;

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
            if (data_l==""){
           alert("Указанны не все данные");}else{alert("Данные успешно внесены в базу. Присвоен номер распоряжения:"+data_l);}
            // $('#test').html(data_l);
         }

     });

 }
 
 function procuror_approval() {
     
 }
 function obj_rasp_click() {
     var obj_rasp = $("input[name=obj_rasp]");
     if (obj_rasp != null) {

         for (var i=0;i<obj_rasp.length; i++) {
           var name_ch="adr"+obj_rasp[i].value;
            /*if (obj_rasp.filter(":checked").val()==obj_rasp[i].value){
                  $(':checkbox[name='+name_ch+']').attr('checked', true);

                       // var name_ch1="viol_ch_"+obj_rasp[i].value+"_"+$(':checkbox[name='+name_ch+']').value;

                         ///  $(':checkbox[name='+name_ch1+']').attr('checked', true);




            }
             else{ */ $(':checkbox[name='+name_ch+']').attr('checked', false);
              //  var name_ch1="viol_ch_"+obj_rasp[i].value+"_"+$(':checkbox[name='+name_ch+']').value;

              //  $(':checkbox[name='+name_ch1+']').attr('checked', false);
             //}

         }

     }
alert('end');
 }

function adr_rasp_click(adr) {
   /* var adr_rasp = $("input[name=adr"+adr+"]");
    if (adr_rasp != null) {

        for (var i=0;i<adr_rasp.length; i++) {
            var name_ch="viol_ch_"+adr+"_"+adr_rasp[i].value;
            if (adr_rasp.filter(":checked").val()==adr_rasp[i].value){
                $(':checkbox[name='+name_ch+']').attr('checked', true);
            }
            //else{  $(':checkbox[name='+name_ch+']').attr('checked', false);       }

        }

    }*/

}