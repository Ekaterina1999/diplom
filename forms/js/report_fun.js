function result_report(name_report) {
    var period = $('#period_report_' + name_report).val();
    var year_r = $('#year_report_' + name_report).val();
    if (period == "0") {
        alert('Не указан период');
    }
    else {

    var path2 = "forms/reports/reports_" + name_report + ".php";
    $.ajax({
        type: 'post',
        url: path2,
        data: {year_r: year_r, period: period},
        success: function (result1) {
            $('#param_' + name_report).css('display', 'block');
            $('#param_' + name_report).html(result1);

        }
    });
}

}
