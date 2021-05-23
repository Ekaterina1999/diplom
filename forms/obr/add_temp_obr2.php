<?
$user_id=$_COOKIE[['userid'];
$obj=$_POST['obj'];
$city=$_POST['city'];
$street=$_POST['street'];
$house=$_POST['house'];
$housing=$_POST['korpus'];
$flat=$_POST['flat'];
$id_v=$_POST['id_v'];

$buf="";
include_once("..\link\link.php");
if (!mysql_query('SELECT * FROM obr_obj_id'.$user_id.'_user')){
mysql_query('create table IF NOT EXISTS obr_obj_id'.$user_id.'_user (     `id` int(11) NOT NULL AUTO_INCREMENT,
`id_obj` int(11) NOT NULL,
`id_city` int(11) NOT NULL,
`id_street` int(11) NOT NULL,
`house` int(11) NOT NULL,
`housing` varchar(3),
`flat` int(5),
`id_v` int(11) NOT NULL,
PRIMARY KEY (`id`)
                                                                            )'
);
}
if (($obj ==0)or( $city ==0)or($street ==0)or( $house =="")or($id_v ==0)){ echo ('&#1059;&#1082;&#1072;&#1079;&#1072;&#1085;&#1085;&#1099; &#1085;&#1077; &#1074;&#1089;&#1077; &#1076;&#1072;&#1085;&#1085;&#1099;&#1077; 
');
}else{
$insert_tab=mysql_query ('INSERT INTO  `obr_obj_id'.$user_id.'_user` (
					`id_obj` ,`id_city`,`id_street`,`house`,`housing`,`flat`,`id_v`)
					VALUES ( "'.$obj.'", "'.$city.'", "'.$street.'", "'.$house.'", "'.$housing.'", "'.$flat.'", "'.$id_v.'")',$db);}

$add_obj_tab=mysql_query ('select distinct id_obj
from obr_obj_id'.$user_id.'_user ');


while ($row_obj_tab = mysql_fetch_row($add_obj_tab))
{//5

			if ($row_obj_tab[0] == ""){}
						else{			$buf='<table width="100%" border="0"><tr><td>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090;</td>
<td>&#1040;&#1076;&#1088;&#1077;&#1089;</td><td>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</td></tr>';
			$name_obj_tab=mysql_query ('select id, Name_org
				from complaints_obj where id='.$row_obj_tab[0]);
				
				$buf=$buf.'<tr>';
				while ($row_obj_name = mysql_fetch_row($name_obj_tab)){
				$buf=$buf. '<td><p><input  type="checkbox" name="in_doc_base"  checked="true" value="'.	$row_obj_name[0].'" />'.$row_obj_name[1].'</p></td>';}
			$address_tab=mysql_query ('select distinct  id_city, id_street, house, housing, flat 
					from obr_obj_id'.$user_id.'_user where id_obj="'.$row_obj_tab[0].'"');
					while ($r_a_tab = mysql_fetch_row($address_tab))
						{
						$address_name=mysql_query('SELECT  `city_zab`.`name` , `street_zab`.`name` 
FROM street_zab
LEFT JOIN  `city_zab` ON  `street_zab`.`id_city` =  `city_zab`.`id` 
where `street_zab`.`id_city` ="'.$r_a_tab[0].'" and `street_zab`.`id` ="'.$r_a_tab[1].'"');
						while ($r_a_n = mysql_fetch_row($address_name))
						{$buf=$buf. '<td><p>'.$r_a_n[0].', '.$r_a_n[1].','.$r_a_tab[2].','.$r_a_tab[3].','.$r_a_tab[4].'</p></td>';}
						$v_a_tab=mysql_query ('select id_v 
					from obr_obj_id'.$user_id.'_user where id_obj="'.$row_obj_tab[1].'" and id_city="'.$r_a_tab[0].'" and id_street="'.$r_a_tab[1].'" and house="'.$r_a_tab[2].'" and housing="'.$r_a_tab[3].'" and flat="'.$r_a_tab[4].'"');
					while ($r_v_a_tab = mysql_fetch_row($v_a_tab))
						{$v_tab=mysql_query ('select Name_code
				from violation where ID_violation='.$r_v_a_tab[0]);
				
				while ($row_obj_name = mysql_fetch_row($v_tab)){}}
				
				
						}
				


$buf=$buf.'</tr>';
}$buf=$buf.'</table>';
}//5

echo $buf;


?>