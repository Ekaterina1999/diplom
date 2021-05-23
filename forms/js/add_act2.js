function risc_fun() {
    var risc=document.getElementById('risc');
    switch (risc.value){

        case ("0"):
            document.getElementById("risc_podtverd").style.display="none";
            document.getElementById("risc_p").checked=false;
            document.getElementById("risc_v_form").style.display="none";
            break
        case ("1"):
        case ("2"):
            document.getElementById("risc_podtverd").style.display="block";
            document.getElementById("risc_v_form").style.display="none";
            break

    }
}
function risc_vid() {
    var risc=document.getElementById('risc');
    if(risc.value=="2"){
    if (document.getElementById("risc_p").checked) {
         document.getElementById("risc_v_form").style.display="block";
        } else {document.getElementById("risc_v_form").style.display="none";
    }}else{document.getElementById("risc_v_form").style.display="none";}

}

function fun_nachisl(name) {
    document.getElementById(name).style.color="#ff2400";
    switch (name)
    {
        case ("pluse"):
            var name2="minus";
            break

        case ("minus"):
            var name2="pluse";
            break
    }
    document.getElementById(name2).style.color="#000000";
}

function findrasp() {
    var choice= $("input[name=param_find_rasp]").filter(":checked").val();

 var val=document.getElementById('find_rasp').value;
    //alert(val+" "+choice);
if(val==null){document.getElementById('result_find_rasp').style.display="none";}else{
    document.getElementById('result_find_rasp').style.display="block";


    $.ajax({
        type: 'post',
        url: "forms/act/query_form/q_findrasp.php",
        data: {
            choice:choice,
            val:val
        },
        success: function (res) {

            $('#result_find_rasp').html(res);
        }
    });
}

}

function rasp_choice() {
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
    load_choice(3);
  //alert("Кукушка улетела далеко");
}

function address_rasp1() {
    var el=document.getElementById("choice_list");
    var val=el.value;
    if (val==0){document.getElementById("result_find_rasp_address").style.display="none";}
    else{document.getElementById("result_find_rasp_address").style.display="block";
    address_load(val);}

       var  basis_rasp= el.options[[el.selectedIndex]].attributes["basis_rasp"].value;

    if (basis_rasp=="3"){document.getElementById("predpis_isp_view").style.display="block"; }
    else
    {document.getElementById("predpis_isp_view").style.display="none";}

    if (document.getElementById('t_v')){document.getElementById('t_v').value=0;   changeVviolation('o_v_v','v_v','0');}
    if (document.getElementById('list_viol')){while (document.getElementById('list_viol').firstChild) {
        document.getElementById('list_viol').removeChild(document.getElementById('list_viol').firstChild); }
        document.getElementById('re_viol').checked=false;
        revealed_violation();
    }
   // obj_rasp2();
}
function address_load(id_rasp) {
    $.ajax({
        type: 'post',
        url: "forms/act/address_load.php",
        data: {
            id_rasp: id_rasp
        },
        success: function (res) {
                    $('#result_find_rasp_address').html(res);

        }

    });
  //  obj_rasp2();
}
function obj_rasp2(micro_org) {

    if (micro_org==1) {$("#hour_or_day").html("(в часах)");}else{$("#hour_or_day").html("(в днях)");}
    revealed_violation();
}

function obj_rasp1() {
    var id_rasp = document.getElementById("choice_list").value;
    var id_adr = document.getElementById("address_rasp").value;
  //  if(id_adr==null){id_adr=$("#address_rasp").options[0].value;}
    obj_load(id_rasp, id_adr);
    revealed_violation();
   // obj_rasp2();
}

function obj_load(id_rasp, id_adr) {
    $.ajax({
        type: 'post',
        url: "forms/act/obj_load.php",
        data: {
            id_rasp: id_rasp,
            id_adr:id_adr,
            flag:"1"
        },
        success: function (res) {
            $('#obj_rasp').html(res);
            //$('#test').html(res);

        }

    });

}

