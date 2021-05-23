function changeV(n_el,val_op) {//скрыть и раскрыть элемент формы при указанном значении

   if (val_op==0){ document.getElementById(n_el).style.display =  "none" ;
     }
     else{document.getElementById(n_el).style.display = "block";
     }

}
function changeVviolation(n_el,n_el2,val_op) {//скрыть и раскрыть элемент формы при указанном значении

    if (val_op==0){ document.getElementById(n_el).style.display =  "none" ;
        document.getElementById(n_el2).style.display = "none";
    }
    else if (val_op==1){document.getElementById(n_el).style.display = "block";
        document.getElementById(n_el2).style.display = "none";
        $.ajax({
            url:"forms/obr/name_obj_violation.php",
            success:function(result){
                $('#o_v').html(result);
                $('#v').html("");
            }
        });
    }else{
   document.getElementById(n_el).style.display = "none";

        document.getElementById(n_el2).style.display = "block";
        $.ajax({
            type:'post',
            url:"forms/obr/violation.php",
            data:'id_t_v='+val_op,
            success:function(result1){

                $('#v').html(result1);
                $('#o_v').html("");
            }
        });

    }

}

function addSelviolation( val_n_o) {
    var tvl = $('#t_v').val();

  $.ajax({
        type: 'post',
        url: "forms/obr/violation.php",
        data: {
            id_t_v:  tvl,
            id_n_o: val_n_o
        },
        success: function (result2) {

            $('#v').html(result2);
        }
    });

}

function addTab_obr(){
    var u_id=document.getElementById('user_create').value;
    var rad=document.getElementsByName('l_obj');
    for (var i=0;i<rad.length; i++) {
        if (rad[i].checked) {
          var l_obj=rad[i].value;
        }
    }



    $.ajax({
        type: 'post',
        url: "forms/obr/add_temp_obr.php",
        data: {

u_id:u_id,
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

function addTabIncoming(in_Name1, in_Date1){


   $.ajax({
        type: 'post',
        url: "forms/obr/add_temp_incoming.php",
        data: {

   inName1:in_Name1,
    inDate1:in_Date1,

},
    success: function (result4) {

        $('#t_i_d').html(result4);
    }
});
}


function addBaseObr(in_doc_base){

    var note_text=document.getElementById("note_text").value;
    var u_id=document.getElementById("user_create").value;
 //   alert(u_id);
    $.ajax({
        type: 'post',
        url: "forms/obr/obr_post_data.php",
        data: {u_id:u_id,
            note:note_text
        },
        success: function (result4) {
            if (result4==""){
                alert("Указанны не все данные!!!");}else{
        //   alert('Номер обращения :'+result4);
                $('#t_i_d').html();
                $('#t_o_o').html();

            }
        }
    });
    document.getElementById("add_obr_div").style.display="none";
    var path1="forms/rasp/create_rasp2.php";


    $.ajax({
        type:'post',
        url:path1,
        success:function(result1){
            $('#menu_add_data').html.append(result1);
            // alert(result1);
        }
    });
    //document.getElementById("add_rasp_div").style.display="block";
    //document.getElementById("find_basis_rasp").value=1;
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


function NavigationOut()
{
    var answer;
    answer = confirm('Save? OK - save and exit; Cancel - exit without save');
    if (answer){
        alert('create_obr.OnClick');}
else{
    alert ('nothing');}
}



function checkObr(idcheck, nameCheck) {
var idc='#'+nameCheck;
     switch   (nameCheck.substring(0,3))
     {
        case ("iot"):
            var valU=1;
            break;

        case ("iat"):
            var valU=2;
            break;
        case ("ivt"):
            var valU=3;
            break;
        case ("idb"):
            var valU=4;
            break;
    }
            if(jQuery(idc).prop('checked')){

            var valCh='1';
        }
        else {
                var valCh='0';
        }


       $.ajax({
            type: 'post',
            url: "forms/obr/show_temp_obr.php",
           data:{
               valU:valU,
               valCh:valCh,
               idcheck:idcheck
           }
                  });


           addTab_obr();




        }

function view_obr(){
    var u_id=document.getElementById('user_create').value;
    $.ajax({
        type: 'post',
        url: "forms/obr/query_form/query_show.php",
        data:{col_end:"1", u_id:u_id },
        success: function (result4) {

                $('#tab_obr_view').html(result4);}
    });

}
function filtr_data(id_el) {
    switch   (id_el)
    {
        case (1):
            var val_text=document.getElementById('find_id_in').value;

            $.ajax({
                type: 'post',
                url: "forms/find_data.php",
                data:{
                    val:id_el,
                    val_text:val_text

                },
                success: function (result4) {
                    if (val_text==""){ $('#list_in').html("");}else{ $('#list_in').html(result4);}

                }
            });

            $("#list_in").css("display","block");
            $("#all_in").onclick(
                function () {
                    var listcheck=document.getElementsByName("l_in");
                    var countcheck=listcheck.length;
                    if($("#all_in").checked) {var check_val=true;}else{var check_val=false;}
                    for (var index = 0; index < countcheck; index++) {
                       listcheck[index].checked=check_val;




                    }
                }

            );
           /* $('#list_in').click( function () {
               $("#list_in").css("display", "none;");
                }
            );*/
            break;

        case (2):
            var val_text=document.getElementById('find_id_obj').value;

            $.ajax({
                type: 'post',
                url: "forms/find_data.php",
                data:{
                    val:id_el,
                    val_text:val_text

                },
                success: function (result4) {
                    if (val_text==""){ $('#list_obj').html("");}else{ $('#list_obj').html(result4);}

                }
            });

            $("#list_obj").css("display","block");
            $("#all_obj").onclick(
                function () {
                    var listcheck=document.getElementsByName("l_in");
                    var countcheck=listcheck.length;
                    if($("#all_obj").checked) {var check_val=true;}else{var check_val=false;}
                    for (var index = 0; index < countcheck; index++) {
                        listcheck[index].checked=check_val;




                    }
                }

            );
            /* $('#list_in').click( function () {
                $("#list_in").css("display", "none;");
                 }
             );*/
            break;
        case (3):
            alert('3 '+id_el);
            break;
        case (4):
            alert('44 '+id_el);
            break;
    }
}

function filtr_obr_fun() {

    if (document.getElementById("filtr_div_obr").style.display == "block"){ document.getElementById("filtr_div_obr").style.display =  "none" ;
    }
    else{document.getElementById("filtr_div_obr").style.display = "block";
    }
}
function cancel_obr(){
    var path2="forms/general/cancel.php";
  /* document.getElementById('obr_tab').style.display='block';
    document.getElementById('add_obr_div').style.display='none';
    document.getElementsByName('num_in_sp').value=null;
    document.getElementsByName('date_in_sp').value=null;
    document.getElementById('find_obj_cell').value=null;
    document.getElementById('find_city').value=null;
    document.getElementById('find_street').value=null;
    document.getElementById('l_city').options.selectedIndex='-1';
    document.getElementById('t_v').options.selectedIndex='-1';
var name="obr";

 /*   $.ajax({
        type:'post',
        url:path2,
        data:{name:name}
    });*/
     alert(path2);
}
function open_obj(val) {
  var doc=  document.getElementById('open_obj_'+val);
  if (doc.style.display=='block'){doc.style.display='none';}else{doc.style.display='block';}

}