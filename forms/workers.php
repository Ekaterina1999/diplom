<?php
include_once("link\link.php");
$r=mysql_query ("select id, FIO from workers order by fio");

while ($myrow = mysql_fetch_row($r)) 
{ if ($myrow[0] == ""){}
else{


echo '<option value="'.$myrow[0].'">'.$myrow[1].'</option>';

}
}
?>
