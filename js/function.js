/* ������� ��� ��������� ��������� ���� ����� ������ ������������� ��������*/

function onSelectData(obgID)
{

    $('#select').idval();
    $.ajax({url:"forms\\obr\\query_form\\query_in.php", date:"id=2",success:function(prin){$(".data").html(prin);}})
}
