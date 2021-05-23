<?
$date_cr=date_create($_POST['date_rasp']);
$year=$date_cr->format('Y');
$basis=$_POST['basis_rasp'];
$date_start=$_POST['data_start'];
$date_stop=$_POST['date_stop'];
$id_u=$_COOKIE['userid'];
include_once("..\link\link.php");
$text='SELECT  `act`.`id` , `act`.`id_order` , `act`.`address_id` , `act`.`obj_id` 
FROM act
LEFT JOIN  `housing_supervision1`.`linc_act_violation` ON  `act`.`id` =  `linc_act_violation`.`id_act` 
WHERE  `act_year` =2019
AND (
`linc_act_violation`.`id_act` IS NULL
)
AND (
`linc_act_violation`.`id_v` IS NULL
)';

$q1=mysql_query ($text);
while ($r1 = mysql_fetch_row($q1)) 
{
echo '<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1072;&#1077;&#1084; &#1072;&#1082;&#1090; &#1089; &#1087;&#1091;&#1089;&#1090;&#1099;&#1084;&#1080; &#1089;&#1074;&#1103;&#1079;&#1103;&#1084;&#1080;'.$r1[0].'</p>';
$text2="SELECT  `link_order_violation`.`id_violation`  
FROM link_order_obj
LEFT JOIN  `housing_supervision1`.`link_order_address` ON  `link_order_obj`.`id` =  `link_order_address`.`id_link_order_obj` 
LEFT JOIN  `housing_supervision1`.`link_order_violation` ON  `link_order_address`.`id` =  `link_order_violation`.`id_address_link` 
WHERE  `link_order_obj`.`id_obj_c` =".$r1[3]." and  `link_order_address`.`id_address`=".$r1[2]." and   `link_order_obj`.`id_order`  =".$r1[1];
echo '<p>'.$text2.'</p>';
$q2=mysql_query ($text2);
while ($r2 = mysql_fetch_row($q2)) 
{
if($r2[0]==""){}else{
echo '<p>&#1053;&#1072;&#1093;&#1086;&#1076;&#1080;&#1084; &#1089;&#1074;&#1103;&#1079;&#1080;&#1080; &#1079;&#1072;&#1085;&#1086;&#1089;&#1080;&#1084; &#1080;&#1093; &#1074; &#1072;&#1082;&#1090; '.$r2[0].'</p>';
	update_size( $r1[0],$r2[0]);
	}
}				
}



function update_size( $a, $v){
echo '<p>INSERT INTO `linc_act_violation`(`id_act`, `id_v`) VALUES ("'.$a.'","'.$v.'")</p>';
$insert_tab=mysql_query ('INSERT INTO `linc_act_violation`(`id_act`, `id_v`) VALUES ("'.$a.'","'.$v.'")');
					
				
	
}
 

?>
