<?


include_once("link\link.php");

			
$query='SELECT  `id`,  `id_order` FROM `notify` WHERE  `user` is null';
		$query_result = mysql_query($query) or die('DIED: '.mysql_error());

	
while ($row_in2 = mysql_fetch_row($query_result))
{
$q='SELECT `id_workers` FROM `link_order_workers` WHERE `id_order`="'.$row_in2[1].'"';
$q_r = mysql_query($q) or die('DIED: '.mysql_error());
while ($row = mysql_fetch_row($q_r))
{
$q2='UPDATE `notify` SET `user`="'.$row[0].'"  WHERE `id`="'.$row_in2[0].'"';
echo $q2;
$q_r2 = mysql_query($q2) or die('DIED: '.mysql_error());

}

}

echo "THE END used!";


			

?>