<?php 
global $id_act_view;
not_find($text_load);
function not_find($text_load) {


$year=date('Y');
$col_end=$_POST['col_end'];

include_once("..\..\link\link.php");
	$page_q='SELECT  `page_length` FROM `workers` WHERE `id`="'.$_COOKIE['userid'].'"';
	$q_page=mysql_query ($page_q)or die (Mysql_error());
	while ($r_page = mysql_fetch_row($q_page))
 { if ($r_page[0]==""){}else{$page_length=$r_page[0];}}	

$text_q='SELECT  `act`.`num` ,  `act`.`date_act` ,  `act`.`address_id` ,  `act`.`obj_id` ,    `act`.`id`  ,  `link_act_workes`.`id_user` ,  `order`.`num_order` ,  `order`.`date_order`, `act`.`id` 
FROM act

LEFT JOIN  `link_act_workes` ON  `act`.`id` =  `link_act_workes`.`id_act` 
LEFT JOIN  `order` ON  `act`.`id_order` =  `order`.`id_order` 

  where act_year="'.$year.'" ORDER BY `act`.`num` DESC ';


$q_obj=mysql_query ($text_q)or die (Mysql_error());
$count=mysql_num_rows($q_obj);
$max_col=$count;
$page_count=floor($max_col/$page_length);
if (($max_col%$page_length)>0){$page_count=$page_count+1;}
for($x=1; $x<=($page_count);$x++){
$span=$span.'<input name="page_'.$x.'" align="center"  type="button" value="'.$x.'" onclick="page_length_fun('."'".$x."'".", 'act'".')"/>';
}


$end=$max_col-($page_length*$col_end);
$begin=$end+$page_length;
//echo $begin.' '.$end;
while ($r_obj = mysql_fetch_row($q_obj))
 {
 if (($count<=($begin)) and ($count>($end))){
 $i++;
 $adress="";
$t_q='SELECT  `city_zab`.`name` ,  `street_zab`.`name` ,  `address`.`house` ,  `address`.`housing` ,  `address`.`flat` 
FROM address
LEFT JOIN  `city_zab` ON  `address`.`id_city` =  `city_zab`.`id` 
LEFT JOIN  `street_zab` ON  `address`.`id_street` =  `street_zab`.`id`  where `address`.`id`="'.$r_obj[2].'"' ;
//echo $text_q;
$adr=mysql_query ($t_q);
while ($a_row = mysql_fetch_row($adr)) {
if($a_row[3]==""){$Housing="";}else{$Housing=', '.$a_row[3];}
if($a_row[4]==""){$flat="";}else{$flat=', '.$a_row[4];}
$adress=$address.'<p>'.iconv("utf-8","windows-1251",$a_row[0]).', '.iconv("utf-8","windows-1251",$a_row[1]).', '.$a_row[2].$Housing.$flat.'</p>';}
$obj_act="";
$t_q='SELECT  `Name_org` ,  `address_org_id` 
FROM  `complaints_obj` 
WHERE  `id` ="'.$r_obj[3].'"' ;
//echo $text_q;
$obj_q=mysql_query ($t_q);
while ($o_row = mysql_fetch_row($obj_q)) {
$obj_act=$obj_act.'<p>'.iconv("utf-8","windows-1251",$o_row[0]).', '.iconv("utf-8","windows-1251",$o_row[1]).'</p>';}
$v_act="";
$t_q='SELECT  `violation`.`NAME_CODE` ,  `type_violation`.`Name_type` ,  `name_obj_violation`.`name_obj`, `ID_violation` 
FROM violation
LEFT JOIN  `linc_act_violation` ON  `violation`.`ID_violation` =  `linc_act_violation`.`id_v` 
LEFT JOIN  `name_obj_violation` ON  `violation`.`ID_NAME_OBJ` =  `name_obj_violation`.`id` 
LEFT JOIN  `type_violation` ON  `violation`.`ID_TYPE_VIOLATION` =  `type_violation`.`Id_type_violation` 
WHERE  `linc_act_violation`.`id_act` ="'.$r_obj[8].'"' ;
//echo $text_q;
$v_q=mysql_query ($t_q);
while ($v_row = mysql_fetch_row($v_q)) {
if($v_row[2]==""){$o_v="";}else{$o_v=', '.iconv("utf-8","windows-1251",$v_row[2]);}
$v_act=$v_act.'<p>'.iconv("utf-8","windows-1251",$v_row[0]).' '.$o_v.': '.iconv("utf-8","windows-1251",$v_row[1]).'</p>';}

$u_act="";
$t_q='SELECT `FIO`FROM `workers` 
WHERE  `id` ="'.$r_obj[5].'"' ;
//echo $text_q;
$u_q=mysql_query ($t_q);
while ($u_row = mysql_fetch_row($u_q)) {
$u_act=$u_act.'<p>'.iconv("utf-8","windows-1251",$u_row[0]).'</p>';}

$pp='<tr><td>'.$r_obj[0].'</td><td>&#8470;'.iconv("utf-8","windows-1251",$r_obj[0]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r_obj[1])).'</td><td>&#8470;'.iconv("utf-8","windows-1251",$r_obj[6]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r_obj[7])).'</td><td>'.$adress.'</td><td>'.$obj_act.'</td><td>'.$v_act.'</td><td>'.$u_act.'</td><td><input   type="button" name="tab_button_obr" value="&#1055;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088;"  onclick="show_view('."'act', ".$r_obj[8].')" /></td></tr>';

//echo $pp;
$buf1=$buf1.$pp;
	} 
	$count--;
	}


