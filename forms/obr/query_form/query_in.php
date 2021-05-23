 <?php 
global $buf1;

function list_incoming($_user_id)
{
include_once("..\..\link\link.php");
if (!mysql_query('SELECT * FROM obr_incoming_id'.$_user_id.'_user')){
echo"  <p>&#1042;&#1099; &#1085;&#1077; &#1074;&#1085;&#1077;&#1089;&#1083;&#1080; &#1085;&#1080; &#1086;&#1076;&#1085;&#1086;&#1075;&#1086; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; </p>";
mysql_query('create table IF NOT EXISTS obr_incoming_id'.$_user_id.'_user (     `id` int(11) NOT NULL AUTO_INCREMENT,
                                                                              `num_incoming` varchar(255) NOT NULL,
                                                                              `incoming_date` date NOT NULL,
                                                                              PRIMARY KEY (`id`)
                                                                            )'
);
}else{
$add_in2=mysql_query ('select id
from obr_incoming_id'.$_user_id.'_user ');
while ($row_in2 = mysql_fetch_row($add_in2))
{
$buf=$buf. '<p><input  type="checkbox" name="in_doc_base"  value="checked" date-id="'.$row_in2[0].'" />'.$in_name_1.' &#1086;&#1090; '.$in_date_1.'</p>';
}
}

}

function list_obj_in($_user_id)
{
echo '%'.$_user_id;
include_once("..\..\link\link.php");
if (!mysql_query('SELECT * FROM obr_obj_id'.$_user_id.'_user')){
include_once("..\..\link\link.php"); 
if (($l_obj ==0)or( $l_city ==0)or($l_street ==0)or( $house =="")or($violate ==0))
{
echo"  <p>&#1044;&#1072;&#1085;&#1085;&#1099;&#1077; &#1091;&#1082;&#1072;&#1079;&#1072;&#1085;&#1099; &#1085;&#1077; &#1087;&#1086;&#1083;&#1085;&#1086;&#1089;&#1090;&#1100;&#1102; </p>";
mysql_query('create table IF NOT EXISTS obr_obj_id'.$_user_id.'_user (     `id` int(11) NOT NULL AUTO_INCREMENT,
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
else{//2
echo "&#1059;&#1082;&#1072;&#1079;&#1072;&#1085;&#1099; &#1085;&#1077; &#1074;&#1089;&#1077; &#1087;&#1072;&#1088;&#1072;&#1084;&#1077;&#1090;&#1088;&#1099; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072;!!!";
echo 'select distinct id_obj
from obr_obj_id'.$user_id.'_user ';
$add_obj_tab=mysql_query ('select distinct id_obj
from obr_obj_id'.$user_id.'_user ');

while ($row_obj_tab = mysql_fetch_row($add_obj_tab))
{//5
if ($row_obj_tab[0] == ""){}
						else{
						$buf='<table width="100%" border="0"><tr><td>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090;</td>
<td>&#1040;&#1076;&#1088;&#1077;&#1089;</td><td>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</td></tr>';
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
}$buf=$buf.'</table>';
}//5

echo $buf;
}//2
}
}



function insert_obr_base_in($in_name_1, $in_date_1, $select_incoming,$user_id,$buf)
 {//1
$buf=$select_incoming;
include_once("..\..\link\link.php");
if (($in_name_1=="")or($in_date_1==""))
{//2
echo "&#1059;&#1082;&#1072;&#1079;&#1072;&#1085;&#1099; &#1085;&#1077; &#1074;&#1089;&#1077; &#1087;&#1072;&#1088;&#1072;&#1084;&#1077;&#1090;&#1088;&#1099; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072;!!!";
$add_in2=mysql_query ('select id, num_incoming, incoming_date
from obr_incoming_id'.$user_id.'_user ');
while ($row_in2 = mysql_fetch_row($add_in2))
{//5
$buf=$buf. '<p><input  type="checkbox" name="in_doc_base"  checked="true" value="'.$row_in2[0].'" />'.$row_in2[1].' &#1086;&#1090; '.$row_in2[2].'</p>';
}//5
//echo $buf;
}//2
else {//2
$add_in=mysql_query ('select id 
from incoming where num_incoming= "'.$in_name_1.'" and incoming_date="'.$in_date_1.'"');

$r_add = mysql_fetch_row($add_in);
if($r_add[0] == 0){//3
					$insert_tab=mysql_query ('INSERT INTO  `incoming` (
					`num_incoming` ,`incoming_date`)
					VALUES ( "'.$in_name_1.'", "'.$in_date_1.'")',$db);

						}//3


$add_in1=mysql_query ('select id  
from incoming where num_incoming= "'.$in_name_1.'" and incoming_date="'.$in_date_1.'"');
while ($row_in1 = mysql_fetch_row($add_in1))
{//4
 $add_in3=mysql_query ('select id 
from obr_incoming_id'.$user_id.'_user where num_incoming= "'.$in_name_1.'" and incoming_date="'.$in_date_1.'"');

$r_add3 = mysql_fetch_row($add_in3);
if($r_add3[0] == 0){
$insert_tab2=mysql_query ('INSERT INTO obr_incoming_id'.$user_id.'_user (
					`num_incoming` ,`incoming_date`)
					VALUES ( "'.$in_name_1.'", "'.$in_date_1.'")',$db);}
				
$add_in2=mysql_query ('select id, num_incoming, incoming_date
from obr_incoming_id'.$user_id.'_user ');
while ($row_in2 = mysql_fetch_row($add_in2))
{//5
$buf=$buf. '<p><input  type="checkbox" name="in_doc_base"  checked="true" value="'.$row_in2[0].'" />'.$row_in2[1].' &#1086;&#1090; '.$row_in2[2].'</p>';
}//5
}//4
//echo $buf;
}//2
}//1


 /* if(!empty($_REQUEST)){
    if(function_exists($_REQUEST['action'])){
      call_user_func($_REQUEST['action']);
    }
    die();
  }*/
?>
