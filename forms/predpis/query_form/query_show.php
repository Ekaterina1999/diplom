<?php 
global $id_predpis_view;
not_find($text_load);
function not_find($text_load) {


$year=date('Y');
$col_end=$_POST['col_end'];

include_once("..\..\link\link.php");
	$page_q='SELECT  `page_length` FROM `workers` WHERE `id`="'.$_COOKIE['userid'].'"';
	$q_page=mysql_query ($page_q)or die (Mysql_error());
	while ($r_page = mysql_fetch_row($q_page))
 { if ($r_page[0]==""){}else{$page_length=$r_page[0];}}	

$text_q='SELECT `id`, `num`, `Date_ordinance`, `id_act` FROM `ordinance`
  where  `year_ordinance`="'.$year.'" ORDER BY `num` DESC ';


$q_obj=mysql_query ($text_q)or die (Mysql_error());
$count=mysql_num_rows($q_obj);
$max_col=$count;
$page_count=floor($max_col/$page_length);
if (($max_col%$page_length)>0){$page_count=$page_count+1;}
for($x=1; $x<=($page_count);$x++){
$span=$span.'<input name="page_'.$x.'" align="center"  type="button" value="'.$x.'" onclick="page_length_fun('."'".$x."'".", 'predpis'".')"/>';
}


$end=$max_col-($page_length*$col_end);
$begin=$end+$page_length;
//echo $begin.' '.$end;
while ($r_obj = mysql_fetch_row($q_obj))
 {
 if (($count<=($begin)) and ($count>($end))){
 $i++;
$p="";

$t_q='SELECT `id_reordinance` FROM `reordinance` WHERE `id_ordinance`="'.$r_obj[0].'"';
$q1=mysql_query ($t_q)or die (Mysql_error());
while ($r1 = mysql_fetch_row($q1))
 {if($r1[0]==""){}else{$povtor=1;}}
 if ($povtor==1){$povtor="&#1044;&#1072;";}else {$povtor="";}
 
 
$t_q='SELECT `Date_plan` , `Date_prolongation` ,  `eliminated` ,    `id_violation`  FROM  `ordinance_violation` WHERE  `id_ordinance` ="'.$r_obj[0].'"';
//echo $t_q;
$q2=mysql_query ($t_q)or die (Mysql_error());
while ($r2 = mysql_fetch_row($q2))
 {$d_plan=date('d.m.Y',strtotime($r2[0]));
 if($r2[1]==""){$d_prolong="";}else{$d_prolong=date('d.m.Y',strtotime($r2[1]));}
 if($r2[2]=="0"){$ex="";}else{ $ex="&#1044;&#1072;";}

 $t_q2='SELECT  `violation`.`NAME_CODE` ,  `type_violation`.`Name_type` ,  `name_obj_violation`.`name_obj` FROM violation
LEFT JOIN  `name_obj_violation` ON  `violation`.`ID_NAME_OBJ` =  `name_obj_violation`.`id` 
LEFT JOIN  `type_violation` ON  `violation`.`ID_TYPE_VIOLATION` =  `type_violation`.`Id_type_violation` 
WHERE  `ID_violation` ="'.$r2[4].'"' ;
//echo $text_q;
$v_q=mysql_query ($t_q2);
while ($v_row = mysql_fetch_row($v_q)) {
if($v_row[2]==""){$o_v="";}else{$o_v=', '.iconv("utf-8","windows-1251",$v_row[2]);}
$v=$v.'<p>'.iconv("utf-8","windows-1251",$v_row[0]).' '.$o_v.': '.iconv("utf-8","windows-1251",$v_row[1]).'</p>';}
 } 
 
 
$t_q3='SELECT `FIO`  FROM `link_ordinance_workers` join `workers` ON `workers`.`id`=`id_workers` where  `id_ordinance`="'.$r_obj[0].'"';
$q3=mysql_query ($t_q3)or die (Mysql_error());
while ($r3 = mysql_fetch_row($q3))
 {$u=$r3[0];} 
 
$pp='<tr><td>'.$r_obj[1].'</td><td>&#8470;'.iconv("utf-8","windows-1251",$r_obj[1]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r_obj[2])).'</td><td>'.$povtor.'</td><td>'.$d_plan.'</td><td>'.$d_prolong.'</td><td>'.$ex.'</td><td>'.$v.'</td><td>'.iconv("utf-8","windows-1251",$u).'</td><td><input   type="button" name="tab_button_predpis" value="&#1055;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088;"  onclick="show_view('."'predpis', ".$r_obj[0].')" /></td></tr>';

//echo $pp;
$buf1=$buf1.$pp;
	} 
	$count--;
	}


$span='<table><tr><td width="25%">&#1042;&#1089;&#1077;&#1075;&#1086; &#1079;&#1072;&#1087;&#1080;&#1089;&#1077;&#1081; : <b>'.$max_col.'   </b><p>&#1050;&#1086;&#1083;&#1080;&#1095;&#1077;&#1089;&#1090;&#1074;&#1086; &#1089;&#1090;&#1088;&#1086;&#1082; <input align="left"  maxlength="3" size ="1"  type="text" id="page_col" value="'.$page_length.'" onkeyup="" /></p></td><td align="center">'.$span.'</td></tr></table>';
echo $span;		
echo '<p><input value="&#1060;&#1080;&#1083;&#1100;&#1090;&#1088;" id="Filtr_predpis"  onclick="filtr_predpis_predpis()" type="button"/></p>' ;
include("filrt_predpis.php"); 
echo '<table width="100%"  border="2" align="center" cellpadding="0" cellspacing="0" bgcolor=#FFFFFF id="predpis_table">
<td><div align="center"><b>&#8470;</b></div></td>
<td><div align="center"><b>&#1044;&#1072;&#1090;&#1072;</b></div></td>
<td><div align="center"><b>&#1055;&#1086;&#1074;&#1090;&#1086;&#1088;&#1086;&#1085;&#1086;&#1077;</b></div></td>
<td><div align="center"><b>&#1055;&#1083;&#1072;&#1085;&#1086;&#1074;&#1072;&#1103; &#1076;&#1072;&#1090;&#1072; </b></div></td>
<td><div align="center"><b>&#1055;&#1088;&#1086;&#1076;&#1083;&#1077;&#1085;&#1086;</b></div></td>
<td><div align="center"><b>&#1048;&#1089;&#1087;&#1086;&#1083;&#1085;&#1077;&#1085;&#1086; </b></div></td>
<td><div align="center"><b>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</b></div></td>
<td><div align="center"><b>&#1048;&#1085;&#1089;&#1087;&#1077;&#1082;&#1090;&#1086;&#1088;</b></div></td>

<td width="9%" class="td_style_9"><div align="center"><b>&#1044;&#1077;&#1081;&#1089;&#1090;&#1074;&#1080;&#1077;</b></div></td>
</tr>

'.$buf1.'</table>';
echo $span;
}

?>
