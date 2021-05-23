function add_zadan(){

    var u_id=document.getElementById('user_create').value;
    var choice_list=document.getElementById('choice_list').value;
    var date_zadan=document.getElementById('date_zadan').value;
         var vid_zadan=document.getElementById('vid_zadan').value;
    var result_zadan=document.getElementById('result_zadan').value;
    //alert(u_id+" "+choice_list+" "+date_zadan+" "+vid_zadan+" "+result_zadan);
    if(u_id==""){alert("Указанны не все данные!!!");}
    else if(choice_list==""){alert("Указанны не все данные!!!");}
    else if(date_zadan==""){alert("Указанны не все данные!!!");}
    else if(vid_zadan==""){alert("Указанны не все данные!!!");}
    else {
        var data_val = {
            u_id: u_id, choice_list: choice_list, date_zadan: date_zadan, vid_zadan: vid_zadan,
            result_zadan: result_zadan

        };
        load_data_zadan(data_val);

    }
}
function load_data_zadan($data) {
    $.ajax({
        type: 'post',
        url: "forms/zadan/query_form/query_in.php",
        data: $data,
        success: function (result4) {

                if(result4==""){alert("Указанны не все данные!!!");}else{
                    alert('Номер вашего задания :'+result4); load_menu('zadan');}





        }
    });
}
function filter_zadan(val_p) {
    var num_filter = document.getElementById('num_filter').value;
    var date_filter1 = $('#date_filter1').val();
    var date_filter2 = $('#date_filter2').val();
    var date_filter_begin1 = $('#date_filter_begin1').val();
    var date_filter_begin2 = $('#date_filter_begin2').val();
    var date_filter_end1 = $('#date_filter_end1').val();
    var date_filter_end2 = $('#date_filter_end2').val();
    var vid_filter=$('#vid_filter').val();
    var num_filter_act = $('#num_filter_act').val();
    var date_filter1_act = $('#date_filter1_act').val();
    var date_filter2_act = $('#date_filter2_act').val();
    var num_filter_zakl = $('#num_filter_zakl').val();
    var date_filter1_zakl = $('#date_filter1_zakl').val();
    var date_filter2_zakl = $('#date_filter2_zakl').val();
    var num_filter_otkaz = $('#num_filter_otkaz').val();
    var date_filter1_otkaz = $('#date_filter1_otkaz').val();
    var date_filter2_otkaz = $('#date_filter2_otkaz').val();
    var num_filter_rasp = $('#num_filter_rasp').val();
    var date_filter1_rasp = $('#date_filter1_rasp').val();
    var date_filter2_rasp = $('#date_filter2_rasp').val();
    var l_city = $('#l_city').val();
    if (l_city==0){var find_city="";}else{var find_city=$('#l_city option:selected').text();}


    var l_street = $('#l_street').val();
    if (l_street==0){var find_street="";}else{var find_street=$('#l_street option:selected').text();}

    var house = $('#house').val();
    $.ajax({
        type: 'post',
        url: "forms/zadan/query_form/query_show.php",
        /*data:{

        },*/
        data: {
            col_end:val_p
            , num_filter: num_filter,
            date_filter1: date_filter1, date_filter2: date_filter2,
            date_filter_begin1: date_filter_begin1, date_filter_begin2: date_filter_begin2,
            date_filter_end1: date_filter_end1, date_filter_end2: date_filter_end2,
            vid_filter: vid_filter,
            num_filter_act: num_filter_act,
            date_filter1_act: date_filter1_act, date_filter2_act: date_filter2_act,
            num_filter_zakl: num_filter_zakl,
            date_filter1_zakl: date_filter1_zakl, date_filter2_zakl: date_filter2_zakl,
            num_filter_otkaz: num_filter_otkaz,
            date_filter1_otkaz: date_filter1_otkaz, date_filter2_otkaz: date_filter2_otkaz,
            num_filter_rasp: num_filter_rasp,
            date_filter1_rasp: date_filter1_rasp, date_filter2_rasp: date_filter2_rasp,
            l_city:l_city,
            l_street:l_street,
            house:house,
            find_street:find_street,
            find_city:find_city

        },
        success: function (result4) {
//alert(result4);
            $('#tab_zadan_view').html(result4);
        }
    });
}
function filer_add_zadan_clear() {

    var num_filter = "";
    var date_filter1 = "";
    var date_filter2 = "";
    var vid_filter="";
    var num_filter_act ="";
    var date_filter1_act ="";
    var date_filter2_act = "";
    var num_filter_zakl = "";
    var date_filter1_zakl = "";
    var date_filter2_zakl = "";
    var num_filter_otkaz = "";
    var date_filter1_otkaz ="";
    var date_filter2_otkaz = "";
    var num_filter_rasp = "";
    var date_filter1_rasp = "";
    var date_filter2_rasp = "";
    $.ajax({
        type: 'post',
        url: "forms/zadan/query_form/query_show.php",
        /*data:{

        },*/
        data: { num_filter: num_filter,
            date_filter1: date_filter1, date_filter2: date_filter2,
            vid_filter: vid_filter,
            num_filter_act: num_filter_act,
            date_filter1_act: date_filter1_act, date_filter2_act: date_filter2_act,
            num_filter_zakl: num_filter_zakl,
            date_filter1_zakl: date_filter1_zakl, date_filter2_zakl: date_filter2_zakl,
            num_filter_otkaz: num_filter_otkaz,
            date_filter1_otkaz: date_filter1_otkaz, date_filter2_otkaz: date_filter2_otkaz,
            num_filter_rasp: num_filter_rasp,
            date_filter1_rasp: date_filter1_rasp, date_filter2_rasp: date_filter2_rasp,

        },
        success: function (result4) {
//alert(result4);
            $('#tab_zadan_view').html(result4);
        }
    });
}