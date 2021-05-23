<?php 
function schet_rmw( $text_q, $date_name, $user_name, $year_name,$year_f, $date_rmw1, $date_rmw2, $sel_rmw){


if($year_name==""){$y="";}else{$y=' and '.$year_name.'="'.$year_f.'"';}
if ($sel_rmw=="0"){$where="";}else{

if($user_name==""){$where="";}else{
$where=' and '.$user_name.' in (SELECT id FROM  `workers` WHERE  `id_department` ='.$sel_rmw.')';}}
	$q=$text_q.' where '.$date_name.'>="'.$date_rmw1.'" and '.$date_name.'<="'.$date_rmw2.'"'.$y.$where;
//echo $q;
	$q_res=mysql_query ($q)or die (Mysql_error());
	while ($r = mysql_fetch_row($q_res))
 { 
 
 $p=$r[0];
 }	

//$p=$p.$q;
return $p;

}

?>
