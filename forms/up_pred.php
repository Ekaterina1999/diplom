<?


include_once("link\link.php");

			
$query='SELECT  `id`,`id_act` FROM `ordinance` WHERE `id_obj` is null and `id_adr` is null and `id_act` is not null';
		$query_result = mysql_query($query) or die('DIED: '.mysql_error());

	
while ($row_in2 = mysql_fetch_row($query_result))
{
$q='SELECT `obj_id`,`address_id` FROM `act` WHERE `id`="'.$row_in2[1].'"';
$q_r = mysql_query($q) or die('DIED: '.mysql_error());
while ($row = mysql_fetch_row($q_r))
{
$q2='UPDATE `ordinance` SET `id_obj`="'.$row[0].'",`id_adr`="'.$row[1].'" WHERE `id`="'.$row_in2[0].'"';
$q_r2 = mysql_query($q2) or die('DIED: '.mysql_error());

}

}

echo "THE END pred!";


			
$query='SELECT `id`,`id_notify` FROM `protocol` WHERE   `id_obj` is null and `id_adr` is null and `id_notify` is not null';
		$query_result = mysql_query($query) or die('DIED: '.mysql_error());

	
while ($row_in2 = mysql_fetch_row($query_result))
{
$q='SELECT `obj_id`,`address_id` FROM `act` WHERE `id`in ( SELECT `id_act`  FROM `notify_protocol` WHERE `id` ="'.$row_in2[1].'")';
$q_r = mysql_query($q) or die('DIED: '.mysql_error());
while ($row = mysql_fetch_row($q_r))
{
$q2='UPDATE `protocol` SET `id_obj`="'.$row[0].'",`id_adr`="'.$row[1].'" WHERE `id`="'.$row_in2[0].'"';
$q_r2 = mysql_query($q2) or die('DIED: '.mysql_error());

}

}

echo "THE END protocol!";
?>