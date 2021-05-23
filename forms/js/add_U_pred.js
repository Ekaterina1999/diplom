function add_u_pred() {
    var u_id=document.getElementById('user_create').value;
    var date_u=document.getElementById("date_u").value;
    var date_m=document.getElementById("date_m").value;
    var time_m=document.getElementById("time_m").value;
    var rasp_id_u=document.getElementById('choice_list').value;
    //alert (rasp_id_u);
    if(date_u==""){alert("Указанны не все данные!!!");}
    else if(date_m==""){alert("Указанны не все данные!!!");}
    else if(time_m==""){alert("Указанны не все данные!!!");}else{
         // var predpis=$("#predpis_val");
        //if(a_v==3)  {
         //   if(predpis){var p=predpis.attr("val");}else{var p="";}//}else{var p="";}
       // alert ("И пошел процесс "+p);
        var $data={u_id:u_id, date_u:date_u, date_m:date_m, time_m:time_m, rasp_id_u:rasp_id_u
            };
        load_data_pred_u($data,"1");
    }
}

function load_data_pred_u($data,id) {
    $.ajax({
        type: 'post',
        url: "forms/U_pred/query_form/query_in.php",
        data: $data,
        success: function (result4) {
 if (id=="1"){
            alert('Номер вашего уведомления :'+result4);}else{
            $('#'+id).html(result4);}


            load_menu('U_pred');
        }
    });
}


