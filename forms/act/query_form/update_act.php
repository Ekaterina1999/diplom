<?php 
include_once("..\..\link\link.php");

$id=$_POST['id'];
$d1=$_POST['d1'];
$l_v=$_POST['l_v'];
$v=$_POST['v'];
if ($d1==""){}else{
$q_text='UPDATE `act` SET `date_end_act`="'.$d1.'"  WHERE`id`="'.$id.'"';
echo $q_text;
$q=mysql_query ($q_text);}

$not_del="";

			$y=0;
for ($y = 0; $y <= ($l_v); $y++) 
  {
  if ($v[$y]==""){}else{
  if ($not_del=="")
{$not_del='"'.$v[$y].'"';}else{$not_del=$not_del.', "'.$v[$y].'"';}
  }
}
echo $not_del;
if ($not_del=="") {$q_text='delete FROM  `linc_act_violation`
  WHERE `id_act`="'.$id.'" ';
 echo $q_text; 

$q=mysql_query ($q_text);}else {$q_text='delete FROM  `linc_act_violation`
  WHERE `id_act`="'.$id.'" and  not (`id_v` in('.$not_del.'))';
 echo $q_text; 

echo $q_text;
$q=mysql_query ($q_text);}
$x=0;
for ($x = 0; $x <= ($l_v-1); $x++) 
  {  $text_q='SELECT id_v
FROM  `linc_act_violation`  WHERE `id_act`="'.$id.'" and `id_v`="'.$v[$x].'"';
 echo  $text_q;
 $val_v="";
	  		$q_v1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_v1 = mysql_fetch_row($q_v1))
				{$val_v=$r_v1[0];}
				echo ' in '.$val_v;
				if ($val_v==""){$text_q_in='INSERT INTO `linc_act_violation` ( `id_act`, `id_v`) VALUES ( "'.$id.'","'.$v[$x].'")';
 echo $text_q_in;
  $insert_tab2=mysql_query ($text_q_in);}
				
				}  
  
 
  
 

?>
