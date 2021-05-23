function load_menu(name){
    var path2="forms/"+name+"/"+name+".php";
    $.ajax({
        type:'post',
        url:path2,
        success:function(result1){
            $('#l_menu').html(result1);
//alert($('#l_menu').html(result1));
        }
    });
    // alert(path2);
}
function cancel_but(name){
    $('#l_menu').html(null);
    var path2="forms/general/cancel.php";
    $.ajax({
        type:'post',
        url:path2,
        data:{name:name}
    });
    // alert(path2);
}
function add_data(name){
    var path1="forms/"+name+"/create_"+name+".php";


    $.ajax({
        type:'post',
        url:path1,
        success:function(result1){
            $('#menu_add_data').html(result1);
            // alert(result1);
        }
    });

}

function update_pw_fun(passw){
    var pw=$("#password_update").val();
    //  alert(pw);

    $.ajax({
        type:'post',
        url:"pw.php",
        data:{
            pw:pw
        },
        success:function(res1) {
            // $('#menu_add_data').html(result1);
            if(res1==""){
                msg("10");}else{alert(res1);}

        }
    });

}

function  autorization_key(u,pw,e) {
    if (e.keyCode=="13"){
        autorizationbase(u, pw);
        alert('Авторизация прошла успешно!');
    }
}
function autorizationbase(u, pw) {
    var e = document.getElementById(u);
    var userid = e.options[e.selectedIndex].value;
    var username = e.options[e.selectedIndex].text;
    var p = document.getElementById(pw).value;

    if (userid==0){msg("5");}
    else{
        $.ajax({ type:'post',
            url:"forms/authorization.php",
            data:{
                username: username,
                userid:  userid,
                pw: p
            },
            success:function(q_res){

                if (q_res =="") {
                    msg("4");
                } else {
                    document.cookie = 'username=' + username;
                    document.cookie = 'userid=' + userid;
                    document.cookie = 'userpassword=' + p;


                    document.getElementById("autorizate").style.display =  "block";
                    document.getElementById("authorization").style.display =  "none";
                    $("#user_name_val").html(q_res);
                    location.reload(true);


                    $.ajax({
                        type: 'post',
                        url: "forms/depart.php",
                        success: function (res2) {

                            document.cookie = 'userhead=' +res2;
                            location.reload(true);
                        }
                    });



                }




            }
        });

    }
}

function msg(id_msg){


    $.ajax({
        type: 'post',
        url: "msg.php",
        data: {
            id_msg:id_msg

        },
        success: function (result) {
            alert(result);

        }

    });


}

function deleteCookie() {


    delete_cookie("username");
    delete_cookie("userid");
    delete_cookie("userpassword");
    delete_cookie("userhead");
    document.getElementById("authorization").style.display =  "block";
    document.getElementById("autorizate").style.display =  "none";

    location.reload(false);
}

function delete_cookie ( cookie_name )
{
    var cookie_date = new Date ( );  // Текущая дата и время
    cookie_date.setTime ( cookie_date.getTime() - 1 );
    document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}



function clickDiv(n_el) {//скрыть и раскрыть элемент формы при указанном значении
    var val_el=document.getElementById(n_el).style.display;
    if (val_el=="block"){ document.getElementById(n_el).style.display =  "none" ;
    }
    else{document.getElementById(n_el).style.display = "block";
    }
    if (val_el=="none"){ document.getElementById(n_el).style.display =  "block" ;
    }
    else{document.getElementById(n_el).style.display = "none";
    }

}
function clickDivParent(n_el,p_el) {//скрыть и раскрыть элемент формы при указанном значении
    document.getElementById(p_el).style.display =  "none" ;
    document.getElementById(n_el).style.display =  "block" ;

}

function divindiv(name) {
    var el= document.getElementById('l_menu');
    var l_el=el.children.length;
    var c_el=el.children;
    var i;

    for (i = 0; i <l_el; i++) {
        c_el.item(i).style.display="none";
    }
    document.getElementById(name).style.display="block";
}

function cancel_admin() {
    var el= document.getElementById('l_menu');
    var l_el=el.children.length;
    var c_el=el.children;
    var i;

    for (i = 0; i <l_el; i++) {
        c_el.item(i).style.display="none";
    }
    document.getElementById("setting_a").style.display="block";
    document.getElementById("list_a").style.display="block";
    document.getElementById("report_a").style.display="block";
}

