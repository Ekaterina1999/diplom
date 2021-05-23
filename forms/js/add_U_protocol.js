function U_protocol_v() {
   var admin_viol=document.getElementById("admin_viol");
   var choice_list=document.getElementById("choice_list").value;
   var veiw_adr_obj=document.getElementById("veiw_adr_obj");
   if (choice_list==0){
       admin_viol.style.display="none";
   veiw_adr_obj.style.display="none";}else{
       veiw_adr_obj.style.display="block";
       admin_viol.style.display="block";
       var val_base=$("#choice_list").find('option:selected').attr('val_base');
   document.getElementById("a_v").value="0";
       var $data={basis:"2", act:choice_list };
       load_data_protocol_u($data,"veiw_adr_obj");
       if (val_base==3){document.getElementById("predpis_a_v").disabled=false;}else{
   document.getElementById("predpis_a_v").disabled=true;}
   }
}

function add_u_protocol() {
    var u_id=document.getElementById('user_create').value;
    var date_u=document.getElementById("date_u").value;
    var date_m=document.getElementById("date_m").value;
    var time_m=document.getElementById("time_m").value;
    var choice_list=document.getElementById("choice_list").value;
    var a_v=document.getElementById("a_v").value;
    if(date_u==""){alert("Указанны не все данные!!!");}
    else if(date_m==""){alert("Указанны не все данные!!!");}
    else if(time_m==""){alert("Указанны не все данные!!!");}
    else if (choice_list==0){alert("Указанны не все данные!!!");}
    else if(a_v==0){alert("Указанны не все данные!!!");}else{
          var predpis=$("#predpis_val");
        if(a_v==3)  {if(predpis){var p=predpis.attr("val");}else{var p="";}}else{var p="";}
       // alert ("И пошел процесс "+p);
        var $data={basis:"3",u_id:u_id, date_u:date_u, date_m:date_m, time_m:time_m, id_act:choice_list, basis_adm:a_v, predpis:p };
        load_data_protocol_u($data,"1");
    }
}
function a_v_fun() {
    var a_v=document.getElementById("a_v").value;
    var val_order=$("#choice_list").find('option:selected').attr('val_order');
    if (a_v==3){
     document.getElementById("predpis").style.display="block";
        var $data={basis:"1", val_order:val_order };
        load_data_protocol_u($data,"predpis");
    }else{document.getElementById("predpis").style.display="none";}
}
function load_data_protocol_u($data,id) {
    $.ajax({
        type: 'post',
        url: "forms/U_protocol/query_form/query_in.php",
        data: $data,
        success: function (result4) {
 if (id=="1"){
            alert('Номер вашего уведомления :'+result4);}else{
            $('#'+id).html(result4);}



        }
    });
}

