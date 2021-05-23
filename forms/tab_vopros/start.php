<?


 include_once("..\link\link.php");
 $list=$_POST['list'];
 $d1=$_POST['d1'];
 $d2=$_POST['d2'];

   
 
$tab='<table id="tab_report" cellspacing="0" cellpadding="0" border="2" >
  <tr>
<td>&#1050;&#1086;&#1076; &#1086;&#1096;&#1080;&#1073;&#1082;&#1080;</td>
<td>&#1053;&#1072;&#1079;&#1074;&#1072;&#1085;&#1080;&#1077; </td>
<td>&#1058;&#1080;&#1087; </td>
<td>&#1050;&#1086;&#1083;-&#1074;&#1086;</td>
  </tr>';
$t_q_r=  'SELECT `CODE_VIOLATION` , `NAME_CODE` , `ID_TYPE_VIOLATION` , COUNT( * )
FROM `act`
JOIN `linc_act_violation` ON `linc_act_violation`.`id_act` = `act`.`id`
JOIN `violation` ON `linc_act_violation`.`id_v` = `violation`.`ID_violation`
WHERE `date_act` >="'.$d1.'" and `date_act` <="'.$d2.'"
GROUP BY `violation`.`ID_violation`
ORDER BY COUNT( * ) DESC';

$c=0;
$q_r=mysql_query ($t_q_r)or die (Mysql_error());
while ($r_q_r = mysql_fetch_row($q_r))
 { 
 $c++;
$tab=$tab.'<tr><td height="115" width="46">"   '.iconv("utf-8","windows-1251",$r_q_r[0]).'</td>
    <td width="78">'.iconv("utf-8","windows-1251",$r_q_r[1]).'</td>
    <td width="324">'.iconv("utf-8","windows-1251",$r_q_r[2]).'</td>
	    <td width="324">'.iconv("utf-8","windows-1251",$r_q_r[3]).'</td>';


$tab=$tab. ' </tr>';
 }
 
 $tab=$tab.'</table>';
echo $tab;

?>