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
function start_rw() {
    //alert('kyky');

    var date_rmw1=document.getElementById('date_rmw1').value;
    var date_rmw2=document.getElementById('date_rmw2').value;
    var sel_rmw=document.getElementById('sel_rmw').value;
    //alert(year_f);
    $.ajax({
        type: 'post',
        url: "forms/rating_work/rmw_start.php",
        data:{ date_rmw1:date_rmw1,  date_rmw2:date_rmw2, sel_rmw:sel_rmw},
        success: function (res) {


            $('#result_rw').html(res);

        }

    });
}
function rating_uk_f() {

    var d1=document.getElementById('d_1').value;
    var d2=document.getElementById('d_2').value;
    if (d1==""){alert("Указанны не все данные!!!");}else
    if (d2==""){alert("Указанны не все данные!!!");}else{
        $.ajax({
            type: 'post',
            url: "forms/rating_uk/start.php",
            data: {
                d1: d1,
                d2:d2
            },
            success: function (res) {
                $('#view_rating').html(res);

            }

        });}
    alert("готово!");
}