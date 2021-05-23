function only_num(id_name) {
    //  $(document).ready(function() {
    alert("пффф");
    /*  $('#'+id_name).keypress(function(key) {
          if(key.charCode < 48 || key.charCode > 57) return false; });*/
}


function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function del_el_li(el) {
    var root = el.parent();
    root.remove();
}

function edit_viol_act(){
    var v = document.getElementById("v_r").value;
        var t_tv = $('#t_v_r option:selected').text();
    var tv = $('#v_r option:selected').text();
  //  alert(v+', '+tv+','+t_tv);
    if (v===0){  alert('Нарушение не выбрано!');}else{
    if (!document.getElementById("v_lir" + v+"r")) {

        edit_li_v_fun(v, tv,t_tv);

    } else {
        alert('Такое нарушение вы уже занесли в список!');
    }}
}
function edit_li_v_fun(val,tv,t_tv) {
    var t_v_ulr= document.getElementById('t_v_ulr');
    var li = document.createElement("li");
    li.type = "square";



    li.value = val;
    li.id = "v_lir"+val+"r";
    li.textContent = t_tv+' - '+tv;
    li.className="v_lirr";
    var del_li=document.createElement("input");
    del_li.type="button";
    del_li.value="X";
    del_li.setAttribute("onclick","del_el_li($(this))");

    li.appendChild(del_li);
    t_v_ulr.appendChild(li);

}

function start_report_all(val){
    document.getElementById('start_r').disabled = true;
    document.getElementById('ex').disabled = true;
    var list =document.getElementById('sel_report').value;
    var teg="<p> Идет загрузка. Подождите </p>";
    $('#result_r').html(teg);
    var d1=document.getElementById('d1').value;
    var d2=document.getElementById('d2').value;
    if (d1==""){alert("Указанны не все данные!!!");}else
    if (d2==""){alert("Указанны не все данные!!!");}else{
        $.ajax({
            type: 'post',
            url: "forms/"+val+"/start.php",
            data: {list:list,
                d1: d1,
                d2:d2
            },
            success: function (res) {
                $('#result_r').html(res);
                if (res !== "") {
                    alert("готово!");
                    document.getElementById('start_r').disabled = false;
                    document.getElementById('ex').disabled = false;
                }
            }

        });}

}
function Excel() {
    document.getElementById('start_r').disabled = true;
    document.getElementById('ex').disabled = true;
  var text_tab = $('#result_r').html();
    $.ajax({
        type: 'post',
        url: "forms/general/export_f.php",
        data: {text_tab: text_tab},
        success: function (res) {

        //    alert(res);
            // $('#result_rw').html(res);
            download('export.xls',res);
            alert("готово!");
            document.getElementById('start_r').disabled = false;
            document.getElementById('ex').disabled = false;
        }

    });


}

function download(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
}

function start_report_minstroy(val){
    document.getElementById('start_r').disabled = true;
    document.getElementById('ex').disabled = true;
    var list =document.getElementById('sel_report').value;
    var teg="<p> Идет загрузка. Подождите </p>";
    $('#result_r').html(teg);
    var period=document.getElementById('period_report_minstoy').value;
    var year_f=document.getElementById('year_f').value;
    if (period==""){alert("Указанны не все данные!!!");}else

        $.ajax({
            type: 'post',
            url: "forms/"+val+"/start.php",
            data: {list:list,
                period: period,
                year_f:year_f
            },
            success: function (res) {
                $('#result_r').html(res);
                if (res !== "") {
                    alert("готово!");
                    document.getElementById('start_r').disabled = false;
                    document.getElementById('ex').disabled = false;
                }
            }

        });

}
