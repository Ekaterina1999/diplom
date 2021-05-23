<?
$date_p=$_POST['date_p'];
$d=date_create($date_p);
$year=$d->format('Y');
$v_d=$_POST['v_d'];
$v_d1=$_POST['v_d1'];
$id_act=$_POST['id_act'];
$id_u=$_POST['u_id'];
include_once("..\link\link.php");



$text_q='SELECT max(`num`) FROM `ordinance` where `year_ordinance`="'.$year.'"' ;

$r=mysql_query ($text_q);
while ($myrow = mysql_fetch_row($r)) {if ($myrow[0]==""){$max_num=1;}else {$max_num=$myrow[0]+1;}}


$text_in='INSERT INTO `ordinance` ( `num`, `year_ordinance`, `Date_ordinance`,  `id_act`) VALUES ("'.$max_num.'", "'.$year.'", "'.$d->format('Y-m-d').'", "'.$id_act.'");';


$insert_tab=mysql_query ($text_in);

$text_q='SELECT `id` FROM `ordinance` where `year_ordinance`="'.$year.'" and `num`= "'.$max_num.'" and `Date_ordinance`= "'.$d->format('Y-m-d').'" and `id_act`= "'.$id_act.'"' ;

$r1=mysql_query ($text_q);
while ($m_r = mysql_fetch_row($r1)) 
{
		if ($m_r[0]==""){}else {$id=$m_r[0];
		$insert_tab3=mysql_query ('INSERT INTO  `link_ordinance_workers` (`id_ordinance` ,`id_workers`)VALUES ( "'.$id.'", "'.$id_u.'")');
	
		$text_q1='SELECT  `order_ordinance`.`id_ordinance` FROM act JOIN  `order` ON  `act`.`id_order` =  `order`.`id_order`  JOIN `order_ordinance` ON `order`.`id_order` = `order_ordinance`.`id_order` where `act`.`id` ="'.$id_act.'" and  `order`.`id_base`="3"';
		$r_3=mysql_query ($text_q1);
			while ($m_r1 = mysql_fetch_row($r_3)) {
				if ($m_r1[0]==""){}else 
					{ $text_q_in='INSERT INTO `reordinance` (`id_reordinance`,`id_ordinance`) VALUES ("'.$m_r1[0].'", "'.$id.'")';
					  $insert_tab2=mysql_query ($text_q_in);}  
			}

$x=0;
for ($x = 0; $x <= (count(v_d)+1); $x++) 
  { 
  
 $text_q_in='INSERT INTO `ordinance_violation` (`id_violation`,`id_ordinance`,`Date_plan`) VALUES ("'.$v_d[$x].'", "'.$id.'","'.$v_d1[$x].'")';
//echo $text_q_in.' '.count(val_data);
  $insert_tab2=mysql_query ($text_q_in);
} 


echo $max_num;
}
}



?>