function createuserbase() {
    var eldepat = document.getElementById("depat");
    var dapatval = eldepat.options[eldepat.selectedIndex].value;

    var listcheck=document.getElementsByName("menu_use");
    var countcheck=listcheck.length;
    var allcheckel=[];
    for (var index = 0; index < countcheck; index++) {
        if (listcheck[index].checked) {

            allcheckel.push(listcheck[index].id);

        }
    }

    var mainmen=0;
    var mainmenel=document.getElementsByName("ruc_ot");
    if (mainmenel.checked){mainmen=1;}else {mainmen=0;}
    var userfio= $('#user_fio').val();
    var userpost= $('#user_post').val();
    var userps= $('#user_ps').val();



    if(userfio==""){msg("7");}else
    if(userps==""){msg("8");}else
    if(allcheckel.length==0){msg("6");}
    else{

        $.ajax({
            type: 'post',
            url: "forms/admin/new_user_create.php",
            data: {
                userfio:userfio,
                userpost:userpost,
                userps:userps,
                dapatval:dapatval,
                mainmen:mainmen,
                allcheckel:allcheckel,
                l:allcheckel.length

            },
            dataType:"json",
            success: function (result4) {
                //   $("#butdiv").html(result4);

                if (result4==0){msg("1");

                }else {
                    msg("9");

                }
            }

        });

    }
}


function f_obr_create(){

    divindiv("add_obr_div");
    addTabIncoming("", "");
    addTab_obr();
    findObj();


}
function f_zadan_create(){

    divindiv("add_zadan_div");

    raspFormCreate_obr(1);


}
function f_rasp_create(){

    divindiv("add_rasp_div");
    findObj();


}
function f_act_create(){

    divindiv("add_act_div");

    rasp_choice();


}
function f_predpis_create(){

    divindiv("add_predpis_div");

    act_choice();


}
function f_predpis_old_create(){

    divindiv("add_predpis_old_div");




}
function f_U_protocol_create(){

    divindiv("add_U_protocol_div");

    act_choice();

}
function f_U_pred_create(){

    divindiv("add_U_pred_div");
    if (document.getElementsByName('rasp_id_u').value!==""){document.getElementById('choice').style.display="block";}
    rasp_choice();
}
function f_protocol_create(){

    divindiv("add_protocol_div");
    act_choice();
    load_choice(6);

}
function f_pred_create(){

    divindiv("add_pred_div");


}

function findObj(){
    if (document.getElementById("find_obj_cell")){
        var val=  document.getElementById("find_obj_cell").value;

        $.ajax({
            type: 'post',
            url: "forms/find_obj.php",
            data: {
                val:val

            },
            success: function (result3) {

                $('#l_obj_group').html(result3);

            }

        });

    }
}
function findcity(){
    if (document.getElementById("find_city")){
        var val=  document.getElementById("find_city").value;

        $.ajax({
            type: 'post',
            url: "forms/find_city.php",
            data: {
                val:val

            },
            success: function (result3) {

                $('#l_city').html(result3);

            }

        });
        //var v=document.getElementById('l_city').firstChild.value;
        // document.getElementById("l_city").options.selectedIndex=1;
        //  $("#l_city :first").attr('selected', 'true');
        // alert($('#l_city').value);
        changeV('address', document.getElementById("l_city").value);
        //alert('$(#l_city).value '+ $('#l_city').options[0].value);
        // findstreet(null);

    }
}
function findstreet(val){
    if (document.getElementById("find_street")){
        var val2=  document.getElementById("find_street").value;}
    if(val==null){
        val = document.getElementById("l_city").value; //???????? option
    }
    //alert(val);
    $.ajax({
        type:'post',
        url:'forms/obr/street_sp.php',//?????????? php
        data:{city_zab:val,val:val2},//???????? ???????? option. ?? ??????? ????? ???????? $_POST['value'}
        success:function(result){// ???????? ????? ? ???????
            $('#l_street').html(result);//??????? ?? ????????
            if (result==null){changeV('address',"0");}
        }

    });
    // console.log($(this).val());

}
function view(name){

    $.ajax({
        type: 'post',
        url: "forms/"+name+"/query_form/query_show.php",
        /*data:{

        },*/
        data:{col_end:"1" },
        success: function (result4) {

            $('#tab_'+name+'_view').html(result4);}
    });

}

