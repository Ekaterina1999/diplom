
function start_monitoring() {
    $('#result_monitoring').html("Подождите! Идет загрузка...");
    var sel_monitoring=document.getElementById('sel_monitoring').value;
    var d1=document.getElementById('d_1').value;
    var d2=document.getElementById('d_2').value;
    var fio_worker_m = document.getElementById('fio_worker_m').value;
    var w_m="0";
var viol_document_gi=[];
var y=0;
var worker_monitor=document.getElementById("worker_monitor");
    if (worker_monitor.checked) {var w_m="1";}else {var w_m="0";}
var document_gi=document.getElementsByClassName("document_gi");
    for (var k=0;k<document_gi.length; k++) {
        if (document_gi[k].checked) {
            viol_document_gi[y]=document_gi[k].value;
            y++;
              }}

    if (d1==""){alert("Указанны не все данные!!!");}else
    if (d2==""){alert("Указанны не все данные!!!");}else{
        $.ajax({
            type: 'post',
            url: "forms/monitoring/start.php",
            data: {
                d1: d1,
                d2:d2,
                viol_document_gi:viol_document_gi,
                y:y,
                fio_worker_m:fio_worker_m,
                w_m: w_m,
                sel_monitoring:sel_monitoring

            },
            success: function (res) {
                $('#result_monitoring').html(res);
                alert("готово!");
            }

        });}

}
function otdel_monitoring() {
    var otdel1=document.getElementById("sel_monitoring").value;
    var del_w_m=document.getElementById("del_w_m");
    if (del_w_m.checked) {var del_w="1";}else {var del_w="0";}
  //  alert(del_w);
    $.ajax({
        type: 'post',
        url: "forms/general/workers_depart.php",
        data: {
           id_depart: otdel1,
            del_w:del_w

        },
        success: function (res) {
        // alert(del_w+'***'+res);
            $('#fio_worker_m').html(res);

        }

    });
}