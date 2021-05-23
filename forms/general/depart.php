<?php
include_once("..\link\link.php");
$id_user=$_COOKIE['userid'];
$text_q='SELECT  `id_department` FROM  `workers` WHERE  `id` = "'.$id_user.'"';
//$val=""
$q_obj=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj = mysql_fetch_row($q_obj))
 {
 if ($r_obj[0]==0){}else{$val=$r_obj[0];}}
echo $val;
?>