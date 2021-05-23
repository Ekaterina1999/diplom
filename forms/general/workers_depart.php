<?php
include_once("..\link\link.php");
$id_depart=$_POST['id_depart'];
$del_w=$_POST['del_w'];
//echo $del_w;
if ($id_depart=="0"){$where="where not( id_department='3')";}else{
if ($id_depart==""){$where="where not(id_department='3')";}else{
$where="where id_department='".$id_depart."'";}}
if($del_w=="1"){}else{$where=$where."and active <>1";}
$q="select id, FIO from workers ".$where." order by fio";
$r=mysql_query ($q);
//echo $q;
while ($myrow = mysql_fetch_row($r)) 
{ if ($myrow[0] == ""){}
else{


echo '<option value="'.$myrow[0].'">'.iconv("utf-8","windows-1251",$myrow[1]).'</option>';

}
}
?>
