<? 
$act=$_POST['act'];
include_once("..\link\link.php");
$q_text='SELECT  `violation`.`ID_violation` ,  `type_violation`.`Name_type` ,  `name_obj_violation`.`name_obj` ,  `violation`.`NAME_CODE` 
FROM linc_act_violation
JOIN  `violation` ON  `linc_act_violation`.`id_v` =  `violation`.`ID_violation` 
LEFT JOIN  `name_obj_violation` ON  `violation`.`ID_NAME_OBJ` =  `name_obj_violation`.`id` 
JOIN  `type_violation` ON  `violation`.`ID_TYPE_VIOLATION` =  `type_violation`.`Id_type_violation` 
WHERE  `linc_act_violation`.`id_act` =  "'.$act.'"';
$tr='<p>&#1042;&#1099;&#1103;&#1074;&#1083;&#1077;&#1085;&#1085;&#1099;&#1077; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;  </p><table border="1">';
//echo $q_text;
$q=mysql_query ($q_text) or die (mysql_error());
while ($r = mysql_fetch_row($q)) {$i++;
$tr=$tr.'<tr>  <td class="pp_viol">'.$i.'</td> <td>'.iconv("utf-8","windows-1251",$r[1]).' '.iconv("utf-8","windows-1251",$r[2]).' '.iconv("utf-8","windows-1251",$r[3]).'</td><td> <input id="v_date_'.$r[0].'" type="date" class="viol_end_date" /> </td> <td> <input id="v_check_'.$r[0].'" type="button" value="X" onclick="del_el_tav_v($(this))"/> </td></tr>';

}
$tr=$tr.'</table>';
echo $tr;
 ?>
