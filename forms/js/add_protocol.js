function protocol_v() {
    var choice_list=document.getElementById("choice_list").value;
    var data_uved=document.getElementById("data_uved");
    if (choice_list==0){ data_uved.style.display="none";}else{
        data_uved.style.display="block";
        var $data={basis:"2", uved:choice_list };
        load_data_protocol($data,"d_u");}
}
function load_data_protocol($data,id) {
    $.ajax({
        type: 'post',
        url: "forms/protocol/query_form/query_in.php",
        data: $data,
        success: function (result4) {
          if (id=="1"){
              alert('Номер вашего уведомления :'+result4);}else{
                $('#'+id).html(result4);}



        }
    });
}
function add_protocol() {
    var date_p=document.getElementById("date_p").value;
    var adm=document.getElementById("find_adm_violation").value;
    var dop=document.getElementById("dop").value;
    var choice_list=document.getElementById("choice_list").value;
    var u_id=document.getElementById("user_create").value;
    if(date_p==""){alert("Указанны не все данные!!!");}
    else if(adm==0){alert("Указанны не все данные!!!");}
    else if (choice_list==0){alert("Указанны не все данные!!!");}else{
       // alert ("И пошел процесс "+date_p+' '+adm+' '+dop+' '+choice_list);
        var $data={u_id:u_id, basis:"1", date_p:date_p, adm:adm, dop:dop, id_uved:choice_list };
        load_data_protocol($data,"1");

    }
}
