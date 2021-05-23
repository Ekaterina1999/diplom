<?
$id_msg=$_POST['id_msg'];
include_once("..\link\link.php");

			
$query='SELECT code_event,
mame 
FROM  page_event  where code_event="'.$id_msg.'"  ';
		$query_result = mysql_query($query) or die('DIED: '.mysql_error());

	
while ($row_in2 = mysql_fetch_row($query_result))
{
$buf=$row_in2[1];

}

echo $buf;
?>