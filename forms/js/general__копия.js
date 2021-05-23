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
