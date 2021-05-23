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
}

function fun1(){

$id_u=$_POST['u_id'];
$date_p=$_POST['date_p'];
$d=date_create($date_p);
$year=$d->format('Y');
$adm=($_POST['adm']);

$id_uved=$_POST['id_uved'];
if($_POST['dop']=="")
{$dop=" NULL "; $where="";}else
{$dop='"'.$_POST['dop'].'"';
 $where=' and `additionally`= "'.$_POST['dop'].'"';}

$text_q='SELECT max(`num`) FROM `protocol` where `year_protocol`="'.$year.'"' ;

$r=mysql_query ($text_q);
while ($myrow = mysql_fetch_row($r)) {if ($myrow[0]==""){$max=1;}else {$max=$myrow[0]+1;}}
 
$in_t=mysql_query ('INSERT INTO `protocol` (`num`, `year_protocol`, `Date_protocol`, `article`, `additionally`, `id_notify`) VALUES ("'.$max.'", "'.$year.'", "'.$date_p.'", "'.$adm.'", '.$dop.', "'.$id_uved.'");');

$text_q='SELECT `id` FROM `protocol` where `year_protocol`="'.$year.'" and `num`= "'.$max.'" and `Date_protocol`= "'.$date_p.'" and `article`= "'.$adm.'"  and `id_notify`= "'.$id_uved.'" '.$where;

$r1=mysql_query ($text_q);
while ($m_r = mysql_fetch_row($r1)) 
{
		if ($m_r[0]==""){}else {$id=$m_r[0];

$insert_tab3=mysql_query ('INSERT INTO  `link_protocol_workers` (`id_protocol` ,`id_user`)VALUES ( "'.$id.'", "'.$id_u.'")');}}

return $max;
  }  

function fun2(){
$uved=$_POST['uved'];
$val1='<table border="2"><tr><td>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090; (&#1059;&#1050;, &#1058;&#1057;&#1046; &#1080; &#1090;.&#1076;.) </td><td>&#1040;&#1076;&#1088;&#1077;&#1089; &#1091;&#1082;&#1072;&#1079;&#1072;&#1085;&#1085;&#1099;&#1081; &#1074; &#1072;&#1082;&#1090;&#1077; </td></tr>';

$Q_t='SELECT  `complaints_obj`.`Name_org` ,  `complaints_obj`.`license` ,  `complaints_obj`.`ogrn` ,  `complaints_obj`.`inn` ,  `complaints_obj`.`address_org_id` ,  `complaints_obj`.`address_fact` , `complaints_obj`.`micro_org` ,  `city_zab`.`name` ,  `street_zab`.`name` ,  `address`.`house` ,  `address`.`housing` ,  `address`.`flat` 
FROM `notify_protocol`
left join `act` on `act`.id=`notify_protocol`.`id_act`
LEFT JOIN  `address` ON  `act`.`address_id` =  `address`.`id` 
LEFT JOIN  `city_zab` ON  `address`.`id_city` =  `city_zab`.`id` 
LEFT JOIN  `street_zab` ON  `address`.`id_street` =  `street_zab`.`id` 
LEFT JOIN  `complaints_obj` ON  `act`.`obj_id` =  `complaints_obj`.`id` 
WHERE  `notify_protocol`.`id` ="'.$uved.'" ';
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

?>