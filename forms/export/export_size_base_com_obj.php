<?
$date_cr=date_create($_POST['date_rasp']);
$year=$date_cr->format('Y');
$basis=$_POST['basis_rasp'];
$date_start=$_POST['data_start'];
$date_stop=$_POST['date_stop'];
$id_u=$_COOKIE['userid'];
include_once("..\link\link.php");
$text='SELECT `name`, `size_base` FROM `temp_base_size` `';

$q1=mysql_query ($text);
while ($r1 = mysql_fetch_row($q1)) 
{
	update_size( $r1[0], $r1[1]);
				
}



function update_size( $n, $s){

$insert_tab=mysql_query ('UPDATE `complaints_obj` SET `size_base`="'.$n.'" WHERE `full_name_org`="'.$s.'")');
					
				
	
}
 

?>