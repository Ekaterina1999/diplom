<?php

include_once("..\..\link\link.php");

$id_u=$_POST['u_id'];
$d=date_create($_POST['date_u']);
$year=$d->format('Y');
$date_u=($_POST['date_u']);
$date_m=$_POST['date_m'];
$time_m=$_POST['time_m'];
$basis_adm=$_POST['rasp_id_u'];

$text_q='SELECT max(`num`) FROM `notify` where `year_notify`="'.$year.'"' ;
//echo $text_q;
$r=mysql_query ($text_q);
while ($myrow = mysql_fetch_row($r)) {if ($myrow[0]==""){$max=1;}else {$max=$myrow[0]+1;}}
//echo $max;

$in_t=mysql_query ('INSERT INTO `notify` (`num`, `year_notify`, `date_notify`, `date_notify1`, `time_notify`, `id_order`) VALUES ("'.$max.'", "'.$year.'", "'.$date_u.'", "'.$date_m.'", "'.$time_m.'", "'.$basis_adm.'");');

$text_q='SELECT `id`, `num` FROM `notify` where `year_notify`="'.$year.'" and `num`= "'.$max.'" and `date_notify`= "'.$date_u.'" and `date_notify1`= "'.$date_m.'" and `time_notify`= "'.$time_m.'" and `id_order`= "'.$basis_adm.'" ';
// echo $text_q;
$r1=mysql_query ($text_q);
while ($m_r = mysql_fetch_row($r1)) 
{
		if ($m_r[0]==""){}else {$id=$m_r[0]; echo $m_r[1];}}

//$insert_tab3=mysql_query ('INSERT INTO  `link_u_protocol_workers` (`id_u_protocol` ,`id_user`)VALUES ( "'.$id.'", "'.$id_u.'")');}}
//return $max;
  
?>