<?
$date_p=$_POST['date_p'];
$d=date_create($date_p);
$year=$d->format('Y');
$depart=$_POST['depart'];
$vv=$_POST['vv'];
$rasp_id=$_POST['rasp_id'];
$address_id=$_POST['address_id'];
$obj_id=$_POST['obj_id'];
$num_time=$_POST['num_time'];
$size_recalculation=$_POST['size_recalculation'];
$area=$_POST['area'];
$in_police=$_POST['in_police'];
$v=$_POST['v_li'];
$predpis=$_POST['predpis'];
$risc=$_POST['risc'];
$risc_v=$_POST['risc_v'];
$recalculation_charge=$_POST['recalculation_charge'];

$id_u=$_POST['u_id'];
$covid=$_POST['covid'];
//echo $covid;
include_once("..\link\link.php");
 if ($covid=="1"){$f_covid=", `not_carried_out`"; $v_covid=',"1"';}else{$f_covid="";$v_covid="";}
if (($vv==1)and ($v=="")){}else{

$text_q='SELECT max(`num`) FROM `act` where `act_year`="'.$year.'"' ;

$r=mysql_query ($text_q);
while ($myrow = mysql_fetch_row($r)) {
if ($myrow[0]==""){$max_num=1;}else {$max_num=$myrow[0]+1;}
}

switch($depart){
case(1):
$text_in='INSERT INTO `act` (`act_year`, `num`, `date_act`, `id_order`, `address_id`, `obj_id`, `num_time`, `complaint_check`, `area`, `risc`, `risc_v`, `in_police`'.$f_covid.') VALUES ("'.$year.'", "'.$max_num.'", "'.$date_p.'", "'.$rasp_id.'", "'.$address_id.'", "'.$obj_id.'", "'.$num_time.'",  "'.$predpis.'", "'.$area.'", "'.$risc.'", "'.$risc_v.'", "'.$in_police.'"'.$v_covid.');';
break;
case(2):
$text_in='INSERT INTO `act` (`act_year`, `num`, `date_act`, `id_order`, `address_id`, `obj_id`, `num_time`, `complaint_check`,  `in_police`, `size_recalculation`,  `recalculation_charge`'.$f_covid.') VALUES  ("'.$year.'", "'.$max_num.'", "'.$date_p.'", "'.$rasp_id.'", "'.$address_id.'", "'.$obj_id.'", "'.$num_time.'",  "'.$predpis.'", "'.$in_police.'", "'.size_recalculation.'",  "'.$recalculation_charge.'"'.$v_covid.');';
break;

}
//echo $text_in;
$insert_tab=mysql_query ($text_in);

$text_q='SELECT `id` FROM `act` where `act_year`="'.$year.'" and `num`= "'.$max_num.'" and `date_act`= "'.$date_p.'" and `id_order`= "'.$rasp_id.'" and `address_id` ="'.$address_id.'" and  `obj_id` ="'.$obj_id.'" and `num_time`= "'.$num_time.'"' ;
//echo $text_q;
$r1=mysql_query ($text_q);
while ($m_r = mysql_fetch_row($r1)) {
if ($m_r[0]==""){$id=1;}else {$id=$m_r[0];}
}

if ($predpis=="1"){
$t_q='SELECT `id`, `id_ordinance`,  `id_user` FROM `order_ordinance` WHERE `id_order`= "'.$rasp_id.'"' ;
//echo $text_q;
$ex=mysql_query ($t_q);
while ($ex_r = mysql_fetch_row($ex)) {
if ($ex_r[0]==""){}else {
$update_tab=mysql_query ('UPDATE `ordinance_violation` SET `eliminated`="1", `Date_execution`="'.$date_p.'" WHERE `id_ordinance`="'.$ex_r[1].'"');
$t_q1='SELECT `id`, `id_reordinance` FROM `reordinance` WHERE `id_ordinance`="'.$ex_r[1].'" ';
$ex1=mysql_query ($t_q1);
while ($ex_r1 = mysql_fetch_row($ex1)) {$update_tab=mysql_query ('UPDATE `ordinance_violation` SET `eliminated`="1", `Date_execution`="'.$date_p.'" WHERE `id_ordinance`="'.$ex_r1[1].'"');}
}
}



}

$insert_tab3=mysql_query ('INSERT INTO  `link_act_workes` (`id_act` ,`id_user`)VALUES ( "'.$id.'", "'.$id_u.'")');
if ($vv==1){



$x=0;
for ($x = 0; $x <= (count($v)-1); $x++) 
  { 
  
  $text_q_in='INSERT INTO `linc_act_violation` ( `id_act`, `id_v`) VALUES ( "'.$id.'","'.$v[$x].'")';
  $insert_tab2=mysql_query ($text_q_in);
} 
}
echo $max_num;

}
?>