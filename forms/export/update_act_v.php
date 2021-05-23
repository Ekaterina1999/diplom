<?
$date_cr=date_create($_POST['date_rasp']);
$year=$date_cr->format('Y');
$basis=$_POST['basis_rasp'];
$date_start=$_POST['data_start'];
$date_stop=$_POST['date_stop'];
$id_u=$_COOKIE['userid'];
include_once("..\link\link.php");
$text='SELECT  `id_order` ,  `id` FROM  `act` WHERE  `act_year` =2019 AND  `id_order` <>0 ';

$q1=mysql_query ($text);
while ($r1 = mysql_fetch_row($q1)) 
{
echo '<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1072;&#1077;&#1084; &#1072;&#1082;&#1090; &#1089; &#1087;&#1091;&#1089;&#1090;&#1099;&#1084;&#1080; &#1089;&#1074;&#1103;&#1079;&#1103;&#1084;&#1080;'.$r1[1].'</p>';
$text2="SELECT  `id_violation` 
FROM  `link_order_violation` 
JOIN  `link_order_address` ON  `id_address_link` =  `link_order_address`.`id` 
JOIN  `link_order_obj` ON  `id_link_order_obj` =  `link_order_obj`.`id` 
WHERE `id_order`  =".$r1[0];
echo '<p>'.$text2.'</p>';
$q2=mysql_query ($text2);
//while (
$r2 = mysql_fetch_row($q2);
//) 
//{
//if($r2[0]=="" or $r2[0]==""){}else{
echo '<p>&#1053;&#1072;&#1093;&#1086;&#1076;&#1080;&#1084; &#1089;&#1074;&#1103;&#1079;&#1080; &#1087;&#1086; &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1102; &#1080; &#1079;&#1072;&#1085;&#1086;&#1089;&#1080;&#1084; &#1076;&#1072;&#1085;&#1085;&#1099;&#1077; &#1074; &#1072;&#1082;&#1090; '.$r2[0].$r2[0].'</p>';
	update_size( $r1[1],$r2[0],$r2[0]);
	//}
//}				
}



function update_size( $id, $o,$a){
echo '<p> INSERT INTO `link_act_workes`(`id`, `id_act`, `id_user`) VALUES ([value-1],[value-2],[value-3]) `id`="'.$id.'"</p>';
$insert_tab=mysql_query ('INSERT INTO `linc_act_violation`( `id_act`, `id_v`) VALUES ('.$r1[1].','.$r2[0].')');
					
				
	
}
 

?>