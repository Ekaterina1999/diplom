<?php

		include_once("..\link\link.php");
$city=$_POST['city'];
$street=$_POST['street'];
$house=$_POST['house'];
$korpus=$_POST['korpus'];


 $text_q2='SELECT  `id` 
FROM address
WHERE   `id_city`="'.$city.'" and `id_street`="'.$street.'" and   `house`="'.$house.'" and `housing`="'.$korpus.'"  and `flat`="0" ';
$q_address2=mysql_query ($text_q2)or die (Mysql_error());
while ($r_address2 = mysql_fetch_row($q_address2))
 { 
 $id_adr=$r_address2[0];}
 
 if ($id_adr==""){
 
$insert_tab=mysql_query ('INSERT INTO  `address` (
					`id_city`, `id_street`, `house`, `housing`, `flat`)
					VALUES (  "'.$city.'", "'.$street.'", "'.$house.'" , "'.strval($housing).'", "0")');
 
  $text_q2='SELECT  `id` 
FROM address
WHERE   `id_city`="'.$city.'" and `id_street`="'.$street.'" and   `house`="'.$house.'" and `housing`="'.$korpus.'"  and `flat`="0" ';
$q_address2=mysql_query ($text_q2)or die (Mysql_error());
while ($r_address2 = mysql_fetch_row($q_address2))
 { 
 $id_adr=$r_address2[0];}}
  
 echo $id_adr;

?>