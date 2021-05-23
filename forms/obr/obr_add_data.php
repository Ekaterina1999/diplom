<?

		include_once("..\link\link.php");
function add_complaints($n, $user_id, $n_c){
$y = date('Y');
$text_q=' select max(num_complaints), complaints_year from complaints where  complaints_year="'.$y.'" ';

if(!$q=mysql_query ($text_q)){$n_c=1;}else{
while ($r = mysql_fetch_row($q)){
if($r[0]==""){$n_c=1;}else{
$n_c=$r[0]+1;}}}
//	echo 'INSERT INTO  `complaints` (`num_complaints` ,`notice`,`complaints_year`, `data_user_cr`)	VALUES ( "'.$n_c.'", "'.iconv("utf-8","windows-1251",$n).'", "'.$y.'", "'.$user_id.'")';	
	
$insert_tab=mysql_query ('INSERT INTO  `complaints`  (
					`num_complaints` ,`notice`,`complaints_year`, `data_user_cr`)
					VALUES ( "'.$n_c.'", "'.$n.'", "'.$y.'", "'.$user_id.'")');
			
			
//add_obj($obj_check, $n_c, $adress_check);


					
					echo $n_c;
					
$text_q1=' select id, complaints_year from complaints where num_complaints="'.$n_c.'" and complaints_year="'.$y.'" ';

if(!$q1=mysql_query ($text_q1)){}else{
while ($r1 = mysql_fetch_row($q1)){			
	$n_c=$r1[0];}}	
	
	$insert_tab1=mysql_query ('INSERT INTO  `link_complaints_workers`  (
					`id_complants`, `id_workers`)
					VALUES ( "'.$n_c.'", "'.$user_id.'")');	
	
				
add_incoming($n_c);	
add_obj($n_c);				
}

function add_incoming($n_c){
$criterion="";
$idu=$_COOKIE['userid'];
$t_q='select   num_incoming, incoming_date from obr_incoming_id'.$idu.'_user where flag=1';
$q2=mysql_query ($t_q);
while ($r2 = mysql_fetch_row($q2)) 
{

 if($criterion=="") {$criterion='(num_incoming="'.$r2[0].'" and incoming_date="'.$r2[1].'")';}
else{ $criterion=$criterion.' or (num_incoming="'.$r2[0].'" and incoming_date="'.$r2[1].'")';}

$text_q1='select   num_incoming, incoming_date, id from incoming where num_incoming="'.$r2[0].'" and incoming_date="'.$r2[1].'"';
$q1=mysql_query ($text_q1);

if (!$q1 or !mysql_num_rows($q1)) {
$insert_tab=mysql_query ('INSERT INTO  `incoming` (					`num_incoming` ,`incoming_date`)VALUES ( "'.$r2[0].'", "'.$r2[1].'")');}
				
}
add_link_complaints( $n_c, $criterion);
			

}
function add_link_complaints( $n_c, $criterion){

$text_q='select id
from incoming where ('.$criterion.')';

$q=mysql_query ($text_q);
if ($q->num_rows){}else{

while ($r = mysql_fetch_row($q)){

$insert_tab=mysql_query ('INSERT INTO  `link_complaints` (
					`id_complaints` ,`id_incoming_c`)
					VALUES ( "'. $n_c.'", "'.$r[0].'")');
					
}
}
}

function add_obj($n_c){
$id_u=$_COOKIE['userid'];
$textQuery='select distinct  `id_obj`
from `obr_obj_id'.$id_u.'_user`  where `flag`=1 order by `id_obj`';
$q_obj=mysql_query ($textQuery);
while ($rowQ = mysql_fetch_row($q_obj)){


$insert_tab=mysql_query ('INSERT INTO  `link_complaints_obj` (
					`id_complaints` ,`id_obj_c`)
					VALUES ( "'. $n_c.'", "'.$rowQ[0].'")');
				
					 
					$text_q1='select  id, id_obj_c
from link_complaints_obj  where id_obj_c ="'.$rowQ[0].'" and  id_complaints="'.$n_c.'"';

$q2=mysql_query ($text_q1);
while ($r1 = mysql_fetch_row($q2)) 
					{
					if($r1[0]==""){}else{
					$id_obj=$r1[0];}
										}
				
$text_q2='select distinct   id_city, id_street, house, housing, flat, id_address
from obr_obj_id'.$id_u.'_user  where id_obj ="'.$rowQ[0].'" and  flag="1"';

$q2=mysql_query ($text_q2)or die (mysql_error());
while ($r2 = mysql_fetch_row($q2)){
if ($r2[0]==""){}else{
$city=$r2[0];
 $street=$r2[1];
  $house=$r2[2];
   $housing=$r2[3];
    $flat=$r2[4];
	$id_address_temp=$r2[5];


add_adress($city, $street, $house, $housing, $flat, $id_obj, $id_address_temp);
}
}

}//end while
}


function add_adress($city, $street, $house, $housing, $flat,$id_obj, $id_address_temp){

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


		



link_complaints_address($id_address,$id_obj,$id_address_temp);

}

function link_complaints_address($id_address,$id_obj,$id_address_temp)
{


$text_q='select  id
from link_complaints_address  where 	id_link_complaints_obj ="'.$id_obj.'" and  id_address="'.$id_address.'"';

$q=mysql_query ($text_q);
if (!$q or !($r=mysql_num_rows($q)) ) {
$insert_tab=mysql_query ('INSERT INTO  `link_complaints_address` (
					`id_link_complaints_obj` ,`id_address`)
					VALUES ( "'. $id_obj.'", "'.$id_address.'")');
	

	
					$text_q1='select  id
from link_complaints_address  where 	id_link_complaints_obj ="'.$id_obj.'" and  id_address="'.$id_address.'"';

$q1=mysql_query ($text_q1);
while ($r = mysql_fetch_row($q1)) 
					{	if ($r[0]==""){}else{
					$link=$r[0];}}
					
					}else{ while ($r = mysql_fetch_row($q)) 
					{	if ($r[0]==""){}else{
					$link=$r[0];}}} 

add_link_complaints_v( $link, $id_address_temp);
}

function add_link_complaints_v( $link, $id_address_temp){
$id_u=$_COOKIE['userid'];
$text_q_v='SELECT id_v FROM  `obr_obj_id'.$id_u.'_user` where id_address="'.$id_address_temp.'" and flag=1';

$q_v=mysql_query ($text_q_v);
while ($r_v = mysql_fetch_row($q_v)) 
{


$insert_tab=mysql_query ('INSERT INTO  `link_complaints_violation` (
					`id_address_link` ,`id_violation`)
					VALUES ( "'. $link.'", "'.$r_v[0].'")');

					
	}			
	
}
  
?>
