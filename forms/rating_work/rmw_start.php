
<?php 



$date_rmw1=$_POST['date_rmw1'];
$date_rmw2=$_POST['date_rmw2'];
$sel_rmw=$_POST['sel_rmw'];
 if ($sel_rmw=="0"){$depart="";}else{$depart=" and `id_department` in (0, ".$sel_rmw.')';}
include_once("..\link\link.php");
	$q='SELECT `id`, `FIO`, `position` FROM `workers` WHERE `active` = "0"  '.$depart.' order by `FIO`';
//	echo $q;

	$q_res=mysql_query ($q)or die (Mysql_error());
	while ($r = mysql_fetch_row($q_res))
 { 

  $p1=schet_rw($r[0],$date_rmw1, $date_rmw2, $sel_rmw);

 $pp=$pp."<tr><td>".iconv("utf-8","windows-1251",$r[1])."</td><td>".iconv("utf-8","windows-1251",$r[2])."</td>".$p1."</tr>";
 }	






	


$span='<table border="2" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="92" width="187">&#1060;&#1048;&#1054;</td>
    <td width="124">&#1044;&#1086;&#1083;&#1078;&#1085;&#1086;&#1089;&#1090;&#1100;</td>
   
   
    <td width="117">&#1056;&#1072;&#1089;&#1087;&#1086;&#1088;&#1103;&#1078;&#1077;&#1085;&#1080;&#1103;</td>
    
    <td width="64">&#1055;&#1088;&#1077;&#1076;&#1086;&#1089;&#1090;&#1077;&#1088;&#1077;&#1078;&#1077;&#1085;&#1080;&#1103;</td>
    <td width="64">&#1040;&#1082;&#1090;&#1099;&nbsp;</td>
    <td width="100">&#1055;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1077;</td>
    
    <td width="76">&#1055;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083;</td>
	<td>   &#1047;&#1072;&#1076;&#1072;&#1085;&#1080;&#1103;</td>
  </tr>
'.$pp.'</table>';
echo $span;		

//echo "FFFFFFFF";


function schet_rw($user_id, $date_rmw1, $date_rmw2, $sel_rmw){

	$t_q='SELECT count(*) FROM `order` WHERE `id_order` in(SELECT `id_order` FROM `link_order_workers` WHERE `id_workers`="'.$user_id.'") and `date_order`<="'.$date_rmw2.'" and `date_order`>="'.$date_rmw1.'"';
//	echo $q;

	$q_r=mysql_query ($t_q)or die (Mysql_error());
	while ($r1 = mysql_fetch_row($q_r))
 { 
$p1='<td>'.$r1[0].'</td>';

 }	
	
 	$t_q='SELECT count(*)FROM `caveat` WHERE `id_user`="'.$user_id.'" and `date_caveat`<="'.$date_rmw2.'" and `date_caveat`>="'.$date_rmw1.'"';
//	echo $q;

	$q_r=mysql_query ($t_q)or die (Mysql_error());
	while ($r1 = mysql_fetch_row($q_r))
 { 
$p3='<td>'.$r1[0].'</td>';

 }
 
 	$t_q='SELECT count(*) FROM `act` WHERE `id` in(SELECT `id_act` FROM `link_act_workes` WHERE `id_user`="'.$user_id.'") and `date_act`<="'.$date_rmw2.'" and `date_act`>="'.$date_rmw1.'"';
//	echo $q;

	$q_r=mysql_query ($t_q)or die (Mysql_error());
	while ($r1 = mysql_fetch_row($q_r))
 { 
$p4='<td>'.$r1[0].'</td>';

 }	
 
  	$t_q='SELECT count(*) FROM `ordinance` WHERE `id` in(SELECT `id_ordinance` FROM `link_ordinance_workers` WHERE `id_workers`="'.$user_id.'") and `Date_ordinance`<="'.$date_rmw2.'" and `Date_ordinance`>="'.$date_rmw1.'"';
//	echo $q;

	$q_r=mysql_query ($t_q)or die (Mysql_error());
	while ($r1 = mysql_fetch_row($q_r))
 { 
$p5='<td>'.$r1[0].'</td>';

 }	
  

 
 $t_q='SELECT count(*) from `protocol` WHERE `id_notify` in(SELECT `id_u_protocol` FROM `link_u_protocol_workers` WHERE `id_user`="'.$user_id.'") and `Date_protocol`<="'.$date_rmw2.'" and `Date_protocol`>="'.$date_rmw1.'"';

	$q_r=mysql_query ($t_q)or die (Mysql_error());
	while ($r1 = mysql_fetch_row($q_r))
 { 
$p7='<td>'.$r1[0].'</td>';

 }
 
  
 $t_q='SELECT count(*) from `tasks` WHERE `id` in(SELECT `id_tasks` FROM `link_task_workes` WHERE  `id_user`="'.$user_id.'") and `date_tasks`<="'.$date_rmw2.'" and `date_tasks`>="'.$date_rmw1.'"';

	$q_r=mysql_query ($t_q)or die (Mysql_error());
	while ($r1 = mysql_fetch_row($q_r))
 { 
$p6='<td>'.$r1[0].'</td>';

 }
 
 $p_rw=$p1.$p3.$p4.$p5.$p7.$p6;
return $p_rw;

}

?>
