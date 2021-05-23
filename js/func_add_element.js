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
            url:"name_obj_violation.php",
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
            url:"violation.php",
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
        url: "violation.php",
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
    var uid=1;

    $.ajax({
        type: 'post',
        url: "add_temp_obr.php",
        data: {
             uid:uid,

    obj:$('#l_obj').val(),
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
var uid=1;
   $.ajax({
        type: 'post',
        url: "add_temp_incoming.php",
        data: {
   inName1:in_Name1,
    inDate1:in_Date1,
            uid:uid
},
    success: function (result4) {

        $('#t_i_d').html(result4);
    }
});
}


function addBaseObr(in_doc_base){



    msg("1");
    //alert("1233 j ");
    
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