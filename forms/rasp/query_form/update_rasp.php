<?php 
include_once("..\..\link\link.php");

$path=$_POST['path'];
echo $path;
switch ($path)
{
case 'pred': pred();
break;
}
function pred(){
$id=$_POST['id'];
$d1=$_POST['d1'];
$d2=$_POST['d2'];
$d4=$_POST['d4'];
if($_POST['d3']==""){$d3="NULL";}else{
$d3='"'.$_POST['d3'].'"';}
$d5=$_POST['d5'];
$q_text='UPDATE `caveat` SET `date_caveat`="'.$d1.'",`legal_requirement`="'.$d5.'",`date_tenor`="'.$d2.'",`date_plan`="'.$d4.'",`date_execution`='.$d3.' WHERE`id`="'.$id.'"';

echo $q_text;
$q=mysql_query ($q_text);
}
?>
