<?
$date_cr=date_create($_POST['date_rasp']);
$year=$date_cr->format('Y');
$basis=$_POST['basis_rasp'];
$date_start=$_POST['data_start'];
$date_stop=$_POST['date_stop'];
$id_u=$_COOKIE['userid'];
include_once("..\link\link.php");
$text='SELECT `id_viol`, `id_adr`, `id_obj`, `id_oder` FROM `temp_export`';

$q1=mysql_query ($text);
while ($r1 = mysql_fetch_row($q1)) 
{
	$text2= 'SELECT `link_order_address`.`id`,`link_order_violation`.`id` FROM link_order_obj
				LEFT JOIN `housing_supervision1`.`link_order_address`
				ON `link_order_obj`.`id` = `link_order_address`.`id_link_order_obj` 
				LEFT JOIN `housing_supervision1`.`link_order_violation` 
				ON `link_order_address`.`id` = `link_order_violation`.`id_address_link` 
				where `link_order_obj`.`id_order`="'.$r1[3].'" and
				`link_order_obj`.`id_obj_c`="'.$r1[2].'" and
				`link_order_address`.`id_address`="'.$r1[1].'" and
				`link_order_violation`.`id_violation`="'.$r1[0].'" ';
		//echo '<p>'.$text2.'</p>';
		$q2=mysql_query ($text2);
			if(!$q2 or !mysql_num_rows($q2)){
				$text3= 'SELECT distinct `link_order_address`.`id` FROM link_order_obj
				LEFT JOIN `housing_supervision1`.`link_order_address`
				ON `link_order_obj`.`id` = `link_order_address`.`id_link_order_obj` 
				LEFT JOIN `housing_supervision1`.`link_order_violation` 
				ON `link_order_address`.`id` = `link_order_violation`.`id_address_link` 
				where `link_order_obj`.`id_order`="'.$r1[3].'" and
				`link_order_obj`.`id_obj_c`="'.$r1[2].'" and
				`link_order_address`.`id_address`="'.$r1[1].'" ';
					//echo '<p>'.$text2.'</p>';
					$q3=mysql_query ($text3);
					while ($r3 = mysql_fetch_row($q3)) 
						{ echo'<p>`link_order_obj`.`id_order`="'.$r1[3].'" and
				`link_order_obj`.`id_obj_c`="'.$r1[2].'" and
				`link_order_address`.`id_address`="'.$r1[1].'" and
				`link_order_violation`.`id_violation`="'.$r1[0].'"</p>; ';
							if($r3[0]=="")
							{}else{add_link_order_v( $r3[0], $r1[0]);}
						}
				}else{echo ' not add  ';}
				
}



function add_link_order_v( $link, $v){

$insert_tab=mysql_query ('INSERT INTO  `link_order_violation` (
					`id_address_link` ,`id_violation`)
					VALUES ( "'. $link.'", "'.$v.'")');

					
				
	
}
 

?>