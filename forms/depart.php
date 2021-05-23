<?php
include_once("link\link.php");
$val=$_POST['val'];
$q_text='SELECT `head` FROM `workers` where (`id`="'.$_COOKIE['userid'].'") ';
//echo $q_text.' ';
$q=mysql_query ($q_text) or die (mysql_error());
while ($r = mysql_fetch_row($q)) 
					{ if ($r[0]=="1"){$res= "1";}}
			


echo $res;


?>