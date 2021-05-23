function load_data_pred($data,id) {
    $.ajax({
        type: 'post',
        url: "forms/pred/query_form/query_in.php",
        data: $data,
        success: function (result4) {
          if (id=="1"){
              if(result4==""){alert("Указанны не все данные!!!");}else{
              alert('Номер вашего предостережения :'+result4);}

          }else{
                $('#'+id).html(result4);}



        }
    });
}
function add_pred() {
    var u_id=document.getElementById('user_create').value;
    var date_p=document.getElementById("date_p").value;
    var date_plan=document.getElementById("date_plan").value;
    var date_n=document.getElementById("date_n").value;
    var treb_npa=document.getElementById("treb_npa").value;

  //  var choice_list=document.getElementById("choice_list").value;

    if(treb_npa==""){alert("Указанны не все данные!!!");}
    else if(date_p==""){alert("Указанны не все данные!!!");}
    else if(date_plan==""){alert("Указанны не все данные!!!");}
    else if(date_n==""){alert("Указанны не все данные!!!");}
    else{
   //     alert ("И пошел процесс "+date_p+' '+treb_npa+' '+date_plan+' '+date_n);
        var $data={ basis:"1", date_p:date_p, date_plan:date_plan, date_n:date_n, treb_npa:treb_npa, u_id:u_id };
        load_data_pred($data,"1");

    }
}



function filer_add_predpis_old() {
    var num_filter=$('#num_filter').val();
    var date_filter1=$('#date_filter1').val();
    var date_filter2=$('#date_filter2').val();
    var rad=document.getElementsByName('duble_filter');
    for (var i=0;i<rad.length; i++) {
        if (rad[i].checked) {
            var duble_filter=rad[i].value;
        }
    }
    $.ajax({
        type: 'post',
        url: "forms/predpis_old/query_form/query_show.php",
        /*data:{

        },*/
        data:{col_end:"1", num_filter:num_filter,
            date_filter1:date_filter1, date_filter2:date_filter2,
            duble_filter:duble_filter},
        success: function (result4) {

            $('#tab_predpis_old_view').html(result4);}
    });

    var rad1=document.getElementsByName('duble_filter');
    for (var j=0;j<rad1.length; j++) {
        if (rad1[j].value==duble_filter) {
            rad1[j].checked=true;
        }
    }
}