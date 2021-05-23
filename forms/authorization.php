<?php
$userid=$_POST['userid'];
$pw=$_POST['pw'];
include_once("link\link.php");

$r=mysql_query ('select id, FIO from workers where password="'.$pw.'" and id="'.$userid.'" and `active` ="0" order by fio');
if (!$r or !mysql_num_rows($r)) { }else{
$row=mysql_fetch_row($r);	

echo strval($row[1]); //'?? ????????? ??? ??????:'.$_COOKIE['username'].'   <input type="button" name="exitbase" value="?????" onclick="deleteCookie()" />';
 
}

?>