function act_otdel() {
    $.ajax({
        type: 'post',
        url: "forms/general/depart.php",
               success: function (res) {
          //  alert(res);
            switch (res)
            {
                case ("1"):
                   document.getElementById("v_control").style.display="block";
                    document.getElementById("d_control").style.display="none";
                    document.getElementById("a_control").style.display="none";
                    break;
                case ("2"):
                    document.getElementById("v_control").style.display="none";
                    document.getElementById("d_control").style.display="block";
                    document.getElementById("a_control").style.display="none";
                    break;
                case ("3"):
                    document.getElementById("v_control").style.display="none";
                    document.getElementById("d_control").style.display="none";
                    document.getElementById("a_control").style.display="block";
                    break;
            }
            //$('#test').html(res);

        }

    });


}
function admin_choice() {
 var val=$("#sel_d").val();

        switch (val)
        {
            case ("1"):
                document.getElementById("v_control").style.display="block";
                document.getElementById("d_control").style.display="none";
                                break;
            case ("2"):
                document.getElementById("v_control").style.display="none";
                document.getElementById("d_control").style.display="block";

                break;
            case ("0"):
                document.getElementById("v_control").style.display="none";
                document.getElementById("d_control").style.display="none";

                break;
        }

}

function revealed_violation() {

    var viol=document.getElementById('re_viol');
    if(viol.checked){document.getElementById('re_viol_div').style.display="block";
    var choise=document.getElementById("choice_list").value;
        var adr=document.getElementById("address_rasp").value;
        var obj=document.getElementById("obj_rasp").value;

        $.ajax({
            type: 'post',
            url: "forms/act/el_in_rasp.php",
            data:{id_r:choise,id_address:adr,id_obj:obj},
            success: function (res) {
               /* if (res!==""){
                    alert("Данные успешно добавленый. Номер вашего акта:"+res);
                }
                else{
                    alert("Данные не добавлены, проверте все ли поля заполнены.");
                }*/
                //  alert(res);

                 $('#list_viol').html(res);

            }

        });
    }
    else{document.getElementById('re_viol_div').style.display="none";}

}

