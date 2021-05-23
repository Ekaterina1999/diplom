<?


 include_once("..\link\link.php");
 $d1=$_POST['d1'];
 $d2=$_POST['d2'];


 
 
$tab='<table id="tab_report" cellspacing="0" cellpadding="0" border="2" >
  <tr>
    <td height="115" width="46">&#8470;</td>
   
    <td width="324"> &#1054;&#1088;&#1075;&#1072;&#1085;&#1080;&#1079;&#1072;&#1094;&#1080;&#1103;</td>
      
   
    <td width="104">&#1048;&#1053;&#1053;</td> 
	<td width="64">&#1055;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080;</td>
    <td width="100">&#1055;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1077;</td>
    
    <td width="76">&#1053;&#1077;&#1080;&#1089;&#1087;&#1086;&#1083;&#1085;&#1077;&#1085;&#1099;&#1077; &#1087;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1103;  </td>
	
  </tr>';
$t_q_r=  'SELECT `id`,`Name_org`,`inn` FROM `complaints_obj` where   `license` =1 order by `Name_org`';
$c=0;
$q_r=mysql_query ($t_q_r)or die (Mysql_error());
while ($r_q_r = mysql_fetch_row($q_r))
 { 
 $c++;
$tab=$tab.'<tr><td height="115" width="46">'.$c.'</td>
    <td width="78">'.iconv("utf-8","windows-1251",$r_q_r[1]).'</td>
    <td width="324">'.iconv("utf-8","windows-1251",$r_q_r[2]).'</td>';

        $t_q1=  'SELECT count(*) FROM `act` WHERE `obj_id` ="'.$r_q_r[0].'" and `date_act`>="'.$d1.'" and `date_act` <="'.$d2.'"';
$q1=mysql_query ($t_q1)or die (Mysql_error());
while ($r1 = mysql_fetch_row($q1))
 {
 
 $tab=$tab.'<td height="115" width="46">'.$r1[0].'</td>';
  }
  
       $t_q1=  'SELECT count(*) FROM `ordinance` WHERE `id_act` in (SELECT id FROM `act` WHERE `obj_id` ="'.$r_q_r[0].'") and `Date_ordinance`>="'.$d1.'" and `Date_ordinance` <="'.$d2.'"';
$q1=mysql_query ($t_q1)or die (Mysql_error());
while ($r1 = mysql_fetch_row($q1))
 {
 
 $tab=$tab.'<td height="115" width="46">'.$r1[0].'</td>';
  }
//protocol

 $t=  ' SELECT count(*) FROM `ordinance` WHERE `id` in(SELECT `id_ordinance` FROM `ordinance_violation` WHERE  `Date_plan`>="'.$d1.'"  and `Date_plan`<="'.$d2.'" and `eliminated`="0")  and`id_act` in (SELECT `id` FROM `act` WHERE `obj_id`='.$r_q_r[0].') ';
//echo $t.' ';

$q1=mysql_query ($t)or die (Mysql_error());
while ($r1 = mysql_fetch_row($q1))
 {
 
 $tab=$tab.'<td height="115" width="46">'.$r1[0].'</td>';
  }
  
 
$tab=$tab. ' </tr>';
 }
 
 $tab=$tab.'</table>';
echo $tab;

?>