function page_length_fun(val,path) {
    $.ajax({
        type: 'post',
        url: "forms/"+path+"/query_form/query_show.php",
        data:{col_end: val },
        success: function (result4) {

            $('#tab_'+path+'_view').html(result4);}
    });
}
function show_view(path,id){
//alert(path+' '+id);

    $.ajax({
        type: 'post',
        url: "forms/"+path+"/view_"+path+".php",
        data:{path: path, id:id },
        success: function (res) {

            $('#view_'+path+'_div').html(res);
            divindiv('view_'+path+'_div');
            //document.getElementById('view_'+path+'_div').style.display='block';
            // document.getElementById('add_'+path+'_div').style.display='none';
            //document.getElementById('tab_'+path+'_div').style.display='none';
        }
    });
}
function butt_up(path,val,id) {
alert (val);
    if (val === 'Редактировать') {
       var name = 'Сохранить';
        document.getElementById('view_' + path + '_p').style.display = "none";
        document.getElementById('view_' + path + '_r').style.display = "block";
    }
    else {
        var name = 'Редактировать';
        switch (path) {
            case 'pred':
                var d1 = document.getElementById('d1').value;
                var d2 = document.getElementById('d2').value;
                var d3 = document.getElementById('d3').value;
                var d4 = document.getElementById('d4').value;
                var d5 = document.getElementById('d5').value;
                if (d1 == "") {alert("Не заполнено обязательное поле!!!"); }
                else if (d2 == "") {alert("Не заполнено обязательное поле!!!");}
                else if (d4 == "") {alert("Не заполнено обязательное поле!!!");}
                else if (d5 == ""){ alert("Не заполнено обязательное поле!!!");}
                else {
                    var data1 = {
                        path: path, id: id,
                        d1: d1,
                        d2: d2,
                        d3: d3,
                        d4: d4,
                        d5: d5
                    };
                }
                //  alert('aa');
                break;
            case 'act':
                // var d1=document.getElementById('edit_end_date_act').value;
                var v_li = [];
                var re_viol = $(".v_lirr");
                var l_v = re_viol.length;
                for (var i = 0; i < l_v; i++) {
                    v_li[i] = re_viol[i].value;
                    //    alert ('i:'+v_li[i]);
                }


                ///  alert('l_v:' + l_v + 'id:' + id + 'v:'+v_li[0] + ' path:' + path + ' d1:' + d1);
                var data1 = {
                    l_v: l_v, id: id,
                    v: v_li,
                    path: path,
                    d1: d1

                };

                //  alert('aa');
                break;
        }
        if (typeof data1 !== "undefined") {
            //alert("forms/" + path + "/query_form/update_" + path + ".php");
            $.ajax({
                type: 'post',
                url: "forms/" + path + "/query_form/update_" + path + ".php",
                data: data1,
                success: function (res) {
alert(res);
                    //   $('#view_'+path+'_p').html(res);
                }
            });

            document.getElementById('view_' + path + '_r').style.display = "none";
            document.getElementById('view_' + path + '_p').style.display = "block";
            switch (path) {  case 'act':
                load_menu('act');

                //  alert('aa');
                break;
            }
            show_view(path, id);
        }
    }
    var class_n=document.getElementsByClassName('up_form');
    for (var i=0; i <class_n.length; i++){class_n.item(i).value=name;}

}

function page_update_length(path,keyCodes) {
    var page_col=document.getElementById('page_col').value;
    if(keyCodes.keyCode=="13") {

        $.ajax({
            type: 'post',
            url: "forms/update_col_page.php",
            data:{col_page: page_col, name:path },
            success: function (result4) {
                if (result4==0){  view(path);}
            }
        });

    }}
function filtr_fun(name) {

    if (document.getElementById("filtr_div_"+name).style.display == "block")
    { document.getElementById("filtr_div_"+name).style.display =  "none" ; }
    else{document.getElementById("filtr_div_"+name).style.display = "block";
    }
}

function page_length_fun_filter(val,path) {
    switch (path){
        case ('predpis_old'):
            var num_filter=$('#num_filter').val();
            var date_filter1=$('#date_filter1').val();
            var date_filter2=$('#date_filter2').val();
            var rad=document.getElementsByName('duble_filter');
            for (var i=0;i<rad.length; i++) {
                if (rad[i].checked) {
                    var duble_filter=rad[i].value;
                }
            }
            var data={col_end:val , num_filter:num_filter,
                date_filter1:date_filter1, date_filter2:date_filter2,
                duble_filter:duble_filter }
            break;

    }



    $.ajax({
        type: 'post',
        url: "forms/"+path+"/query_form/query_show.php",
        data:data,
        success: function (result4) {

            $('#tab_'+path+'_view').html(result4);}
    });
}

function filtr_fun(name) {

    if (document.getElementById("filtr_div_"+name).style.display == "block")
    { document.getElementById("filtr_div_"+name).style.display =  "none" ; }
    else{document.getElementById("filtr_div_"+name).style.display = "block";
    }
}

function butt_cansel(name) {
    load_menu(name);
}

