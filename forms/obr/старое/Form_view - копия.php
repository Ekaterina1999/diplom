<form id="obr_form" name="obr_form" enctype="multipart/form-data"  method="post">
<p><input type="radio" name="radio_find" value="find_in_doc" checked>
&#1055;&#1086;&#1080;&#1089;&#1082; &#1087;&#1086; &#8470; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086;
  <input type="radio" name="radio_find" value="find_obj">
  &#1055;&#1086;&#1080;&#1089;&#1082; &#1087;&#1086; &#1086;&#1073;&#1098;&#1077;&#1082;&#1090;&#1091;</p>
  <p><input type="text" name="find_text" /><input type="submit" name="find_button" value="&#1055;&#1086;&#1080;&#1089;&#1082;" /></p>

</form>
<table width="100%" border="2" align="center" cellpadding="0" cellspacing="0" bgcolor=#FFFFFF id="obr_table">
<tr>
  <td width="4%" height="46" class="td_style_1"><strong>&#8470;&#1087;&#1087;</strong></td>
  <td width="14%" class="td_style_2"><b>&#1053;&#1086;&#1084;&#1077;&#1088; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086;</b></td>
<td width="13%" class="td_style_3"><b>&#1044;&#1072;&#1090;&#1072; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086;</b></td>
<td width="10%" class="td_style_4"><b>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</b></td>
<td width="13%" class="td_style_5"><b>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090;</b></td>
<td width="9%" class="td_style_6"><b>&#1051;&#1080;&#1094;&#1077;&#1085;&#1079;&#1080;&#1072;&#1090;</b></td>
<td width="16%" class="td_style_7"><b>&#1052;&#1077;&#1089;&#1090;&#1086; &#1087;&#1088;&#1086;&#1074;&#1077;&#1076;&#1077;&#1085;&#1080;&#1103;</b>
<td width="12%" class="td_style_8"><b>&#1055;&#1088;&#1080;&#1084;&#1077;&#1095;&#1072;&#1085;&#1080;&#1077; </b></td>
<td width="9%" class="td_style_9"><b>&#1044;&#1077;&#1081;&#1089;&#1090;&#1074;&#1080;&#1077;</b></td>
</tr>
<tr>
<td class="td_style_1"><input  type="text" name="tab_id_obr"  class="button_style_1" /></td>//0
<td class="td_style_2"><input  type="text" name="tab_id_in"  class="button_style_1"  /></td>//1
<td class="td_style_3"><input  type="text" name="tab_date_in"  class="button_style_1" /></td>
//2
<td class="td_style_4"><input  type="text" name="tab_id_violation"  class="button_style_1" /></td>//3

<td class="td_style_5"><input  type="memo" name="tab_id_obj"  class="button_style_1" /></td>//4
<td class="td_style_6"><input  type="checkbox" name="tab_lic"  class="button_style_1" /></td>//5
<td class="td_style_7"><input  type="text" name="tab_id_place"  class="button_style_1" /></td>//6
<td class="td_style_8"><input  type="text" name="tab_id_notes"  class="button_style_1" /></td>//7
<td class="td_style_9"><input  type="button" name="tab_button" value="&#1055;&#1086;&#1080;&#1089;&#1082;" class="button_style_1" /></td>//8
</tr>

