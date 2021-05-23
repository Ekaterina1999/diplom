<?php 
global $id_zadan_view;
not_find($text_load);
function not_find($text_load) {


$year=date('Y');
$col_end=$_POST['col_end'];

include_once("..\..\link\link.php");
	$page_q='SELECT  `page_length` FROM `workers` WHERE `id`="'.$_COOKIE['userid'].'"';
	$q_page=mysql_query ($page_q)or die (Mysql_error());
	while ($r_page = mysql_fetch_row($q_page))
 { if ($r_page[0]==""){}else{$page_length=$r_page[0];}}	

$text_q='SELECT  `tasks`.`id` ,  `num` ,   `date_tasks` ,  `type_tasks`.`name` ,  `results_tasks`.`name` 
FROM  `tasks` 
left JOIN  `type_tasks` ON  `type_tasks`.`id` =  `id_type_tasks` 
left JOIN  `results_tasks` ON  `results_tasks`.`id` =  `id_results_tasks` 
  where  `tasks_year`="'.$year.'" ORDER BY `num` DESC ';
//echo $text_q;

$q_obj=mysql_query ($text_q)or die (Mysql_error());
$count=mysql_num_rows($q_obj);
$max_col=$count;
$page_count=floor($max_col/$page_length);
if (($max_col%$page_length)>0){$page_count=$page_count+1;}
for($x=1; $x<=($page_count);$x++){
$span=$span.'<input name="page_'.$x.'" align="center"  type="button" value="'.$x.'" onclick="page_length_fun('."'".$x."'".", 'zadan'".')"/>';
}


$end=$max_col-($page_length*$col_end);
$begin=$end+$page_length;
//echo $begin.' '.$end;
while ($r_obj = mysql_fetch_row($q_obj))
 {
 if (($count<=($begin)) and ($count>($end))){
 $i++;


 
$pp='<tr><td>'.$r_obj[1].'</td><td>&#8470;'.iconv("utf-8","windows-1251",$r_obj[1]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r_obj[2])).'</td><td>'.iconv("utf-8","windows-1251",$r_obj[3]).'</td><td>'.iconv("utf-8","windows-1251",$r_obj[4]).'</td><td><input   type="button" name="tab_button_zadan" value="&#1055;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088;"  onclick="show_view('."'zadan', ".$r_obj[0].')" /></td></tr>';

//echo $pp;
$buf1=$buf1.$pp;
	} 
	$count--;
	}


$span='<table><tr><td width="25%">&#1042;&#1089;&#1077;&#1075;&#1086; &#1079;&#1072;&#1087;&#1080;&#1089;&#1077;&#1081; : <b>'.$max_col.'   </b><p>&#1050;&#1086;&#1083;&#1080;&#1095;&#1077;&#1089;&#1090;&#1074;&#1086; &#1089;&#1090;&#1088;&#1086;&#1082; <input align="left"  maxlength="3" size ="1"  type="text" id="page_col" value="'.$page_length.'" onkeyup="" /></p></td><td align="center">'.$span.'</td></tr></table>';
echo $span;		
echo '<p><input value="&#1060;&#1080;&#1083;&#1100;&#1090;&#1088;" id="Filtr_zadan"  onclick="filtr_fun('."'".zadan."'".')" type="button"/></p>' ;
include("filrt_zadan.php"); 
echo '<table width="100%"  border="2" align="center" cellpadding="0" cellspacing="0" bgcolor=#FFFFFF id="zadan_table">
<td><div align="center"><b></b></div></td>
<td><div align="center"><b>&#8470;, &#1044;&#1072;&#1090;&#1072;</b></div></td>
<td><div align="center"><b>&#1042;&#1080;&#1076; &#1084;&#1077;&#1088;&#1086;&#1087;&#1088;&#1080;&#1103;&#1090;&#1080;&#1103;</b></div></td>
<td><div align="center"><b>&#1057;&#1074;&#1077;&#1076;&#1077;&#1085;&#1080;&#1103; &#1086; &#1088;&#1077;&#1079;&#1091;&#1083;&#1100;&#1090;&#1072;&#1090;&#1072;&#1093; &#1084;&#1077;&#1088;&#1086;&#1087;&#1088;&#1080;&#1103;&#1090;&#1080;&#1103; &#1087;&#1086; &#1082;&#1086;&#1085;&#1090;&#1088;&#1086;&#1083;&#1102;</b></div></td>


<td width="9%" class="td_style_9"><div align="center"><b>&#1044;&#1077;&#1081;&#1089;&#1090;&#1074;&#1080;&#1077;</b></div></td>
</tr>

'.$buf1.'</table>';
echo $span;
}

?>