function add_viol_act2() {
    var t_v = document.getElementById("t_v").value;
    var o_v = document.getElementById("o_v").value;
    var v = document.getElementById("v").value;
    var tt_v = $('#t_v option:selected').text();
    var to_v = $('#o_v option:selected').text();
    var tv = $('#v option:selected').text();

    var list_data = document.getElementById("list_viol");
    var li = document.createElement("li");
    var li2 = document.createElement("li");
    var li3 = document.createElement("li");

    var ul2 = document.createElement("ul");
    var ul = document.createElement("ul");
    if (t_v == 0) {alert("Вы не выбрали нарушение!");
    } else {

    if (list_data.children.length < 1) {
        if (t_v == 1) {

            li3.type = "circle";
            li3.value = v;
            li3.className = "v_l";
            li3.textContent = tv;
            li3.appendChild(create_but_del("v", v));
            ul2.appendChild(li3);

            li2.type = "square";
            li2.value = o_v;
            li2.className = "t_o_l";
            li2.textContent = to_v;
            li2.appendChild(create_but_del("o_v", o_v));
            ul.appendChild(li2);
            li2.appendChild(ul2);
            li.value = t_v;
            li.className = "t_v_l";
            li.textContent = tt_v;
            li.appendChild(create_but_del("t_v", t_v));
            li.appendChild(ul);
            list_data.appendChild(li);
            // }

        } else {

            li2.type = "circle";
            li2.value = v;
            li2.className = "v_l";
            li2.textContent = tv;
            li2.appendChild(create_but_del("v", v));
            ul.appendChild(li2);

            li.value = t_v;
            li.className = "t_v_l";
            li.textContent = tt_v;
            li.appendChild(create_but_del("t_v", t_v));
            li.appendChild(ul);
            list_data.appendChild(li);
        }
    }
    else {

        var class_v_l = $(".v_l");
        var v_t = 0;
        for (var i = 0; i < class_v_l.length; i++) {
            if (class_v_l[i].value == v) {
                v_t++;
            }

        }
        if (v_t == 0) {
            if (t_v == 1) {

                var class_t_o_l = $(".t_o_l");
                var o_t = 0;
                for (var j = 0; j < class_t_o_l.length; j++) {
                    if (class_t_o_l[j].value == o_v) {
                        var el_n3 = j;
                        o_t++;
                    }
                }
                var class_t_v_l = $(".t_v_l");
                var t_t = 0;
                for (var k = 0; k < class_t_v_l.length; k++) {
                    if (class_t_v_l[k].value == t_v) {
                        var el_n2 = k;
                        t_t++;
                    }
                }
                if (t_t == 0) {

                    //var label_teg=document.createElement("label");
                    //  if(list_data.length>0) {
                    li3.type = "circle";
                    li3.value = v;
                    li3.className = "v_l";
                    li3.textContent = tv;
                    li3.appendChild(create_but_del("v", v));
                    ul2.appendChild(li3);
                    li2.type = "square";
                    li2.value = o_v;
                    li2.className = "t_o_l";
                    li2.textContent = to_v;
                    li2.appendChild(create_but_del("o_v", o_v));
                    ul.appendChild(li2);
                    li2.appendChild(ul);
                    li.value = t_v;
                    li.className = "t_v_l";
                    li.textContent = tt_v;
                    li.appendChild(create_but_del("t_v", t_v));
                    li.appendChild(ul);
                    list_data.appendChild(li);
                } else {
                    if (o_t == 0) {
                        li3.type = "circle";
                        li3.value = v;
                        li3.className = "v_l";
                        li3.textContent = tv;
                        li3.appendChild(create_but_del("v", v));
                        ul2.appendChild(li3);
                        li2.type = "square";
                        li2.value = o_v;
                        li2.className = "t_o_l";
                        li2.textContent = to_v;
                        li2.appendChild(create_but_del("o_v", o_v));
                        ul.appendChild(li2);
                        li2.appendChild(ul);
                        li.value = t_v;
                        li.className = "t_v_l";
                        li.textContent = tt_v;
                        li.appendChild(create_but_del("t_v", t_v));
                        li.appendChild(ul);
                        class_t_v_l[el_n2].appendChild(ul);

                    } else {

                        li3.type = "circle";
                        li3.value = v;
                        li3.className = "v_l";
                        li3.textContent = tv;
                        li2.appendChild(create_but_del("v", v));
                        ul2.appendChild(li3);
                        class_t_o_l[el_n3].appendChild(ul2);
                    }
                    /*
                    if(o_t==0){}else{
                    li2.type="circle";
                    li2.className = "v_l";
                    li2.textContent = tv;
                    ul.appendChild(li2);
                    class_t_v_l[el_n3].appendChild(ul);}*/
                }
            }
            else {

                var class_t_v_l = $(".t_v_l");
                var t_t = 0;
                for (var k = 0; k < class_t_v_l.length; k++) {
                    if (class_t_v_l[k].value == t_v) {
                        var el_n1 = k;
                        t_t++;
                    }
                }
                if (t_t == 0) {
                    li2.value = v;
                    li2.className = "v_l";
                    li2.textContent = tv;
                    li2.type = "circle";
                    li2.appendChild(create_but_del("o_v", o_v));
                    ul.appendChild(li2);

                    li.value = t_v;
                    li.className = "t_v_l";
                    li.textContent = tt_v;
                    li.appendChild(create_but_del("t_v", t_v));
                    li.appendChild(ul);
                    //li.appendChild(create_but_del("t_v", t_v));
                    list_data.appendChild(li);
                } else {

                    li2.value = v;
                    li2.type = "circle";
                    li2.className = "v_l";
                    li2.textContent = tv;
                    li2.appendChild(create_but_del("v", v));
                    ul.appendChild(li2);
                    class_t_v_l[el_n1].appendChild(ul);
                }

            }

        } else {
            alert('Такое нарушение вы уже занесли в список!');
        }
    }
}
}

