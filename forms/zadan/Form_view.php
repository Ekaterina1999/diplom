<form action="forms/zadan/create_zadan.php" method="get">
<input  type="submit" height="50" align="center" name="cr_rasp" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100; &#1085;&#1086;&#1074;&#1086;&#1077; &#1079;&#1072;&#1076;&#1072;&#1085;&#1080;&#1077; " />
</form>
<table width="100%" border="2" align="center" cellpadding="0" cellspacing="0" bgcolor=#FFFFFF id="obr_table">
<tr>
  <td width="4%" height="46" class="td_style_1"><div align="center"><strong>&#8470;&#1087;&#1087;</strong></div></td>
  <td width="10%" class="td_style_2"><div align="center"><b>&#1042;&#1080;&#1076; &#1084;&#1077;&#1088;&#1086;&#1087;&#1088;&#1080;&#1103;&#1090;&#1080;&#1103;</b></div></td>
<td width="13%" class="td_style_3"><div align="center"><b>&#1057;&#1074;&#1077;&#1076;&#1077;&#1085;&#1080;&#1103; &#1086; &#1088;&#1077;&#1079;&#1091;&#1083;&#1100;&#1090;&#1072;&#1090;&#1072;&#1093; &#1084;&#1077;&#1088;&#1086;&#1087;&#1088;&#1080;&#1103;&#1090;&#1080;&#1103; &#1087;&#1086; &#1082;&#1086;&#1085;&#1090;&#1088;&#1086;&#1083;&#1102; (&#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1081; &#1085;&#1077; &#1074;&#1099;&#1103;&#1074;&#1083;&#1077;&#1085;&#1086;, &#1074;&#1099;&#1076;&#1072;&#1085;&#1086; &#1087;&#1088;&#1077;&#1076;&#1086;&#1089;&#1090;&#1077;&#1088;&#1077;&#1078;&#1077;&#1085;&#1080;&#1077;, &#1084;&#1086;&#1090;&#1080;&#1074;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1085;&#1086;&#1081; &#1087;&#1088;&#1077;&#1076;&#1089;&#1090;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077; &#1086; &#1085;&#1077;&#1086;&#1073;&#1093;&#1086;&#1076;&#1080;&#1084;&#1086;&#1089;&#1090;&#1080; &#1087;&#1088;&#1086;&#1074;&#1077;&#1076;&#1077;&#1085;&#1080;&#1103;  &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080;)</b></div></td>
<td width="12%" class="td_style_4"><div align="center"><strong>&#1053;&#1086;&#1084;&#1077;&#1088; &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1103; </strong></div></td>
<td width="9%" class="td_style_5"><div align="center"><b>&#1044;&#1077;&#1081;&#1089;&#1090;&#1074;&#1080;&#1077;</b></div></td>
</tr>
<form id="obr_form" name="obr_form" enctype="multipart/form-data"  method="post">
<tr>
<td class="td_style_1"></td>
<td class="td_style_4"><select  name="find_id_violation"  class="button_style_1">'
	 <?php echo '<option value=""></option>';
     $select_q=mysql_query ("SELECT `NAME_CODE`, `ID_violation` FROM `violation` " );
	 while ($option_r = mysql_fetch_row($select_q)) 
	{if ($option_r[0] == ""){}else{echo '<option value="'.$option_r[1].'">'.$option_r[0].'</option>';}}
	 ?>
	 </select></td>

<td class="td_style_2"><input  type="memo" name="find_id_obj"  class="button_style_1" /></td>
<td class="td_style_3"><input  type="text" name="find_id_notes"  class="button_style_1" /></td>
<td class="td_style_5"><input  type="button" name="find_button" value="&#1055;&#1086;&#1080;&#1089;&#1082;" class="button_style_1" /></td>
</tr>
</form>


<?php
//if ($_POST["find_text"]==""){
 $r=mysql_query ("SELECT `tasks`.`results_event`,
`type_event`.`name`,
`results_event`.`name`,
`complaints`.`num_complaints`,
`complaints_tasks`.`id_complaints`,
`tasks`.`id`,
`tasks`.`id_type_event`
FROM tasks
LEFT JOIN `type_event` ON `tasks`.`id_type_event` = `type_event`.`id` 
LEFT JOIN `results_event` ON `tasks`.`results_event` = `results_event`.`id` 
LEFT JOIN `complaints_tasks` ON `tasks`.`id` = `complaints_tasks`.`id_tasks` 
LEFT JOIN `complaints` ON `complaints_tasks`.`id_complaints` = `complaints`.`Id" );
/*}
else
{}*/
while ($myrow = mysql_fetch_row($r)) 
{{ if ($myrow[0] == ""){}
else{
echo'<tr>';
$count_r[0]++; $count_r[1]=$myrow[0]; $count_r[2]=$myrow[8]; $count_r[3]=$myrow[9]; $count_r[4]=$myrow[10]; $count_r[5]=$myrow[11]; $count_r[6]=$myrow[12]; $count_r[7]=$myrow[13]; // 

echo'<td class="td_style_1" align="center">'.$count_r[0].'</td>';//0
echo'<td class="td_style_2" align="center">'.$myrow[1].'</td>';//1
echo'<td class="td_style_3" align="center">'.$myrow[2].'</td>';//2
echo'<td class="td_style_4" align="center">'.$myrow[3].'</td>';//3
echo'<td class="td_style_9" align="center"><input  type="button" name="tab_button" value="&#1055;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088;" class="button_style_1" /></td>';//8
echo'</tr>';
//echo $count_r[0].' '.$count_r[1].' '.$count_r[2].' '.$count_r[3].' '.$count_r[4].' '.$count_r[5].' '.$count_r[6].' '.$count_r[7];

}}} ?> </table>