<?php
if ($_POST["find_text"]==""){
 $r=mysql_query ("SELECT `complaints`.`num_complaints`,`incoming`.`num_incoming`,`incoming`.`incoming_date`,`violation`.`NAME_CODE`,`complaints_obj`.`Name_org`,`complaints_obj`.`license`,`address`.`address_name` FROM link_complaints
LEFT JOIN `complaints` ON `link_complaints`.`id_complaints` = `complaints`.`Id` 
LEFT JOIN `incoming` ON `link_complaints`.`id_incoming_c` = `incoming`.`id` 
LEFT JOIN `violation` ON `link_complaints`.`id_violation_c` = `violation`.`ID_violation` 
LEFT JOIN `complaints_obj` ON `link_complaints`.`id_obj_c` = `complaints_obj`.`id` 
LEFT JOIN `address` ON `link_complaints`.`id_address` = `address`.`id` " );
}
else
{/*
if ($_POST["radio_find"]="find_in_doc"){
 $r=mysql_query ("SELECT `complaints`.`num_complaints`,`incoming`.`num_incoming`,`incoming`.`incoming_date`,`violation`.`NAME_CODE`,`complaints_obj`.`Name_org`,`complaints_obj`.`license`,`address`.`address_name` FROM link_complaints
LEFT JOIN `complaints` ON `link_complaints`.`id_complaints` = `complaints`.`Id` 
LEFT JOIN `incoming` ON `link_complaints`.`id_incoming_c` = `incoming`.`id` 
LEFT JOIN `violation` ON `link_complaints`.`id_violation_c` = `violation`.`ID_violation` 
LEFT JOIN `complaints_obj` ON `link_complaints`.`id_obj_c` = `complaints_obj`.`id` 
LEFT JOIN `address` ON `link_complaints`.`id_address` = `address`.`id`
where  `incoming`.`num_incoming` like '%".$_POST["find_text"]."%'" );}
if ($_POST["radio_find"]="find_obj"){
 $r=mysql_query ("SELECT `complaints`.`num_complaints`,`incoming`.`num_incoming`,`incoming`.`incoming_date`,`violation`.`NAME_CODE`,`complaints_obj`.`Name_org`,`complaints_obj`.`license`,`address`.`address_name` FROM link_complaints
LEFT JOIN `complaints` ON `link_complaints`.`id_complaints` = `complaints`.`Id` 
LEFT JOIN `incoming` ON `link_complaints`.`id_incoming_c` = `incoming`.`id` 
LEFT JOIN `violation` ON `link_complaints`.`id_violation_c` = `violation`.`ID_violation` 
LEFT JOIN `complaints_obj` ON `link_complaints`.`id_obj_c` = `complaints_obj`.`id` 
LEFT JOIN `address` ON `link_complaints`.`id_address` = `address`.`id`
where  `complaints_obj`.`Name_org` like '%".$_POST["find_text"]."%'" );
echo ("SELECT `complaints`.`num_complaints`,`incoming`.`num_incoming`,`incoming`.`incoming_date`,`violation`.`NAME_CODE`,`complaints_obj`.`Name_org`,`complaints_obj`.`license`,`address`.`address_name` FROM link_complaints
LEFT JOIN `complaints` ON `link_complaints`.`id_complaints` = `complaints`.`Id` 
LEFT JOIN `incoming` ON `link_complaints`.`id_incoming_c` = `incoming`.`id` 
LEFT JOIN `violation` ON `link_complaints`.`id_violation_c` = `violation`.`ID_violation` 
LEFT JOIN `complaints_obj` ON `link_complaints`.`id_obj_c` = `complaints_obj`.`id` 
LEFT JOIN `address` ON `link_complaints`.`id_address` = `address`.`id`
where  `complaints_obj`.`Name_org` like '%".$_POST["find_text"]."%'" );

}*/

}
while ($myrow = mysql_fetch_row($r)) 
{{ if ($myrow[0] == ""){}
else{
echo'<tr>';
echo'<td class="td_style_1"><input disabled type="text" name="tab_id_obr" value="'.$myrow[0].'" class="button_style_1" /></td>';//0
echo'<td class="td_style_2"><input disabled type="text" name="tab_id_in" value="'.$myrow[1].'" class="button_style_1"  /></td>';//1
echo'<td class="td_style_3"><input disabled type="text" name="tab_date_in" value="'.$myrow[2].'" class="button_style_1" /></td>';//2
/*echo'<td class="td_style_4"><input disabled type="text" name="tab_id_violation" value="'.$myrow[3].'" class="button_style_1" /></td>';//3
*/
echo'<td class="td_style_4">'.$myrow[3].'</td>';//3
echo'<td class="td_style_5"><input disabled type="memo" name="tab_id_obj" value="'.$myrow[4].'" class="button_style_1" /></td>';//4
echo'<td class="td_style_6"><input disabled type="checkbox" name="tab_lic" checked="'.$myrow[5].'" class="button_style_1" /></td>';//5
echo'<td class="td_style_7"><input disabled type="text" name="tab_id_place" value="'.$myrow[6].'" class="button_style_1" /></td>';//6
echo'<td class="td_style_8"><input disabled type="text" name="tab_id_notes" value="'.$myrow[7].'" class="button_style_1" /></td>';//7
echo'<td class="td_style_9"><input  type="button" name="tab_button" value="&#1055;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088;" class="button_style_1" /></td>';//8
echo'</tr>';
}}} ?> </table>