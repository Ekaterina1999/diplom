<?
$num_predpis_old=$_POST['num_predpis_old'];
$date_p=$_POST['date_p'];
$year=$_POST['year_predpis_old'];
$id_u=$_POST['u_id'];
include_once("..\link\link.php");

$textQuery='select id,date_predpis
from `predpis_old_obj_id'.$_COOKIE['userid'].'_user`  where `flag`=1';
$d_n=0;
$q_obj=mysql_query ($textQuery);
while ($rowQ = mysql_fetch_row($q_obj)){
if ($rowQ[0]==0){}else{$count_record++;}
if ($rowQ[1]==""){$d_n++;}
}	
 
if ($count_record==0 or $d_n>0){}else{
$result= add_obj($id_u);		
$text_in='INSERT INTO `act` (`act_year`, `num`, `date_act`, `id_order`, `address_id`, `obj_id`, `num_time`, `complaint_check`, `area`, `risc`, `risc_v`, `in_police`) VALUES ("'.$year.'", "0", "'.$date_p.'", "0", "'.$result[1].'", "'.$result[0].'", "0",  "0", "0", "0", "0", "0");';
$insert_tab=mysql_query ($text_in);
//echo $text_in;
$textQuery='select max(id) from `act`  where `act_year`="'.$year.'" and `num`="0" and `date_act`="'.$date_p.'" and `address_id`="'.$result[1].'" and `obj_id`="'.$result[0].'"';

$q_act=mysql_query ($textQuery);
//echo $textQuery;
while ($rowAct = mysql_fetch_row($q_act)){$id_act=$rowAct[0];}

$text_in='INSERT INTO `ordinance` ( `num`, `year_ordinance`, `Date_ordinance`,  `id_act`) VALUES ("'.$num_predpis_old.'", "'.$year.'", "'.$date_p.'","'.$id_act.'");';


$insert_tab=mysql_query ($text_in);

$text_q='SELECT `id` FROM `ordinance` where `year_ordinance`="'.$year.'" and `num`= "'.$num_predpis_old.'" and `Date_ordinance`= "'.$date_p.'"' ;

$r1=mysql_query ($text_q);
while ($m_r = mysql_fetch_row($r1)) 
{//1
		if ($m_r[0]==""){}else {$id=$m_r[0];}
		$insert_tab3=mysql_query ('INSERT INTO  `link_ordinance_workers` (`id_ordinance` ,`id_workers`)VALUES ( "'.$id.'", "'.$id_u.'")');
//echo $result[1].','.$id.','.$id_u;
 add_link_order_v($result[2],$id,$id_u);

}//1
	
	
	
	
/*

$text_in='INSERT INTO `order_ordinance`( `id_ordinance`, `id_order`, `id_user`) VALUES ("'.$id.'","'.$id_order.'","'.$id_u.'")';
$insert_tab=mysql_query ($text_in);*/





echo $num_predpis_old;
$drop_tab='DROP TABLE predpis_old_obj_id'.$_COOKIE['userid'].'_user';
$insert_tab3=mysql_query($drop_tab);
}//1


function add_obj($id_u){
$textQuery='select distinct  `id_obj`
from `predpis_old_obj_id'.$_COOKIE['userid'].'_user`  where `flag`=1  order by `id_obj`';
//echo $textQuery;
$q_obj=mysql_query ($textQuery);
while ($rowQ = mysql_fetch_row($q_obj)){
$id_obj=$rowQ[0];
		
				
$text_q2='select distinct   id_city, id_street, house, housing, flat, id_address
from predpis_old_obj_id'.$_COOKIE['userid'].'_user  where id_obj ="'.$rowQ[0].'" and  flag="1"';

$q2=mysql_query ($text_q2)or die (mysql_error());
while ($r2 = mysql_fetch_row($q2)){
if ($r2[0]==""){}else{
$city=$r2[0];
 $street=$r2[1];
  $house=$r2[2];
   $housing=$r2[3];
    $flat=$r2[4];
	
	$id_address_temp=$r2[5];
	$result[0]=$id_obj;
$result[1]=add_adress($city, $street, $house, $housing, $flat,$id_obj, $id_address_temp, $id_u);
$result[2]=$r2[5];

return $result;
}
}

}//end while
}


function add_adress($city, $street, $house, $housing, $flat,$id_obj, $id_address_temp, $id_u){

$text_q='select  `id`		from address  where  `id_city`=  "'.$city.'" 
		and `id_street`=   "'.$street.'" and `house`=  "'.$house.'"  and `housing`= "'.strval($housing).'"  		  and `flat`=   "'.$flat.'"';
	

$q=mysql_query ($text_q);
if (!$q or !($r=mysql_num_rows($q)) ) {


$insert_tab=mysql_query ('INSERT INTO  `address` (
					`id_city`, `id_street`, `house`, `housing`, `flat`)
					VALUES (  "'.$city.'", "'.$street.'", "'.$house.'" , "'.strval($housing).'", "'.$flat.'")');
					
					$text_q='select  `id`		from address  where  `id_city`=  "'.$city.'" 
		and `id_street`=   "'.$street.'" and `house`=  "'.$house.'"  and `housing`= "'.strval($housing).'"  		  and `flat`=   "'.$flat.'"';
	
$q1=mysql_query ($text_q);
while ($r = mysql_fetch_row($q1)) 
					{	if($r[0]==""){}else{
					$id_address=$r[0];}}
					}
					else{
					while ($r = mysql_fetch_row($q)) 
					{	if($r[0]==""){}else{
					$id_address=$r[0];}}
}
return $id_address;
//add_link_order_v($id_address, $id_u);
}

function add_link_order_v($id_address_temp,$id, $id_u){
$text_q_v='SELECT id_v, date_predpis FROM  `predpis_old_obj_id'.$_COOKIE['userid'].'_user` where id_address="'.$id_address_temp.'" and flag=1';
//echo $text_q_v;
$q_v=mysql_query ($text_q_v);
while ($r_v = mysql_fetch_row($q_v)) 
{


//$insert_tab=mysql_query ('INSERT INTO  `linc_act_violation` (`id_act` ,`id_v`)VALUES ( "'. $link.'", "'.$r_v[0].'")');


  
 $text_q_in='INSERT INTO `ordinance_violation` (`id_violation`,`id_ordinance`,`Date_plan`) VALUES ("'.$r_v[0].'", "'.$id.'","'.$r_v[1].'")';
//echo $text_q_in;
  $insert_tab2=mysql_query ($text_q_in);
			
	}			
	
}


?>