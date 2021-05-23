<?
function insert_obr_base_obj($l_obj , $l_city ,$l_street , $house , $housing ,	$flat ,$violate ,$_user_id, $buf) {//1
 
  $l_obj = $_POST['l_obj'];
					$l_city = $_POST['l_city'];
					$l_street = $_POST['l_street'];
					$house = $_POST['house'];
                    $housing = $_POST['housing'];
					$flat = $_POST['flat'];
					$violate = $_POST['v'];
 echo 'obj'.$l_obj .' '. $l_city .' '.$l_street .' '. $house .' '. $housing .' '.	$flat .' '.$violate .' '.$_user_id;
 $user_id=1;
$buf=$select_incoming;
include_once("..\..\link\link.php");
/*if (($l_obj ==0)or( $l_city ==0)or($l_street ==0)or( $house =="")or($violate ==0))
{//2
echo "&#1059;&#1082;&#1072;&#1079;&#1072;&#1085;&#1099; &#1085;&#1077; &#1074;&#1089;&#1077; &#1087;&#1072;&#1088;&#1072;&#1084;&#1077;&#1090;&#1088;&#1099; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072;!!!";

$buf='<table width="100%" border="0"><tr><td>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090;</td><td>&#1040;&#1076;&#1088;&#1077;&#1089;</td><td>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</td></tr>';
echo ('select distinct id_obj
from obr_obj_id'.$user_id.'_user ');
$add_obj_tab=mysql_query ('select distinct id_obj
from obr_obj_id'.$user_id.'_user ');
while ($row_obj_tab = mysql_fetch_row($add_obj_tab))
{//5
			$name_obj_tab=mysql_query ('select id, Name_org
				from complaints_obj where id='.$row_obj_name[0]);
				$buf=$buf.'<tr>';
				while ($row_obj_name = mysql_fetch_row($name_obj_tab)){
				$buf=$buf. '<td><p><input  type="checkbox" name="in_doc_base"  checked="true" value="'.	$row_obj_tab[1].'" />'.$row_obj_name[0].'</p></td>';}
			$address_tab=mysql_query ('select distinct  id_city, id_street, house, housing, flat 
					from obr_obj_id'.$user_id.'_user where id_obj="'.$row_obj_tab[1].'"');
					while ($r_a_tab = mysql_fetch_row($address_tab))
						{
						$address_name=mysql_query('SELECT  `city_zab`.`name` , `street_zab`.`name` 
FROM street_zab
LEFT JOIN  `city_zab` ON  `street_zab`.`id_city` =  `city_zab`.`id` 
where `street_zab`.`id_city` "'.$r_a_tab[0].'" and `street_zab`.`id` ="'.$r_a_tab[1].'"');
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
}//5
$buf=$buf.'</table>';
echo $buf;
}//2
else {//2
*/

$add_obj=mysql_query ('select id 
from complaints_obj where id_obj="'.$l_obj.'"
and id_city="'.$l_city.'"
and id_street="'.$l_street.'"
and house="'.$house.'"
and housing="'.$housing.'"
and flat="'.$flat.'"
and id_v="'.$v.'"
');

$r_add = mysql_fetch_row($add_in);
if($r_add[0] == 0){
echo 'INSERT INTO obr_obj_id'.$user_id.'_user (
					`id_obj`,
`id_city`,
`id_street`,
`house`,
`housing`,
`flat`,
`id_v`)
					VALUES ( "'.$l_obj .'",  "'.$l_city .'", "'.$l_street .'",  "'.$house .'",  "'.$housing .'", 	"'.$flat .'", "'.$violate.'")';
$insert_tab2=mysql_query ('INSERT INTO obr_obj_id'.$user_id.'_user (
					`id_obj`,
`id_city`,
`id_street`,
`house`,
`housing`,
`flat`,
`id_v`)
					VALUES ( "'.$l_obj .'",  "'.$l_city .'", "'.$l_street .'",  "'.$house .'",  "'.$housing .'", 	"'.$flat .'", "'.$violate.'")',$db);}

$add_obj_tab=mysql_query ('select distinct id_obj
from obr_obj_id'.$user_id.'_user ');
$buf='<table width="100%" border="0"><tr><td>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090;</td>
<td>&#1040;&#1076;&#1088;&#1077;&#1089;</td><td>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</td></tr>';
while ($row_obj_tab = mysql_fetch_row($add_obj_tab))
{//5
			$name_obj_tab=mysql_query ('select id, Name_org
				from complaints_obj where id='.$row_obj_name[0]);
				$buf=$buf.'<tr>';
				while ($row_obj_name = mysql_fetch_row($name_obj_tab)){
				$buf=$buf. '<td><p><input  type="checkbox" name="in_doc_base"  checked="true" value="'.	$row_obj_tab[1].'" />'.$row_obj_name[0].'</p></td>';}
			$address_tab=mysql_query ('select distinct  id_city, id_street, house, housing, flat 
					from obr_obj_id'.$user_id.'_user where id_obj="'.$row_obj_tab[1].'"');
					while ($r_a_tab = mysql_fetch_row($address_tab))
						{
						$address_name=mysql_query('SELECT  `city_zab`.`name` , `street_zab`.`name` 
FROM street_zab
LEFT JOIN  `city_zab` ON  `street_zab`.`id_city` =  `city_zab`.`id` 
where `street_zab`.`id_city` "'.$r_a_tab[0].'" and `street_zab`.`id` ="'.$r_a_tab[1].'"');
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
}//5
$buf=$buf.'</table>';
echo $buf;

		
}//2
//}//1



?>