function create_but_del(name, val) {
    var del_li=document.createElement("input");
    del_li.type="button";
    del_li.value="X";
    del_li.setAttribute("onclick","del_temp_v($(this))");
    del_li.id=name+val;
    return del_li;
}
function create_li_list_v(lvl,name, val,txt, ul_name) {

    var li = document.createElement("li");
    switch (lvl)
    {
        case (1):li.type = "circle"; break;
        case (2):li.type = "square"; break;
    }


    li.value = val;
    li.id = name+"_li"+val;
    li.textContent = txt;
    li.className=name+"_li";

    li.appendChild(create_but_del(name, val));
    if (ul_name!==null){ li.appendChild(ul_name);   }
    return li;

}

function add_viol_act() {
    var t_v = document.getElementById("t_v").value;
    var o_v = document.getElementById("o_v").value;
    var v = document.getElementById("v").value;
    var tt_v = $('#t_v option:selected').text();
    var to_v = $('#o_v option:selected').text();
    var tv = $('#v option:selected').text();
    var list_data = document.getElementById("list_viol");
if(v==0){alert("Вы не выбрали нарушение!");}else  if(t_v==0){alert("Вы не выбрали нарушение!");}else {
    if (!document.getElementById("v_li" + v)) {

      switch (t_v) {
            case ("0"):
                alert("Вы не выбрали нарушение!");
                break;
            case ("1"):
                if (o_v == 0) {
                    alert("Вы не выбрали нарушение!");
                } else {




                    if (!document.getElementById("t_v_ul" + t_v)) {
                        var ul = document.createElement("ul");
                        ul.id="t_v_ul"+t_v;
                        ul.value =t_v;
                    }else{var ul=document.getElementById("t_v_ul" + t_v);
                       }
                    if (!document.getElementById("o_v_li" + o_v)) {
                        var ul2 = document.createElement("ul");
                        ul2.id="o_v_li"+o_v;
                        ul2.value=o_v;
                        ul.appendChild(create_li_list_v(1, "o_v", o_v, to_v, ul2));}else{
                        var ul2=document.getElementById("o_v_li" + o_v);}

                    ul2.appendChild(create_li_list_v(2, "v", v, tv, null));



                    if (!document.getElementById("t_v_li" + t_v)) {

                        list_data.appendChild(create_li_list_v(0, "t_v", t_v, tt_v, ul));
                    }

                }

                break;
            default:
                if (!document.getElementById("t_v_ul" + t_v)) {
                var ul = document.createElement("ul");
                ul.id="t_v_ul"+t_v;
                    ul.value=t_v;
                }else{var ul=document.getElementById("t_v_ul" + t_v);}
                ul.appendChild(create_li_list_v(2, "v", v, tv, null));
                if (!document.getElementById("t_v_li" + t_v)) {

                    list_data.appendChild(create_li_list_v(0, "t_v", t_v, tt_v, ul));
                }

               break;
        }
    } else {
        alert('Такое нарушение вы уже занесли в список!');
    }
}
}

