<?php

include_once("..\..\link\link.php");
$basis=$_POST['basis'];

switch ($basis){
case "1":
echo fun1();
break;
case "2":
echo fun2();
break;
case "3":
echo fun3();
break;
}
function fun1(){
$val_order= $_POST['val_order'];
$Q_t='SELECT  `order_ordinance`.`id_ordinance` ,     `ordinance`.`num` ,  `ordinance`.`Date_ordinance` 
FROM order_ordinance
 JOIN  `ordinance` ON  `order_ordinance`.`id_ordinance` =  `ordinance`.`id`  where`order_ordinance`.`id_order`  ="'.$val_order.'" ';
$q=mysql_query ($Q_t) or die (mysql_error());
$num_q=mysql_num_rows($q);
while ($r = mysql_fetch_row($q)) 
{
$p=$p.'<p val="'.$r[0].'" id="predpis_val">'.iconv("utf-8","windows-1251",$r[1]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r[2])).'</p>';

}
return $p;
}

function fun2(){
$act=$_POST['act'];
$val1='<table border="2"><tr><td>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090; (&#1059;&#1050;, &#1058;&#1057;&#1046; &#1080; &#1090;.&#1076;.) </td><td>&#1040;&#1076;&#1088;&#1077;&#1089; &#1091;&#1082;&#1072;&#1079;&#1072;&#1085;&#1085;&#1099;&#1081; &#1074; &#1072;&#1082;&#1090;&#1077; </td></tr>';

$Q_t='SELECT  `complaints_obj`.`Name_org` ,  `complaints_obj`.`license` ,  `complaints_obj`.`ogrn` ,  `complaints_obj`.`inn` ,  `complaints_obj`.`address_org_id` ,  `complaints_obj`.`address_fact` , `complaints_obj`.`micro_org` ,  `city_zab`.`name` ,  `street_zab`.`name` ,  `address`.`house` ,  `address`.`housing` ,  `address`.`flat` 
FROM act
LEFT JOIN  `address` ON  `act`.`address_id` =  `address`.`id` 
LEFT JOIN  `city_zab` ON  `address`.`id_city` =  `city_zab`.`id` 
LEFT JOIN  `street_zab` ON  `address`.`id_street` =  `street_zab`.`id` 
LEFT JOIN  `complaints_obj` ON  `act`.`obj_id` =  `complaints_obj`.`id` 
WHERE  `act`.`id` ="'.$act.'" ';
//echo $Q_t;
$q=mysql_query ($Q_t) or die (mysql_error());
$num_q=mysql_num_rows($q);
while ($r = mysql_fetch_row($q)) 
{
if ($r[1]=="0"){$lic="";}else{$lic="<p>&#1051;&#1080;&#1094;&#1077;&#1085;&#1079;&#1080;&#1072;&#1090;</p>";}
if ($r[10]==""){$housing="";}else{$housing=", ".iconv("utf-8","windows-1251",$r[10]);}
if ($r[11]=="0"){$flat="";}else{$flat=', '.iconv("utf-8","windows-1251",$r[11]);}


$val=$val.'<tr><td><p>'.iconv("utf-8","windows-1251",$r[0]).'</p>'.$lic.'<p> &#1048;&#1053;&#1053; :'.iconv("utf-8","windows-1251",$r[3]).'</p><p> &#1054;&#1043;&#1056;&#1053; :'.iconv("utf-8","windows-1251",$r[3]).'</p></td><td>'.iconv("utf-8","windows-1251",$r[7]).', '.iconv("utf-8","windows-1251",$r[8]).', '.iconv("utf-8","windows-1251",$r[9]).$housing.$flat.'</td></tr>';

}
if($val!==""){
$val1=$val1.$val.'</table>';
return $val1;}
  }
  
  
function fun3(){
$id_u=$_POST['u_id'];
$d=date_create($_POST['date_u']);
$year=$d->format('Y');
$date_u=($_POST['date_u']);
$date_m=$_POST['date_m'];
$time_m=$_POST['time_m'];
$id_act=$_POST['id_act'];
$basis_adm=$_POST['basis_adm'];
if($_POST['predpis']=="")
{$ordinance=" NULL "; $where="";}else
{$ordinance='"'.$_POST['predpis'].'"';
 $where=' and `id_ordinance`= "'.$_POST['predpis'].'"';}

$text_q='SELECT max(`num`) FROM `notify_protocol` where `year_u_protocol`="'.$year.'"' ;

$r=mysql_query ($text_q);
while ($myrow = mysql_fetch_row($r)) {if ($myrow[0]==""){$max=1;}else {$max=$myrow[0]+1;}}

$in_t=mysql_query ('INSERT INTO `notify_protocol` (`num`, `year_u_protocol`, `date_notify`, `date_plan_protocol`, `time_plan_protool`, `id_act`, `base_adm_viol`, `id_ordinance`) VALUES ("'.$max.'", "'.$year.'", "'.$date_u.'", "'.$date_m.'", "'.$time_m.'", "'.$id_act.'", "'.$basis_adm.'", '.$ordinance.');');

$text_q='SELECT `id` FROM `notify_protocol` where `year_u_protocol`="'.$year.'" and `num`= "'.$max.'" and `date_notify`= "'.$date_u.'" and `date_plan_protocol`= "'.$date_m.'" and `time_plan_protool`= "'.$time_m.'" and `id_act`= "'.$id_act.'" and `base_adm_viol`= "'.$basis_adm.'" '.$where;
 //echo $text_q;
$r1=mysql_query ($text_q);
while ($m_r = mysql_fetch_row($r1)) 
{
		if ($m_r[0]==""){}else {$id=$m_r[0];

$insert_tab3=mysql_query ('INSERT INTO  `link_u_protocol_workers` (`id_u_protocol` ,`id_user`)VALUES ( "'.$id.'", "'.$id_u.'")');}}
return $max;
  }  
?>