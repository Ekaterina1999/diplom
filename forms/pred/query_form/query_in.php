<?php 
include_once("..\..\link\link.php");

$basis=$_POST['basis'];
switch ($basis){
case "1":
echo fun1();
break;

}

function fun1(){
include_once("..\..\link\link.php");
//echo  $_POST['date_p'].' '.$_POST['date_n'].' '.$_POST['date_plan'];
if(($_POST['date_p']=="")or($_POST['date_n']=="")or($_POST['date_plan']=="")){$max="";}else{
$id_u=$_POST['u_id'];
$date_p=date_create($_POST['date_p']);
$d=date_create($_POST['date_p']);
$year=$d->format('Y');
$date_n=date_create($_POST['date_n']);
$date_plan=date_create($_POST['date_plan']);
$treb_npa=$_POST['treb_npa'];

$text_q='SELECT max(`num`) FROM `caveat` where `year_caveat`="'.$year.'"' ;
//echo $text_q;
$r=mysql_query ($text_q);
while ($myrow = mysql_fetch_row($r)) {if ($myrow[0]==""){$max=1;}else {$max=$myrow[0]+1;}}
 
$in_t=mysql_query ('INSERT INTO `caveat` ( `num`, `date_caveat`, `year_caveat`, `legal_requirement`, `date_tenor`, `date_plan`,`id_user`) VALUES ("'.$max.'", "'.$date_p->format('Y-m-d').'", "'.$year.'",  "'.$treb_npa.'", "'.$date_n->format('Y-m-d').'", "'.$date_plan->format('Y-m-d').'","'.$id_u.'");');

$text_q='SELECT `id` FROM `caveat` where `year_caveat`="'.$year.'" and `num`= "'.$max.'" and `date_caveat`= "'.$date_p->format('Y-m-d').'" and `legal_requirement`= "'.$treb_npa.'"  and `date_tenor`= "'.$date_n->format('Y-m-d').'"  and `date_plan`= "'.$date_plan->format('Y-m-d').'" ';

$r1=mysql_query ($text_q);
while ($m_r = mysql_fetch_row($r1)) 
{
		if ($m_r[0]==""){}else {return $max;}
}}

  }  


?>