<?
$num_predpis_old=$_POST['num_predpis_old'];
$date_p=$_POST['date_p'];
$year=$_POST['year_predpis_old'];
$id_u=$_POST['u_id'];
include_once("..\link\link.php");

$textQuery='select id,date_predpis
from `predpis_old_obj_id'.$id_u.'_user`  where `flag`=1';
$d_n=0;
$q_obj=mysql_query ($textQuery);
while ($rowQ = mysql_fetch_row($q_obj)){
if ($rowQ[0]==0){}else{$count_record++;}
if ($rowQ[1]==""){$d_n++;}
}	
 
if ($count_record==0 or $d_n>0){}else{

$text_in='INSERT INTO `ordinance` ( `num`, `year_ordinance`, `Date_ordinance`,  `id_act`) VALUES ("'.$num_predpis_old.'", "'.$year.'", "'.$date_p.'", NULL);';


$insert_tab=mysql_query ($text_in);

$text_q='SELECT `id` FROM `ordinance` where `year_ordinance`="'.$year.'" and `num`= "'.$num_predpis_old.'" and `Date_ordinance`= "'.$date_p.'"' ;

$r1=mysql_query ($text_q);
while ($m_r = mysql_fetch_row($r1)) 
{//1
		if ($m_r[0]==""){}else {$id=$m_r[0];}
		$insert_tab3=mysql_query ('INSERT INTO  `link_ordinance_workers` (`id_ordinance` ,`id_workers`)VALUES ( "'.$id.'", "'.$id_u.'")');

$insert_tab=mysql_query ("INSERT INTO  `order` (`num_order` ,`date_order` ,`id_base` ,`date_start` ,`date_stop` ,`order_year`, `num_approval`, `value_approval`,	`approval`)
VALUES ('0',  '".$date_p."',  '3',  '".$date_p."',  '".$date_p."',  '".$year."',NULL, NULL,'0')");

}//1
	
	
	
	
$textQuery='select max(id_order)
from `order`  where `num_order` ="0" and date_order="'.$date_p.'" and date_start="'.$date_p.'" and  date_stop="'.$date_p.'" and order_year="'.$year.'"';
$q_order=mysql_query ($textQuery);
while ($row_o = mysql_fetch_row($q_order)){
if ($row_o[0]==0){}else{$id_order=$row_o[0];}
}	

$text_in='INSERT INTO `order_ordinance`( `id_ordinance`, `id_order`, `id_user`) VALUES ("'.$id.'","'.$id_order.'","'.$id_u.'")';
$insert_tab=mysql_query ($text_in);


 add_obj($id_order,$id, $id_u);	


echo $num_predpis_old;
}//1


function add_obj($id_order,$id, $id_u){
$textQuery='select distinct  `id_obj`
from `predpis_old_obj_id'.$id_u.'_user`  where `flag`=1  order by `id_obj`';
echo $textQuery;
$q_obj=mysql_query ($textQuery);
while ($rowQ = mysql_fetch_row($q_obj)){


$insert_tab=mysql_query ('INSERT INTO  `link_order_obj` (
					`id_order` ,`id_obj_c`)
					VALUES ( "'. $id_order.'", "'.$rowQ[0].'")');
				
					 
					$text_q1='select  id, id_obj_c
from link_order_obj  where id_obj_c ="'.$rowQ[0].'" and  id_order="'.$id_order.'"';

$q2=mysql_query ($text_q1);
while ($r1 = mysql_fetch_row($q2)) 
					{
					if($r1[0]==""){}else{
					$id_obj=$r1[0];}
										}
				
$text_q2='select distinct   id_city, id_street, house, housing, flat, id_address
from predpis_old_obj_id'.$id_u.'_user  where id_obj ="'.$rowQ[0].'" and  flag="1"';

$q2=mysql_query ($text_q2)or die (mysql_error());
while ($r2 = mysql_fetch_row($q2)){
if ($r2[0]==""){}else{
$city=$r2[0];
 $street=$r2[1];
  $house=$r2[2];
   $housing=$r2[3];
    $flat=$r2[4];
	$id_address_temp=$r2[5];


add_adress($city, $street, $house, $housing, $flat, $id_obj, $id_address_temp,$id, $id_u);
}
}

}//end while
}


function add_adress($city, $street, $house, $housing, $flat,$id_obj, $id_address_temp,$id, $id_u){

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


		



link_order_address($id_address,$id_obj,$id_address_temp,$id, $id_u);

}

function link_order_address($id_address,$id_obj,$id_address_temp,$id, $id_u)
{


$text_q='select  id
from link_order_address  where 	id_link_order_obj ="'.$id_obj.'" and  id_address="'.$id_address.'"';

$q=mysql_query ($text_q);
if (!$q or !($r=mysql_num_rows($q)) ) {
$insert_tab=mysql_query ('INSERT INTO  `link_order_address` (
					`id_link_order_obj` ,`id_address`)
					VALUES ( "'. $id_obj.'", "'.$id_address.'")');
	

	
					$text_q1='select  id
from link_order_address  where 	id_link_order_obj ="'.$id_obj.'" and  id_address="'.$id_address.'"';

$q1=mysql_query ($text_q1);
while ($r = mysql_fetch_row($q1)) 
					{	if ($r[0]==""){}else{
					$link=$r[0];}}
					
					}else{ while ($r = mysql_fetch_row($q)) 
					{	if ($r[0]==""){}else{
					$link=$r[0];}}} 

add_link_order_v( $link, $id_address_temp,$id, $id_u);
}

function add_link_order_v( $link, $id_address_temp,$id, $id_u){
$text_q_v='SELECT id_v, date_predpis FROM  `predpis_old_obj_id'.$id_u.'_user` where id_address="'.$id_address_temp.'" and flag=1';

$q_v=mysql_query ($text_q_v);
while ($r_v = mysql_fetch_row($q_v)) 
{


$insert_tab=mysql_query ('INSERT INTO  `link_order_violation` (
					`id_address_link` ,`id_violation`)
					VALUES ( "'. $link.'", "'.$r_v[0].'")');


  
 $text_q_in='INSERT INTO `ordinance_violation` (`id_violation`,`id_ordinance`,`Date_plan`) VALUES ("'.$r_v[0].'", "'.$id.'","'.$r_v[1].'")';

  $insert_tab2=mysql_query ($text_q_in);
			
	}			
	
}


?>