function filer_add_form(name,val_p) {
    var num_filter = document.getElementById('num_filter').value;
    var date_filter1 = $('#date_filter1').val();
    var date_filter2 = $('#date_filter2').val();
    var l_city = $('#l_city_f').val();
    if (l_city==0){var find_city="";}else{var find_city=$('#l_city_f option:selected').text();}


    var l_street = $('#l_street_f').val();
    if (l_street==0){var find_street="";}else{var find_street=$('#l_street_f option:selected').text();}

    var house = $('#house_f').val();
    var korpus = $('#korpus_f').val();
    var rad=document.getElementsByName('l_obj_f');
    for (var i=0;i<rad.length; i++) {
        if (rad[i].checked) {
            var l_obj=rad[i].value;
        }
    }

    var l_v = $('#v_f').val();
    if (l_v==0){var v="";}else{var v=$('#v_f option:selected').text();}

    var l_u = $('#user_f').val();
    if (l_u==0){var u="";}else{var u=$('#user_f option:selected').text();}

    switch (name) {
        case ("act"):

            var num_filter1 = $('#num_filter1').val();
            var date_filter3 = $('#date_filter3').val();
            var date_filter4 = $('#date_filter4').val();
            var base_act_f=document.getElementsByName('base_act_f');
            for (var i=0;i<base_act_f.length; i++) {
                if (base_act_f[i].checked) {
                    var b_a_f=base_act_f[i].value;
                }
            }
            var data={
                col_end:val_p
                , num_filter: num_filter,
                date_filter1: date_filter1, date_filter2: date_filter2,
                num_filter1: num_filter1,
                date_filter3: date_filter3, date_filter4: date_filter4,
                l_obj:l_obj,
                l_city:l_city,
                l_street:l_street,
                house:house,
                korpus:korpus,
                v:v,
                u:u,
                b_a_f:b_a_f,


                find_street:find_street,
                find_city:find_city

            };


            break;}

    $.ajax({
        type: 'post',
        url: "forms/"+name+"/query_form/query_show.php",
        /*data:{

        },*/
        data: data,
        success: function (result4) {
//alert(result4);
            $('#tab_'+name+'_view').html(result4);
        }
    });
}



function findcity_f(name){
    if (document.getElementById("find_city"+name)){
        var val=  document.getElementById("find_city"+name).value;

        $.ajax({
            type: 'post',
            url: "forms/find_city.php",
            data: {
                val:val

            },
            success: function (result3) {

                $('#l_city'+name).html(result3);

            }

        });
        //var v=document.getElementById('l_city').firstChild.value;
        // document.getElementById("l_city").options.selectedIndex=1;
        //  $("#l_city :first").attr('selected', 'true');
        // alert($('#l_city').value);
        changeV('address', document.getElementById("l_city"+name).value);
        //alert('$(#l_city).value '+ $('#l_city').options[0].value);
        // findstreet(null);

    }
}
function findstreet_f(name, val){
    if (document.getElementById("find_street"+name)){
        var val2=  document.getElementById("find_street"+name).value;}
    if(val==null){
        val = document.getElementById("l_city"+name).value; //???????? option
    }
    //alert(val);
    $.ajax({
        type:'post',
        url:'forms/obr/street_sp.php',//?????????? php
        data:{city_zab:val,val:val2},//???????? ???????? option. ?? ??????? ????? ???????? $_POST['value'}
        success:function(result){// ???????? ????? ? ???????
            $('#l_street'+name).html(result);//??????? ?? ????????
            if (result==null){changeV('address',"0");}
        }

    });
    // console.log($(this).val());

}

function findObj_f(name){
    if (document.getElementById("find_obj_cell"+name)){
        var val=  document.getElementById("find_obj_cell"+name).value;

        $.ajax({
            type: 'post',
            url: "forms/find_obj"+name+".php",
            data: {
                val:val

            },
            success: function (result3) {

                $('#l_obj_group'+name).html(result3);

            }

        });

    }
}

function changeVviolation_all(n,n_el,n_el2,val_op) {//скрыть и раскрыть элемент формы при указанном значении

    if (val_op==0){ document.getElementById(n_el).style.display =  "none" ;
        document.getElementById(n_el2).style.display = "none";
    }
    else if (val_op==1){document.getElementById(n_el).style.display = "block";
        document.getElementById(n_el2).style.display = "none";
        $.ajax({
            url:"forms/general/name_obj_violation.php",
            success:function(result){
                $('#o_v'+n).html(result);
                $('#v'+n).html("");
            }
        });
    }else{
        document.getElementById(n_el).style.display = "none";

        document.getElementById(n_el2).style.display = "block";
        $.ajax({
            type:'post',
            url:"forms/general/violation.php",
            data:'id_t_v='+val_op,
            success:function(result1){

                $('#v'+n).html(result1);
                $('#o_v'+n).html("");
            }
        });

    }

}

function addSelviolation_all( n,val_n_o) {
    var tvl = $('#t_v'+n).val();

    $.ajax({
        type: 'post',
        url: "forms/general/violation.php",
        data: {
            id_t_v:  tvl,
            id_n_o: val_n_o
        },
        success: function (result2) {

            $('#v'+n).html(result2);
        }
    });

}


