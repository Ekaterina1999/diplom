<?php
include_once("..\link\link.php");
$id_user=$_COOKIE['userid'];
$name=$_POST['name'];
switch($name){
case "obr":
obr();
break;
}
function obr(){
$text_q='DROP TABLE obr_incoming_id'.$id_user.'_user';
//$val=""
$q_obj=mysql_query ($text_q)or die (Mysql_error());
$text_q='DROP TABLE obr_obj_id'.$id_user.'_user';
//$val=""
$q_obj=mysql_query ($text_q)or die (Mysql_error());
}
?>