function del_temp_v(el) {
    var root = el.parent();
    //alert(root.attr("id")+" "+root.parent().attr("id"));
    if (root.parent().attr("id") == "list_viol") {

        root.remove();
    }
    if (root.parent().attr("id").substring(0, 6) == "t_v_ul") {
        var name = root.parent().attr("id").substring(6);
      //  alert(name + ' ' + $('#t_v_ul' + name).find("li").children().length);

        if ($('#t_v_ul' + name).find("li").children().length > 1) {
            root.remove();
            //root.parent().remove();
        } else {
            var name1 = 't_v_li' + name;
            document.getElementById(name1).remove();
          //  alert(name1);
        }

    }
    alert("t_v_ul" + root.parent("li").attr("id").substring(6));
    if (root.parent().attr("id").substring(0, 6) == "o_v_ul") {
        var name2 = root.parent().attr("id").substring(6);
      //  alert(name2 + ' ' + $('#o_v_ul' + name).find("li").children().length);

        if (document.getElementById("t_v_ul" + root.parent().parent().attr("id").substring(6)).children().length==1){
            document.getElementById("t_v_ul" + root.parent().parent().attr("id").substring(6)).remove();
        }
        if ($('#o_v_ul' + name2).find("li").children().length > 1) {
            root.remove();
            //root.parent().remove();



        } else {
            var name3 = 'v_li' + name2;
            document.getElementById(name3).remove();

        }

    }
}
function add_act() {
    var u_id=document.getElementById('user_create').value;
 var date_p=$("#date_p").val();
 var depart=0;
 var choice_list=document.getElementById("choice_list").value;
    if (document.getElementById("address_rasp")) {
        var address_rasp = document.getElementById("address_rasp").value;
        var obj_rasp = document.getElementById("obj_rasp").value;
        var time_hour_or_day = document.getElementById("time_hour_or_day").value;
        if (document.getElementById("v_control").style.display == "block") {
            var pl_obj = document.getElementById("pl_obj").value;
            var risc = document.getElementById("risc").value;
            if (document.getElementById("risc_p").checked) {
                if (risc==1){
                var risc_p = 1;}else{ var risc_p = document.getElementById("risc_v_d").value;}
            } else {
                var risc_p = 0;
            }
           // alert(pl_obj + ' ' + risc + "  risc_p=" + risc_p);
            depart=1;
        }
        if (document.getElementById("d_control").style.display == "block") {
            var Size_n = $("#Size_n").val();
            if (document.getElementById("minus").style.color == "rgb(255, 36, 0)") {
                var recalculation_charge = 1;
            } else {
                var recalculation_charge = 0;
            }
           //alert(Size_n + ' Size_n ' + recalculation_charge);
            depart=2;
        }



            if(time_hour_or_day==""){alert("Указанны не все данные!!!");}
            else {
                if (document.getElementById("predpis_isp_view").style.display=="block") {
                    if (document.getElementById("predpis_isp").checked) {
                        var predpis = 1;
                    } else {
                        var predpis = 0;
                    }
                }else {
                        var predpis = 0;
                }



                if (document.getElementById("in_police").checked) {
                    var in_police = 1;
                } else {
                    var in_police = 0;
                }


                if (document.getElementById("re_viol").checked) {
                    var v_li=[];
                   var re_viol=$(".v_li");

                        for (var i = 0; i < re_viol.length; i++) {
                            v_li[i]=re_viol[i].value;
                        }


                        var vv=1;
                } else {
                    var vv=null;
                    var v_li ="null";
                }

                    switch (depart)
                    {
                        case (0):alert("Не выбран отдел!!!");
                            break;
                        case (1):
                            if(pl_obj==""){alert("Указанны не все данные!!!");}else {
                                var val_data={u_id:u_id, depart:depart, date_p:date_p, rasp_id:choice_list, address_id:address_rasp
                                    , obj_id:obj_rasp, num_time:time_hour_or_day, area:pl_obj, risc:risc
                                    , risc_v:risc_p, in_police:in_police, v_li:v_li, predpis:predpis, vv:vv};
                                add_act_fun(val_data);
                            }
                            break;
                        case (2):
                            if(Size_n==""){alert("Указанны не все данные!!!");}
                            else{

                                var val_data={u_id:u_id, depart:depart, date_p:date_p, rasp_id:choice_list, address_id:address_rasp
                                    , obj_id:obj_rasp, num_time:time_hour_or_day, recalculation_charge:recalculation_charge
                                    , size_recalculation:Size_n, in_police:in_police, v_li:v_li, predpis:predpis, vv:vv};
                                add_act_fun(val_data);
                            }
                            break;
                    }


            }



    }else{alert("Не указанно распоряжение!!!");}
}

function add_act_fun($data) {
  //  alert($data);
    $.ajax({
        type: 'post',
        url: "forms/act/add_act.php",
        data:$data,
        success: function (res) {
            if (res!==""){
                 alert("Данные успешно добавленый. Номер вашего акта:"+res);
            }
            else{
                alert("Данные не добавлены, проверте все ли поля заполнены.");
            }
            //  alert(res);

         //   $('#test').html(res);

        }

    });
}