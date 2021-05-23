<?php
$fio=$_POST['userfio'];
$post=$_POST['userpost'];
$pw=$_POST['userps'];
$depat=$_POST['dapatval'];
$mainmen=$_POST['mainmen'];
$allcheckel=$_POST['allcheckel'];
$l=$_POST['l'];

include_once("..\link\link.php");
$r=mysql_query ('select id, FIO from workers where fio="'.$fio.'"');

$rows=mysql_num_rows($r);
 if ($rows>0){


$res='1';


}else{

$insert_tab=mysql_query ('INSERT INTO  `workers` (					 `FIO`,`position`,`head`,`id_department`,`password`)	VALUES ( "'.$fio.'", "'.$post.'", "'.$mainmen.'", "'.$depat.'", "'.$pw.'")');
					
					
$r1=mysql_query ('select id, FIO from workers where fio="'.$fio.'"');

$row=mysql_fetch_row($r1);

 if ($row[0]==""){	$res='2';}else{	
$x=0;

while ($x<$l)
{


$insert_tab1=mysql_query ('INSERT INTO  `link_menu_workers` (
					 `id_workers`,`id_menu`)
					VALUES ( "'.$row[0].'", "'.$allcheckel[$x].'")');
					$x++; // ?????????? ????????
					$res='0';
}	


}								

}
echo $res;

?>
