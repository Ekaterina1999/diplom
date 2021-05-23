function start_rmw() {
    //alert('kyky');
    var year_f=document.getElementById('year_f').value;
    var date_rmw1=document.getElementById('date_rmw1').value;
    var date_rmw2=document.getElementById('date_rmw2').value;
    var sel_rmw=document.getElementById('sel_rmw').value;
    //alert(year_f);
    $.ajax({
        type: 'post',
        url: "forms/report_main_work/rmw_start.php",
        data:{year_f:year_f, date_rmw1:date_rmw1,  date_rmw2:date_rmw2, sel_rmw:sel_rmw},
        success: function (res) {


               $('#result_rmw').html(res);

        }

    });
}