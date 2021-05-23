 <?php
 include_once("link\link.php");

$r_m=mysql_query ("select link_menu, name from menu_form order by id");

while ($myrow = mysql_fetch_row($r_m)) 
{ if ($myrow[0] == ""){}
else{


echo '<li><a  href="'.$myrow[0].'">'.$myrow[1].'</a></li>';

}
}
?>