$span='<table><tr><td width="25%">&#1042;&#1089;&#1077;&#1075;&#1086; &#1079;&#1072;&#1087;&#1080;&#1089;&#1077;&#1081; : <b>'.$max_col.'   </b><p>&#1050;&#1086;&#1083;&#1080;&#1095;&#1077;&#1089;&#1090;&#1074;&#1086; &#1089;&#1090;&#1088;&#1086;&#1082; <input align="left"  maxlength="3" size ="1"  type="text" id="page_col" value="'.$page_length.'" onkeyup="" /></p></td><td align="center">'.$span.'</td></tr></table>';
echo $span;		
echo '<p><input value="&#1060;&#1080;&#1083;&#1100;&#1090;&#1088;" id="Filtr_act"  onclick="filtr_act()" type="button"/></p>' ;
include("filrt_act.php"); 
echo '<table width="100%"  border="2" align="center" cellpadding="0" cellspacing="0" bgcolor=#FFFFFF id="act_table">
<td  height="46" class="td_style_1"><div align="center"><strong>&#8470;</strong></div></td>
<td class="td_style_2"><div align="center"><strong>&#1040;&#1082;&#1090;</strong></div></td>
<td  class="td_style_4"><div align="center"><b>&#1054;&#1089;&#1085;&#1086;&#1074;&#1072;&#1085;&#1080;&#1077; / &#1056;&#1072;&#1089;&#1087;&#1086;&#1088;&#1103;&#1078;&#1077;&#1085;&#1080;&#1077;</b></div></td>
<td class="td_style_5"><div align="center"><b>&#1040;&#1076;&#1088;&#1077;&#1089;</b></div></td>
<td  class="td_style_7"><div align="center"><b>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090; </b>
</div></td>
<td class="td_style_5"><div align="center"><b>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</b></div></td>
<td class="td_style_5"><div align="center"><b>&#1048;&#1085;&#1089;&#1087;&#1077;&#1082;&#1090;&#1086;&#1088; </b></div></td>
<td width="9%" class="td_style_9"><div align="center"><b>&#1044;&#1077;&#1081;&#1089;&#1090;&#1074;&#1080;&#1077;</b></div></td>
</tr>

'.$buf1.'</table>';
echo $span;
}

?>
