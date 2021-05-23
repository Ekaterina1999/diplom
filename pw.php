<?
$pw=$_POST['pw'];
include_once("forms\link\link.php");
			
$query='UPDATE workers SET password='.$pw.' WHERE id="'.$_COOKIE['userid'].'"';
		$query_result = mysql_query($query) or die('DIED: '.mysql_error());

	


echo mysql_error();
//echo $query;
?>