<form  method="post">
<input  type="submit" height="50" align="center" name="cr_rasp" value="&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1103; " onclick="add_data('admin')" />

 


</form>
<table width="100%" border="2" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="obr_table">
  <tr>
    <td width="3%" height="46" class="td_style_1"><div align="center"><strong>&#1060;&#1048;&#1054;</strong></div></td>
    <td width="10%" class="td_style_2"><div align="center"><strong>&#1054;&#1090;&#1076;&#1077;&#1083;</strong></div></td>
	    <td width="14%" class="td_style_3"><div align="center"><strong>&#1044;&#1086;&#1083;&#1078;&#1085;&#1086;&#1089;&#1090;&#1100;</strong></div></td>
        <td width="10%" class="td_style_4"><div align="center"><strong>&#1056;&#1091;&#1082;&#1086;&#1074;&#1086;&#1076;&#1080;&#1090;&#1077;&#1083;&#1100;</strong></div></td>
    <td width="9%" class="td_style_6"><div align="center"><b>&#1044;&#1077;&#1081;&#1089;&#1090;&#1074;&#1080;&#1077;</b></div></td>
  </tr>
  <form id="obr_form" name="obr_form" enctype="multipart/form-data"  method="post">
    <tr>
      <td class="td_style_1"><input  type="text" name="find_id_rasp"  class="button_style_1" /></td>
      <td class="td_style_2">&#1057;
          <input  type="date" name="find_basis_rasp_begin" />
        &#1055;&#1086;
        <input  type="date" name="find_basis_rasp_end" /></td>
      <td class="td_style_3"><select  name="find_id_violation"  class="button_style_1">'
	 <?php echo '<option value=""></option>';
     $select_q=mysql_query ("SELECT name, id FROM  cause_inspection " );
	 while ($option_r = mysql_fetch_row($select_q)) 
	{if ($option_r[0] == ""){}else{echo '<option value="'.$option_r[1].'">'.$option_r[0].'</option>';}}
	 ?>
	 </select></td>
      <td class="td_style_2"><input  type="check" name="find_ruc" value="&#1055;&#1086;&#1080;&#1089;&#1082;" class="button_style_1" /></td>
      <td class="td_style_4"><input  type="button" name="find_button" value="&#1055;&#1086;&#1080;&#1089;&#1082;" class="button_style_1" /></td>
    </tr>
  </form>
  <?php
include_once("..\link\link.php");
 $r=mysql_query ("SELECT Id, FIO, 	position, head, id_department FROM  workers" );

while ($myrow = mysql_fetch_row($r)) 
{{ if ($myrow[0] == ""){}
else{
$c_tr++;
echo'<tr>';
echo'<td class="td_style_1" align="center">'.strval($myrow[1]).'</td>';//0
echo'<td class="td_style_2" align="center">';
$q_depat=mysql_query ('SELECT  name, id FROM department where id="'.$myrow[4].'"');
while ($r_d = mysql_fetch_row($q_depat)) 
{ if ($r_d[0] == ""){}
else{echo strval($r_d[0]);}}
echo'</td>';
echo'<td class="td_style_3" align="center">'.strval($myrow[2]).'</td>';//2
if ($myrow[3]==1){
echo'<td class="td_style_6" align="center"><input disabled type="checkbox" name="tab_lic" checked class="button_style_1" /></td>';//5
} else{
echo'<td class="td_style_6" align="center"><input disabled type="checkbox" name="tab_lic"  class="button_style_1" /></td>';//5
} 
echo'</td>';
echo'<td class="td_style_5" align="center"><input  type="button" name="tab_button" value="&#1055;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088;" class="button_style_1" id="'.strval($myrow[0]).'"/></td>';//8
echo'</tr>';
//echo $count_r[0].' '.$count_r[1].' '.$count_r[2].' '.$count_r[3].' '.$count_r[4].' '.$count_r[5].' '.$count_r[6].' '.$count_r[7];

}}} ?>
</table>
