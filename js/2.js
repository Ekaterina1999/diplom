function obr(){

    $.ajax({
           success:function(){
               var a="<? include('forms/obr/obr.php'); ?>";
            $('#l_menu').html(a);
               }
    });
alert('123');
}

function autorizationbase(u, pw) {
    var e = document.getElementById(u);
   var userid = e.options[e.selectedIndex].value;
    var username = e.options[e.selectedIndex].text;
    var p = document.getElementById(pw).value;

if (userid==0){msg("5");}
else{
    /*$.ajax({ type:'post',
        url:"authorization.php",
        data:{
            userid:  userid,
            pw: p
        },
        success:function(q_res){

            if (q_res == 0) {
                msg("4");
            } else {
                document.cookie = 'username=' + username;
                document.cookie = 'userid=' + userid;
                document.cookie = 'userpassword=' + p;
                document.getElementById("authorization").style.display =  "none"
            }
        }
    });*/
    alert("Успех");
    }
}

function msg(id_msg){


    $.ajax({
        type: 'post',
        url: "form/obj/msg.php",
        data: {
            id_msg:id_msg

        },
        success: function (result) {
            alert(result);

        }

    });


}