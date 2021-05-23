<?
$date_cr=date_create($_POST['date_rasp']);
$year=$date_cr->format('Y');
$basis=$_POST['basis_rasp'];
$date_start=$_POST['data_start'];
$date_stop=$_POST['date_stop'];
$id_u=$_COOKIE['userid'];
include_once("..\link\link.php");

if (($basiis=="")or($date_start=="")or($date_stop=="")){}{

switch ($basis) {
case 1:
if (($_POST['id_obr']=="")or($_POST['obj_id']=="")or($_POST['adr_mas']=="")or($_POST['viol_mas']=="")){
$data_null=0;} else{$data_null=1;}
     break;
case 3:
if (($_POST['id_predpis']=="")or($_POST['obj_id']=="")or($_POST['adr_id']=="")or($_POST['viol_mas']=="")){
$data_null=0;} else{$data_null=1;}
     break;	 
	 
	 case 2:
	 case 4:
	 case 5:
	 $count_record=0;
	 $textQuery='select *
from `rasp_obj_id'.$id_u.'_user`  where `flag`=1';

$q_obj=mysql_query ($textQuery);
while ($rowQ = mysql_fetch_row($q_obj)){
if ($rowQ[0]==0){}else{$count_record++;}
}	
 
if ($count_record==0){
$data_null=0;} else{$data_null=1;}

     break;
}

if ($data_null==0){}else{

$text_q='SELECT max(`num_order`) FROM `order` where `order_year`="'.$year.'"' ;
//echo $text_q;
$r=mysql_query ($text_q);
while ($myrow = mysql_fetch_row($r)) {
if ($myrow[0]==""){$max_num=1;}else {$max_num=$myrow[0]+1;}
}


switch ($basis) {
case 1:
case 5:
$num_approval=$_POST['num_approval'];
$otkaz=$_POST['otkaz'];
$procuror_v=$_POST['procuror_v'];
$v_procuror_v=$_POST['v_procuror_v'];
if ($procuror_v==0){$num_approval='NULL'; $val_approval="NULL";}else{$num_approval=$num_approval;
if ($v_procuror_v==1){$val_approval='1';}else{
$text_q1='SELECT `id` FROM `approval` where `name`="'.$otkaz.'"' ;
//echo $text_q1;
$q1=mysql_query ($text_q1);
while ($r1 = mysql_fetch_row($q1)) {
$val_approval=$r1[0];}}}
if ($procuror_v==""){$approval=0;}else{
	$approval=$procuror_v;}
break;
default: $num_approval='NULL'; $val_approval="NULL"; $approval=0;
break;
}
$insert_tab=mysql_query ("INSERT INTO  `order` (
`num_order` ,
`date_order` ,
`id_base` ,
`date_start` ,
`date_stop` ,
`order_year`, `num_approval`, `value_approval`,	`approval`
)
VALUES (
  '".$max_num."',  '".($date_cr->format('Y-m-d'))."',  '".$basis."',  '".$date_start."',  '".$date_stop."',  '".$year."',".$num_approval.", ".$val_approval.",".$approval."
)");

$add_rsp=mysql_query ('SELECT `id_order` FROM `order` WHERE  `num_order`="'.$max_num.'" and `order_year`="'.$year.'"');
//echo '<p>SELECT `id_order` FROM `order` WHERE  `num_order`="'.$max_num.'" and `order_year`="'.$year.'"</p>';
//echo 'SELECT `id_order` FROM `order` WHERE  `num_order`="'.$max_num.'" and `order_year`="'.$year.'"';
while ($row = mysql_fetch_row($add_rsp)) {
if ($row[0]==""){}else{$id_order=$row[0];}
}
//echo '<p>$id_order '.$id_order.'</p>';
switch ($basis) {
case 1:
Basis1($id_order);
echo $max_num;
    break;
case 3:
Basis3($id_order);
echo $max_num;
    break;	
 case 2:
 case 4:
 case 5:
Basis245($id_order);

echo $max_num;
     break;
}
}

if (mysql_query('select *
from `rasp_obj_id'.$id_u.'_user`')){
       $droup=mysql_query('DROP TABLE `rasp_obj_id'.$id_u.'_user`');
	//   echo('DROP TABLE `rasp_obj_id'.$id_u.'_user`');
    }

}
function Basis1($id_order){
//echo $id_order;
$id_obr=$_POST['id_obr'];
$user_id=$_POST['u_id'];
$id_obj=$_POST['obj_id'];
$id_address=$_POST['adr_mas'];
$id_v=$_POST['viol_mas'];
$insert_tab=mysql_query ('INSERT INTO  `complaints_order` (
`id_complaints` ,
`id_order` ,
`id_user`
)
VALUES (
 "'.$id_obr.'",  "'.$id_order.'",  "'.$user_id.'"
);');

	
	$insert_tab1=mysql_query ('INSERT INTO  `link_order_workers`  (
					`id_order`, `id_workers`)
					VALUES ( "'.$id_order.'", "'.$user_id.'")');




$insert_tab=mysql_query ('INSERT INTO  `link_order_obj` (
					`id_order` ,`id_obj_c`)
					VALUES ( "'. $id_order.'", "'.$id_obj.'")');	

				
$text_q='select  id
from link_order_obj  where 	id_order ="'.$id_order.'" and  id_obj_c="'.$id_obj.'"';


$q=mysql_query ($text_q);
while ($row = mysql_fetch_row($q)) {
if ($row==""){}else{
$x=0;						
for($x=0; $x<=(count($id_address)-1);$x++){	
$insert_tab=mysql_query ('INSERT INTO  `link_order_address` (
					`id_link_order_obj` ,`id_address`)
					VALUES ( "'. $row[0].'", "'.$id_address[$x].'")');
				
	
$text_q='select  id
from link_order_address  where 	id_link_order_obj ="'.$row[0].'" and  id_address="'.$id_address[$x].'"';
$q1=mysql_query ($text_q);
while ($row1 = mysql_fetch_row($q1)) {
if($row1==""){}else{
$y=0;						
for($y=0; $y<=(count($id_v[$x])-1);$y++){
$insert_tab=mysql_query ('INSERT INTO  `link_order_violation` (
					`id_address_link` ,`id_violation`)
					VALUES ( "'. $row1[0].'", "'.$id_v[$x][$y].'")');
				
					}
}
}
}
}					
	}		
	
}
  

function Basis3($id_order){
//echo $id_order;
$id_obr=$_POST['id_predpis'];
$user_id=$_POST['u_id'];
$id_obj=$_POST['obj_id'];
$id_address=$_POST['adr_id'];
$id_v=$_POST['viol_mas'];
$insert_tab=mysql_query ('INSERT INTO  `order_ordinance` (
`id_ordinance` ,
`id_order` ,
`id_user`
)
VALUES (
 "'.$id_obr.'",  "'.$id_order.'",  "'.$user_id.'"
);');

	
	$insert_tab1=mysql_query ('INSERT INTO  `link_order_workers`  (
					`id_order`, `id_workers`)
					VALUES ( "'.$id_order.'", "'.$user_id.'")');




$insert_tab=mysql_query ('INSERT INTO  `link_order_obj` (
					`id_order` ,`id_obj_c`)
					VALUES ( "'. $id_order.'", "'.$id_obj.'")');	

				
$text_q='select  id
from link_order_obj  where 	id_order ="'.$id_order.'" and  id_obj_c="'.$id_obj.'"';


$q=mysql_query ($text_q);
while ($row = mysql_fetch_row($q)) {
if ($row==""){}else{

$insert_tab=mysql_query ('INSERT INTO  `link_order_address` (
					`id_link_order_obj` ,`id_address`)
					VALUES ( "'. $row[0].'", "'.$id_address.'")');
				
	
$text_q='select  id
from link_order_address  where 	id_link_order_obj ="'.$row[0].'" and  id_address="'.$id_address.'"';
$q1=mysql_query ($text_q);
while ($row1 = mysql_fetch_row($q1)) {
if($row1==""){}else{
$y=0;						
for($y=0; $y<=(count($id_v)-1);$y++){
$insert_tab=mysql_query ('INSERT INTO  `link_order_violation` (
					`id_address_link` ,`id_violation`)
					VALUES ( "'. $row1[0].'", "'.$id_v[$y].'")');
				
					}

}
}
}					
	}		
	
}


function Basis245($id_order){
$user_id=$_POST['u_id'];

$insert_tab=mysql_query ('INSERT INTO  `complaints_order` (
`id_complaints` ,
`id_order` ,
`id_user`
)
VALUES (
 "'.$id_obr.'",  "'.$id_order.'",  "'.$user_id.'"
);');



	$insert_tab1=mysql_query ('INSERT INTO  `link_order_workers`  (
					`id_order`, `id_workers`)
					VALUES ( "'.$id_order.'", "'.$user_id.'")');

	add_obj($id_order);
	
}

//??????? ??? ?????????? ?????? ? ??????? link ??? ????????? 4 ? 5

function add_obj($id_order){
$id_u=$_COOKIE['userid'];
$textQuery='select distinct  `id_obj`
from `rasp_obj_id'.$id_u.'_user`  where `flag`=1 order by `id_obj`';
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
from rasp_obj_id'.$id_u.'_user  where id_obj ="'.$rowQ[0].'" and  flag="1"';

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


		



link_order_address($id_address,$id_obj,$id_address_temp);

}

function link_order_address($id_address,$id_obj,$id_address_temp)
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

add_link_order_v( $link, $id_address_temp);
}

function add_link_order_v( $link, $id_address_temp){
$id_u=$_COOKIE['userid'];
$text_q_v='SELECT id_v FROM  `rasp_obj_id'.$id_u.'_user` where id_address="'.$id_address_temp.'" and flag=1';

$q_v=mysql_query ($text_q_v);
while ($r_v = mysql_fetch_row($q_v)) 
{


$insert_tab=mysql_query ('INSERT INTO  `link_order_violation` (
					`id_address_link` ,`id_violation`)
					VALUES ( "'. $link.'", "'.$r_v[0].'")');

					
	}			
	
}
 

?>