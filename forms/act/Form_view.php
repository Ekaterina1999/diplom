<form action="forms/act/create_act.php" method="get">
<input  type="submit" height="50" align="center" name="cr_rasp" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100; &#1085;&#1086;&#1074;&#1099;&#1081; &#1072;&#1082;&#1090; " />

 

</form>
<table width="100%" border="2" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="obr_table">
  <tr>
    <td width="3%" height="46" class="td_style_1"><div align="center"><strong>&#8470; &#1072;&#1082;&#1090;&#1072; </strong></div></td>
    <td width="10%" class="td_style_2"><div align="center"><b>&#1044;&#1072;&#1090;&#1072;</b></div></td>
	    <td width="14%" class="td_style_3"><div align="center"><strong>&#1054;&#1089;&#1085;&#1086;&#1074;&#1072;&#1085;&#1080;&#1103; &#1087;&#1088;&#1086;&#1074;&#1077;&#1076;&#1077;&#1085;&#1080;&#1103; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080; </strong></div></td>
    <td width="10%" class="td_style_4"><div align="center"><b>&#1055;&#1088;&#1077;&#1076;&#1084;&#1077;&#1090; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080; </b></div></td>
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
      <td class="td_style_2"><select  name="find_id_violation"  class="button_style_1">'
	 <?php echo '<option value=""></option>';
     $select_q=mysql_query ("SELECT name, id FROM   inspection_obj " );
	 while ($option_r = mysql_fetch_row($select_q)) 
	{if ($option_r[0] == ""){}else{echo '<option value="'.$option_r[1].'">'.$option_r[0].'</option>';}}
	 ?>
	 </select></td>
      <td class="td_style_4"><input  type="button" name="find_button" value="&#1055;&#1086;&#1080;&#1089;&#1082;" class="button_style_1" /></td>
    </tr>
  </form>
  <?php/*
if ($_POST["find_text"]==""){
 $r=mysql_query ("SELECT complaints.num_complaints,incoming.num_incoming,incoming.incoming_date,violation.NAME_CODE,complaints_obj.Name_org,complaints_obj.license,address.id, complaints.notice , link_complaints.id_complaints ,  link_complaints.id_incoming_c ,  link_complaints.id_violation_c ,  link_complaints.id_obj_c ,  link_complaints.id_address ,  link_complaints.id_workers_c FROM link_complaints
LEFT JOIN complaints ON link_complaints.id_complaints = complaints.Id 
LEFT JOIN incoming ON link_complaints.id_incoming_c = incoming.id 
LEFT JOIN violation ON link_complaints.id_violation_c = violation.ID_violation 
LEFT JOIN complaints_obj ON link_complaints.id_obj_c = complaints_obj.id 
LEFT JOIN address ON link_complaints.id_address = address.id " );
}
else
{}
while ($myrow = mysql_fetch_row($r)) 
{{ if ($myrow[0] == ""){}
else{
echo'<tr>';
$count_r[0]++; $count_r[1]=$myrow[0]; $count_r[2]=$myrow[8]; $count_r[3]=$myrow[9]; $count_r[4]=$myrow[10]; $count_r[5]=$myrow[11]; $count_r[6]=$myrow[12]; $count_r[7]=$myrow[13]; // 

echo'<td class="td_style_1" align="center">'.$count_r[0].'</td>';//0
echo'<td class="td_style_2" align="center">'.$myrow[1].'</td>';//1
echo'<td class="td_style_3" align="center">'.$myrow[2].'</td>';//2
echo'<td class="td_style_4" align="center">'.$myrow[3].'</td>';//3
echo'<td class="td_style_5" align="center">'.$myrow[4].'</td>';//4
$q_address=mysql_query ("SELECT  CONCAT( city_zab.name, ' ',street_zab.name,' ',address.house,' ',address.housing,' ',address.flat) 
FROM address
LEFT JOIN  street_zab ON  address.id_street =  street_zab.id 
LEFT JOIN  city_zab ON  address.id_city =  city_zab.id 
where address.id=".$myrow[6]);
echo'<td class="td_style_7" align="center">';
while ($r_a = mysql_fetch_row($q_address)) 
{ if ($r_a[0] == ""){}
else{echo $r_a[0];}}

echo'</td>';
echo'<td class="td_style_9" align="center"><input  type="button" name="tab_button" value="&#1055;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088;" class="button_style_1" /></td>';//8
echo'</tr>';
//echo $count_r[0].' '.$count_r[1].' '.$count_r[2].' '.$count_r[3].' '.$count_r[4].' '.$count_r[5].' '.$count_r[6].' '.$count_r[7];

}}}*/ ?>
</table>
