<?

include_once("..\link\link.php");
$text='SELECT `id`, LEFT(`FIO`,1), `position`, `head`, `id_department`, `password`, `cabinet`, `telephon`, `page_length` FROM `workers`';

$q1=mysql_query ($text);
while ($r1 = mysql_fetch_row($q1)) 
{
$p=rand (100, 999);
echo '<p> UPDATE `workers` SET `password`="'.$r1[1].$p.'" WHERE `id`="'.$r1[0].'"</p>';
$insert_tab=mysql_query ('UPDATE `workers` SET `password`="'.$r1[1].$p.'" WHERE `id`="'.$r1[0].'"');
					
				
	
}
 

?>