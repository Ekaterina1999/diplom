<?php 
global $id_rasp_view;
not_find($text_load);
function not_find($text_load) {


$year=date('Y');
$col_end=$_POST['col_end'];

	include_once("..\..\link\link.php");
	$page_q='SELECT  `page_length` FROM `workers` WHERE `id`="'.$_COOKIE['userid'].'"';
	$q_page=mysql_query ($page_q)or die (Mysql_error());
	while ($r_page = mysql_fetch_row($q_page))
 { if ($r_page[0]==""){}else{$page_length=$r_page[0];}}	

$text_q='SELECT  `id_order` , `num_order` ,  `date_order` ,  `id_base` , `date_start` ,  `date_stop` ,    `num_approval` , `value_approval` 
FROM  `order` 
  where order_year="'.$year.'" ORDER BY `num_order` DESC ';


$q_obj=mysql_query ($text_q)or die (Mysql_error());
$count=mysql_num_rows($q_obj);
$max_col=$count;
$page_count=floor($max_col/$page_length);
if (($max_col%$page_length)>0){$page_count=$page_count+1;}
for($x=1; $x<=($page_count);$x++){
$span=$span.'<input name="page_'.$x.'" align="center"  type="button" value="'.$x.'" onclick="page_length_fun('."'".$x."'".", 'rasp'".')"/>';
}


$end=$max_col-($page_length*$col_end);
$begin=$end+$page_length;
//echo $begin.' '.$end;
while ($r_obj = mysql_fetch_row($q_obj))
 {
 if (($count<=($begin)) and ($count>($end))){
 $i++;
$p="";
switch ($r_obj[3]){

case"1": 
$text_q_p='SELECT `complaints`.`num_complaints`,`complaints`.`data_user_cr` FROM complaints JOIN `complaints_order` ON `complaints`.`Id` = `complaints_order`.`id_complaints` where `complaints_order`.`id_order`="'.$r_obj[0].'"';
$q_p=mysql_query ($text_q_p)or die (Mysql_error());
while ($r_p = mysql_fetch_row($q_p)){$p=iconv("utf-8","windows-1251",$r_p[0]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r_p[1]));}
$basis='&#1054;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1103; :'.$p; 
break;
case"2":
 $basis='&#1055;&#1083;&#1072;&#1085;&#1086;&#1074;&#1072;&#1103; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1072;';
  break;
case"3": 
$text_q_p='SELECT `ordinance`.`num`,`ordinance`.`Date_ordinance` FROM ordinance JOIN `order_ordinance` ON `ordinance`.`id` = `order_ordinance`.`id_ordinance` where `order_ordinance`.`id_order`="'.$r_obj[0].'"';

$q_p=mysql_query ($text_q_p)or die (Mysql_error());
while ($r_p = mysql_fetch_row($q_p)){$p=iconv("utf-8","windows-1251",$r_p[0]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r_p[1]));}
$basis='&#1055;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1072; &#1087;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1081; :'.$p;

 break;
case"4":
$basis='&#1055;&#1086; &#1090;&#1088;&#1077;&#1073;&#1086;&#1074;&#1072;&#1085;&#1080;&#1102; &#1087;&#1088;&#1086;&#1082;&#1091;&#1088;&#1072;&#1090;&#1091;&#1088;&#1099;';
 break;
case"5":
 $basis='&#1052;&#1086;&#1090;&#1080;&#1074;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1085;&#1086;&#1077; &#1087;&#1088;&#1077;&#1076;&#1089;&#1090;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077;';
  break;
}
if ($r_obj[6]==""){$approval="";}
else{
$approval=iconv("utf-8","windows-1251",$r_obj[6]);
if ( $r_obj[7]>"1"){
$tq_a='SELECT  `name`,`id` FROM `approval` WHERE `id`="'.$r_obj[7].'"';

$q_a=mysql_query ($tq_a)or die (Mysql_error());
while ($r_approval = mysql_fetch_row($q_a))
 {$val_approval=$r_approval[0];
 
 }

$approval=$approval.'<p>&#1085;&#1077; &#1089;&#1086;&#1075;&#1083;&#1072;&#1089;&#1086;&#1074;&#1072;&#1085;&#1086; : '.iconv("utf-8","windows-1251",$val_approval).'</p>';}else{$approval=$approval.'<p>&#1089;&#1086;&#1075;&#1083;&#1072;&#1089;&#1086;&#1074;&#1072;&#1085;&#1086;</p>';}
}

$pp='<tr><td>'.$r_obj[1].'</td><td>&#8470;'.iconv("utf-8","windows-1251",$r_obj[1]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r_obj[2])).'</td><td>'.$basis.'</td><td>'.date('d.m.Y',strtotime($r_obj[4])).'-'.date('d.m.Y',strtotime($r_obj[5])).'</td><td>'.$approval.'</td><td><input   type="button" name="tab_button_rasp" value="&#1055;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088;"  onclick="show_view('."'rasp', ".$r_obj[0].')" /></td></tr>';

//echo $pp;
$buf1=$buf1.$pp;
	} 
	$count--;
	}


$span='<table><tr><td width="25%">&#1042;&#1089;&#1077;&#1075;&#1086; &#1079;&#1072;&#1087;&#1080;&#1089;&#1077;&#1081; : <b>'.$max_col.'   </b><p>&#1050;&#1086;&#1083;&#1080;&#1095;&#1077;&#1089;&#1090;&#1074;&#1086; &#1089;&#1090;&#1088;&#1086;&#1082; <input align="left"  maxlength="3" size ="1"  type="text" id="page_col" value="'.$page_length.'" onkeyup="" /></p></td><td align="center">'.$span.'</td></tr></table>';
echo $span;		
echo '<p><input value="&#1060;&#1080;&#1083;&#1100;&#1090;&#1088;" id="Filtr_rasp"  onclick="filtr_rasp_rasp()" type="button"/></p>' ;
include("filrt_rasp.php"); 
echo '<table width="100%"  border="2" align="center" cellpadding="0" cellspacing="0" bgcolor=#FFFFFF id="rasp_table">
<td  height="46" class="td_style_1"><div align="center"><strong>&#8470;</strong></div></td>
<td class="td_style_2"><div align="center"><strong>&#1056;&#1072;&#1089;&#1087;&#1086;&#1088;&#1103;&#1078;&#1077;&#1085;&#1080;&#1077; </strong></div></td>
<td  class="td_style_4"><div align="center"><b>&#1054;&#1089;&#1085;&#1086;&#1074;&#1072;&#1085;&#1080;&#1077;</b></div></td>
<td class="td_style_5"><div align="center"><b>&#1057;&#1088;&#1086;&#1082;&#1080;</b></div></td>
<td  class="td_style_7"><div align="center"><b>&#1057;&#1086;&#1075;&#1083;&#1072;&#1089;&#1086;&#1074;&#1072;&#1085;&#1080;&#1077; &#1089; &#1087;&#1088;&#1086;&#1082;&#1091;&#1088;&#1072;&#1090;&#1091;&#1088;&#1086;&#1081; </b>
</div></td>
<td width="9%" class="td_style_9"><div align="center"><b>&#1044;&#1077;&#1081;&#1089;&#1090;&#1074;&#1080;&#1077;</b></div></td>
</tr>

'.$buf1.'</table>';
echo $span;
}

?>
