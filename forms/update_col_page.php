<?
$col=$_POST['col_page'];
$name=$_POST['name'];
$user=$_COOKIE['userid'];
include_once("link\link.php");
$true=0;			
$query='SELECT page_length FROM  workers   WHERE `id`="'.$user.'"';
$query_result = mysql_query($query) or die('DIED: '.mysql_error());
while ($row_in2 = mysql_fetch_row($query_result))
{
if ($row_in2[0]==$col){$true=1;}
}
if ($true==0){
$text_update='UPDATE `workers` SET `page_length`="'.$col.'" WHERE `id`="'.$user.'"';
//echo $text_update;
$query_update = mysql_query($text_update) or die('DIED: '.mysql_error());
}
echo $true;
?>